<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Inventory extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inventory_model');
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }

        $this->load->model('Inventory_model');
        $this->load->model('User_model');
        $data['users'] = $this->User_model->getAllUsers();
        

        $this->global['pageTitle'] = 'My Esthetic : Total Inventory';

        $this->loadViews("frontend/totalinventory", $this->global, $data, NULL);
    }


    public function fetch_inventory()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
    
        $this->load->model('Inventory_model');
    
        $limit = 8;
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $offset = ($page - 1) * $limit;
    
        $filter = $this->input->get('filter');
        $startDate = $this->input->get('start_date');
        $endDate = $this->input->get('end_date');
    
        $conditions = [];
    
        if ($filter == 'today') {
            $conditions[] = 'i.created_at >= CURDATE()';
        } elseif ($filter == 'this_week') {
            $conditions[] = 'i.created_at >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)';
        } elseif ($filter == 'last_week') {
            $conditions[] = 'i.created_at >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) + 7 DAY) AND i.created_at < DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)';
        } elseif ($filter == 'this_month') {
            $conditions[] = 'i.created_at >= DATE_FORMAT(CURDATE(), "%Y-%m-01")';
        } elseif ($filter == 'last_month') {
            $conditions[] = 'i.created_at >= DATE_FORMAT(CURDATE() - INTERVAL 1 MONTH, "%Y-%m-01") AND i.created_at < DATE_FORMAT(CURDATE(), "%Y-%m-01")';
        } elseif ($filter == 'custom' && !empty($startDate) && !empty($endDate)) {
            $conditions[] = 'DATE(i.created_at) >= "' . $startDate . '"';
            $conditions[] = 'DATE(i.created_at) <= "' . $endDate . '"';
        }
    
        $inventory = $this->Inventory_model->get_filtered_inventory($conditions, $limit, $offset);
        $total_inventory = $this->Inventory_model->count_filtered_inventory($conditions);
        $total_pages = ceil($total_inventory / $limit);
    
        $data = [
            'inventory' => $inventory,
            'total_pages' => $total_pages,
            'current_page' => $page
        ];
    
        echo json_encode($data);
    }

    public function getLowInventoryAjax()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
    
        $this->load->model('Inventory_model');
    
        $limit_low = 8;
        $page_low = $this->input->get('page_low') ? (int)$this->input->get('page_low') : 1;
        $offset_low = ($page_low - 1) * $limit_low;
    
        $filter = $this->input->get('filter');
        $startDate = $this->input->get('start_date');
        $endDate = $this->input->get('end_date');
    
        $conditions = [];
    
        if ($filter == 'today') {
            $conditions[] = 'i.created_at >= CURDATE()';
        } elseif ($filter == 'this_week') {
            $conditions[] = 'i.created_at >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)';
        } elseif ($filter == 'last_week') {
            $conditions[] = 'i.created_at >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) + 7 DAY) AND i.created_at < DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)';
        } elseif ($filter == 'this_month') {
            $conditions[] = 'i.created_at >= DATE_FORMAT(CURDATE(), "%Y-%m-01")';
        } elseif ($filter == 'last_month') {
            $conditions[] = 'i.created_at >= DATE_FORMAT(CURDATE() - INTERVAL 1 MONTH, "%Y-%m-01") AND i.created_at < DATE_FORMAT(CURDATE(), "%Y-%m-01")';
        } elseif ($filter == 'last_month') {
            $conditions[] = 'i.created_at >= DATE_FORMAT(CURDATE() - INTERVAL 1 MONTH, "%Y-%m-01") AND i.created_at < DATE_FORMAT(CURDATE(), "%Y-%m-01")';
        } elseif ($filter == 'custom' && !empty($startDate) && !empty($endDate)) {
            $conditions[] = 'DATE(i.created_at) >= "' . $startDate . '"';
            $conditions[] = 'DATE(i.created_at) <= "' . $endDate . '"';
        }
    
        $low_inventory = $this->Inventory_model->getLowInventory($conditions, $limit_low, $offset_low);
        $total_low_inventory = $this->Inventory_model->count_low_inventory($conditions);
        $total_pages_low = ceil($total_low_inventory / $limit_low);
    
        $data = [
            'low_inventory' => $low_inventory,
            'total_pages_low' => $total_pages_low,
            'page_low' => $page_low,
        ];
    
        echo json_encode($data);
    }

    public function getExpiringItemsAjax()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
    
        $this->load->model('Inventory_model');
    
        $limit_expiring = 8;
        $page_expiring = $this->input->get('page_expiring') ? (int)$this->input->get('page_expiring') : 1;
        $offset_expiring = ($page_expiring - 1) * $limit_expiring;
    
        $filter = $this->input->get('filter');
        $startDate = $this->input->get('start_date');
        $endDate = $this->input->get('end_date');
    
        $conditions = [];
    
        if ($filter == 'today') {
            $conditions[] = 'i.created_at >= CURDATE()';
        } elseif ($filter == 'this_week') {
            $conditions[] = 'i.created_at >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)';
        } elseif ($filter == 'last_week') {
            $conditions[] = 'i.created_at >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) + 7 DAY) AND i.created_at < DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)';
        } elseif ($filter == 'this_month') {
            $conditions[] = 'i.created_at >= DATE_FORMAT(CURDATE(), "%Y-%m-01")';
        } elseif ($filter == 'last_month') {
            $conditions[] = 'i.created_at >= DATE_FORMAT(CURDATE() - INTERVAL 1 MONTH, "%Y-%m-01") AND i.created_at < DATE_FORMAT(CURDATE(), "%Y-%m-01")';
        } elseif ($filter == 'custom' && !empty($startDate) && !empty($endDate)) {
            $conditions[] = 'DATE(i.created_at) >= "' . $startDate . '"';
            $conditions[] = 'DATE(i.created_at) <= "' . $endDate . '"';
        }
    
        $expiringItems = $this->Inventory_model->getExpiringItems($conditions, $limit_expiring, $offset_expiring);
        $totalExpiringItems = $this->Inventory_model->countExpiringItems($conditions);
        $totalPagesExpiring = ceil($totalExpiringItems / $limit_expiring);
    
        $allExpiringItems = $this->Inventory_model->getExpiringItems($conditions);
        $syringesExpiring = 0;
        $unitsExpiring = 0;
        $amountOfUnitsExpiring = 0.0;
        $amountOfSyringesExpiring = 0.0;
        
        foreach ($allExpiringItems as $item) {
            $quantity = (is_numeric($item->quantity)) ? (float)$item->quantity : 0;
            $cost = (float)str_replace(array('$', ','), '', $item->cost);
        
            if (strpos($item->units_bottles, 'ml') !== false) {
                $syringesExpiring += $quantity;
                $amountOfSyringesExpiring += $cost; // Add cost to syringes
            } elseif (strpos($item->units_bottles, 'Units') !== false) {
                $unitsExpiring += $quantity;
                $amountOfUnitsExpiring += $cost;
            }
        }
        
        $data = [
            'expiring_items' => $expiringItems,
            'total_pages_expiring' => $totalPagesExpiring,
            'page_expiring' => $page_expiring,
            'syringes_expiring' => $syringesExpiring,
            'units_expiring' => $unitsExpiring,
            'amount_of_units_expiring' => $amountOfUnitsExpiring,
            'amount_of_syringes_expiring' => $amountOfSyringesExpiring, // Include this in the response
        ];
        
        echo json_encode($data);
    }    


    public function inventoryHistory()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }

        $data['brands'] = $this->Inventory_model->getAllBrands();
        $data['productTypes'] = $this->Inventory_model->getAllProductTypes();
        $data['users'] = $this->Inventory_model->getAllUsers();
        $data['locations'] = $this->Inventory_model->getAllLocations();
    


        $this->global['pageTitle'] = 'My Esthatic : Inventory History';


        $this->loadViews("frontend/inventoryhistory", $this->global,$data, NULL);
    }
    public function addInventory()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }

        $this->load->model('Inventory_model');
        $data['categories'] = $this->Inventory_model->getCategories();
        $this->global['pageTitle'] = 'My Esthatic : Add Inventory';
        $data['lotNumber'] = $this->Inventory_model->generateLotNumber();

        $this->loadViews("frontend/addinventory", $this->global, $data, NULL);
    }

    public function getBrandsByCategory($category_id)
    {
        $this->load->model('Inventory_model');
        $brands = $this->Inventory_model->getBrandsByCategory($category_id);

        echo json_encode(['brands' => $brands]);
    }

    public function getProductDetails($product_id)
    {
        $this->load->model('Inventory_model');
        $product = $this->Inventory_model->getProductDetailsById($product_id);


        echo json_encode([
            'units_bottle' => $product->units_bottle
            // 'product_type' => $product->product_type 
        ]);
    }

    public function getProductsByBrand($brand_id)
    {
        $this->load->model('Inventory_model');
        $products = $this->Inventory_model->getProductsByBrand($brand_id);

        echo json_encode(['products' => $products]);
    }

    public function getProductPrice($product_id)
    {
        $category_id = $this->input->get('category_id');
        $brand_id = $this->input->get('brand_id');

        $this->load->model('Inventory_model');
        $price = $this->Inventory_model->getProductPrice($product_id, $category_id, $brand_id);

        echo json_encode(['price' => $price]);
    }

    // public function addInventoryData()
    // {
    //     // $assigned_Uid = 1;
    //     // $lotNumber = $this->Inventory_model->generateLotNumber();
    //     $data = [
    //         'category_id' => $this->input->post('category_id'),
    //         'brand_id' => $this->input->post('brand_id'),
    //         'product_id' => $this->input->post('product_id'),
    //         'units_bottles' => $this->input->post('units_bottles'),
    //         'vile_syringe' => $this->input->post('vile_syringe'),
    //         'quantity' => $this->input->post('quantity'),
    //         'cost' => $this->input->post('cost'),
    //         'today_date' => $this->input->post('today_date'),
    //         'location_id' => $this->input->post('location_id'),
    //         'date_of_expiry' => $this->input->post('date_of_expiry'),
    //         'lot_number' => $this->input->post('lot_number'),
    //         // $assigned_Uid =>$this->input->post('assigned_Uid')
    //     ];

    //     echo "<pre>";
    //     print_r($data);
    //     echo "</pre>";
    //     // die;



    //     $this->db->insert('inventory', $data);
    //     $inventory_id = $this->db->insert_id();

    //     if ($inventory_id) {
    //         $config['upload_path'] = './uploads/inventory/';
    //         $config['allowed_types'] = '*';
    //         $config['max_size'] = 2048;
    //         $config['file_name'] = uniqid('inventory_', true);


    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload('image')) {
    //             $uploadedData = $this->upload->data();
    //             $imageFilePath = base_url('uploads/inventory/' . $uploadedData['file_name']);
    //             $this->db->set('image', $imageFilePath);
    //             $this->db->where('id', $inventory_id);
    //             $this->db->update('inventory');
    //         } else {

    //             $error = $this->upload->display_errors();
    //             echo $error;
    //             return;
    //         }
    //         $qrData = base_url("inventory/view/{$inventory_id}");
    //         $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($qrData) . "&size=150x150";
    //         $this->db->set('qr_image', $qrCodeUrl);
    //         $this->db->where('id', $inventory_id);
    //         $this->db->update('inventory');
    //     } else {
    //         echo "Error inserting data!";
    //         return;
    //     }
    //     redirect('inventory');
    // }

    public function addInventoryData()
    {
        $data = [
            'category_id' => $this->input->post('category_id'),
            'brand_id' => $this->input->post('brand_id'),
            'product_id' => $this->input->post('product_id'),
            'units_bottles' => $this->input->post('units_bottles'),
            'vile_syringe' => $this->input->post('vile_syringe'),
            'quantity' => $this->input->post('quantity'),
            'cost' => $this->input->post('cost'),
            'today_date' => $this->input->post('today_date'),
            'location_id' => $this->input->post('location_id'),
            'date_of_expiry' => $this->input->post('date_of_expiry'),
            'lot_number' => $this->input->post('lot_number'),
        ];

        $this->db->insert('inventory', $data);
        $inventory_id = $this->db->insert_id();

        if ($inventory_id) {
            // Image upload logic
            $config['upload_path'] = './uploads/inventory/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 2048;
            $config['file_name'] = uniqid('inventory_', true);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $uploadedData = $this->upload->data();
                $imageFilePath = base_url('uploads/inventory/' . $uploadedData['file_name']);
                $this->db->set('image', $imageFilePath);
                $this->db->where('id', $inventory_id);
                $this->db->update('inventory');
            } else {
                $error = $this->upload->display_errors();
                echo json_encode(['error' => $error]);
                return;
            }

            // QR code generation
            $qrData = base_url("inventory/view/{$inventory_id}");
            $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($qrData) . "&size=150x150";
            $this->db->set('qr_image', $qrCodeUrl);
            $this->db->where('id', $inventory_id);
            $this->db->update('inventory');

            // Send the QR code URL and success status back to the client
            echo json_encode([
                'success' => true,
                'qr_image' => $qrCodeUrl
            ]);
            return;
        } else {
            echo json_encode(['error' => 'Error inserting data!']);
            return;
        }
    }


    public function view($inventory_id)
    {
        // if (!$this->isAdmin()) {
        //     redirect('login');
        // }

        $data['inventory'] = $this->db->select('i.*, c.name as category_name, b.name as brand_name, l.name as location_name, p.product_name')
            ->from('inventory i')
            ->join('categories c', 'i.category_id = c.id', 'left')
            ->join('brands b', 'i.brand_id = b.id', 'left')
            ->join('locations l', 'i.location_id = l.id', 'left')
            ->join('products p', 'i.product_id = p.id', 'left')
            ->where('i.id', $inventory_id)
            ->get()
            ->row();

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        $this->load->view('inventory/view', $data);
    }


    public function assignUserToInventory()
    {
        $inventoryId = $this->input->post('inventory_id');
        $userId = $this->input->post('user_id');
        $assignedUnits = $this->input->post('assigned_units');
        $dateCheckout = $this->input->post('date_checkout');

        $inventory = $this->db->get_where('inventory', ['id' => $inventoryId])->row();


        if ($inventory) {
            $unitsLeft = $inventory->quantity - $assignedUnits;

            // print_r($assignedUnits);
            // die;


            $data = [
                'user_id' => $userId,
                'inventory_id' => $inventoryId,
                'assigned_units' => $assignedUnits,
                'units_left' => $unitsLeft,
                'date_checkout' => $dateCheckout
            ];

            // print_r($data);
            // die;

            $this->db->insert('assigned_inventory', $data);

            $this->db->update('inventory', [
                'assigned_status' => 1,
                'quantity' => $unitsLeft
            ], ['id' => $inventoryId]);

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Inventory not found.']);
        }
    }

    public function filter_inventory() {
        $this->load->model('Inventory_model');
        $brand_id = $this->input->post('brand_id');
        $product_id = $this->input->post('product_id');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $assigned_uid = $this->input->post('assigned_uid');
        $location_id = $this->input->post('location_id');
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
    
        $filtered_data = $this->Inventory_model->get_filtered_inventory_history(
            $brand_id, 
            $product_id, 
            $from_date,  
            $to_date,    
            $assigned_uid, 
            $location_id,
            $limit,
            $offset
        );
    
        $total_records = $this->Inventory_model->get_filtered_inventory_count(
            $brand_id, 
            $product_id, 
            $from_date,  
            $to_date,    
            $assigned_uid, 
            $location_id
        );
    
        echo json_encode(['data' => $filtered_data, 'total' => $total_records]);
    }
    
}
