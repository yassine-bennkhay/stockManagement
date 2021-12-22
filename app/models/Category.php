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


    public function addACategory($data){
        $this->db->query('INSERT INTO category(category_name) VALUES (:category_name)');
        //Bind values
        $this->db->bind(':category_name', $data['category_name']);
       
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
