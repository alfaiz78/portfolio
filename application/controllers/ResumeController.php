<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResumeController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Resume_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Load the resume management page
    public function resume()
    {
        if ($this->session->userdata('user')) {
            $data['hresumes'] = $this->Resume_model->get_hresumes(); 
            $data['resumes'] = $this->Resume_model->get_resumes();
            //  // Fetch resumes
            $this->load->view('admin/header');
            $this->load->view('admin/resume', $data,  );
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }

    // Add a new resume entry
    public function add()
    {
        // Set validation rules
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('work', 'Work', 'required');
        $this->form_validation->set_rules('university_name', 'University Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
    
        // Check if the validation fails
        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->session->set_flashdata('error', validation_errors());
            
            // Load the view to show the form again with validation errors
            $this->manage_resumes(); // You may need to adjust this based on how your view is set up
        } else {
            // Get user input
            $data = array(
                'year' => $this->input->post('year'), // Make sure the case matches the input name
                'work' => $this->input->post('work'),
                'u_name' => $this->input->post('university_name'), // Consistent naming
                'description' => $this->input->post('description'),
            );
    
            // Add resume data to the database
            $this->Resume_model->add_resume($data);
    
            // Set a success message
            $this->session->set_flashdata('success', 'Resume added successfully!');
            
            // Redirect to the resume list
            redirect('admin/resume');
        }
    }
   

    // Manage resumes (list, edit)
    public function manage_resumes($id = NULL)
    {
        // Fetch all resumes for listing
        $data['resumes'] = $this->Resume_model->get_resumes();
    
        // If ID is passed, load the specific resume for editing
        if ($id) {
            $data['resume'] = $this->Resume_model->get_resume_by_id($id);
        } else {
            $data['resume'] = null; // Initialize it to null if no ID is passed
        }
    
        // Load the combined view
        $this->load->view('admin/header');
        $this->load->view('admin/manage_resumes', $data);
        $this->load->view('admin/footer');
    }

    // Add or update resume based on form submission
    public function save_resume()
    {
        // Set form validation rules
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('work', 'Work', 'required');
        $this->form_validation->set_rules('university_name', 'University Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
    
        // Get the resume ID (used for updating an existing resume)
        $id = $this->input->post('id'); 
    
        // If validation fails, set flash data with error messages and reload the page
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/resume/manage_resumes/' . $id); // Reload form with validation errors
        } else {
            // Collect form data into an associative array
            $data = array(
                'year' => $this->input->post('year'), // Field name 'year'
                'work' => $this->input->post('work'), // Field name 'work'
                'u_name' => $this->input->post('university_name'),
                'description' => $this->input->post('description'),
            );
    
            // If an ID is provided, update the resume; otherwise, add a new resume
            if ($id) {
                $this->Resume_model->update_resume($id, $data); // Call update method in the model
            } else {
                $this->Resume_model->add_resume($data); // Call add method in the model
            }
    
            // Set success message and redirect to resume listing page
            $this->session->set_flashdata('success', 'Resume saved successfully!');
            redirect('admin/resume'); // Redirect to resume list or dashboard
        }
    }
    
    // Delete resume
    public function delete_resume($id)
    {
        $this->Resume_model->delete_resume($id);
        $this->session->set_flashdata('success', 'Resume deleted successfully!');
        redirect('admin/resume'); // Redirect to the list after deletion
    }



public function update_resume($id = 1) {
    $this->load->library('upload');

    // Fetch the input fields
    $data = array(
        'title'       => $this->input->post('title'),
        'bg_title'    => $this->input->post('bg_title'),
        'description' => $this->input->post('description'),
    );


    // Call the model method to update the record
    $this->Resume_model->add_resumes($data, $id);

    // Set success message and redirect
    $this->session->set_flashdata('success', 'resume section updated successfully.');
    redirect('admin/resume');
}
}
?>
