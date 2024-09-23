<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Signup extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('form');
    }


    public function index()
    {

        $this->global['pageTitle'] = 'My Aesthatic : Signup';


        $this->load->view("users/signup", $this->global, NULL);
    }

    public function register()
    {
        // Load form validation library
        $this->load->library('form_validation');
    
        // Set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]|trim');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|trim');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]|trim');
    
        // If validation fails, reload the signup page with the errors
        if ($this->form_validation->run() == FALSE) {
            $this->index(); // Reloads the form with validation errors
        } else {
            // Gather input data
            $first_name = $this->security->xss_clean($this->input->post('first_name'));
            $last_name = $this->security->xss_clean($this->input->post('last_name'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $phone = $this->security->xss_clean($this->input->post('phone'));
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
    
            // Concatenate first and last name for the 'name' field
            $full_name = $first_name . ' ' . $last_name;
    
            // Prepare data for insertion
            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'name' => $full_name,  // Insert concatenated full name into the 'name' field
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
            );
    
            // Load your model and insert the data
            $this->load->model('login_model');
            $insert_id = $this->login_model->registerUser($data);
    
            if ($insert_id) {

                $sessionArray = array(
                    'userId' => $insert_id,  
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'name' => $full_name,
                    'email' => $email,
                    'role' => 'admin', 
                    'isLoggedIn' => TRUE
                );

                // print_r($sessionArray);
                // die;
    
                // Set session data
                $this->session->set_userdata($sessionArray);
    
                // Set success message
                $this->session->set_flashdata('success', 'You have successfully signed up and logged in!');
    
                // Redirect to dashboard or homepage
                redirect(base_url('/'));
            } else {
                // Handle error and show error message
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
                redirect(base_url('signup'));
            }
        }
    }
    
    
}
