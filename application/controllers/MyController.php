<?php
// 	/**
// 	 * Index Page for this controller.
// 	 *
// 	 * Maps to the following URL
// 	 * 		http://example.com/index.php/welcome
// 	 *	- or -
// 	 * 		http://example.com/index.php/welcome/index
// 	 *	- or -
// 	 * Since this controller is set as the default controller in
// 	 * config/routes.php, it's displayed at http://example.com/
// 	 *
// 	 * So any other public methods not prefixed with an underscore will
// 	 * map to /index.php/welcome/<method_name>
// 	 * @see https://codeigniter.com/userguide3/general/urls.html


// application/controllers/MyController.php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Mycontroller extends CI_Controller {

	public function __construct()
{
	parent::__construct();
	// Load necessary helpers and libraries
	$this->load->helper('url');
	$this->load->library('session');
	$this->load->database(); // Load the database for querying users
	$this->load->library('form_validation');
	$this->load->model('User_model'); // Load the User_model
	$this->load->model('Slider_model');
	$this->load->model('About_model');
	$this->load->model('Resume_model');
	$this->load->model('Service_model');
	$this->load->model('Skill_model');
	$this->load->model('SskillModel');
	$this->load->model('Contact_model');
	$this->load->model('Footer_model');
	$this->load->model('Navbar_model');
	$this->load->model('Links_model');




}

    //  home page

	public function index()
	{
		  // Load URL helper
		$this->load->helper('url');

		// Load the view
		$data['sliders'] = $this->Slider_model->get_sliders(); // Fetch slider from the model
		$data['abouts'] = $this->About_model->get_abouts(); // Fetch about from the model
		$data['resumes'] = $this->Resume_model->get_resumes();// Fetch resume from the model
		$data['hresumes'] = $this->Resume_model->get_hresumes();// Fetch hadding resume from the model
		$data['hservices'] = $this->Service_model->get_hservices(); 
        $data['services'] = $this->Service_model->get_services();
		$data['hskills'] = $this->Skill_model->get_hskills();
        $data['skills'] = $this->Skill_model->get_skills();
		$data['sskills'] = $this->SskillModel->get_all_sskills();
		$data['hcontacts'] = $this->Contact_model->get_hcontacts();
		$data['contacts'] = $this->Contact_model->get_contacts();
		$data['footer'] = $this->Footer_model->get_footers();
		$data['navbar'] = $this->Navbar_model->get_navbar();
		$data['links'] = $this->Links_model->get_links();


		$this->load->view('index', $data);
	}


	
// login system

public function login()
{
	// Load the login view
	$this->load->view('admin/login'); // Change the path as needed
}

public function process() 
{  
	// Set validation rules
	$this->form_validation->set_rules('user', 'Username or Email', 'required');
	$this->form_validation->set_rules('pass', 'Password', 'required');
	
	if ($this->form_validation->run() == FALSE) {
		// Validation failed
		$this->login(); // Show the login view again
	} else {
		// Get user input
		$user_input = $this->input->post('user');  
		$pass = $this->input->post('pass');

		// Query the database for the user
		$user_data = $this->User_model->get_user_by_username_or_email($user_input, $pass);
		
		if ($user_data) {  
			// Set session data
			$this->session->set_userdata(array('user' => $user_data->username , 'email' => $user_data->email));  // Or use user_data->email if needed
			redirect('admin');  // Redirect to admin page
		} else {  
			$data['error'] = 'Your Account is Invalid';  
			// Load the login view with error message
			$this->load->view('admin/login', $data);
		}
	}
}
// end login
	// admin start

	public function admin()
	{
		 if ($this->session->userdata('user')){
		  // Load URL helper
		$this->load->helper( 'url');
		$this->load->view('admin/header');

		// Load the view
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	} else {
		redirect('login');
	}
}
//   start logout
public function logout() {
	if ($this->session->userdata('user')){
	$this->session->unset_userdata('user'); // Remove user session data
	$this->session->sess_destroy(); // Destroy the session
	redirect('login'); // Redirect to login page
} else {
	redirect('login');
}
}
}





?>