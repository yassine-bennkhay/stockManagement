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
      category.category_id as categoryId
      FROM products
      INNER JOIN category
      on products.category_id= category.category_id
      
       ');
      $results=$this->db->resultSet();
      return $results;  
    }


    public function addAProduct($data){
      $this->db->query('INSERT INTO products(product_name,buying_price,selling_price,category_id,admin_id,image_url,quantity) VALUES (:product_name,:buying_price,:selling_price,:category_id,:admin_id,:image_url,:quantity)');
      //Bind values
      $this->db->bind(':product_name', $data['product_name']);
      $this->db->bind(':buying_price', $data['buying_price']);
      $this->db->bind(':selling_price', $data['selling_price']);
      $this->db->bind(':category_id', $data['category_id']);
      $this->db->bind(':admin_id', $data['admin_id']);
      $this->db->bind(':quantity', $data['quantity']);
    $this->db->bind(':image_url', $data['image_url']);
      //execute
      if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
  }

  public function editAProduct($data){
    $this->db->query('UPDATE products SET product_name =:product_name,buying_price=:buying_price,selling_price=:selling_price,category_id=:category_id,quantity=:quantity,admin_id=:admin_id WHERE product_id=:product_id;');
    //Bind values
 
    $this->db->bind(':product_name', $data['product_name']);
    $this->db->bind(':buying_price', $data['buying_price']);
    $this->db->bind(':selling_price', $data['selling_price']);
    $this->db->bind(':category_id', $data['category_id']);
    $this->db->bind(':product_id', $data['product_id']);
    $this->db->bind(':quantity', $data['quantity']);
   $this->db->bind(':admin_id', $_SESSION['user_id']);
    //execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}
public function getProductById($id)
    {
        $this->db->query('SELECT *, products.product_id as productId, category.category_id as categoryId FROM products INNER JOIN category on products.category_id= category.category_id WHERE product_id= :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }


    public function deleteAProduct($id){
      $this->db->query('DELETE FROM products WHERE product_id=:product_id');
      //Bind values
      $this->db->bind(':product_id', $id);
      //execute
      if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
  }
}