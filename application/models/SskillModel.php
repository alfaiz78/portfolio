<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SskillModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }


    public function get_all_sskills() {
        return $this->db->get('sskills')->result();
    }

    public function insert_sskill($data) {
        return $this->db->insert('sskills', $data);
    }

    public function get_sskill($id) {
        return $this->db->get_where('sskills', ['id' => $id])->row();
    }

    public function update_sskill($id, $data) {
        return $this->db->where('id', $id)->update('sskills', $data);
    }

    public function delete_sskill($id) {
        return $this->db->delete('sskills', ['id' => $id]);
    }
}
