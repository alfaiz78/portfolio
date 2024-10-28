<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model'); // Load the Contact_model
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('email');

    }

    // Load the contact management page
    public function contact()
    {
        if ($this->session->userdata('user')) {
            $data['hcontacts'] = $this->Contact_model->get_hcontacts();
            $data['contacts'] = $this->Contact_model->get_contacts();

            $this->load->view('admin/header');
            $this->load->view('admin/contact', $data);
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }

    // Add a new contact entry
    public function add()
    {
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/contact'); // Adjust if necessary
        } else {
            $data = array(
                'icon' => $this->input->post('icon'),
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('description'),
            );

            // Add contact data to the database
            $this->Contact_model->add_contact($data);

            $this->session->set_flashdata('success', 'Contact added successfully!');
            redirect('admin/contact');
        }
    }

    // Manage contact (list, edit)
    public function manage_contacts($id = NULL)
    {
        $data['contacts'] = $this->Contact_model->get_contacts();

        if ($id) {
            $data['contact'] = $this->Contact_model->get_contact_by_id($id);
        } else {
            $data['contact'] = null; // Initialize it to null if no ID is passed
        }

        $this->load->view('admin/header');
        $this->load->view('admin/manage_contacts', $data);
        $this->load->view('admin/footer');
    }



    // Add or update contact based on form submission
    public function save_contact()
    {
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/contact/manage_contacts/' . $id);
        } else {
            $data = array(
                'icon' => $this->input->post('icon'),
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('description'),
            );

            if ($id) {
                $this->Contact_model->update_contact($id, $data);
            } else {
                $this->Contact_model->add_contact($data);
            }

            $this->session->set_flashdata('success', 'Contact saved successfully!');
            redirect('admin/contact');
        }
    }

    // Delete contact by ID
    public function delete_contact($id)
    {
        $this->Contact_model->delete_contact($id);
        $this->session->set_flashdata('success', 'Contact deleted successfully!');
        redirect('admin/contact');
    }

    public function update_hcontact($id)
    {
        $this->load->library('upload');

        // Set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('bg_title', 'Background Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        // Check if validation fails
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/contact'); // Adjust if necessary
        } else {
            // Fetch the input fields
            $data = array(
                'title' => $this->input->post('title'),
                'bg_title' => $this->input->post('bg_title'),
                'description' => $this->input->post('description'),
            );

            // Handle image upload
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './assets/uploads/contacts/'; // Set the upload path
                $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed file types
                $config['max_size'] = 2048; // Max size in KB
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $data['image'] = $upload_data['file_name']; // Save the uploaded image name
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/contact');
                }
            } else {
                // Retain the existing image if no new image is uploaded
                $data['image'] = $this->input->post('existing_image');
            }

            // Call the model method to update the record
            $this->Contact_model->update_hcontact($id, $data);

            // Set success message and redirect
            $this->session->set_flashdata('success', 'HContact updated successfully!');
            redirect('admin/contact');
        }
    }


    // Load email form view
    public function email_form()
    {
        $this->load->view('/');
    }
    
    public function send_email()
    {
        // Set validation rules for form inputs
        $this->form_validation->set_rules('to_email', 'Recipient Email', 'required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload form with errors
            $this->session->set_flashdata('error', validation_errors());
            redirect('/');
        } else {
            // Fetch form data
            $to_email = $this->input->post('to_email');
            // echo $to_email; die;
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
    
            // Email configuration
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_port'] = 465; // or 587 for TLS
            $config['smtp_user'] = 'as8584744@gmail.com'; // Your Gmail address
            $config['smtp_pass'] = 'wmah idzq evon xrgs'; // Use the generated App Password
            $config['smtp_crypto'] = 'ssl'; // Use 'tls' if using port 587
            $config['mailtype'] = 'html'; // or 'text'
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['validation'] = TRUE;
    
            // Initialize email library with config
            $this->email->initialize($config);
            
    
            // Set email details
            $this->email->from($to_email,);
            $this->email->to('as8584744@gmail.com');
            $this->email->subject($subject);
            $this->email->message($message);
    
            // Send email and handle response
            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Email sent successfully!');
            } else {
                // $this->session->set_flashdata('error', 'Email sending failed: ' . $this->email->print_debugger());
                $this->session->set_flashdata('error', 'Email sending failed');
            }
    
            // Redirect to the form again
            redirect('/');
        }
    }
    
}






?>