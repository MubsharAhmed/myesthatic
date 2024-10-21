<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Location extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Location_model');
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Locations';

        $this->loadViews("frontend/locations", $this->global, NULL);
    }

    public function addLocation()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Add Location';

        $this->loadViews("frontend/addLocation", $this->global, NULL);
    }

    public function addLocations() {

        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
    
        if (empty($name) || empty($address)) {
            echo json_encode(['status' => 'error', 'message' => 'Please fill all fields.']);
            return;
        }
        $data = [
            'name' => $name,
            'address' => $address,
            'lat' => $lat,
            'lng' => $lng
        ];
    
        
        $insert = $this->db->insert('locations', $data);
    
        if ($insert) {
            echo json_encode(['status' => 'success', 'message' => 'Location added successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add location.']);
        }
    }

    public function getLocations() {

        $limit = 10;  
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $start = ($page - 1) * $limit;
    
        $total_records = $this->db->count_all('locations'); 
        
        $this->db->limit($limit, $start);
        $query = $this->db->get('locations');  
        $locations = $query->result_array();
            
        $total_pages = ceil($total_records / $limit);
    
        $response = [
            'data' => $locations,
            'total_pages' => $total_pages,
            'current_page' => $page
        ];
    
        echo json_encode($response);
    }
        
    public function get_locations() {
        $this->load->model('Location_model'); 
        $locations = $this->Location_model->get_locations(); 
        echo json_encode($locations);
    }

    public function deleteLocation() {
        $locationId = $this->input->post('id');
        if ($this->Location_model->delete_location($locationId)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
    
    
    
}
