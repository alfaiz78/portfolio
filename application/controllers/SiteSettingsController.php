<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteSettingsController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Footer_model');
        $this->load->model('Navbar_model');
        $this->load->model('Links_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    // Load site settings page
    public function index() {
        if ($this->session->userdata('user')) {
            $data['footer'] = $this->Footer_model->get_footers();
            $data['navbar'] = $this->Navbar_model->get_navbar();
            $data['links'] = $this->Links_model->get_links();

            $this->load->view('admin/header');
            $this->load->view('admin/site_settings', $data);
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }
    
 // Update Footer

 public function footerSettings() {
    // Load the footer model
    $this->load->model('Footer_model');

    // Fetch the footer data from the model
    $data['footer'] = $this->Footer_model->get_footers();

    // Load the view and pass the footer data
    $this->load->view('admin/site-settings', $data);
}

public function update_footer($id) {
    // Load the model
    $this->load->model('Footer_model');

    // Collect form data
    $footer_data = array(
        'title' => $this->input->post('title'),
        'subtitle' => $this->input->post('subtitle')
    );

    // Update footer in database
    if ($this->Footer_model->update_footer($id, $footer_data)) {
        // Redirect or show a success message
        $this->session->set_flashdata('fsuccess', 'Footer updated successfully!');
    } else {
        $this->session->set_flashdata('ferror', 'Failed to update footer.');
    }
    
    redirect('admin/site-settings');
}




    // ---------------- Navbar CRUD ---------------- //
    // Add Navbar Item  
       // Edit a navbar item
         // Add Navbar Item
    public function add() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        if ($this->form_validation->run() === TRUE) {
            $data = array(
                'title' => $this->input->post('title'),
                'link' => $this->input->post('link')
            );
            $this->Navbar_model->add_navbar_item($data);
            $this->session->set_flashdata('nsuccess', 'Navbar item added successfully.');
            redirect('admin/site-settings'); // Redirect to navbar management page
        } else {
                $this->session->set_flashdata('nerror', validation_errors());
            redirect('admin/site-settings'); // Redirect back to navbar management page
        }
    }
       public function edit($id) {
        $data['navbar_item'] = $this->db->get_where('navbars', array('id' => $id))->row(); // Use 'navbars' table
        $data['navbar'] = $this->db->get('navbars')->result(); // Use 'navbars' table
        $this->load->view('admin/header');
        $this->load->view('admin/site_settings', $data);
        $this->load->view('admin/footer');
    }

    // Update a navbar item
    public function update($id) {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['navbar_item'] = $this->db->get_where('navbars', array('id' => $id))->row(); // Use 'navbars' table
            $this->load->view('admin/site-settings', $data);
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'link' => $this->input->post('link'),
            );
            $this->db->where('id', $id);
            $this->db->update('navbars', $data); // Use 'navbars' table
            $data['nav'] = $this->session->set_flashdata('nsuccess', 'Navbar item updated successfully.');
            redirect('admin/site-settings');
        }
    }

    // Delete a navbar item
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('navbars'); // Use 'navbars' table
        $data['nav'] =  $this->session->set_flashdata('nsuccess', 'Navbar item deleted successfully.');
        redirect('admin/site-settings');
    }


    // ---------------- Links CRUD ---------------- //

   // Add Link
public function add_link() {
    $this->form_validation->set_rules('icon', 'Icon', 'required');
    $this->form_validation->set_rules('link', 'Link', 'required|valid_url');

    if ($this->form_validation->run()) {
        $data = array(
            'icon' => $this->input->post('icon'),
            'link' => $this->input->post('link')
        );
        $this->Links_model->add_link($data);
        $nav = $this->session->set_flashdata('success', 'Link added successfully.');
    } else {
        $nav = $this->session->set_flashdata('error', validation_errors());
    }

    redirect('admin/site-settings');
}

// Update Link
public function edit_link($id) {
    // Get link data by id
    $data['link_item'] = $this->Links_model->get_link($id); // Assuming get_link is defined in Links_model to fetch a single link
    $data['links'] = $this->Links_model->get_links(); // Fetch all links to list on the same page

    $this->load->view('admin/header');
    $this->load->view('admin/site_settings', $data); // Passing data for single link edit
    $this->load->view('admin/footer');
}

public function update_link($id) {
    $this->form_validation->set_rules('icon', 'Icon', 'required');
    $this->form_validation->set_rules('link', 'Link', 'required|valid_url');

    if ($this->form_validation->run()) {
        $data = array(
            'icon' => $this->input->post('icon'),
            'link' => $this->input->post('link')
        );
        $this->Links_model->update_link($data, $id);
        $this->session->set_flashdata('success', 'Link updated successfully.');
    } else {
        $this->session->set_flashdata('error', validation_errors());
    }

    redirect('admin/site-settings');
}


// Delete Link
public function delete_link($id) {
    if ($this->Links_model->delete_link($id)) {
        $this->session->set_flashdata('success', 'Link deleted successfully.');
    } else {
        $this->session->set_flashdata('error', 'Failed to delete the link.');
    }
    redirect('admin/site-settings');
}

}
?>
