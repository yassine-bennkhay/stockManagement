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
        $results=$this->db->resultSet();
        return $results;
    }
}
?>
