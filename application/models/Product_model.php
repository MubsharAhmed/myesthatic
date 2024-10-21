<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function getProductsByBrand($brand_id)
    {
        $this->db->select('categories.name as category, brands.name as brand, products.name as product_type, product_costs.cost as price');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.category_id');
        $this->db->join('brands', 'brands.id = products.brand_id');
        $this->db->join('product_costs', 'product_costs.product_id = products.id');
        $this->db->where('products.brand_id', $brand_id);

        $query = $this->db->get();
        return $query->result_array();
    }




    public function getProductById($productId) {
        return $this->db->get_where('products', ['id' => $productId])->row();
    }


    public function getPriceByProduct($productId) {
        $this->load->model('Product_model');
        $product = $this->Product_model->getProductById($productId);
    
        echo json_encode(['price' => $product->price]);
    }
    
}
