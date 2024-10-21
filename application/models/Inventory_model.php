<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get categories
    public function getCategories()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function insertInventory($data)
    {
        return $this->db->insert('inventory', $data);
    }


    public function getBrandsByCategory($category_id)
    {
        $this->db->select('b.id, b.name');
        $this->db->from('products p');
        $this->db->join('brands b', 'p.brand_id = b.id');
        $this->db->where('p.category_id', $category_id);
        return $this->db->distinct()->get()->result();
    }

    public function getProductsByBrand($brand_id)
    {
        $this->db->select('id, product_name');
        $this->db->from('products');
        $this->db->where('brand_id', $brand_id);
        return $this->db->get()->result();
    }

    public function getProductPrice($product_id, $category_id, $brand_id)
    {
        $this->db->select('dividing_cost_product');
        $this->db->from('product_costs');
        $this->db->where('product_id', $product_id);
        $this->db->where('category_id', $category_id); // Adding category filter
        $this->db->where('brand_id', $brand_id); // Adding brand filter
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->dividing_cost_product; // Return the specific dividing cost
        }
        return null; // Return null if no product cost found
    }

    public function generateLotNumber()
    {
        // Get the latest lot number from the inventory table
        $this->db->select('lot_number');
        $this->db->from('inventory');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $lastLotNumber = $query->row()->lot_number;
            // Extract the numeric part and increment it
            $numericPart = (int)$lastLotNumber;
            $newLotNumber = str_pad($numericPart + 1, 4, '0', STR_PAD_LEFT);
        } else {
            // If there are no records, start with 0001
            $newLotNumber = '0001';
        }

        return $newLotNumber;
    }


    public function get_filtered_inventory($conditions, $limit = null, $offset = null)
    {
        $this->db->select('i.*, c.name as category_name, b.name as brand_name, l.name as location_name, p.product_name')
            ->from('inventory i')
            ->join('categories c', 'i.category_id = c.id', 'left')
            ->join('brands b', 'i.brand_id = b.id', 'left')
            ->join('products p', 'i.product_id = p.id', 'left')
            ->join('locations l', 'i.location_id = l.id', 'left');

        foreach ($conditions as $condition) {
            $this->db->where($condition);
        }

        // Order by created_at in descending order to get the latest records first
        $this->db->order_by('i.created_at', 'DESC');

        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();

        // Log the SQL query for debugging
        log_message('debug', $this->db->last_query());

        return $query->result();
    }

    public function count_filtered_inventory($conditions)
    {
        $this->db->select('i.id')
            ->from('inventory i')
            ->join('categories c', 'i.category_id = c.id', 'left')
            ->join('brands b', 'i.brand_id = b.id', 'left')
            ->join('products p', 'i.product_id = p.id', 'left')
            ->join('locations l', 'i.location_id = l.id', 'left');

        foreach ($conditions as $condition) {
            $this->db->where($condition);
        }

        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getLowInventory($conditions, $limit = null, $offset = null)
    {
        $this->db->select('i.*, c.name as category_name, b.name as brand_name, l.name as location_name, p.product_name')
            ->from('inventory i')
            ->join('categories c', 'i.category_id = c.id', 'left')
            ->join('brands b', 'i.brand_id = b.id', 'left')
            ->join('products p', 'i.product_id = p.id', 'left')
            ->join('locations l', 'i.location_id = l.id', 'left');

        foreach ($conditions as $condition) {
            $this->db->where($condition);
        }

        // Add condition for low inventory
        $this->db->where('i.quantity <', 100);

        $this->db->order_by('i.created_at', 'DESC');

        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();

        return $query->result();
    }

    public function count_low_inventory($conditions)
    {
        $this->db->select('i.id')
            ->from('inventory i')
            ->join('categories c', 'i.category_id = c.id', 'left')
            ->join('brands b', 'i.brand_id = b.id', 'left')
            ->join('products p', 'i.product_id = p.id', 'left')
            ->join('locations l', 'i.location_id = l.id', 'left');

        foreach ($conditions as $condition) {
            $this->db->where($condition);
        }

        // Add condition for low inventory count
        $this->db->where('i.quantity <', 100);

        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getExpiringItems($conditions, $limit = null, $offset = null)
    {
        $this->db->select('i.*, c.name as category_name, b.name as brand_name, l.name as location_name, p.product_name')
            ->from('inventory i')
            ->join('categories c', 'i.category_id = c.id', 'left')
            ->join('brands b', 'i.brand_id = b.id', 'left')
            ->join('products p', 'i.product_id = p.id', 'left')
            ->join('locations l', 'i.location_id = l.id', 'left');
        foreach ($conditions as $condition) {
            $this->db->where($condition);
        }
        $this->db->where('i.date_of_expiry <=', date('Y-m-d', strtotime('+2 months')));

        $this->db->order_by('i.created_at', 'DESC');
        if ($limit !== null && $offset !== null) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function countExpiringItems($conditions)
    {
        $this->db->select('i.id')
            ->from('inventory i')
            ->join('categories c', 'i.category_id = c.id', 'left')
            ->join('brands b', 'i.brand_id = b.id', 'left')
            ->join('products p', 'i.product_id = p.id', 'left')
            ->join('locations l', 'i.location_id = l.id', 'left');

        foreach ($conditions as $condition) {
            $this->db->where($condition);
        }
        $this->db->where('i.date_of_expiry <=', date('Y-m-d', strtotime('+2 months')));
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function getProductDetailsById($product_id)
    {
        $this->db->select('units_bottle'); // Select only the necessary columns
        $this->db->from('products'); // From the products table
        $this->db->where('id', $product_id); // Where the product ID matches
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(); // Return the product details
        }

        return null; // Return null if not found
    }


    public function get_filtered_inventory_history($brand_id, $product_id, $from_date, $to_date, $assigned_uid, $location_id, $limit = 7, $offset = 0)
    {
        $this->db->select('inventory.*, brands.name as brand_name, products.product_name as product_type, user.name as assigned_to, locations.name as location_name');
        $this->db->from('inventory');
        $this->db->join('brands', 'brands.id = inventory.brand_id', 'left');
        $this->db->join('products', 'products.id = inventory.product_id', 'left');
        $this->db->join('user', 'user.id = inventory.assigned_uid', 'left');
        $this->db->join('locations', 'locations.id = inventory.location_id', 'left');
        if ($brand_id) {
            $this->db->where('inventory.brand_id', $brand_id);
        }
        if ($product_id) {
            $this->db->where('inventory.product_id', $product_id);
        }
        if ($location_id) {
            $this->db->where('inventory.location_id', $location_id);
        }
        if ($assigned_uid) {
            $this->db->where('inventory.assigned_uid', $assigned_uid);
        }
        if ($from_date && $to_date) {
            $this->db->where('DATE(inventory.today_date) >=', $from_date);
            $this->db->where('DATE(inventory.today_date) <=', $to_date);
        }
        // $query = $this->db->get();
        // return $query->result_array();
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_filtered_inventory_count($brand_id, $product_id, $from_date, $to_date, $assigned_uid, $location_id)
    {
        $this->db->from('inventory');
        if ($brand_id) {
            $this->db->where('inventory.brand_id', $brand_id);
        }
        if ($product_id) {
            $this->db->where('inventory.product_id', $product_id);
        }
        if ($location_id) {
            $this->db->where('inventory.location_id', $location_id);
        }
        if ($assigned_uid) {
            $this->db->where('inventory.assigned_uid', $assigned_uid);
        }
        if ($from_date && $to_date) {
            $this->db->where('DATE(inventory.today_date) >=', $from_date);
            $this->db->where('DATE(inventory.today_date) <=', $to_date);
        }
        return $this->db->count_all_results();
    }

    public function getAllBrands()
    {
        return $this->db->get('brands')->result_array();
    }

    public function getAllProductTypes()
    {
        return $this->db->get('products')->result_array();
    }

    public function getAllUsers()
    {
        return $this->db->get('user')->result_array();
    }

    public function getAllLocations()
    {
        return $this->db->get('locations')->result_array();
    }


    // dashboard functions for price and other curl_share_strerror

    // public function getTotalInventoryCost()
    // {
    //     $query = $this->db->select('cost')->get('inventory');
    //     $totalCost = 0;

    //     foreach ($query->result() as $row) {            
    //         $cleanedCost = str_replace(['$', ','], '', $row->cost);
    //         $numericCost = floatval($cleanedCost);
    //         $totalCost += $numericCost;
    //     }

    //     return $totalCost;
    // }
    public function getTotalInventoryCost($dateRange = null, $startDate = null, $endDate = null)
    {
        $this->db->select('cost');

        if ($dateRange == 'Today') {
            $this->db->where('today_date', date('Y-m-d'));
        } elseif ($dateRange == 'Yesterday') {
            $this->db->where('today_date', date('Y-m-d', strtotime('-1 day')));
        } elseif ($dateRange == 'This Week') {
            $this->db->where('today_date >=', date('Y-m-d', strtotime('this week')));
            $this->db->where('today_date <=', date('Y-m-d'));
        } elseif ($dateRange == 'Last Week') {
            $this->db->where('today_date >=', date('Y-m-d', strtotime('last week')));
            $this->db->where('today_date <=', date('Y-m-d', strtotime('last sunday')));
        } elseif ($dateRange == 'This Month') {
            $this->db->where('MONTH(today_date)', date('m'));
            $this->db->where('YEAR(today_date)', date('Y'));
        } elseif ($dateRange == 'Last Month') {
            $this->db->where('MONTH(today_date)', date('m', strtotime('last month')));
            $this->db->where('YEAR(today_date)', date('Y', strtotime('last month')));
        } elseif ($dateRange == 'Custom') {
            if ($startDate && $endDate) {
                $this->db->where('today_date >=', $startDate);
                $this->db->where('today_date <=', $endDate);
            }
        }
        $query = $this->db->get('inventory');
        $totalCost = 0;
        foreach ($query->result() as $row) {
            $cleanedCost = str_replace(['$', ','], '', $row->cost);
            $numericCost = floatval($cleanedCost);
            $totalCost += $numericCost;
        }

        return $totalCost;
    }

    public function getInventoryExpiringSoon()
    {
        $today = date('Y-m-d');
        $thirtyDaysLater = date('Y-m-d', strtotime('+30 days'));

        $query = $this->db->select('cost')->get('inventory');
        $totalCost = 0;
        $expiringCost = 0;

        foreach ($query->result() as $row) {
            $cleanedCost = str_replace(['$', ','], '', $row->cost);
            $numericCost = floatval($cleanedCost);
            $totalCost += $numericCost;
        }

        $expiringQuery = $this->db->select('cost')
            ->where('date_of_expiry >=', $today)
            ->where('date_of_expiry <=', $thirtyDaysLater)
            ->get('inventory');

        foreach ($expiringQuery->result() as $row) {
            $cleanedCost = str_replace(['$', ','], '', $row->cost);
            $numericCost = floatval($cleanedCost);
            $expiringCost += $numericCost;
        }

        $expiringPercentage = ($totalCost > 0) ? ($expiringCost / $totalCost) * 100 : 0;

        return [
            'total_cost' => $totalCost,
            'expiring_cost' => $expiringCost,
            'expiring_percentage' => $expiringPercentage
        ];
    }

    public function getAverageInventoryPrice()
    {
        $query = $this->db->select('cost')->get('inventory');
        $totalCost = 0;
        $count = 0;
    
        foreach ($query->result() as $row) {
            $cleanedCost = str_replace(['$', ','], '', $row->cost);
            $numericCost = floatval($cleanedCost);
            $totalCost += $numericCost;
            $count++;
        }
    
        $currentAveragePrice = ($count > 0) ? ($totalCost / $count) : 0;
        $previousQuery = $this->db->select('cost')
            ->where('today_date >=', date('Y-m-d', strtotime('-2 months')))
            ->where('today_date <', date('Y-m-d', strtotime('-1 months')))
            ->get('inventory');
    
        $previousTotalCost = 0;
        $previousCount = 0;
    
        foreach ($previousQuery->result() as $row) {
            $cleanedCost = str_replace(['$', ','], '', $row->cost);
            $numericCost = floatval($cleanedCost);
            $previousTotalCost += $numericCost;
            $previousCount++;
        }
    
        $previousAveragePrice = ($previousCount > 0) ? ($previousTotalCost / $previousCount) : 0;
    
        // Calculate percentage change
        $percentageChange = ($previousAveragePrice > 0) ? (($currentAveragePrice - $previousAveragePrice) / $previousAveragePrice) * 100 : 0;
    
        // Determine arrow direction
        $arrowDirection = $percentageChange >= 0 ? 'up' : 'down';
    
        return [
            'current_average_price' => $currentAveragePrice,
            'percentage_change' => abs($percentageChange),
            'arrow_direction' => $arrowDirection
        ];
    }
    public function get_low_quantity_sum() {
        $this->db->select_sum('quantity');
        $this->db->where('quantity <', 100);
        $query = $this->db->get('inventory');
    
        // Fetch the result as an associative array
        $result = $query->row_array();
    
        
        return $result['quantity'] ?? 0; 
    }

    public function get_all_quantity_sum() {
        // Select the sum of all quantities
        $this->db->select_sum('quantity');
        // Remove the unnecessary where clause
        $query = $this->db->get('inventory'); // Ensure the table name is correct
    
        // Fetch the result as an associative array
        $result = $query->row_array();
    
        // Return the sum of quantities, defaulting to 0 if no result
        return $result['quantity'] ?? 0;
    }
    public function get_latest_inventory_quantity() {

        $this->db->order_by('created_at', 'DESC');        
        $this->db->limit(1);
        $query = $this->db->get('inventory');
        
        $result = $query->row_array();
            
        return $result['quantity'] ?? 0;
    }
}
