<?php
namespace App\Models;

class Korisnik {
    private $db;

    public function __construct(DB $db){
        $this->db = $db;
    }

    public function getUser($email, $password){
        return $this->db->executeOneRow("SELECT idKorisnik, ime, prezime, email, idUloga FROM korisnici WHERE email = ? AND lozinka=md5(?)", [$email, $password]);
    }
    public function printUser(){
        return $this->db->executeQuery("SELECT * FROM korisnici");
    }
    public function printOneUser($id){
        return $this->db->executeOneRow("SELECT * FROM korisnici WHERE idKorisnik = ? ",[$id]);
    }
    public function removeUser($idUser){
        return $this->db->delete("DELETE FROM korisnici WHERE idKorisnik = ? ",[$idUser]);
    }
    public function registerUser($name, $lastName, $email, $username, $password){
        return $this->db->insert("INSERT INTO korisnici (ime,prezime,email,username,lozinka,idUloga) VALUES(?, ?, ?, ?,MD5(?),2)",[$name,$lastName,$email,$username,$password]);
    }
    public function updateKorisnik($name,$lastName,$email,$username,$idUloga,$id){
        return $this->db->update("UPDATE korisnici SET ime = ? ,prezime = ?,email = ? ,username = ?,idUloga = ?  WHERE idKorisnik = ?",[$name,$lastName,$email,$username,$idUloga,$id]);
    }
    public function insertOperationsFromUsers($nameUser,$lastNameUser,$table,$operation){
        return $this->db->insert("INSERT INTO aktivnosti (idAktivnost,ime,prezime,nazivTabele,nazivAktivnosti) VALUES (null,?,?,?,?)",[$nameUser,$lastNameUser,$table,$operation]);
    }
}