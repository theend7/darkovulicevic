<?php
namespace app\Controllers;
use app\Models\Menu;
use app\Models\Destinations;
use app\Models\Korisnik;






class AdminController extends Controller {
    private $db;
    

    public function __construct($db) {
        $this->db = $db;
    }
    public function adminStrana() {
        if(isset($_SESSION['noviUser'])){
            if($_SESSION['noviUser']->idUloga == 1){
                $menu1 = new Menu($this->db);
                $menu = $menu1->getMenu();
                $product1 = new Destinations($this->db);
                $product = $product1->getDestinations();
                $korisnik = new Korisnik($this->db);
                $korisnikView = $korisnik->printUser();
                $dataOperations = $product1->getOperations();
                $this->data['menu'] = $menu;
                $this->data['destinations'] = $product;
                $this->data['korisnici'] = $korisnikView;
                $this->data['operations'] = $dataOperations;
                $this->loadView("admin",$this->data);
            }
            else{
                $this->redirect("home");
            }
        }
        else{
            $this->redirect("home");
        }
       
       
    }
    public function insertStrana() {
        if(isset($_SESSION['noviUser'])){
            if($_SESSION['noviUser']->idUloga == 1){
                $menuInsert = new Menu($this->db);
                $menuI = $menuInsert->getMenu();
                $this->data['menu'] = $menuI;
                $this->loadView("insert",$this->data);
            }
            else{
                $this->redirect("home");
            }
        }
        else{
            $this->redirect("home");
        }
    
    }
    public function updateStrana($id) {
        if(isset($_SESSION['noviUser'])){
            if($_SESSION['noviUser']->idUloga == 1){
                $menuUpdate = new Menu($this->db);
                $destinationsUpdate = new Destinations($this->db);
                $menuIspis = $menuUpdate->getMenu();
                $destinationsU = $destinationsUpdate->oneProduct($id);
                $korisnik = new Korisnik($this->db);
                $korisnikView = $korisnik->printOneUser($id);
                $this->data['menu'] = $menuIspis;
                $this->data['destinations'] = $destinationsU;
                $this->data['korisnik'] = $korisnikView;
                $this->loadView("update",$this->data);
            }
            else{
                $this->redirect("home");
            }
        }
        else{
            $this->redirect("home");
        }
    }
    public function deleteD($idProduct){
        try{
            $productD = new Destinations($this->db);
            $del = $productD->deleteDestinations($idProduct);
            $operation = "Delete";
            $table = "Destinations";
            $nameUser = $_SESSION['noviUser']->ime;
            $lastNameUser = $_SESSION['noviUser']->prezime;
            $productD->insertOperationsFromUsers($nameUser,$lastNameUser,$table,$operation);
            \http_response_code(204);
            header("Location: index.php?page=admin");
        }
        catch(Exception $ex){
            $this->insertErrorInFile($ex->getMessage());
            \http_response_code(500);
        }  
       
        
    }
    public function deleteUser($idUser){
        try{
            $korisnikD = new Korisnik($this->db);
            $delK = $korisnikD->removeUser($idUser);
            $operation = "Delete";
            $table = "Korisnici";
            $nameUser = $_SESSION['noviUser']->ime;
            $lastNameUser = $_SESSION['noviUser']->prezime;
            $korisnikD->insertOperationsFromUsers($nameUser,$lastNameUser,$table,$operation);
            \http_response_code(204);
            header("Location: index.php?page=admin");
        }
        catch(Exception $ex){
            $this->insertErrorInFile($ex->getMessage());
            \http_response_code(500);
        }  
       
        
    }
    public function updateDest($request){
        if(isset($request['update'])){
            $destSend = new Destinations($this->db);
            $id = $request['id'];
            $picture = $request['picture'];
            $alt = $request['alt'];
            $name = $request['name'];
            $price = $request['price'];
            $operation = "Update";
            $table = "Destinations";
            $nameUser = $_SESSION['noviUser']->ime;
            $lastNameUser = $_SESSION['noviUser']->prezime;
            $destSend->insertOperationsFromUsers($nameUser,$lastNameUser,$table,$operation);
            try{
                $sendDestinations = $destSend->updateDestinations($picture,$alt,$name,$price,$id);
                \http_response_code(204);
                header("Location: index.php?page=admin");
            }  
            catch(Exception $ex){
                $this->insertErrorInFile($ex->getMessage());
                \http_response_code(500);
            }     
            
 
        }
    }
    public function upKorisnik($request){
        if(isset($request['update'])){
            $upKorisnik = new Korisnik($this->db);
            $id = $request['id'];
            $name = $request['name'];
            $lastName = $request['lastName'];
            $email = $request['email'];
            $username = $request['username'];
            $idUloga = $request['idUloga'];
            $operation = "Update";
            $table = "Korisnici";
            $nameUser = $_SESSION['noviUser']->ime;
            $lastNameUser = $_SESSION['noviUser']->prezime;
            $upKorisnik->insertOperationsFromUsers($nameUser,$lastNameUser,$table,$operation);
            try{
                $updateKorisnik = $upKorisnik->updateKorisnik($name,$lastName,$email,$username,$idUloga,$id);
                \http_response_code(204);
                header("Location: index.php?page=admin");
            }  
            catch(Exception $ex){
                $this->insertErrorInFile($ex->getMessage());
                \http_response_code(500);
            }     
            
 
        }
    }
    public function insertDest($request){
        if(isset($request['insert'])){
            $destInsert = new Destinations($this->db);
            $alt = $request['alt'];
            $name = $request['name'];
            $price = $request['price'];
            $operation = "Insert";
            $table = "Destinations";
            $nameUser = $_SESSION['noviUser']->ime;
            $lastNameUser = $_SESSION['noviUser']->prezime;
            $destInsert->insertOperationsFromUsers($nameUser,$lastNameUser,$table,$operation);

            $picture_name = $_FILES['picture']['name'];
            $picture_tmp = $_FILES['picture']['tmp_name'];
            $picture_type = $_FILES['picture']['type'];
            $picture_size = $_FILES['picture']['size'];

            $picture_format = ["image/jpg","image/jpeg","image/png","image/gif"];
            $err = [];
            
            if(!in_array($picture_type,$picture_format)){
                $err[] = "Picture type is wrong!";
            }
            if($picture_size > 3000000){
                $err[] = "Picture size is to big!";
            }
            if(count($err) > 0){

            }
            else{
                if($alt == "" || $name =="" || $price == ""){
        
                }else{
                    $pictureName = time().$picture_name;
                    $picturePath = 'app/assets/images/'.$pictureName;
                    

                    if(move_uploaded_file($picture_tmp,$picturePath)){
                        try{
                            $insertDest = $destInsert->insertDestinations($picturePath,$alt, $name, $price);
                            \http_response_code(201);
                            header("Location: index.php?page=admin");
                        }  
                        catch(Exception $ex){
                            $this->insertErrorInFile($ex->getMessage());
                            \http_response_code(500);
                        }  
                    }
                }
            }
          
            
 
        }
    }
   
}