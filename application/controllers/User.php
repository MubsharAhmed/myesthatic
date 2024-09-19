<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class User extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('user_model');
        // $this->isLoggedIn();
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'VearaLink : Dashboard';
        // $searchText = '';
        // $data['managerCount'] = $this->user_model->managerCount($searchText);
        // $data['agentCount'] = $this->user_model->agentCount($searchText);
        // $data['userCount'] = $this->user_model->userCount($searchText);

        $this->loadViews("frontend/dashboard", $this->global, NULL);
    }

    public function users()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Users';
        // $searchText = '';
        // $data['managerCount'] = $this->user_model->managerCount($searchText);
        // $data['agentCount'] = $this->user_model->agentCount($searchText);
        // $data['userCount'] = $this->user_model->userCount($searchText);

        $this->loadViews("frontend/users", $this->global, NULL);
    }


    function pageNotFound()
    {
        $this->global['pageTitle'] = 'VearaLink : 404 - Page Not Found';

        $this->loadViews("general/404", $this->global, NULL, NULL);
    }
}