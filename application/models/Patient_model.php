<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Patient_model extends CI_Model
{

    public function insert_patient($data)
    {
        return $this->db->insert('patients', $data);
    }

    // public function get_patients_with_pagination($limit, $offset, $filter = 'all', $calendarDate = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from('patients');

    //     // Apply filters
    //     if ($filter === 'today') {
    //         $this->db->where('DATE(created_at)', date('Y-m-d'));
    //     } elseif ($filter === 'this_week') {
    //         $this->db->where('WEEK(created_at)', date('W'));
    //     } elseif ($filter === 'last_week') {
    //         $this->db->where('WEEK(created_at)', date('W') - 1);
    //     } elseif ($filter === 'this_month') {
    //         $this->db->where('MONTH(created_at)', date('m'));
    //     } elseif ($filter === 'last_month') {
    //         $this->db->where('MONTH(created_at)', date('m', strtotime('-1 month')));
    //     } elseif ($filter === 'calendar' && $calendarDate) {
    //         $this->db->where('DATE(created_at)', $calendarDate);
    //     }

    //     // Pagination
    //     $this->db->limit($limit, $offset);

    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    public function get_patients_with_pagination($limit, $offset, $filter = 'all', $fromDate = null, $toDate = null)
    {
        $this->db->select('*');
        $this->db->from('patients');

        // Apply filters
        if ($filter === 'today') {
            $this->db->where('DATE(created_at)', date('Y-m-d'));
        } elseif ($filter === 'this_week') {
            $this->db->where('WEEK(created_at)', date('W'));
        } elseif ($filter === 'last_week') {
            $this->db->where('WEEK(created_at)', date('W') - 1);
        } elseif ($filter === 'this_month') {
            $this->db->where('MONTH(created_at)', date('m'));
        } elseif ($filter === 'last_month') {
            $this->db->where('MONTH(created_at)', date('m', strtotime('-1 month')));
        } elseif ($filter === 'calendar' && $fromDate && $toDate) {
            $this->db->where('DATE(created_at) >=', $fromDate);
            $this->db->where('DATE(created_at) <=', $toDate);
        }

        // Pagination
        $this->db->limit($limit, $offset);

        $query = $this->db->get();
        return $query->result_array();
    }

    // Function to get total number of patients (for pagination)
    // public function get_total_patients($filter = 'all', $calendarDate = null)
    // {
    //     $this->db->from('patients');

    //     // Apply filters
    //     if ($filter === 'today') {
    //         $this->db->where('DATE(created_at)', date('Y-m-d'));
    //     } elseif ($filter === 'this_week') {
    //         $this->db->where('WEEK(created_at)', date('W'));
    //     } elseif ($filter === 'last_week') {
    //         $this->db->where('WEEK(created_at)', date('W') - 1);
    //     } elseif ($filter === 'this_month') {
    //         $this->db->where('MONTH(created_at)', date('m'));
    //     } elseif ($filter === 'last_month') {
    //         $this->db->where('MONTH(created_at)', date('m', strtotime('-1 month')));
    //     } elseif ($filter === 'calendar' && $calendarDate) {
    //         $this->db->where('DATE(created_at)', $calendarDate);
    //     }

    //     return $this->db->count_all_results();
    // }

    public function get_total_patients($filter = 'all', $fromDate = null, $toDate = null)
{
    $this->db->from('patients');

    // Apply filters
    if ($filter === 'today') {
        $this->db->where('DATE(created_at)', date('Y-m-d'));
    } elseif ($filter === 'this_week') {
        $this->db->where('WEEK(created_at)', date('W'));
    } elseif ($filter === 'last_week') {
        $this->db->where('WEEK(created_at)', date('W') - 1);
    } elseif ($filter === 'this_month') {
        $this->db->where('MONTH(created_at)', date('m'));
    } elseif ($filter === 'last_month') {
        $this->db->where('MONTH(created_at)', date('m', strtotime('-1 month')));
    } elseif ($filter === 'calendar' && $fromDate && $toDate) {
        $this->db->where('DATE(created_at) >=', $fromDate);
        $this->db->where('DATE(created_at) <=', $toDate);
    }

    return $this->db->count_all_results();
}

    public function get_users_count()
    {
        return $this->db->count_all('patients');
    }

    public function get_unique_dates()
    {
        $this->db->select('DISTINCT(DATE(created_at)) as date'); // Get unique dates
        $query = $this->db->get('patients');
        return $query->result_array();
    }
}
