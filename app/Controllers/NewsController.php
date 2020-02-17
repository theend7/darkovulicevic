<?php

namespace app\Controllers;
use app\Models\Menu;
use app\Models\News;




class NewsController extends Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function newsStrana() {
        $menu1 = new Menu($this->db);
        $menu = $menu1->getMenu();
        $this->data['menu'] = $menu;
        $newsDisplay = new News($this->db);
        $news = $newsDisplay->getNews();
        $this->data['news'] = $news;
        $this->loadView("news",$this->data);
    }
    public function insertN($request){
        if(isset($request['ubaciVest'])){
            $news = new News($this->db);
            $name = $request['name'];
            $lastName = $request['lastName'];
            $email = $request['email'];
            $message = $request['message'];
            $errors = [];
            $regularName= "/^([A-Z][a-z]{2,11})+$/";
            $regularlastName = "/^([A-Z][a-z]{2,15})+$/";
            $regularEmail = "/^\b[\w.-]+@[\w.-]+(\.[\w.-]+)*\.[A-Za-z]{2,4}\b$/";
            $err = [];
            $operation = "Insert";
            $table = "Vesti";
            $nameUser = $_SESSION['noviUser']->ime;
            $lastNameUser = $_SESSION['noviUser']->prezime;
            $news->insertOperationsFromUsers($nameUser,$lastNameUser,$table,$operation);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                // echo "Nije ok email!";
                $err[] = "Nije email ok!";
            }
            if(!preg_match($regularName,$name)){
                $err[] = "Nije ime ok!";
            }
            if(!preg_match($regularlastName,$lastName)){
                $err[] = "Nije prezime ok!";
            }
            if(!preg_match($regularEmail,$email)){
                $err[] = "Nije email ok!";
            }
            if(count($err) > 0){
               
            }else{
                if($name =="" || $lastName == "" || $email =="" || $message == ""){

                }
                else{
                    try{
                        $newsInsert = $news->insertNews($name, $lastName, $message, $email);
                        if($newsInsert){
                            \http_response_code(201);
                        }else{
                            \http_response_code(401);
                        }
                        $successInsert = "The news was successfully sent";
                        $this->data['news'] = $successInsert;
                        
                    }  
                    catch(Exception $ex){
                        $this->insertErrorInFile($ex->getMessage());
                        \http_response_code(500);
                    } 
                     
                }
                header("Location: index.php?page=news");
            }
            
        } else {
            \http_response_code(404);
        }
       
    }
    public function deleteNews($idNews){
        try{
            $newsD = new News($this->db);
            $del = $newsD->removeNews($idNews);
            $operation = "Delete";
            $table = "Vesti";
            $nameUser = $_SESSION['noviUser']->ime;
            $lastNameUser = $_SESSION['noviUser']->prezime;
            $newsD->insertOperationsFromUsers($nameUser,$lastNameUser,$table,$operation);
            \http_response_code(204);
            header("Location: index.php?page=news");
        }
        catch(Exception $ex){
            $this->insertErrorInFile($ex->getMessage());
            \http_response_code(500);
        } 
      
    }
    

 

}