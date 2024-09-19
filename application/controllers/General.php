<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class General extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('general_model');
    }

    public function patients(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Patients';

        $this->loadViews("frontend/patietns", $this->global, NULL);



    }

    public function addPatient(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Add Patients';

        $this->loadViews("frontend/addpatient", $this->global, NULL);

    }

    public function procedureReports(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Procedure reports';

        $this->loadViews("frontend/procedurereports", $this->global, NULL);

    }

    public function pReports(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Procedure reports';

        $this->loadViews("frontend/preport", $this->global, NULL);

    }


}
