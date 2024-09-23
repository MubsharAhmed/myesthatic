<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Patient_model extends CI_Model
{

    public function insert_patient($data)
    {
        return $this->db->insert('patients', $data);
    }

    public function get_users_with_pagination($limit, $offset)
    {

        $this->db->select('patients.*, locations.name as location_name');
        $this->db->from('patients');
        $this->db->join('locations', 'locations.id = patients.location', 'left');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_users_count()
    {
        return $this->db->count_all('patients');
    }
}
