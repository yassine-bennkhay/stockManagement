<?php
class Category{

    private $db;
    public function __construct()
    {
        $this->db=new Database;
    
    }
    public function getCategory(){

        $this->db->query('SELECT category_id, category_name FROM category ');
        $results=$this->db->resultSet();
        return $results;
    }
}
?>
