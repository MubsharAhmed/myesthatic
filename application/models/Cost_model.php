<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cost_model extends CI_Model
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
    // Get brands
    public function getBrands()
    {
        $query = $this->db->get('brands');
        return $query->result();
    }
    // Get products
    public function getProducts()
    {
        $query = $this->db->get('products');
        return $query->result();
    }
    // Insert product cost (as previously defined)
    public function insert_product_cost($data)
    {
        return $this->db->insert('product_costs', $data);
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
}
