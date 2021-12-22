<?php
class Product{

    private $db;
    public function __construct()
    {
        $this->db=new Database;

    }
    public function getProduct(){
      $this->db->query('SELECT *,
      products.product_id as productId,
      admins.id as clientId
      FROM products
      INNER JOIN admins
      on products.admin_id=admins.id
      
       ');
      $results=$this->db->resultSet();
      return $results;  
    }


    public function addAProduct($data){
      $this->db->query('INSERT INTO products(product_name,buying_price,selling_price,category_id,admin_id) VALUES (:product_name,:buying_price,:selling_price,:category_id,:admin_id)');
      //Bind values
      $this->db->bind(':product_name', $data['product_name']);
      $this->db->bind(':buying_price', $data['buying_price']);
      $this->db->bind(':selling_price', $data['selling_price']);
      $this->db->bind(':category_id', $data['category_id']);
     
      $this->db->bind(':admin_id', $_SESSION['user_id']);
      //execute
      if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
  }
}