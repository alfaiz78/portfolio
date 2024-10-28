<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SkillController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Skill_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Load the skill management page
    public function skill()
    {
        if ($this->session->userdata('user')) {
            $data['hskills'] = $this->Skill_model->get_hskills();
            $data['skills'] = $this->Skill_model->get_skills();
            //  // Fetch skills
            $this->load->view('admin/header');
            $this->load->view('admin/skill', $data, );
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }

    // Add a new skill entry
    public function add()
    {
        // Set validation rules
        // $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('value', 'Value', 'required');

        // Check if the validation fails
        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->session->set_flashdata('error', validation_errors());

            // Load the view to show the form again with validation errors
            $this->manage_skills(); // You may need to adjust this based on how your view is set up
        } else {
            // Get user input
            $data = array(
                'value' => $this->input->post('value'), // Make sure the case matches the input name
                'title' => $this->input->post('title'),
            );

            // Add skill data to the database
            $this->Skill_model->add_skill($data);

            // Set a success message
            $this->session->set_flashdata('success', 'Skill added successfully!');

            // Redirect to the skill list
            redirect('admin/skill');
        }
    }


    // Manage skill (list, edit)
    public function manage_skills($id = NULL)
    {
        // Fetch all skills for listing
        $data['skills'] = $this->Skill_model->get_skills();

        // If ID is passed, load the specific skill for editing
        if ($id) {
            $data['skill'] = $this->Skill_model->get_skill_by_id($id);
        } else {
            $data['skill'] = null; // Initialize it to null if no ID is passed
        }

        // Load the combined view
        $this->load->view('admin/header');
        $this->load->view('admin/manage_skill', $data);
        $this->load->view('admin/footer');
    }

    // Add or update skill based on form submission
    public function save_skill()
    {
        // Set form validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('value', 'Value', 'required');


        // Get the skill ID (used for updating an existing skill)
        $id = $this->input->post('id');

        // If validation fails, set flash data with error messages and reload the page
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            // Reload form with validation errors and include the skill ID if editing
            redirect('admin/skill/manage_skills/' . $id);
        } else {
            // Collect form data into an associative array
            $data = array(
                'value' => $this->input->post('value'), // Make sure the case matches the input name
                'title' => $this->input->post('title'),
            );

            // If an ID is provided, update the skill; otherwise, add a new skill
            if ($id) {
                $this->Skill_model->update_skill($id, $data); // Call update method in the model
            } else {
                $this->Skill_model->add_skill($data); // Call add method in the model
            }

            // Set success message and redirect to skill listing page
            $this->session->set_flashdata('success', 'Skill saved successfully!');
            redirect('admin/skill'); // Redirect to skill list or dashboard
        }
    }


    public function update_skill($id = 1)
    {
        $this->load->library('upload');

        // Fetch the input fields
        $data = array(
            'title' => $this->input->post('title'),
            'bg_title' => $this->input->post('bg_title'),
            'description' => $this->input->post('description'),
        );


        // Call the model method to update the record
        $this->Skill_model->add_skills($data, $id);

        // Set success message and redirect
        $this->session->set_flashdata('success', 'skill section updated successfully.');
        redirect('admin/skill');
    }


    // Delete skill by ID
    public function delete_skill($id)
    {
        // Call model to delete the skill
        $this->Skill_model->delete_skill($id);

        // Set success message after deletion
        $this->session->set_flashdata('success', 'Skill deleted successfully!');

        // Redirect to the skill listing page
        redirect('admin/skill');
    }
}
?>