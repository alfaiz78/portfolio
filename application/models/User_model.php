<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    // Method to get user by username or email
    public function get_user_by_username_or_email($user_input)
    {
        // Build the query
        $this->db->group_start(); // Start grouping for OR conditions
        $this->db->where('username', $user_input);
        $this->db->or_where('email', $user_input);
        $this->db->group_end(); // End grouping
        
        // Execute the query
        $query = $this->db->get('users'); // Make sure 'users' is your table name

        if ($query->num_rows() == 1) {
            return $query->row(); // Return user data if found
        } else {
            return false; // Return false if no user found
        }
    }
    
}

