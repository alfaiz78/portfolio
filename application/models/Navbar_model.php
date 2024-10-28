<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navbar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    // Fetch all navbar items
    public function get_navbar() {
        $query = $this->db->get('navbars');
        return $query->result();
    }

    // Add new navbar item
    public function add_navbar_item($data) {
        $this->db->insert('navbars', $data);
    }

    // Update existing navbar item by ID
    public function update_navbar($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('navbars', $data);
    }

    // Delete navbar item by ID
    public function delete_navbar($id) {
        $this->db->where('id', $id);
        $this->db->delete('navbars');
    }
}
?>

