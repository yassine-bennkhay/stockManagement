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
    public function editACategory($data){
        $this->db->query('UPDATE category SET category_name=:category_name WHERE category_id=:category_id');
        //Bind values
        $this->db->bind(':category_name', $data['category_name']);
        $this->db->bind(':category_id', $data['category_id']);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCategoryById($id)
    {
        $this->db->query('SELECT * FROM category WHERE category_id= :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}
?>
