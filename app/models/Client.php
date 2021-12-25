<?php

class Client{

private $db;
public function __construct()
{
    $this->db=new Database;
}
public function getClient(){
    $this->db->query('SELECT *FROM clients');
    $results=$this->db->resultSet();
    return $results;
}

public function addACustomer($data){
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
}
?>