<?php
class Dashboards{
    private $db;
    public function __construct()
    {
        $this->db=new Database;
    
    }
    public function tableCount(){
     $result=$this->db->query('SELECT COUNT(*) AS count FROM products');
    $num= $this->db->execute();
   return $num;
    }

}