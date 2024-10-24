<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

    function loginMe($email, $password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('email', $email);
        $query = $this->db->get();

        $user = $query->row();

        if (!empty($user)) {
            if (verifyHashedPassword($password, $user->password)) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    // function loginMe($email, $password)
    // {
    //     // Query for 'admin' table
    //     $query1 = $this->db->select('id, name, email, password, "admin" as user_type')
    //         ->from('admin')
    //         ->where('email', $email)
    //         ->get_compiled_select();

    //     // Query for 'user' table
    //     $query2 = $this->db->select('id, name, email, password, "user" as user_type')
    //         ->from('user')
    //         ->where('email', $email)
    //         ->get_compiled_select();

    //     // Query for 'patients' table
    //     $query3 = $this->db->select('id, name, email, password, "patients" as user_type')
    //         ->from('patients')
    //         ->where('email', $email)
    //         ->get_compiled_select();

    //     // Union all queries together
    //     $sql = "($query1) UNION ($query2) UNION ($query3)";
    //     $query = $this->db->query($sql);

    //     $user = $query->row();

    //     if (!empty($user)) {
    //         if (verifyHashedPassword($password, $user->password)) {
    //             return $user;
    //         } else {
    //             return array();
    //         }
    //     } else {
    //         return array(); // No user found
    //     }
    // }


    public function registerUser($data)
    {
        $this->db->insert('admin', $data);
        return $this->db->insert_id();
    }

    public function getUserById($userId)
    {
        $this->db->where('id', $userId);
        $query = $this->db->get('admin');
        return $query->row();
    }


    // function checkEmailExist($email)
    // {
    //     $this->db->select('id');
    //     $this->db->where('email', $email);
    //     $query = $this->db->get('easyusers');

    //     if ($query->num_rows() > 0){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    // function resetPasswordUser($data)
    // {
    //     $result = $this->db->insert('tbl_reset_password', $data);

    //     if($result) {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }
    // }


    // function getCustomerInfoByEmail($email)
    // {
    //     $this->db->select('userId, email, name');
    //     $this->db->from('tbl_users');
    //     $this->db->where('isDeleted', 0);
    //     $this->db->where('email', $email);
    //     $query = $this->db->get();

    //     return $query->row();
    // }


    // function checkActivationDetails($email, $activation_id)
    // {
    //     $this->db->select('id');
    //     $this->db->from('tbl_reset_password');
    //     $this->db->where('email', $email);
    //     $this->db->where('activation_id', $activation_id);
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }

    // function createPasswordUser($email, $password)
    // {
    //     $this->db->where('email', $email);
    //     $this->db->where('isDeleted', 0);
    //     $this->db->update('tbl_users', array('password'=>getHashedPassword($password)));
    //     $this->db->delete('tbl_reset_password', array('email'=>$email));
    // }

    // function lastLogin($loginInfo)
    // {
    //     $this->db->trans_start();
    //     $this->db->insert('tbl_last_login', $loginInfo);
    //     $this->db->trans_complete();
    // }

    // function lastLoginInfo($userId)
    // {
    //     $this->db->select('BaseTbl.createdDtm');
    //     $this->db->where('BaseTbl.userId', $userId);
    //     $this->db->order_by('BaseTbl.id', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get('tbl_last_login as BaseTbl');

    //     return $query->row();
    // }

    // function getRoleAccessMatrix($roleId)
    // {
    //     $this->db->select('roleId, access');
    //     $this->db->from('tbl_access_matrix');
    //     $this->db->where('roleId', $roleId);
    //     $query = $this->db->get();

    //     $result = $query->row();
    //     return $result;
    // }
}
