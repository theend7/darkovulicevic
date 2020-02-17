<?php 
namespace App\Errors;

class Errros{
    private $db;

    public function __construct(DB $db){
        $this->db = $db;
    }
    public function Error($err){
        return this->db->insertErrorInFile($err);
    }
}