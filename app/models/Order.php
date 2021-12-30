<?php

class Order{

    private $db;
    public function __construct()
    {
        $this->db=new Database;

    }
    public function getOrder(){
      $this->db->query('SELECT *,
      orders.order_id as orderId,
      clients.client_id as clientId
      FROM orders
      INNER JOIN clients
      on orders.client_id=clients.client_id
      
       ');
      $results=$this->db->resultSet();
      return $results;  
    }

    
    public function addAnOrder($data)
    {
        $this->db->query('INSERT INTO orders(client_id) VALUES (:client_id)');
        $this->db->bind(':client_id', $data['client_id']);

        if ($this->db->execute()) {
            $sql = "SELECT order_id FROM `orders` ORDER BY order_id DESC LIMIT 1";
            $this->db->query($sql);
            $this->db->execute();
            $result = $this->db->resultSet();
            $id = $result[0]->order_id;

            $this->db->query('INSERT INTO product_order(product_id,quantity,order_id) VALUES (:product_id,:quantity,:id)');

            $this->db->bind(':id', $id);
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->execute();

            return true;
        } else {
            return false;
        }  
    }
}