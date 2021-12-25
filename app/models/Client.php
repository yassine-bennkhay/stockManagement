<?php

class Client
{

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getClient()
    {
        $this->db->query('SELECT *FROM clients');
        $results = $this->db->resultSet();
        return $results;
    }

    public function addACustomer($data)
    {
        $this->db->query('INSERT INTO clients(name,phone,address) VALUES (:name,:phone,:address)');
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

    
    public function editACustomer($data)
    {
        $this->db->query('UPDATE clients SET name=:name, phone=:phone,address=:address WHERE client_id=:client_id');
        //Bind values
        $this->db->bind(':client_id', $data['client_id']);
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




    public function deleteACustomer($id){
        $this->db->query('DELETE FROM clients WHERE client_id=:client_id');
        //Bind values
        $this->db->bind(':client_id', $id);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getCustomerById($id)
    {
        $this->db->query('SELECT * FROM clients WHERE client_id= :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}

