<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index()
	{
		$this->load->model('Category_model');
		$categories= $this->Category_model->getCategoryInfo();
		$data['categories'] = $categories;
		$this->load->view('front/partials/header');
		$this->load->view('front/category',$data);
		$this->load->view('front/partials/footer');
	}

}
