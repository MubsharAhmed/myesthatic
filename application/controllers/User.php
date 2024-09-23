<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class User extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('form');
        // $this->isLoggedIn();
        if (!$this->isAdmin()) {
            redirect('login');
        }
    }

    public function index()
    {

        $this->global['pageTitle'] = 'VearaLink : Dashboard';
        $this->loadViews("frontend/dashboard", $this->global, NULL);
    }

    public function users()
    {

        $this->global['pageTitle'] = 'My Esthatic : Users';
        $this->loadViews("frontend/users", $this->global, NULL);
    }

    public function addUser()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Add User';
        $this->loadViews("frontend/adduser", $this->global, NULL);
    }


    function pageNotFound()
    {
        $this->global['pageTitle'] = 'My Esthatic : 404 - Page Not Found';

        $this->loadViews("general/404", $this->global, NULL, NULL);
    }


    public function add()
    {
        if ($this->input->post()) {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'dob' => $this->input->post('dob'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'location' => $this->input->post('location'),
                'license_no' => $this->input->post('license_number'),
                'created_at' => date('Y-m-d H:i:s')
            );

            $config['upload_path'] = './uploads/users_profile/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $data['image'] = base_url('uploads/users_profile/' . $upload_data['file_name']);
            } else {
                $data['image'] = null;
            }


            $this->load->model('User_model');
            if ($this->User_model->insert($data)) {
                echo json_encode(['success' => true, 'message' => 'User added successfully!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to add user.']);
            }
        }
    }


    public function fetch_users() {
            $limit = 10;  
            $page = $this->input->post('page');
            if (!$page) {
                $page = 1;
            }
            $offset = ($page - 1) * $limit;  

            $this->load->model('User_model');

            $users = $this->User_model->get_users_with_pagination($limit, $offset);
            // print_r($users);
            // die;
    
            // Fetch total users count for pagination
            $total_users = $this->User_model->get_users_count();
    
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
