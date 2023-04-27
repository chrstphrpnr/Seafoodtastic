<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
        $this->load->helper('url');
    }

    public function index() {
        $this->load->model('Product_model');
        $product = $this->Product_model->getProduct();
        $data['product'] = $product;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/product/list', $data);
        $this->load->view('admin/partials/footer');
    }

    public function create_product(){

        $this->load->helper('common_helper');
        $this->load->model('Category_model');
        $categories = $this->Category_model->getCategories();

        $config['upload_path']          = './public/uploads/products/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->model('Product_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name', 'Dish name','trim|required');
        $this->form_validation->set_rules('about', 'About','trim|required');
        $this->form_validation->set_rules('price', 'Price','trim|required');
        $this->form_validation->set_rules('category_name', 'Category name','trim|required');


        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){
                //image is selected
                if($this->upload->do_upload('image')) {
                    //file uploaded suceessfully
                    $data = $this->upload->data();
                    //resizing image
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'front_thumb/'.$data['file_name'], 1120,270);


                    $formArray['img'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('name');
                    $formArray['about'] = $this->input->post('about');
                    $formArray['price'] = $this->input->post('price');
                    $formArray['category_id'] = $this->input->post('category_name');
        
                    $this->Product_model->create($formArray);
        
                    $this->session->set_flashdata('product_success', 'Product added successfully');
                    redirect(base_url(). 'admin/product/index');

                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error; 
                    $data['categories']= $categories;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/product/add_product', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {
                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('name');
                $formArray['about'] = $this->input->post('about');
                $formArray['price'] = $this->input->post('price');
                $formArray['product_id'] = $this->input->post('product_name');
    
                $this->Product_model->create($formArray);
                
                $this->session->set_flashdata('product_success', 'Product added successfully');
                redirect(base_url(). 'admin/product/index');
            }

        } else {
            $category_data['categories']= $categories;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/product/add_product', $category_data);
            $this->load->view('admin/partials/footer');
        }
        
    }

    public function edit($id) {
        $this->load->model('Product_model');
        $product = $this->Product_model->getSingleProduct($id);

        $this->load->model('Category_model');
        $categories = $this->Category_model->getCategories();
        
        if(empty($product)) {

            $this->session->set_flashdata('error', 'Product not found');
            redirect(base_url(). 'admin/product/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/products/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('name', 'Dish name','trim|required');
        $this->form_validation->set_rules('about', 'About','trim|required');
        $this->form_validation->set_rules('price', 'Price','trim|required');
        $this->form_validation->set_rules('catname', 'Category name','trim|required');

        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){
                //image is selected
                if($this->upload->do_upload('image')) {
                    //file uploaded suceessfully
                    $data = $this->upload->data();
                    //resizing image
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);

                    $formArray['img'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('name');
                    $formArray['about'] = $this->input->post('about');
                    $formArray['price'] = $this->input->post('price');
                    $formArray['category_id'] = $this->input->post('catname');
        
                    $this->Product_model->update($id, $formArray);

                    //deleting existing images

                    if (file_exists('./public/uploads/products/'.$product['img'])) {
                        unlink('./public/uploads/products/'.$product['img']);
                    }

                    if(file_exists('./public/uploads/products/thumb/'.$product['img'])) {
                        unlink('./public/uploads/products/thumb/'.$product['img']);
                    }
        
                    $this->session->set_flashdata('product_success', 'Product updated successfully');
                    redirect(base_url(). 'admin/product/index');

                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['product'] = $product;
                    $data['categories'] = $categories;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/product/edit', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {
                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('name');
                $formArray['about'] = $this->input->post('about');
                $formArray['price'] = $this->input->post('price');
                $formArray['category_id'] = $this->input->post('catname');
    
                $this->Product_model->update($id, $formArray);
    
                $this->session->set_flashdata('product_success', 'Product updated successfully');
                redirect(base_url(). 'admin/product/index');
            }

        } else {
            $data['product'] = $product;
            $data['categories'] = $categories;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/product/edit', $data);
            $this->load->view('admin/partials/footer');

        }

    }
    public function delete($id){

        $this->load->model('Product_model');
        $product = $this->Product_model->getSingleProduct($id);

        if(empty($product)) {
            $this->session->set_flashdata('error', 'product not found');
            redirect(base_url().'admin/product');
        }

        if (file_exists('./public/uploads/products/'.$product['img'])) {
            unlink('./public/uploads/products/'.$product['img']);
        }

        if(file_exists('./public/uploads/products/thumb/'.$product['img'])) {
            unlink('./public/uploads/products/thumb/'.$product['img']);
        }

        $this->Product_model->delete($id);

        $this->session->set_flashdata('product_success', 'product deleted successfully');
        redirect(base_url().'admin/product/index');

    }
}