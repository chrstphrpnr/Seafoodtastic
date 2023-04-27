<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Orders extends CI_Controller {
    function __construct(){
        parent::__construct();

        $user = $this->session->userdata('user');
            if(empty($user)) {
                $this->session->set_flashdata('msg', 'Your session has been expired');
                redirect(base_url().'login/');
            }
        $this->load->model('Order_model');
        $this->load->model('Category_model');
        $this->load->model('Product_model');
    }
    public function index() {
        $user = $this->session->userdata('user');
        $order = $this->Order_model->getUserOrder($user['user_id']);
        $data['orders'] = $order;
        $this->load->view('front/partials/header');
        $this->load->view('front/orders', $data);
        $this->load->view('front/partials/footer');
    }

    public function deleteOrder($id) {
        $order = $this->Order_model->getOrder($id);

        if(empty($order)) {
            $this->session->set_flashdata('error_msg', 'Order not found');
            redirect(base_url().'orders');
        }

        $this->Order_model->deleteOrder($id);

        $this->session->set_flashdata('success_msg', 'Your order cancelled successfully');
        redirect(base_url().'orders');

    }


    public function invoice($id) {
        $order = $this->Order_model->getOrderByUser($id);
        $data['order'] = $order;
        $u_id = $order['u_id'];
        $category_id = $order['category_id'];
        $product_id = $order['product_id'];
        $cat = $this->Category_model->getCategory($category_id);
        $data['cat'] = $cat;   
        $pro = $this->Product_model->getSingleProduct($product_id);
        $data['pro'] = $pro;
    
        $user = $this->session->userdata('user');
        if($u_id == $user['user_id']) {
            if($order['status'] == 'closed') {
                $this->load->view('front/invoice', $data);
            } else {
                $this->session->set_flashdata('error_msg', 'your order is not yet complete');
                redirect(base_url().'orders');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'you are accessing wrong order data');
            redirect(base_url().'orders');
        }        
    }
}