<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class User extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('form');
        // $this->isLoggedIn();
        // if (!$this->isAdmin()) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->load->model('Inventory_model');
        $expiringData = $this->Inventory_model->getInventoryExpiringSoon();
        $data['expiring_cost'] = $expiringData['expiring_cost'];
        $data['expiring_percentage'] = $expiringData['expiring_percentage'];

        $averagePriceData = $this->Inventory_model->getAverageInventoryPrice();
        $data['current_average_price'] = $averagePriceData['current_average_price'];
        $data['percentage_change'] = $averagePriceData['percentage_change'];
        $data['arrow_direction'] = $averagePriceData['arrow_direction'];

        // $data['totalCost'] = $this->Inventory_model->getTotalInventoryCost();

        $data['low_quantity'] = $this->Inventory_model->get_low_quantity_sum();
        $data['quantity'] = $this->Inventory_model->get_all_quantity_sum();
        $data['letest_quantity'] = $this->Inventory_model->get_latest_inventory_quantity();
        // print_r($data['low_quantity']);
        // die;


        $this->global['pageTitle'] = 'My Esthatic : Dashboard';
        $this->loadViews("frontend/dashboard", $this->global, $data);
    }

    public function get_inventory_data()
    {
        $date_filter = $this->input->post('date_filter');
        $custom_date = $this->input->post('custom_date');

        $this->db->select('category_id, cost, today_date');
        // Apply date filters
        if ($date_filter === 'Today') {
            $this->db->where('today_date', date('Y-m-d'));
        } elseif ($date_filter === 'Yesterday') {
            $yesterday = date('Y-m-d', strtotime('-1 day'));
            $this->db->where('today_date', $yesterday);
        } elseif ($date_filter === 'This Week') {
            $start_of_week = date('Y-m-d', strtotime('monday this week'));
            $end_of_week = date('Y-m-d', strtotime('sunday this week'));
            $this->db->where('today_date >=', $start_of_week);
            $this->db->where('today_date <=', $end_of_week);
        } elseif ($date_filter === 'Last Week') {
            $start_of_last_week = date('Y-m-d', strtotime('monday last week'));
            $end_of_last_week = date('Y-m-d', strtotime('sunday last week'));
            $this->db->where('today_date >=', $start_of_last_week);
            $this->db->where('today_date <=', $end_of_last_week);
        } elseif ($date_filter === 'This Month') {
            $start_of_month = date('Y-m-01');
            $end_of_month = date('Y-m-t');
            $this->db->where('today_date >=', $start_of_month);
            $this->db->where('today_date <=', $end_of_month);
        } elseif ($date_filter === 'Last Month') {
            $start_of_last_month = date('Y-m-01', strtotime('first day of last month'));
            $end_of_last_month = date('Y-m-t', strtotime('last day of last month'));
            $this->db->where('today_date >=', $start_of_last_month);
            $this->db->where('today_date <=', $end_of_last_month);
        } elseif ($date_filter === 'Custom' && $custom_date) {
            $this->db->where('today_date', $custom_date);
        }

        $query = $this->db->get('inventory');
        $data = $query->result();

        // Initialize data structure for days of the week
        $categoryDataByDay = [
            'Monday' => ['Neurotoxins' => 0, 'Dermal Fillers' => 0, 'Others' => 0],
            'Tuesday' => ['Neurotoxins' => 0, 'Dermal Fillers' => 0, 'Others' => 0],
            'Wednesday' => ['Neurotoxins' => 0, 'Dermal Fillers' => 0, 'Others' => 0],
            'Thursday' => ['Neurotoxins' => 0, 'Dermal Fillers' => 0, 'Others' => 0],
            'Friday' => ['Neurotoxins' => 0, 'Dermal Fillers' => 0, 'Others' => 0],
            'Saturday' => ['Neurotoxins' => 0, 'Dermal Fillers' => 0, 'Others' => 0],
            'Sunday' => ['Neurotoxins' => 0, 'Dermal Fillers' => 0, 'Others' => 0],
        ];

        $totalCost = 0;
        foreach ($data as $item) {
            $dayOfWeek = date('l', strtotime($item->today_date));
            $cleanedCost = str_replace(['$', ','], '', $item->cost);
            $numericCost = floatval($cleanedCost);
            $totalCost += $numericCost;

            // Categorize data by day
            if ($item->category_id == 1) {
                $categoryDataByDay[$dayOfWeek]['Neurotoxins'] += $numericCost;
            } elseif ($item->category_id == 2) {
                $categoryDataByDay[$dayOfWeek]['Dermal Fillers'] += $numericCost;
            } else {
                $categoryDataByDay[$dayOfWeek]['Others'] += $numericCost;
            }
        }

        echo json_encode([
            'totalCost' => $totalCost,
            'categoryDataByDay' => $categoryDataByDay
        ]);
    }

    public function get_top_products()
    {
        $this->db->select('products.product_name, COUNT(inventory.product_id) as frequency');
        $this->db->from('inventory');
        $this->db->join('products', 'products.id = inventory.product_id');
        $this->db->group_by('inventory.product_id');
        $this->db->order_by('frequency', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        $result = $query->result();

        $topProducts = [];
        $totalFrequency = 0;

        foreach ($result as $row) {
            $topProducts[] = [
                'name' => explode(' ', $row->product_name)[0],
                'frequency' => $row->frequency
            ];
            $totalFrequency += $row->frequency;
        }

        foreach ($topProducts as &$product) {
            $product['percentage'] = ($product['frequency'] / $totalFrequency) * 100;
        }

        echo json_encode($topProducts);
    }

    public function users()
    {

        $this->global['pageTitle'] = 'My Esthatic : Users';
        $this->loadViews("frontend/users", $this->global, NULL);
    }

    public function addUser()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Add User';
        $this->loadViews("frontend/adduser", $this->global, NULL);
    }


    function pageNotFound()
    {
        $this->global['pageTitle'] = 'My Esthatic : 404 - Page Not Found';

        $this->loadViews("general/404", $this->global, NULL, NULL);
    }

    public function add()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        if ($this->input->post()) {
            $email = $this->input->post('email');

            $this->load->model('User_model');

            $existingUser = $this->User_model->getUserByEmail($email);
            if ($existingUser) {
                echo json_encode(['success' => false, 'message' => 'Email already exists in the system.']);
                return;
            }

            $data = array(
                'name' => $this->input->post('first_name') . ' ' . $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $email,
                'phone' => $this->input->post('phone'),
                'dob' => $this->input->post('dob'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'location' => $this->input->post('location'),
                'license_no' => $this->input->post('license_number'),
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 1,
                'token' => null
            );

            $config['upload_path'] = './uploads/users_profile/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $data['image'] = base_url('uploads/users_profile/' . $upload_data['file_name']);
            } else {
                log_message('error', 'Image upload error: ' . $this->upload->display_errors());
                $data['image'] = null;
            }

            $token = bin2hex(random_bytes(32));
            $data['token'] = $token;

            if ($this->User_model->insert($data)) {
                $userId = $this->db->insert_id();
                if ($this->sendEmail($data['first_name'], $data['email'], $userId, $token)) {
                    echo json_encode(['success' => true, 'message' => 'User added successfully! A link to update your password has been sent to your email.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'User added, but failed to send email.']);
                }
            } else {
                log_message('error', 'Failed to add user: ' . json_encode($data));
                echo json_encode(['success' => false, 'message' => 'Failed to add user.']);
            }
        } else {
            log_message('error', 'No POST data received');
            echo json_encode(['success' => false, 'message' => 'No data received.']);
        }
    }

    private function sendEmail($name, $email, $userId)
    {
        $this->load->library('email');

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.buzzwaretech.com',
            'smtp_user' => 'testweb@buzzwaretech.com',
            'smtp_pass' => ',j8Og2d1Ty1%',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'wordwrap'  => TRUE,
            'newline'   => "\r\n"
        );

        $this->email->initialize($config);

        // Prepare email
        $this->email->from('testweb@buzzwaretech.com', 'My Esthetic');
        $this->email->to($email);
        $this->email->subject('Password Reset');

        $userId = trim($userId);

        $link = base_url("User/resetPassword?id=" . urlencode($userId));


        $message = "<a href='{$link}'>Click Here To Reset Password</a>";


        $this->email->message($message);

        if (!$this->email->send()) {
            log_message('error', 'Email not sent: ' . $this->email->print_debugger());
            return false;
        } else {
            log_message('info', 'Email sent successfully to ' . $email);
            return true;
        }
    }




    public function resetPassword()
    {

        $userId = $this->input->get('id');
        // $token = $this->input->get('token');
        // if (!$this->validateToken($userId, $token)) {
        //     echo "Invalid or expired token.";
        //     return;
        // }

        $data['userId'] = $userId;
        // $data['token'] = $token;
        $this->load->view('users/reset_password', $data);
    }


    public function updatePassword()
    {
        if ($this->input->post()) {
            $user_id = $this->input->post('userId');
            // $token = $this->input->post('token');
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            // Validate the token before proceeding with the password update
            // if (!$this->validateToken($user_id, $token)) {
            //     echo json_encode(['success' => false, 'message' => 'Invalid token.']);
            //     return;
            // }

            // Check if passwords match
            if ($password === $confirm_password) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $this->load->model('User_model');

                // Update the password in the database
                if ($this->User_model->updatePassword($user_id, $hashed_password)) {
                    echo json_encode(['success' => true, 'message' => 'Password updated successfully!']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to update password.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'No data received.']);
        }
    }

    // public function validateToken($user_id, $token)
    // {
    //     $this->load->model('User_model');
    //     $user_data = $this->User_model->getUserData($user_id); // Ensure this method retrieves user data


    //     if ($user_data && isset($user_data['token']) && trim($user_data['token']) === trim($token)) {
    //         return true;
    //     }


    //     return false;
    // }


    public function fetch_users()
    {
        $limit = 8;
        $page = $this->input->post('page');
        $filter = $this->input->post('filter');
        // $calendarDate = $this->input->post('calendarDate');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        if (!$page) {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;

        $this->load->model('User_model');



        $users = $this->User_model->get_users_with_pagination($limit, $offset, $filter, $startDate, $endDate);
        // Pass the filters to the model
        // $users = $this->User_model->get_users_with_pagination($limit, $offset, $filter, $calendarDate);

        // Fetch total users count for pagination
        $total_users = $this->User_model->get_users_count(); // Adjust as necessary

        // Prepare data for the response
        $response = [
            'users' => $users,
            'pagination' => $this->paginate($total_users, $limit, $page)
        ];

        echo json_encode($response);
    }

    public function toggle_user_status()
    {
        $user_id = $this->input->post('user_id');
        $status = $this->input->post('status');

        $this->load->model('User_model');
        $update_status = $this->User_model->update_user_status($user_id, $status);

        if ($update_status) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }




    private function paginate($total_users, $limit, $page)
    {
        $total_pages = ceil($total_users / $limit);
        return [
            'current_page' => $page,
            'total_pages' => $total_pages
        ];
    }
}
