<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function add_about($data, $id) {
        // Ensure we're updating the correct record by ID
        $this->db->where('id', $id);
        // Update the data in the 'abouts' table
        return $this->db->update('abouts', $data);
    }

    public function update($data) {
        $this->db->where('id', $data['id']); // Assuming you have an ID to target the specific record
        return $this->db->update('your_table_name', $data);
    }
    

    
    

    // Method to fetch all about entries
    public function get_abouts() {
        $query = $this->db->get('abouts');
        return $query->result(); // Return all about records
    }


    public function update_about($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('abouts', $data);
    }
    
}
