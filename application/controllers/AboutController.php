<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('About_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('download');
    }

    public function about() {
        if ($this->session->userdata('user')) {
            $this->load->helper('url'); 
            $data['abouts'] = $this->About_model->get_abouts();// Fetch about from the model
            $this->load->view('admin/header');
            $this->load->view('admin/about',$data); // Pass $data to the view
            $this->load->view('admin/footer');
        } else {
            redirect('login');
        }
    }

    

        public function update_about($id = 1) {
            $this->load->library('upload');
        
            // Fetch the input fields
            $data = array(
                'title'       => $this->input->post('Atitle'),
                'bg_title'    => $this->input->post('bg_title'),
                'subtitle'    => $this->input->post('subtitle'),
                'subdigit'    => $this->input->post('subdigit'),
                'description' => $this->input->post('description'),
                'heading1'    => $this->input->post('heading1'),
                'title1'      => $this->input->post('title1'),
                'heading2'    => $this->input->post('heading2'),
                'title2'      => $this->input->post('title2'),
                'heading3'    => $this->input->post('heading3'),
                'title3'      => $this->input->post('title3'),
                'heading4'    => $this->input->post('heading4'),
                'title4'      => $this->input->post('title4'),
                'heading5'    => $this->input->post('heading5'),
                'title5'      => $this->input->post('title5'),
                'heading6'    => $this->input->post('heading6'),
                'title6'      => $this->input->post('title6')
            );
        
            // Handle image upload
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path']   = './assets/uploads/abouts/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']      = 2048; // Max size in KB
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $data['image'] = $upload_data['file_name']; // Save the uploaded image name
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/about');
                }
            } else {
                // Retain the existing image if no new image is uploaded
                $data['image'] = $this->input->post('existing_image');
            }
        
            // Handle CV upload
            if (!empty($_FILES['cv']['name'])) {
                $config['upload_path']   = './assets/uploads/abouts/cvs';
                $config['allowed_types'] = 'pdf';
                $config['max_size']      = 2048; // Max size in KB
                $this->upload->initialize($config);
                if ($this->upload->do_upload('cv')) {
                    $upload_data = $this->upload->data();
                    $data['cv'] = $upload_data['file_name']; // Save the uploaded CV name
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/about');
                }
            } else {
                // Retain the existing CV if no new CV is uploaded
                $data['cv'] = $this->input->post('existing_cv');
            }
        
            // Call the model method to update the record
            $this->About_model->add_about($data, $id);
        
            // Set success message and redirect
            $this->session->set_flashdata('success', 'About section updated successfully.');
            redirect('admin/about');
        }

        public function download_cv($filename = NULL) {
            if ($filename) {
                // Correct the file path
                $file = './assets/uploads/abouts/cvs/' . urldecode($filename);
        
                // Debug the corrected file path
                echo "Trying to download: " . $file . "<br>";
        
                if (file_exists($file)) {
                    force_download($file, NULL);
                    redirect('index');
                } else {
                    echo "File does not exist.";
                }
            } else {
                echo "Filename not provided.";
            }
        }
        
        
        
        
        


    }
