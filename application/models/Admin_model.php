<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin_model extends CI_Model {
    
    public function getByUsername($username) {

        $this->db->where('username', $username);
        $admin = $this->db->get('admin')->row_array();
        return $admin;
    }
    
    public function getAllOrders() {
        $this->db->order_by('o_id','DESC');
        $this->db->select('o_id, product_name, quantity, price, status, date, username, address');
        $this->db->from('user_orders');
        $this->db->join('users', 'users.u_id = user_orders.u_id');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getCatReport() {
        $this->db->group_by('u.category_id');
        $this->db->select('u.category_id, category_name, price, success-date');
        $this->db->select_sum('price');
        $this->db->from('user_orders as u');
        $this->db->join('category as c', 'c.category_id = u.category_id');
        $result = $this->db->get()->result();
        return $result;
    }

    public function productReport() {
        $query = $this->db->query('SELECT product_id, product_name, 
        SUM(quantity) AS qty
        FROM user_orders
        GROUP BY product_id
        ORDER BY SUM(quantity) DESC');
        return $query->result();
    }

    public function mostOrderdDishes() {
        $sql = 'SELECT u.r_id, r.name, u.price, u.product_name, 
        MAX(u.quantity) AS quantity, 
        SUM(price) AS total
        FROM user_orders AS u
        INNER JOIN categories as c
        ON u.category_id = c.category_id
        GROUP BY u.category_id';

        $query = $this->db->query($sql);
        return $query->result();
    }
}
