<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footer_model extends CI_Model {
    

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fetch all footer details
    public function get_footers() {
        // Query to fetch all footers
        $query = $this->db->get('footers'); // Replace 'footers' with your actual table name
        return $query->result();
    }

    public function update_footer($id, $data) {
        // Update footer based on the provided ID
        $this->db->where('id', $id);
        return $this->db->update('footers', $data);
    }
}

