<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Category_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('category', $formArray);
    }

    public function getCategories() {
        $result = $this->db->get('category')->result_array();
        return $result;
    }

    public function getCategory($id) {
        $this->db->where('category_id', $id);
        $categories = $this->db->get('category')->row_array();
        return $categories;
    }

    public function update($id, $formArray) {
        $this->db->where('category_id', $id);
        $this->db->update('category', $formArray);
    } 

    public function delete($id) {
        $this->db->where('category_id',$id);
        $this->db->delete('category');
    }

    public function countCategory() {
        $query = $this->db->get('category');
        return $query->num_rows();
    }

    public function getCategoryInfo() {
        $this->db->select('*');
        $this->db->from('category');
        $result = $this->db->get()->result_array();
        return $result;
    }



}
