<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Service_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Load the service management page
    public function service()
    {
        if ($this->session->userdata('user')) {
            $data['hservices'] = $this->Service_model->get_hservices(); 
            $data['services'] = $this->Service_model->get_services();
            //  // Fetch services
            $this->load->view('admin/header');
            $this->load->view('admin/service',$data,);
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }

    // Add a new service entry
    public function add()
    {
        // Set validation rules
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
    
        // Check if the validation fails
        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->session->set_flashdata('error', validation_errors());
            
            // Load the view to show the form again with validation errors
            $this->manage_services(); // You may need to adjust this based on how your view is set up
        } else {
            // Get user input
            $data = array(
                'icon' => $this->input->post('icon'), // Make sure the case matches the input name
                'title' => $this->input->post('title'),
                
                'description' => $this->input->post('description'),
            );
    
            // Add service data to the database
            $this->Service_model->add_service($data);
    
            // Set a success message
            $this->session->set_flashdata('success', 'Service added successfully!');
            
            // Redirect to the service list
            redirect('admin/service');
        }
    }
   

    // Manage service (list, edit)
    public function manage_services($id = NULL)
    {
        // Fetch all services for listing
        $data['services'] = $this->Service_model->get_services();
    
        // If ID is passed, load the specific service for editing
        if ($id) {
            $data['service'] = $this->Service_model->get_service_by_id($id);
        } else {
            $data['service'] = null; // Initialize it to null if no ID is passed
        }
    
        // Load the combined view
        $this->load->view('admin/header');
        $this->load->view('admin/manage_service', $data);
        $this->load->view('admin/footer');
    }

// Add or update service based on form submission
public function save_service()
{
    // Set form validation rules
    $this->form_validation->set_rules('icon', 'Icon', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');

    // Get the service ID (used for updating an existing service)
    $id = $this->input->post('id');

    // If validation fails, set flash data with error messages and reload the page
    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        // Reload form with validation errors and include the service ID if editing
        redirect('admin/service/manage_services/' . $id);
    } else {
        // Collect form data into an associative array
        $data = array(
            'icon' => $this->input->post('icon'), 
            'title' => $this->input->post('title'), 
            'description' => $this->input->post('description'),
        );

        // If an ID is provided, update the service; otherwise, add a new service
        if ($id) {
            $this->Service_model->update_service($id, $data); // Call update method in the model
        } else {
            $this->Service_model->add_service($data); // Call add method in the model
        }

        // Set success message and redirect to service listing page
        $this->session->set_flashdata('success', 'Service saved successfully!');
        redirect('admin/service'); // Redirect to service list or dashboard
    }
}


public function update_service($id = 1) {
    $this->load->library('upload');

    // Fetch the input fields
    $data = array(
        'title'       => $this->input->post('title'),
        'bg_title'    => $this->input->post('bg_title'),
        'description' => $this->input->post('description'),
    );


    // Call the model method to update the record
    $this->Service_model->add_services($data, $id);

    // Set success message and redirect
    $this->session->set_flashdata('success', 'service section updated successfully.');
    redirect('admin/service');
}


// Delete service by ID
public function delete_service($id)
{
    // Call model to delete the service
    $this->Service_model->delete_service($id);
    
    // Set success message after deletion
    $this->session->set_flashdata('success', 'Service deleted successfully!');
    
    // Redirect to the service listing page
    redirect('admin/service');
}
}
?>
