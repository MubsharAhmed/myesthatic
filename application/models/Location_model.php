<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Location_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getLocations($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('locations');  
        return $query->result_array();
    }

    public function get_locations() {
        return $this->db->get('locations')->result_array(); // Adjust table name if needed
    }

    public function delete_location($id) {
        $this->db->where('id', $id);
        return $this->db->delete('locations');
    }
    
    

    
    
        
}



