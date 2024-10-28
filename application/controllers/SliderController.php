

 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SliderController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function slider(){
    if ($this->session->userdata('user')) {
        // Load URL helper
        $this->load->helper('url');

        // Fetch sliders from the model
        $data['sliders'] = $this->Slider_model->get_sliders();

        // Load the views with the data
        $this->load->view('admin/header');
        $this->load->view('admin/slider', $data); // Pass $data to the view
        $this->load->view('admin/footer');
    } else {
        redirect('login');
    }
}

    public function add()   // public function add()
    {
        // Set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('subtitle', 'Subtitle', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('image', 'Image', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
			$this->session->set_flashdata('error', validation_errors());
            $this->admin/resume(); // Show the form again with errors
        } else {
            // Get user input
            $data = array(
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle'),
                'description' => $this->input->post('description'),
                'image' => $this->input->post('image') // You may want to handle image uploads here
            );

            // Add resume data to the database
            $this->Slider_model->add_slider($data);
            $this->session->set_flashdata('success', 'Slider added successfully!');
            redirect('admin/slider'); // Redirect to the slider list
        }
    }


    // Combined view for listing, adding, and editing sliders
    public function manage_sliders($id = NULL)
    {
        // Fetch all sliders for listing
        $data['sliders'] = $this->Slider_model->get_sliders();

        // If ID is passed, load the specific slider for editing
        if ($id) {
            $data['slider'] = $this->Slider_model->get_slider_by_id($id);
        }

        // Load the combined view
        $this->load->view('admin/header');
        $this->load->view('admin/manage_sliders', $data);
        
        $this->load->view('admin/footer');
    }

    // Add or update slider based on form submission
    public function save_slider() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('subtitle', 'Subtitle', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
    
        $id = $this->input->post('id'); // Slider ID for update (optional)
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Some wroung your Data');
            $this->manage_sliders($id); // Reload the page with validation errors
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle'),
                'description' => $this->input->post('description'),
                'image' => $this->upload_image() // Handle image upload
            );
    
            if ($id) {
                $this->Slider_model->update_slider($id, $data); // Call to update_slider
            } else {
                $this->Slider_model->add_slider($data);
            }
            $this->session->set_flashdata('success', 'Slider added successfully!');
    
            redirect('admin/slider'); // Redirect to the list after saving
        }
    }


    public function update_slider($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('sliders', $data); // 'sliders' is your table name
        $this->session->set_flashdata('success', 'Slider Update successfully!');
    }
    
    // Delete slider
    public function delete_slider($id)
    {
        $this->Slider_model->delete_slider($id);
        $this->session->set_flashdata('success', 'Delete added successfully!');
        redirect('admin/slider'); // Redirect to the list after deletion
        
    }

    // Image upload helper
    private function upload_image()
    {
        $config['upload_path'] = 'assets/uploads/sliders/'; // Corrected directory path
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // Maximum file size in KB
    
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('image')) {
            // Set flash data error message
            $this->session->set_flashdata('error', 'Change image format or upload a valid image.');
            redirect('admin/slider'); // Redirect to the slider page
            return; // Ensure the function exits after redirection
        } else {
            $data = $this->upload->data();
            return $data['file_name']; // Return the uploaded file name
        }
    }
    
    
} 