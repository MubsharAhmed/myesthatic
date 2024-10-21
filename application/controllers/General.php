<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class General extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('general_model');
    }

    public function patients()
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



    public function pReports()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Patients report';

        $this->loadViews("frontend/preport", $this->global, NULL);
    }



    public function vendors()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Vendors';

        $this->loadViews("frontend/vendors", $this->global, NULL);
    }



    public function financialReports()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Financial Reports';

        $this->loadViews("frontend/financialreports", $this->global, NULL);
    }

    public function financialReportDetail()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Financial Reports Detail';

        $this->loadViews("frontend/financialreportdetail", $this->global, NULL);
    }

    public function procedureReports()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Procedure report';

        $this->loadViews("frontend/procedurereports", $this->global, NULL);
    }




    public function shop()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Shop';

        $this->loadViews("frontend/shop", $this->global, NULL);
    }

    public function settings()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }

        $userId = $this->session->userdata('userId');

        $this->load->model('user_model');

        $userData = $this->user_model->getUserById($userId);

        if (!empty($userData)) {
        
            $data['user'] = $userData;
        } else {
            $data['user'] = null;
        }

        $this->global['pageTitle'] = 'My Esthatic : Settings';

        // Load the settings view with user data
        $this->loadViews("frontend/settings", $this->global, $data);
    }


    public function support()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Support';

        $this->loadViews("frontend/support", $this->global, NULL);
    }



    public function uploadProfileImage()
    {
        if ($_FILES['image']['name']) {
            $config['upload_path'] = './uploads/profile_images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $imageFileName = $uploadData['file_name'];
                $imageFullPath = base_url('uploads/profile_images/' . $imageFileName); 
    
                // Update image path (full URL) in the database
                $userId = $this->session->userdata('userId');
                $this->db->set('image', $imageFullPath); 
                $this->db->where('id', $userId);
                $this->db->update('admin');  
    
                $response = array('status' => 'success', 'image_url' => $imageFullPath);
            } else {
                // Return error message in response if file upload fails
                $response = array('status' => 'error', 'message' => $this->upload->display_errors());
            }
    
            echo json_encode($response);
        }
    }

    public function updateUserProfile() {
        $userId = $this->session->userdata('userId');

        $data = array(
            'name' => $this->input->post('firstName') . ' ' . $this->input->post('lastName'),
            'first_name' => $this->input->post('firstName'),
            'last_name' => $this->input->post('lastName'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'vat' => $this->input->post('vat'),
            'dob' => $this->input->post('dob'),
            'country' => $this->input->post('country'),
            'city' => $this->input->post('city')
        );
        
        // Update the user's data in the database
        $this->db->where('id', $userId);
        $this->db->update('admin', $data);
    
        // Return response to frontend
        echo json_encode(['status' => 'success']);
    }
    
    
}
