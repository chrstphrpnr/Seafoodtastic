<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Product_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('product', $formArray);
    }
    //GetMenu
    public function getProduct() {
        $result = $this->db->get('product')->result_array();
        return $result;
    }

    public function getSingleProduct($id) {
        $this->db->where('product_id', $id);
        $product = $this->db->get('product')->row_array();
        return $product;
    }

    public function update($id, $formArray) {
        $this->db->where('product_id', $id);
        $this->db->update('product', $formArray);
    } 

    public function delete($id) {
        $this->db->where('product_id',$id);
        $this->db->delete('product');
    }

    public function countProduct() {
        $query = $this->db->get('product');
        return $query->num_rows();
    }
    //Getdishes
    public function getProducts($id) {
        $this->db->where('product_id', $id);
        $product = $this->db->get('product')->result_array();
        return $product;
    }

}