<?php
class Dashboards{
    private $db;
    public function __construct()
    {
        $this->db=new Database;
    
    }
    public function productsCount(){
        $this->db->query('SELECT COUNT(*) AS nbrOfProducts FROM products');
        $count = $this->db->single();
        return $count->nbrOfProducts;

    }

    public function customersCount(){
        $this->db->query('SELECT COUNT(*) AS nbrOfCustomers FROM clients');
        $count=$this->db->single();
        return $count->nbrOfCustomers;
    }
    public function suppliersCount(){

        $this->db->query('SELECT COUNT(*) AS nbrOfSuppliers FROM suppliers');
        $count=$this->db->single();
        return $count->nbrOfSuppliers;
    }
    public function ordersCount(){
        $this->db->query('SELECT COUNT(*) AS nbrOfOrders FROM orders');
        $count=$this->db->single();
        return $count->nbrOfOrders;
    }

}