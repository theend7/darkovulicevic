<?php
namespace App\Models;


class Film {
    private $db;
    private $table = "film";

    public function __construct(DB $db){
        $this->db = $db;
    }

    public function getAll(){
    return $this->db->executeQuery("SELECT * FROM {$this->table}");

    }
  
}
