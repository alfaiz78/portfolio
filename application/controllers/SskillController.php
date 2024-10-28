<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SskillController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SskillModel');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Load the skill management page
    public function sskill()
    {
        if ($this->session->userdata('user')) {
            $data['sskills'] = $this->SskillModel->get_all_sskills();
            //  // Fetch skills
            $this->load->view('admin/header');
            $this->load->view('admin/sskill', $data, );
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }

    public function add() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('subtitle', 'Subtitle', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/sskill');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle')
            ];

            if ($this->SskillModel->insert_sskill($data)) {
                $this->session->set_flashdata('success', 'Skill added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to add skill.');
            }
            redirect('admin/sskill');
        }
    }

    public function edit($id) {
        $data['sskill'] = $this->SskillModel->get_sskill($id);
        $data['sskills'] = $this->SskillModel->get_all_sskills();
        $this->load->view('admin/header');
        $this->load->view('admin/sskill', $data);
        $this->load->view('admin/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('subtitle', 'Subtitle', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('sskill/edit/'.$id);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle')
            ];

            if ($this->SskillModel->update_sskill($id, $data)) {
                $this->session->set_flashdata('success', 'Skill updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update skill.');
            }
            redirect('admin/sskill');
        }
    }

    public function delete($id) {
        if ($this->SskillModel->delete_sskill($id)) {
            $this->session->set_flashdata('success', 'Skill deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete skill.');
        }
        redirect('admin/sskill');
    }
}