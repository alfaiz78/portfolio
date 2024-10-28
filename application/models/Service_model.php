<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    // Method to add a new service entry
    public function add_service($data)
    {
        return $this->db->insert('services', $data); // Assuming 'services' is your table name
    }

    // Method to fetch all services
    public function get_services()
    {
        $query = $this->db->get('services');
        return $query->result(); // Return all service entries
    }

    // Method to delete a service by ID
    public function delete_service($id)
    {
        return $this->db->delete('services', array('id' => $id));
    }

    // Method to fetch a service by ID
    public function get_service_by_id($id)
    {
        $query = $this->db->get_where('services', array('id' => $id));
        return $query->row(); // Return single record
    }

    // Method to update a service by ID
    public function update_service($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('services', $data); // Update the record with the provided data
    }




    public function add_services($data, $id) {
        // Ensure we're updating the correct record by ID
        $this->db->where('id', 1);
        // Update the data in the 'abouts' table
        return $this->db->update('hservices', $data);
    }



    public function get_hservices(){
        $query = $this->db->get('hservices');
        return $query->result(); // Return all service entries
    }

    public function update_hservice($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('hservices', $data); // Update the record with the provided data
    }
}
?>
