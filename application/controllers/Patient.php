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
            $name = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $dob = $this->input->post('dob');
            $location = $this->input->post('location');
            // $password = $this->input->post('password');

            // Insert data into the database (adjust the model to handle this)
            $insert_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'dob' => $dob,
                'location' => $location,
                // 'password' => password_hash($password, PASSWORD_BCRYPT) // Hash the password
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


    public function fetch_patients()
    {
        $limit = 8; 
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $offset = ($page - 1) * $limit;

        $filter = $this->input->post('filter') ? $this->input->post('filter') : 'all';
        $fromDate = $this->input->post('fromDate') ? $this->input->post('fromDate') : null;
        $toDate = $this->input->post('toDate') ? $this->input->post('toDate') : null;

        // Fetch patients with pagination and filters
        $patients = $this->Patient_model->get_patients_with_pagination($limit, $offset, $filter, $fromDate, $toDate);

        // Get total count of patients for pagination
        $total_patients = $this->Patient_model->get_total_patients($filter, $fromDate, $toDate);

        // Calculate total pages
        $total_pages = ceil($total_patients / $limit);

        // Prepare the response
        $response = array(
            'patients' => $patients,
            'pagination' => array(
                'total_pages' => $total_pages,
                'current_page' => $page
            )
        );

        // Return the response as JSON
        echo json_encode($response);
    }

    public function get_unique_dates()
    {
        $this->load->model('Patient_model');
        $dates = $this->Patient_model->get_unique_dates();

        echo json_encode(['dates' => $dates]);
    }


    public function upload_csv()
    {

        if (!empty($_FILES['csv']['name'])) {
            $file = $_FILES['csv']['tmp_name'];

            // Load the CSV file
            if (($handle = fopen($file, 'r')) !== FALSE) {
                $header = fgetcsv($handle); // Get the header row
                $data = [];

                while (($row = fgetcsv($handle)) !== FALSE) {
                    $data[] = array_combine($header, $row);
                }
                fclose($handle);

                // Loop through the data and insert into the database
                foreach ($data as $patient) {
                    $this->db->insert('patients', [
                        'name' => $patient['name'],
                        // 'first_name' => $patient['first_name'],
                        // 'last_name' => $patient['last_name'],
                        'email' => $patient['email'],
                        'phone' => $patient['phone'],
                        'dob' => $patient['dob'],
                        'location' => $patient['location'],
                        // 'password' => password_hash($patient['password'], PASSWORD_DEFAULT)
                    ]);
                }

                // Success response
                echo json_encode(['success' => true, 'message' => 'Patients added successfully!']);
                return;
            } else {
                // Error opening the file
                echo json_encode(['success' => false, 'message' => 'Failed to open the CSV file.']);
                return;
            }
        }

        // Return an error if no file was uploaded
        echo json_encode(['success' => false, 'message' => 'No CSV file uploaded.']);
    }



    private function paginate($total_users, $limit, $page)
    {
        $total_pages = ceil($total_users / $limit);
        return [
            'current_page' => $page,
            'total_pages' => $total_pages
        ];
    }
}
