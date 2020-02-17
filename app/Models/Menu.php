<?php
namespace App\Models;

class Menu {
    private $db;
    public function __construct(DB $db){
        $this->db = $db;
    }

    public function getMenu(){
        return $this->db->executeQuery("SELECT * FROM linkovi");
    }
}