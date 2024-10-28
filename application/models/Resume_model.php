<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    // Method to add a new resume entry
    public function add_resume($data)
    {
        return $this->db->insert('resumes', $data); // Assuming 'resumes' is your table name
    }

    // Method to fetch all resumes
    public function get_resumes()
    {
        $query = $this->db->get('resumes');
        return $query->result(); // Return all resume entries
    }

    // Method to delete a resume by ID
    public function delete_resume($id)
    {
        return $this->db->delete('resumes', array('id' => $id));
    }

    // Method to fetch a resume by ID
    public function get_resume_by_id($id)
    {
        $query = $this->db->get_where('resumes', array('id' => $id));
        return $query->row(); // Return single record
    }

    // Method to update a resume by ID
    public function update_resume($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('resumes', $data); // Update the record with the provided data
    }




    public function add_resumes($data, $id) {
        // Ensure we're updating the correct record by ID
        $this->db->where('id', 1);
        // Update the data in the 'abouts' table
        return $this->db->update('hresumes', $data);
    }



    public function get_hresumes(){
        $query = $this->db->get('hresumes');
        return $query->result(); // Return all resume entries
    }

    public function update_hresume($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('hresumes', $data); // Update the record with the provided data
    }
}
?>
