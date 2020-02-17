<?php
namespace app\Controllers;
use app\Models\Menu;
use app\Models\Korisnik;





class LoginController extends Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function login($request){
        if(isset($request['login'])){
            $user1 = new Korisnik($this->db);
            $email = $request['email'];
            $password = $request['password'];

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                // echo "Nije ok email!";
                $_SESSION['errors']= "Nije email ok!";
            }
            else {
                try{
                    $user = $user1->getUser($email,$password);
                        if($user){
                            $_SESSION['noviUser'] = $user;
                            \http_response_code(200);
                            header("Location:index.php?page=home");
                        } else {
                            header("Location:index.php?page=login&trylogin=try");
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
    public function logout(){
        $_SESSION['noviUser'] = null;
        $this->redirect('home');
    }

    public function loginStrana(){
        if(isset($_SESSION['noviUser'])){
            if($_SESSION['noviUser']->idUloga == 1 || $_SESSION['noviUser']->idUloga == 2 ){
                $this->redirect("home");
            }
            else{
                $this->redirect("home");
            }
        }
        else{
            $menu1 = new Menu($this->db);
            $menu = $menu1->getMenu();
            $this->data['menu'] = $menu;
            $this->loadView("login",$this->data);
        }
        
            
        
       
    }
    
  
    
   

   

}