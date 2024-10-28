<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Links_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fetch all links
    public function get_links() {
        return $this->db->get('links')->result();
    }

    // Fetch a single link by ID
    public function get_link_by_id($id) {
        return $this->db->get_where('links', ['id' => $id])->row();
    }

    // Add a new link
    public function add_link($data) {
        return $this->db->insert('links', $data);
    }

    // Update a link by ID
    public function update_link($data, $id) {
        $this->db->where('id', $id);
        return $this->db->update('links', $data);
    }

    // Delete a link by ID
    public function delete_link($id) {
        return $this->db->delete('links', ['id' => $id]);
    }
    public function get_link($id) {
        $query = $this->db->get_where('links', array('id' => $id));
        return $query->row(); // Returns a single link item
    }
    
}
?>
