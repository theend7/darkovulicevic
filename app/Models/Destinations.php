<?php
namespace App\Models;


class Destinations {
    private $db;
    public function __construct(DB $db){
        $this->db = $db;
    }

    public function getDestinations(){
        return $this->db->executeQuery("SELECT * FROM proizvodi");
    }
    public function getOperations(){
        return $this->db->executeQuery("SELECT * FROM aktivnosti");
    }
    public function  oneProduct($id){
        return $this->db->executeOneRow("SELECT * FROM proizvodi WHERE idProizvoda = ?",[$id]);
    }
    public function deleteDestinations($id){
        return $this->db->delete("DELETE FROM proizvodi WHERE idProizvoda = ? ",[$id]);
    }
    public function insertDestinations($picture,$alt,$name,$price){
        return $this->db->insert("INSERT INTO proizvodi (idProizvoda,slika,alt,naziv,cena) VALUES (null,?,?,?,?)",[$picture,$alt,$name,$price]);
    }
    public function updateDestinations($picture,$alt,$name,$price,$id){
        return $this->db->update("UPDATE proizvodi SET slika = ? ,alt= ?,naziv = ? ,cena = ? WHERE idProizvoda = ?",[$picture,$alt,$name,$price,$id]);
    }
    public function getFeatures(){
        return $this->db->executeQuery("SELECT * FROM features");
    }
    public function insertOperationsFromUsers($nameUser,$lastNameUser,$table,$operation){
        return $this->db->insert("INSERT INTO aktivnosti (idAktivnost,ime,prezime,nazivTabele,nazivAktivnosti) VALUES (null,?,?,?,?)",[$nameUser,$lastNameUser,$table,$operation]);
    }
    public function searchDestinations($text){
        return $this->db->executeQuery("SELECT * FROM proizvodi WHERE naziv LIKE '%$text%'");
    }
    public function orderhDestinations($text){
        return $this->db->executeQuery("SELECT * FROM proizvodi ORDER BY cena $text");
    }
    public function orderhDestinationsDESC($text){
        return $this->db->executeQuery("SELECT * FROM proizvodi ORDER BY cena $text");
    }
    
}