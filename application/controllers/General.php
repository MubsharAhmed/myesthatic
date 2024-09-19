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

        $this->loadViews("frontend/patients", $this->global, NULL);



    }

    public function addPatient(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Add Patient';

        $this->loadViews("frontend/addpatient", $this->global, NULL);

    }



    public function pReports(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Patients report';

        $this->loadViews("frontend/preport", $this->global, NULL);

    }

    public function locations(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Locations';

        $this->loadViews("frontend/locations", $this->global, NULL);

    }

    public function addLocation(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Add Location';

        $this->loadViews("frontend/addLocation", $this->global, NULL);

    }

    public function vendors(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Vendors';

        $this->loadViews("frontend/vendors", $this->global, NULL);

    }

    public function totalInventory(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Total Inventory';

        $this->loadViews("frontend/totalinventory", $this->global, NULL);

    }

    public function inventoryHistory(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Inventory History';

        $this->loadViews("frontend/inventoryhistory", $this->global, NULL);

    }
    public function addInventory(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Add Inventory';

        $this->loadViews("frontend/addinventory", $this->global, NULL);

    }

    public function financialReports(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Financial Reports';

        $this->loadViews("frontend/financialreports", $this->global, NULL);

    }

    public function financialReportDetail(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Financial Reports Detail';

        $this->loadViews("frontend/financialreportdetail", $this->global, NULL);

    }

    public function procedureReports(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Procedure report';

        $this->loadViews("frontend/procedurereports", $this->global, NULL);

    }


    public function productCost(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Product Cost';

        $this->loadViews("frontend/productcost", $this->global, NULL);

    }

    public function addProductCost(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Add Product Cost';

        $this->loadViews("frontend/addproductcost", $this->global, NULL);

    }

    public function shop(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Shop';

        $this->loadViews("frontend/shop", $this->global, NULL);

    }

    public function settings(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Settings';

        $this->loadViews("frontend/settings", $this->global, NULL);

    }

    public function support(){
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Support';

        $this->loadViews("frontend/support", $this->global, NULL);

    }
    
}
