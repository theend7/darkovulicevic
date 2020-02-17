<?php
namespace App\Models;

class DB {
    private $server;
    private $database;
    private $username;
    private $password;

    public $conn;
    
    

    public function __construct($server, $database, $username, $password){
        $this->server = $server;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password; 
        $this->connect();
        $this->accessPageByUser();
    }

   

    private function connect(){
        $this->conn = new \PDO("mysql:host={$this->server};dbname={$this->database};charset=utf8", $this->username, $this->password);
        $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery(string $query){
        return $this->conn->query($query)->fetchAll();
    }
  

    public function executeOneRow(string $query, Array $params){
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
        return $prepare->fetch();
    }
    public function update(string $query, Array $params){
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
     }
    public function accessPageByUser(){
        $open = fopen(LOG_FILE,"a");
        if($open){
            if(isset($_GET['page'])){
                fwrite($open,$_SERVER['PHP_SELF']."\t".$_SERVER['REMOTE_ADDR']."\t".date("Y/m/d")."\t".date(DATE_RFC2822)."\t".$_GET['page']."\n");
            }
            fclose($open);
        }
    } 
    public function insertErrorInFile($err){
        $open = fopen(ERRORS,"a");
        if($open){
                fwrite($open,$err."\n");
            fclose($open);
        }
    } 
    public function insert(string $query, Array $params){
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
     }
     public function delete(string $query,Array $params){
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
     }
     
}