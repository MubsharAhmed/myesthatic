<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Cost extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'My Esthatic : Product Cost';
        $this->loadViews("frontend/productcost", $this->global, NULL);
    }

    public function ProductCost()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }

        $this->load->model('Cost_model');
        $data['categories'] = $this->Cost_model->getCategories();
        $data['brands'] = $this->Cost_model->getBrands();
        $data['products'] = $this->Cost_model->getProducts();
        $this->global['pageTitle'] = 'My Esthatic : Add Product Cost';
        $this->loadViews("frontend/addproductcost", $this->global, $data, NULL);
    }

    public function addProductCost()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }

        $category_id = $this->input->post('category_id');
        $brand_id = $this->input->post('brand_id');
        $product_id = $this->input->post('product_id');
        $units_per_bottle = $this->input->post('units_per_bottle');
        $quantity = $this->input->post('quantity');
        $cost = $this->input->post('cost');

        if ($quantity != 0) {
            $dividing_cost_product = $cost / $quantity;
        } else {
            $dividing_cost_product = 0;
        }

        $this->load->model('Cost_model');
        $data = [
            'category_id' => $category_id,
            'brand_id' => $brand_id,
            'product_id' => $product_id,
            'units_per_bottle' => $units_per_bottle,
            'quantity' => $quantity,
            'cost' => $cost,
            'dividing_cost_product' => $dividing_cost_product,
        ];

        echo '<pre>';
        print_r($data);
        echo '<pre>';
        // die;

        $this->Cost_model->insert_product_cost($data);

        redirect('cost/index');
    }

    public function getBrandsByCategory($category_id)
    {
        $this->load->model('Cost_model');
        $brands = $this->Cost_model->getBrandsByCategory($category_id);

        // Return brands as JSON
        echo json_encode(['brands' => $brands]);
    }

    public function getProductsByBrand($brand_id)
    {
        $this->load->model('Cost_model');
        $products = $this->Cost_model->getProductsByBrand($brand_id);

        echo json_encode(['products' => $products]);
    }

    public function getUnitsByProduct($productId)
    {
        $this->load->model('Product_model');
        $product = $this->Product_model->getProductById($productId);

        echo json_encode(['units_bottle' => $product->units_bottle]);
    }

    public function getPriceByProduct($productId)
    {
        $this->load->model('Product_model');
        $product = $this->Product_model->getProductById($productId);

        echo json_encode(['price' => $product->price]);
    }

    // public function getProductsByBrandAjax()
    // {
    //     $brandId = $this->input->post('brand_id');
    //     $page = $this->input->post('page');
    //     $limit = 8; 
    
    //     $page = max(1, (int)$page);
    
    //     $offset = ($page - 1) * $limit;
  
    //     $this->db->where('brand_id', $brandId);
    //     $totalCount = $this->db->count_all_results('product_costs');

    //     $totalPages = ceil($totalCount / $limit);

    //     $this->db->select('categories.name AS category_name, brands.name AS brand_name, products.product_name, product_costs.quantity, product_costs.cost');
    //     $this->db->from('product_costs');
    //     $this->db->join('categories', 'product_costs.category_id = categories.id');
    //     $this->db->join('brands', 'product_costs.brand_id = brands.id');
    //     $this->db->join('products', 'product_costs.product_id = products.id');
    //     $this->db->where('product_costs.brand_id', $brandId);
    //     $this->db->limit($limit, $offset);
    //     $query = $this->db->get();
    
    //     $productCosts = $query->result_array();
    
    //     echo json_encode(['products' => $productCosts, 'totalPages' => $totalPages]);
    // }
    public function getProductsByBrandAjax()
    {
        $brandId = $this->input->post('brand_id');
        $page = $this->input->post('page');
        $filter = $this->input->post('filter');
        $startDate = $this->input->post('start_date');
        $endDate = $this->input->post('end_date');
        $limit = 8; 
        $page = max(1, (int)$page);
        $offset = ($page - 1) * $limit;

        $this->db->where('brand_id', $brandId);

        if ($filter === 'today') {
            $this->db->where('DATE(created_at) = CURDATE()');
        } elseif ($filter === 'this_week') {
            $this->db->where("YEARWEEK(created_at, 1) = YEARWEEK(CURDATE(), 1)", NULL, FALSE);
        } elseif ($filter === 'last_week') {
            $this->db->where("YEARWEEK(created_at, 1) = YEARWEEK(CURDATE(), 1) - 1", NULL, FALSE);
        } elseif ($filter === 'this_month') {
            $this->db->where('MONTH(created_at) = MONTH(CURDATE())', NULL, FALSE);
        } elseif ($filter === 'last_month') {
            $this->db->where('MONTH(created_at) = MONTH(CURDATE()) - 1', NULL, FALSE);
        } elseif ($filter === 'calendar') {
            $this->db->where('created_at >=', $startDate . ' 00:00:00');
            $this->db->where('created_at <=', $endDate . ' 23:59:59');
        }

        $this->db->from('product_costs');
        $totalCount = $this->db->count_all_results(); 

        $totalPages = ceil($totalCount / $limit);

        $this->db->select('categories.name AS category_name, brands.name AS brand_name, products.product_name, product_costs.quantity, product_costs.cost');
        $this->db->from('product_costs');
        $this->db->join('categories', 'product_costs.category_id = categories.id');
        $this->db->join('brands', 'product_costs.brand_id = brands.id');
        $this->db->join('products', 'product_costs.product_id = products.id');
        $this->db->where('product_costs.brand_id', $brandId);
        if ($filter === 'today') {
            $this->db->where('DATE(product_costs.created_at) = CURDATE()');
        } elseif ($filter === 'this_week') {
            $this->db->where("YEARWEEK(product_costs.created_at, 1) = YEARWEEK(CURDATE(), 1)", NULL, FALSE);
        } elseif ($filter === 'last_week') {
            $this->db->where("YEARWEEK(product_costs.created_at, 1) = YEARWEEK(CURDATE(), 1) - 1", NULL, FALSE);
        } elseif ($filter === 'this_month') {
            $this->db->where('MONTH(product_costs.created_at) = MONTH(CURDATE())', NULL, FALSE);
        } elseif ($filter === 'last_month') {
            $this->db->where('MONTH(product_costs.created_at) = MONTH(CURDATE()) - 1', NULL, FALSE);
        } elseif ($filter === 'calendar') {
            $this->db->where('product_costs.created_at >=', $startDate . ' 00:00:00');
            $this->db->where('product_costs.created_at <=', $endDate . ' 23:59:59');
        }
    
        // Pagination limit and offset
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
    
        $productCosts = $query->result_array();
    
        // Return response in JSON format
        echo json_encode(['products' => $productCosts, 'totalPages' => $totalPages]);
    }
    
}
