<?php
class Dashboard_model extends CI_model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}
	function read_shop_current_sale($date)
	{
      $this->db->select();
      $this->db->select_sum('saleQuantity');
      $this->db->select_sum('saleAmount');     
      $this->db->join('employees', 'sales.employeeID = employees.employeeID');
      $this->db->join('shops', 'employees.shopID = shops.shopID');
      $this->db->join('products','sales.productID = products.productID');
      $this->db->join('companies','products.companyID = companies.companyID');         
      $this->db->where('DATE(saleCreated)', $date);      
      $this->db->group_by('employees.shopID');            
      $query = $this->db->get('sales');

      return $query->result_array();
	}
  function read_brand_current_sale($date)
  {
      $this->db->select();
      $this->db->select_sum('saleQuantity');
      $this->db->select_sum('saleAmount');     
      $this->db->join('employees', 'sales.employeeID = employees.employeeID');
      $this->db->join('shops', 'employees.shopID = shops.shopID');
      $this->db->join('products','sales.productID = products.productID');
      $this->db->join('companies','products.companyID = companies.companyID');         
      $this->db->where('DATE(saleCreated)', $date);      
      $this->db->group_by('products.companyID');            
      $query = $this->db->get('sales');

      return $query->result_array();
  }
  function read_shop_brand_sale($date)
  {
      $this->db->select();
      $this->db->select_sum('saleQuantity');
      $this->db->select_sum('saleAmount');     
      $this->db->join('employees', 'sales.employeeID = employees.employeeID');
      $this->db->join('shops', 'employees.shopID = shops.shopID');
      $this->db->join('products','sales.productID = products.productID');
      $this->db->join('companies','products.companyID = companies.companyID');         
      $this->db->where('DATE(saleCreated)', $date);      
      $this->db->group_by('products.companyID');
      $this->db->group_by('shops.shopID');             
      $query = $this->db->get('sales');

      return $query->result_array();
  }

  function read_brand_product_sale($date)
  {
      $this->db->select();
      $this->db->select_sum('saleQuantity');
      $this->db->select_sum('saleAmount');     
      $this->db->join('employees', 'sales.employeeID = employees.employeeID');
      $this->db->join('shops', 'employees.shopID = shops.shopID');
      $this->db->join('products','sales.productID = products.productID');
      $this->db->join('companies','products.companyID = companies.companyID');         
      $this->db->where('DATE(saleCreated)', $date);      
      $this->db->group_by('products.productID');
      // $this->db->group_by('companies.companyID');             
      $query = $this->db->get('sales');

      return $query->result_array();
  }
	 
}