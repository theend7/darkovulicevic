<?php
namespace App\Models;

class Uloga {
    private $db;
    public function __construct(DB $db){
        // echo "Uloga kreirana!";
        $this->db = $db;
    }

    public function getAll(){
        return $this->db->executeQuery("SELECT * FROM uloga");
    }
}