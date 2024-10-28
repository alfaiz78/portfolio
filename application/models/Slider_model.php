<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    // Method to add a new slider entry
    public function add_slider($data)
    {
        return $this->db->insert('sliders', $data); // Assuming 'sliders' is your table name
    }

    // Method to fetch all sliders
    public function get_sliders()
    {
        $query = $this->db->get('sliders');
        return $query->result(); // Return all slider entries
    }
 
     // Method to delete a slider by ID
     public function delete_slider($id)
     {
         return $this->db->delete('sliders', array('id' => $id));
     }
 
     // Method to fetch a slider by ID
     public function get_slider_by_id($id)
     {
         $query = $this->db->get_where('sliders', array('id' => $id));
         return $query->row(); // Return single record
     }
 
 
    // Method to update a slider by ID
    public function update_slider($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('sliders', $data); // Update the record with the provided data
    }

    // Method to delete a slider by ID

}


