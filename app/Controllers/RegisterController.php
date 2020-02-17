<?php

namespace app\Controllers;
use app\Models\Menu;
use app\Models\Korisnik;



class RegisterController extends Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function registerStrana(){
        if(isset($_SESSION['noviUser'])){
            $this->redirect("home");
        }
        else{
            $menu1 = new Menu($this->db);
            $menu = $menu1->getMenu();
            $this->data['menu'] = $menu;
            $this->loadView("register",$this->data);
        }
        
    }
    public function register($request){
        if(isset($request['dugme'])){
            $user1 = new Korisnik($this->db);
            $name = $request['ime'];
            $lastName = $request['prezime'];
            $email = $request['email'];
            $username = $request['user'];
            $password = $request['password'];
            $errors = [];
            $regularName= "/^([A-Z][a-z]{2,11})+$/";
            $regularlastName = "/^([A-Z][a-z]{2,15})+$/";
            $regularEmail = "/^\b[\w.-]+@[\w.-]+(\.[\w.-]+)*\.[A-Za-z]{2,4}\b$/";
            $regularUser = "/^[A-z]{4,16}[\d]+$/";
            $regularPassword = "/^[a-z]{4,16}[\d]+$/";
            $err=[];
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
            if(!preg_match($regularUser,$username)){
                $err[] = "Nije user ok!";
            }
            if(!preg_match($regularPassword,$password)){
                $err[] = "Nije password ok!";
            }
            if(count($err) > 0){
               
            }else{
                try{
                    $userRegister = $user1->registerUser($name, $lastName, $email, $username, $password);
                    if($userRegister){
                        \http_response_code(201);
                    }else{
                        \http_response_code(401);
                    }
                }  
                catch(Exception $ex){
                    $this->insertErrorInFile($ex->getMessage());
                    \http_response_code(500);
                }   
            
            }
           
        } else {
            \http_response_code(404);
        }
       
    }

    

 

}