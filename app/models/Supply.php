<?php
class Supply{

    private $db;
    public function __construct()
    {
        $this->db=new Database;
    
    }
    public function getSupply(){

        $this->db->query('SELECT *, 
        supplies.supply_id , 
        suppliers.supplier_id
         FROM supplies JOIN suppliers 
         on supplies.supplier_id=suppliers.supplier_id;');
        $results = $this->db->resultSet(PDO::FETCH_ASSOC);
        return $results;
    }
    public function getinfo()
    {

        $this->db->query('
        
        SELECT supplies.supply_id,product_supplies.quantity,products.product_name FROM `supplies` join product_supplies JOIN products on supplies.supply_id=product_supplies.supplies_id and products.product_id=product_supplies.product_id;

        ');
        $results = $this->db->resultSet(PDO::FETCH_ASSOC);
        return $results;
    }





    public function addASupply($data)
    {
        $this->db->query('INSERT INTO supplies(supplier_id) VALUES (:supplier_id)');
        $this->db->bind(':supplier_id', $data['supplier_id']);

        if ($this->db->execute()) {
            $sql = "SELECT supply_id FROM `supplies` ORDER BY supply_id DESC LIMIT 1";
            $this->db->query($sql);
            $this->db->execute();
            $result = $this->db->resultSet();
            $id = $result[0]->supply_id;

            $this->db->query('INSERT INTO product_supplies(product_id,supplies_id,quantity) VALUES (:product_id,:id,:quantity)');

            $this->db->bind(':id', $id);
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->execute();

            return true;
        } else {
            return false;
        }  
    }


    // public function getSupplyById($id)
    // {
    //     $this->db->query('SELECT * FROM supplies WHERE supply_id= :id');
    //     $this->db->bind(':id', $id);
    //     $row = $this->db->single();
    //     return $row;
    // }

    // public function getSupplyProductsById($id)
    // {
    //     $this->db->query('SELECT * FROM product_supplies WHERE supplies_id= :id');
    //     $this->db->bind(':id', $id);
    //     $row = $this->db->single();
    //     return $row;
    // }



}
?>
