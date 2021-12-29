<?php
class Supplier
{

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getSupplier()
    {

        $this->db->query('SELECT * FROM suppliers');
        $results = $this->db->resultSet();
        return $results;
    }

    public function addASupplier($data)
    {
        $this->db->query('INSERT INTO suppliers(name,phone,address) VALUES (:name,:phone,:address)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editASupplier($data)
    {
        $this->db->query('UPDATE suppliers SET name=:name, phone=:phone,address=:address WHERE supplier_id=:supplier_id');
        //Bind values
        $this->db->bind(':supplier_id', $data['supplier_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
       
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteASupplier($id){
        $this->db->query('DELETE FROM suppliers WHERE supplier_id=:supplier_id');
        //Bind values
        $this->db->bind(':supplier_id', $id);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getSupplierById($id)
    {
        $this->db->query('SELECT * FROM suppliers WHERE supplier_id= :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
  
}
