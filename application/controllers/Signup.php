<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class General extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('general_model');
    }

    public function signup(){

        $this->global['pageTitle'] = 'My Esthatic : Signup';

        $this->loadViews("users/signup", $this->global, NULL);

    }
    
}
