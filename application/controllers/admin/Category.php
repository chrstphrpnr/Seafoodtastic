<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
    }

    public function index() {
        $this->load->model('Category_model');
        $category = $this->Category_model->getCategories();
        $category_data['category'] = $category;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/category/list', $category_data);
        $this->load->view('admin/partials/footer');
    }

    public function create_category() {

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/category/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        

        $this->load->model('Category_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('category_name', 'Category name','trim|required');

        if($this->form_validation->run() == true) {


            if(!empty($_FILES['image']['name'])){
                //image is selected
                if($this->upload->do_upload('image')) {
                    //file uploaded suceessfully

                    
                    $data = $this->upload->data();


                    //resizing image for admin
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);
                    

                    $formArray['img'] = $data['file_name'];
                    $formArray['category_name'] = $this->input->post('category_name');
                   
        
                    $this->Category_model->create($formArray);
        
                    $this->session->set_flashdata('category_success', 'Category added successfully');
                    redirect(base_url(). 'admin/category/index');

                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/category/add_category', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {
                //if no image is selcted we will add res data without image
                $formArray['category_name'] = $this->input->post('category_name');
               
    
                $this->Category_model->create($formArray);
    
                $this->session->set_flashdata('category_success', 'Category added successfully');
                redirect(base_url(). 'admin/category/index');
            }

        } else {
            $this->load->view('admin/partials/header');
            $this->load->view('admin/category/add_category');
            $this->load->view('admin/partials/footer');
        }
        
    }

    public function edit($id) {
        $this->load->model('Category_model');
        $category = $this->Category_model->getCategory($id);

        if(empty($category)) {
            $this->session->set_flashdata('error', 'Category not found');
            redirect(base_url().'admin/category/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/category/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('category_name', 'Category name','trim|required');


        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){
                //image is selected
                if($this->upload->do_upload('image')) {
                    //file uploaded suceessfully

                    
                    $data = $this->upload->data();


                    //resizing image
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);


                    $formArray['img'] = $data['file_name'];
                    $formArray['category_name'] = $this->input->post('category_name');
                   
        
                    $this->Category_model->update($id, $formArray);
        
                    //deleting existing files

                    if (file_exists('./public/uploads/category/'.$category['img'])) {
                        unlink('./public/uploads/category/'.$category['img']);
                    }

                    if(file_exists('./public/uploads/category/thumb/'.$category['img'])) {
                        unlink('./public/uploads/category/thumb/'.$category['img']);
                    }

                    $this->session->set_flashdata('category_success', 'Category updated successfully');
                    redirect(base_url(). 'admin/category/index');

                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['category'] = $category;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/category/edit', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {

                //if no image is selcted we will add res data without image
                $formArray['category_name'] = $this->input->post('category_name');
               
    
                $this->Category_model->update($id ,$formArray);
    
                $this->session->set_flashdata('category_success', 'Category updated successfully');
                redirect(base_url(). 'admin/category/index');
            }


        } else {
            $data['category'] = $category;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/category/edit', $data);
            $this->load->view('admin/partials/footer');
        }

    }

    public function delete($id){

        $this->load->model('Category_model');
        $category = $this->Category_model->getCategory($id);

        if(empty($category)) {
            $this->session->set_flashdata('error', 'category not found');
            redirect(base_url().'admin/category');
        }

        if (file_exists('./public/uploads/category/'.$category['img'])) {
            unlink('./public/uploads/category/'.$category['img']);
        }

        if(file_exists('./public/uploads/category/thumb/'.$category['img'])) {
            unlink('./public/uploads/category/thumb/'.$category['img']);
        }

        $this->Category_model->delete($id);

        $this->session->set_flashdata('category_success', 'Category deleted successfully');
        redirect(base_url().'admin/category/index');

    }
}