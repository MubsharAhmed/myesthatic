<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Patient extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('general_model');
        $this->load->model('Patient_model');
    }


    public function index()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Patients';

        $this->loadViews("frontend/patients", $this->global, NULL);
    }

    public function addPatient()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Add Patient';

        $this->loadViews("frontend/addpatient", $this->global, NULL);
    }

    public function add_patient()
    {
        try {
            // Load model
            $this->load->model('Patient_model');

            // Get form data
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $dob = $this->input->post('dob');
            $location = $this->input->post('location');
            $password = $this->input->post('password');

            // Insert data into the database (adjust the model to handle this)
            $insert_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone,
                'dob' => $dob,
                'location' => $location,
                'password' => password_hash($password, PASSWORD_BCRYPT) // Hash the password
            );

            $inserted = $this->Patient_model->insert_patient($insert_data);

            if ($inserted) {
                echo json_encode(['success' => true, 'message' => 'Patient added successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to add patient']);
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Internal Server Error']);
        }
    }
    
    public function fetch_patients() {
        $limit = 10;  
        $page = $this->input->post('page');
        if (!$page) {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;  

        $this->load->model('Patient_model');

        $users = $this->Patient_model->get_users_with_pagination($limit, $offset);
        // print_r($users);
        // die;

        // Fetch total users count for pagination
        $total_users = $this->Patient_model->get_users_count();

        // Prepare data for the response
        $response = [
            'users' => $users,
            'pagination' => $this->paginate($total_users, $limit, $page)
        ];

        echo json_encode($response);
}


private function paginate($total_users, $limit, $page) {
    $total_pages = ceil($total_users / $limit);
    return [
        'current_page' => $page,
        'total_pages' => $total_pages
    ];
}
}
