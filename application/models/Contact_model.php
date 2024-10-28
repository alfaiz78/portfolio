<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the default database connection
    }

    // Method to add a new contact entry to 'contacts' table
    public function add_contact($data)
    {
        return $this->db->insert('contacts', $data); // Inserting into contacts table
    }

    // Method to fetch all contacts from 'contacts' table
    public function get_contacts()
    {
        $query = $this->db->get('contacts');
        return $query->result(); // Return all contact entries
    }

    // Method to delete a contact by ID from 'contacts' table
    public function delete_contact($id)
    {
        return $this->db->delete('contacts', array('id' => $id));
    }

    // Method to fetch a contact by ID from 'contacts' table
    public function get_contact_by_id($id)
    {
        $query = $this->db->get_where('contacts', array('id' => $id));
        return $query->row(); // Return single record
    }

    // Method to update a contact by ID in 'contacts' table
    public function update_contact($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('contacts', $data); // Update the record with the provided data
    }

    // Method to update the 'hcontacts' table
    public function update_hcontact($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('hcontacts', $data); // Update the record in hcontacts table
    }

    // Method to get all hcontacts
    public function get_hcontacts()
    {
        $query = $this->db->get('hcontacts');
        return $query->result(); // Return all hcontacts entries
    }

    // Method to add a new hcontact entry to 'hcontacts' table
    public function add_hcontact($data)
    {
        return $this->db->insert('hcontacts', $data); // Inserting into hcontacts table
    }
}
?>
