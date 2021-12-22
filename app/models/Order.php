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

}