<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function getUserById($userId)
    {
        $this->db->where('id', $userId);
        $query = $this->db->get('admin');
        return $query->row();
    }

    // public function insert($data)
    // {
    //     return $this->db->insert('user', $data);
    // }
    public function insert($data)
    {
        if ($this->db->insert('user', $data)) {
            return true;
        } else {
            log_message('error', 'Database insert error: ' . $this->db->last_query() . ' Error: ' . json_encode($this->db->error()));
            return false;
        }
    }
    // public function insert($data)
    // {
    //     return $this->db->insert('user', $data); // Assuming your table is named 'users'
    // }

    public function get_users_with_pagination($limit, $offset, $filter, $startDate, $endDate)
    {
        $this->db->select('user.*, locations.name as location_name');
        $this->db->from('user');
        $this->db->join('locations', 'locations.id = user.location', 'left');

        if ($filter !== 'all') {
            if ($filter === 'today') {
                $this->db->where('DATE(user.created_at)', date('Y-m-d'));
            } elseif ($filter === 'this_week') {
                $this->db->where('YEARWEEK(user.created_at, 1) = YEARWEEK(CURDATE(), 1)');
            } elseif ($filter === 'last_week') {
                $this->db->where('YEARWEEK(user.created_at, 1) = YEARWEEK(CURDATE() - INTERVAL 1 WEEK, 1)');
            } elseif ($filter === 'this_month') {
                $this->db->where('MONTH(user.created_at)', date('m'));
                $this->db->where('YEAR(user.created_at)', date('Y'));
            } elseif ($filter === 'last_month') {
                $this->db->where('MONTH(user.created_at)', date('m', strtotime('-1 month')));
                $this->db->where('YEAR(user.created_at)', date('Y'));
            }
        }

        if (!empty($startDate) && !empty($endDate)) {
            $this->db->where('DATE(user.created_at) >=', date('Y-m-d', strtotime($startDate)));
            $this->db->where('DATE(user.created_at) <=', date('Y-m-d', strtotime($endDate)));
        } elseif (!empty($startDate)) {
            $this->db->where('DATE(user.created_at)', date('Y-m-d', strtotime($startDate)));
        }


        // Limit and offset for pagination
        $this->db->limit($limit, $offset);

        $query = $this->db->get();
        log_message('debug', $this->db->last_query()); // Log the last executed query for debugging
        return $query->result_array();
    }

    public function update_user_status($user_id, $status)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('user', ['status' => $status]);
    }





    public function get_users_count()
    {
        return $this->db->count_all('user');
    }

    public function getAllUsers()
    {
        $query = $this->db->get('user');
        return $query->result();
    }


    //////////api functions
    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user'); // Assuming your table name is 'users'
        return $query->row(); // Return a single row
    }

    public function isValidToken($userId, $token)
    {

        $this->db->where('id', $userId);
        $this->db->where('token', $token);
        $query = $this->db->get('user'); 

        return $query->num_rows() > 0; 
    }

    public function updatePassword($user_id, $hashed_password)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('user', ['password' => $hashed_password]);
    }

    public function getUserData($user_id)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get('user');
        return $query->row_array(); // Return as an associative array
    }

    public function getUserByEmail($email)
    {
        $query = $this->db->get_where('user', ['email' => $email]);
        return $query->row();
    }


    public function deleteToken($token)
    {
        $this->db->where('token', $token);
        return $this->db->delete('password_resets');
    }

    // function userCount($searchText, $userType = 'user')
    // {
    //     $this->db->select('*');
    //     $this->db->from('users');
    //     if(!empty($searchText)) {
    //         $likeCriteria = "(email  LIKE '%".$searchText."%'
    //                         OR  name  LIKE '%".$searchText."%')";
    //         $this->db->where($likeCriteria);
    //     }
    //     $this->db->where('role', $userType);
    //     $query = $this->db->get();

    //     return $query->num_rows();
    // }

    // function users($searchText, $page, $segment, $userType = 'user')
    // {
    //     $this->db->select('*');
    //     $this->db->from('users');
    //     if(!empty($searchText)) {
    //         $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
    //                         OR  BaseTbl.name  LIKE '%".$searchText."%')";
    //         $this->db->where($likeCriteria);
    //     }
    //     $this->db->where('role', $userType);
    //     $this->db->order_by('id', 'DESC');
    //     $this->db->limit($page, $segment);
    //     $query = $this->db->get();

    //     $result = $query->result();        
    //     return $result;
    // }

    // function addNewUser($userInfo)
    // {
    //     $this->db->trans_start();
    //     $this->db->insert('users', $userInfo);

    //     $insert_id = $this->db->insert_id();

    //     $this->db->trans_complete();

    //     return $insert_id;
    // }

    // function managerCount($searchText, $userType = 'manager')
    // {
    //     $this->db->select('*');
    //     $this->db->from('users');
    //     if(!empty($searchText)) {
    //         $likeCriteria = "(email  LIKE '%".$searchText."%'
    //                         OR  name  LIKE '%".$searchText."%')";
    //         $this->db->where($likeCriteria);
    //     }
    //     $this->db->where('role', $userType);
    //     $query = $this->db->get();

    //     return $query->num_rows();
    // }

    // function managers($searchText, $page, $segment, $userType = 'manager')
    // {
    //     $this->db->select('BaseTbl.*');
    //     $this->db->from('users as BaseTbl');
    //     // $this->db->join('easycompanies as company','company.user_id = BaseTbl.id');
    //     if(!empty($searchText)) {
    //         $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
    //                         OR  BaseTbl.name  LIKE '%".$searchText."%')";
    //         $this->db->where($likeCriteria);
    //     }
    //     $this->db->where('BaseTbl.role', $userType);
    //     $this->db->order_by('BaseTbl.id', 'DESC');
    //     $this->db->limit($page, $segment);
    //     $query = $this->db->get();

    //     $result = $query->result();
    //     return $result;
    // }

    // function allManagers($userType = 'manager')
    // {
    //     $this->db->select('BaseTbl.*');
    //     $this->db->from('users as BaseTbl');

    //     $this->db->where('BaseTbl.role', $userType);
    //     $this->db->order_by('BaseTbl.id', 'DESC');
    //     $query = $this->db->get();

    //     $result = $query->result();
    //     return $result;
    // }

    // function allAgents($userType = 'agent')
    // {
    //     $this->db->select('BaseTbl.*');
    //     $this->db->from('users as BaseTbl');

    //     $this->db->where('BaseTbl.role', $userType);
    //     $this->db->order_by('BaseTbl.id', 'DESC');
    //     $query = $this->db->get();

    //     $result = $query->result();
    //     return $result;
    // }

    // function getAllBets()
    // {
    //     $this->db->select('BaseTbl.*, users.username');
    //     $this->db->from('bets as BaseTbl');
    //     $this->db->join('users','users.id = BaseTbl.userId');
    //     $query = $this->db->get();

    //     return $query->result();
    // }

    // function usernameExists($username)
    // {
    //     $this->db->select('*');
    //     $this->db->from('users');
    //     $this->db->where('username', $username);
    //     $this->db->where('role', 'user');
    //     $query = $this->db->get();

    //     return $query->num_rows();
    // }

    // function addNewManager($userInfo)
    // {
    //     $this->db->trans_start();
    //     $this->db->insert('users', $userInfo);

    //     $insert_id = $this->db->insert_id();

    //     $this->db->trans_complete();

    //     return $insert_id;
    // }

    // function agentCount($searchText, $userType = 'agent')
    // {
    //     $this->db->select('*');
    //     $this->db->from('users');
    //     if(!empty($searchText)) {
    //         $likeCriteria = "(email  LIKE '%".$searchText."%'
    //                         OR  name  LIKE '%".$searchText."%')";
    //         $this->db->where($likeCriteria);
    //     }
    //     $this->db->where('role', $userType);
    //     $query = $this->db->get();

    //     return $query->num_rows();
    // }

    // function agents($searchText, $page, $segment, $userType = 'agent')
    // {
    //     $this->db->select('BaseTbl.*');
    //     $this->db->from('users as BaseTbl');
    //     // $this->db->join('easycompanies as company','company.user_id = BaseTbl.id');
    //     if(!empty($searchText)) {
    //         $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
    //                         OR  BaseTbl.name  LIKE '%".$searchText."%')";
    //         $this->db->where($likeCriteria);
    //     }
    //     $this->db->where('BaseTbl.role', $userType);
    //     $this->db->order_by('BaseTbl.id', 'DESC');
    //     $this->db->limit($page, $segment);
    //     $query = $this->db->get();

    //     $result = $query->result();
    //     return $result;
    // }

    // function addNewAgent($userInfo)
    // {
    //     $this->db->trans_start();
    //     $this->db->insert('users', $userInfo);

    //     $insert_id = $this->db->insert_id();

    //     $this->db->trans_complete();

    //     return $insert_id;
    // }

    // function getUserRoles()
    // {
    //     $this->db->select('roleId, role, status as roleStatus');
    //     $this->db->from('tbl_roles');
    //     $query = $this->db->get();

    //     return $query->result();
    // }

    // function checkEmailExists($email, $userId = 0)
    // {
    //     $this->db->select("email");
    //     $this->db->from("users");
    //     $this->db->where("email", $email);   
    //     if($userId != 0){
    //         $this->db->where("id !=", $userId);
    //     }
    //     $query = $this->db->get();

    //     return $query->result();
    // }

    // function getUserInfo($userId, $userRole = 'user')
    // {
    //     $this->db->select('*');
    //     $this->db->from('users');
    //     $this->db->where('id', $userId);
    //     $this->db->where('role', $userRole);
    //     $query = $this->db->get();

    //     return $query->row();
    // }

    // function editUser($userInfo, $userId)
    // {
    //     $this->db->where('id', $userId);
    //     $this->db->update('users', $userInfo);

    //     return TRUE;
    // }

    // function deleteUser($userId)
    // {
    //     $this->db->where('id', $userId);
    //     $this->db->delete('users');

    //     return $this->db->affected_rows();
    // }

    // function matchOldPassword($userId, $oldPassword)
    // {
    //     $this->db->select('userId, password');
    //     $this->db->where('userId', $userId);        
    //     $this->db->where('isDeleted', 0);
    //     $query = $this->db->get('tbl_users');

    //     $user = $query->result();

    //     if(!empty($user)){
    //         if(verifyHashedPassword($oldPassword, $user[0]->password)){
    //             return $user;
    //         } else {
    //             return array();
    //         }
    //     } else {
    //         return array();
    //     }
    // }

    // function changePassword($userId, $userInfo)
    // {
    //     $this->db->where('userId', $userId);
    //     $this->db->where('isDeleted', 0);
    //     $this->db->update('tbl_users', $userInfo);

    //     return $this->db->affected_rows();
    // }

    // function loginHistoryCount($userId, $searchText, $fromDate, $toDate)
    // {
    //     $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
    //     if(!empty($searchText)) {
    //         $likeCriteria = "(BaseTbl.sessionData LIKE '%".$searchText."%')";
    //         $this->db->where($likeCriteria);
    //     }
    //     if(!empty($fromDate)) {
    //         $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
    //         $this->db->where($likeCriteria);
    //     }
    //     if(!empty($toDate)) {
    //         $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
    //         $this->db->where($likeCriteria);
    //     }
    //     if($userId >= 1){
    //         $this->db->where('BaseTbl.userId', $userId);
    //     }
    //     $this->db->from('tbl_last_login as BaseTbl');
    //     $query = $this->db->get();

    //     return $query->num_rows();
    // }

    // function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment)
    // {
    //     $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
    //     $this->db->from('tbl_last_login as BaseTbl');
    //     if(!empty($searchText)) {
    //         $likeCriteria = "(BaseTbl.sessionData  LIKE '%".$searchText."%')";
    //         $this->db->where($likeCriteria);
    //     }
    //     if(!empty($fromDate)) {
    //         $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
    //         $this->db->where($likeCriteria);
    //     }
    //     if(!empty($toDate)) {
    //         $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
    //         $this->db->where($likeCriteria);
    //     }
    //     if($userId >= 1){
    //         $this->db->where('BaseTbl.userId', $userId);
    //     }
    //     $this->db->order_by('BaseTbl.id', 'DESC');
    //     $this->db->limit($page, $segment);
    //     $query = $this->db->get();

    //     $result = $query->result();        
    //     return $result;
    // }

    // function getUserInfoById($userId)
    // {
    //     $this->db->select('userId, name, email, mobile, roleId');
    //     $this->db->from('tbl_users');
    //     $this->db->where('isDeleted', 0);
    //     $this->db->where('userId', $userId);
    //     $query = $this->db->get();

    //     return $query->row();
    // }

    // function getUserInfoWithRole($userId)
    // {
    //     $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.isAdmin, BaseTbl.roleId, Roles.role');
    //     $this->db->from('tbl_users as BaseTbl');
    //     $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
    //     $this->db->where('BaseTbl.userId', $userId);
    //     $this->db->where('BaseTbl.isDeleted', 0);
    //     $query = $this->db->get();

    //     return $query->row();
    // }

}
