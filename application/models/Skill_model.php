<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skill_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    // Method to add a new skill entry
    public function add_skill($data)
    {
        return $this->db->insert('skills', $data); // Assuming 'skills' is your table name
    }

    // Method to fetch all skills
    public function get_skills()
    {
        $query = $this->db->get('skills');
        return $query->result(); // Return all skillervice entries
    }

    // Method to delete a skill by ID
    public function delete_skill($id)
    {
        return $this->db->delete('skills', array('id' => $id));
    }

    // Method to fetch a skill by ID
    public function get_skill_by_id($id)
    {
        $query = $this->db->get_where('skills', array('id' => $id));
        return $query->row(); // Return single record
    }

    // Method to update a skill by ID
    public function update_skill($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('skills', $data); // Update the record with the provided data
    }




    public function add_skills($data, $id) {
        // Ensure we're updating the correct record by ID
        $this->db->where('id', 1);
        // Update the data in the 'abouts' table
        return $this->db->update('hskills', $data);
    }



    public function get_hskills(){
        $query = $this->db->get('hskills');
        return $query->result(); // Return all skill entries
    }

    public function update_hskill($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('hskills', $data); // Update the record with the provided data
    }
}
?>
