<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Product extends CI_Controller {

    function __construct(){
        parent::__construct();
        //Load cart libraray
        $this->load->library('cart');
    }

    public function list($id) {
        $this->load->model('Product_model');
        $product = $this->Product_model->getProduct($id);

        $this->load->model('Category_model');
        $cat = $this->Category_model->getCategory($id);

        $data['product'] = $product;
        $data['cat'] = $cat;
        $this->load->view('front/partials/header');
        $this->load->view('front/product', $data);
        $this->load->view('front/partials/footer');
    }

    public function addToCart($id) {
        $this->load->model('Product_model');
        $product = $this->Product_model->getSingleProduct($id);
        $data = array (
            'id'    => $product['product_id'],
            'category_id'  => $product['category_id'],
            'qty'   =>1,
            'price' => $product['price'],
            'name' => $product['name'],
            'image' => $product['img']
        );
        $this->cart->insert($data);
        redirect(base_url(). 'cart/index');
    }
}