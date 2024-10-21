<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    // public function index()
    // {
    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');

    //     // Log the incoming email and password
    //     log_message('debug', 'Received email: ' . $email);
    //     log_message('debug', 'Received password: ' . $password);

    //     // Fetch the user by email
    //     $user = $this->User_model->get_user_by_email($email);

    //     if (!$user) {
    //         log_message('debug', 'User  not found');
    //         $this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'error', 'message' => 'Invalid email or password']));
    //         return;
    //     }

    //     // Log the retrieved hashed password for debugging
    //     log_message('debug', 'Database password: ' . $user->password);

    //     // Verify the password
    //     if (!password_verify($password, $user->password)) {
    //         log_message('debug', 'Password verification failed');
    //         $this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'error', 'message' => 'Invalid email or password']));
    //         return;
    //     }

    //     // Prepare response data
    //     $data = [
    //         'id' => $user->id,
    //         'name' => $user->name,

    //     ];

    //     // Send success response
    //     $this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'success', 'data' => $data]));
    // }
    function index()
    {
        $user_email = $this->input->post('email');
        $user_password = $this->input->post('password');
        $user_data = $this->verifyUser($user_email, $user_password);

        if ($user_data === false) {
            $rdata['success'] = 0;
            $res['user_detail'] = "";
            $res['msg'] = "Invalid User";
        } else {
            if ($user_data['status'] == 3) {
                $rdata['success'] = 0;
                $res['user_detail'] = "";
                $res['msg'] = "You Have Been Blocked By Admin";
            } else {
                $rdata['success'] = 1;
                $res['user_detail'] = $user_data;
                $res['msg'] = "You have successfully logged in";
            }
        }

        $rdata['return_data'] = $res;

        echo json_encode($rdata);
    }

    function verifyUser($email, $password)
    {

        $this->db->where('email', $email);
        $user = $this->db->get('user')->row_array();
        log_message('debug', 'Fetched user data: ' . json_encode($user));

        if (empty($user)) {
            log_message('debug', 'User  not found for email: ' . $email);
            return false;
        }


        if (password_verify($password, $user['password'])) {
            log_message('debug', 'Password verified for user: ' . $email);
            return $user;
        } else {
            log_message('debug', 'Password verification failed for user: ' . $email);
            return false;
        }
    }


    function verify($email)
    {
        $credential = array('email' => $email);
        $query = $this->db->get_where('user', $credential);
        if ($query->num_rows() > 0) {

            return $query->row_array();
        } else {
            return 0;
        }
    }

    // function forgetPassword()
    // {
    // 	$data['email'] = $this->input->post('email');
    // 	$flag = $this->verify($data['email']);
    // 	if ($flag == 0) {
    // 		$response['sucess'] = 1;
    // 		$response['error'] = 1;
    // 		$response['msg'] = "Email is not Exist";
    // 	} else {

    // 		$res = $this->sendemailforget($flag['name'], $flag['email'], $flag['password']);

    // 		$response['sucess'] = 1;
    // 		$response['error'] = 0;
    // 		$response['msg'] = $res;
    // 	}


    // 	echo json_encode($response);
    // }

    // function sendemailforget($name, $email, $password)
    // {
    // 	$this->load->library('email');
    // 	$config = array();

    // 	$config['protocol'] = 'smtp';
    // 	$config['smtp_host'] = 'ssl://mail.buzzwaretech.com';
    // 	$config['smtp_user'] = 'testweb@buzzwaretech.com';
    // 	$config['smtp_pass'] = ',j8Og2d1Ty1%';
    // 	$config['smtp_port'] = 465;
    // 	$config['mailtype'] = 'html';
    // 	$config['charset'] = 'iso-8859-1';
    // 	$config['wordwrap'] = 'TRUE';
    // 	$config['newline'] = "\r\n";
    // 	$this->email->initialize($config);
    // 	$this->email->set_newline("\r\n");


    // 	$from_email = "testweb@buzzwaretech.com";

    // 	$this->email->from($from_email, 'My Esthetic');
    // 	$this->email->to($email);

    // 	$this->email->subject('Forget Email');
    // 	$message = 'Dear  ' . $name . ' ,<br><br> Your password is:  ' . $password . '.<br>Please do not share with others <br>Thanks';
    // 	$this->email->message($message);

    // 	//Send mail 
    // 	if ($this->email->send()) {
    // 		return 'Your Email has successfully been sent.';
    // 	} else {
    // 		return show_error($this->email->print_debugger());
    // 	}
    // }

    function forgetPassword()
    {
        $data['email'] = $this->input->post('email');
        $flag = $this->verify($data['email']);
    
        if ($flag == 0) {
            $response['success'] = 1;
            $response['error'] = 1;
            $response['msg'] = "Email does not exist.";
        } else {
            $newPassword = bin2hex(random_bytes(8));
            
            
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            
            
            $this->db->where('email', $flag['email']);
            $this->db->update('user', array('password' => $hashedPassword));

            $res = $this->sendemailnewpassword($flag['name'], $flag['email'], $newPassword);
    
            $response['success'] = 1;
            $response['error'] = 0;
            $response['msg'] = $res;
        }
    
        echo json_encode($response);
    }
    
    function sendemailnewpassword($name, $email, $newPassword)
    {
        $this->load->library('email');
        $config = array();
    
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://mail.buzzwaretech.com';
        $config['smtp_user'] = 'testweb@buzzwaretech.com';
        $config['smtp_pass'] = ',j8Og2d1Ty1%';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
    
        $from_email = "testweb@buzzwaretech.com";
        $this->email->from($from_email, 'My Esthetic');
        $this->email->to($email);
    
        $this->email->subject('New Password Request');
        $message = 'Dear ' . $name . ',<br><br> Your password has been reset.<br>';
        $message .= 'Your new password is: <strong>' . $newPassword . '</strong><br><br>';
        $message .= 'Please change your password after logging in for security reasons.<br>';
        $message .= 'If you did not request a password reset, please contact support.<br>Thanks';
        $this->email->message($message);
    
        if ($this->email->send()) {
            return 'Your new password has been sent to your email.';
        } else {
            return show_error($this->email->print_debugger());
        }
    }
}
