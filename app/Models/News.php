<?php
namespace App\Models;

class News {
    private $db;
    public function __construct(DB $db){
        $this->db = $db;
    }
    public function getNews(){
        return $this->db->executeQuery("SELECT * FROM vesti");
    }

    public function insertNews($name, $lastName, $message, $email){
        return $this->db->insert("INSERT INTO vesti (idVesti,imeKorisnika,prezimeKorisnika,vestKorisnika,emailKorisnika) VALUES(null,?, ?, ?, ?)",[$name, $lastName, $message, $email]);
    }
    public function removeNews($idNews){
        return $this->db->delete("DELETE FROM vesti WHERE idVesti = ? ",[$idNews]);
    }
    public function insertOperationsFromUsers($nameUser,$lastNameUser,$table,$operation){
        return $this->db->insert("INSERT INTO aktivnosti (idAktivnost,ime,prezime,nazivTabele,nazivAktivnosti) VALUES (null,?,?,?,?)",[$nameUser,$lastNameUser,$table,$operation]);
    }
}