<?php
namespace app\Controllers;
use app\Models\Destinations;
use app\Models\Menu;




class DestinationController extends Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function destinationPage() {
        $menu1 = new Menu($this->db);
        $destinations1 = new Destinations($this->db);
        $destination = $destinations1->getDestinations();
        $this->data['destination'] = $destination;
        $menu = $menu1->getMenu();
        $this->data['menu'] = $menu;
        $this->loadView("destinations",$this->data);
    }
    public function search(){
        try{
        $text = $_POST['queryA'];
        $destinations = new Destinations($this->db);
        
            $valueDestination = $destinations->searchDestinations($text);
            header("Content-type: application/json");
            echo json_encode($valueDestination);
            \http_response_code(200);
        }
        catch(Exception $ex){
            $this->insertErrorInFile($ex->getMessage());
            \http_response_code(500);
        }  
      
    }
    public function sortDestASC(){
        try{
            $asc = $_POST['asc'];
            $destinations = new Destinations($this->db);
            $valueDestination = $destinations->orderhDestinations($asc);
            header("Content-type: application/json");
            echo json_encode($valueDestination);
            \http_response_code(200);
        }
        catch(Exception $ex){
            $this->insertErrorInFile($ex->getMessage());
            \http_response_code(500);
        }  
       
    }
    public function sortDestDESC(){
        try{
        $desc = $_POST['desc'];
        $destinations = new Destinations($this->db);
        $valueDestination = $destinations->orderhDestinationsDESC($desc);
        header("Content-type: application/json");
        echo json_encode($valueDestination);
        \http_response_code(200);
        }
        catch(Exception $ex){
            $this->insertErrorInFile($ex->getMessage());
            \http_response_code(500);
        }  
    }

   
    
  

}