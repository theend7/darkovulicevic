<?php

namespace app\Controllers;
use app\Models\Menu;
use app\Models\Destinations;



class MainController extends Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    

    public function homeStrana() {
        try{
        $menu1 = new Menu($this->db);
        $menu = $menu1->getMenu();
        $feat = new Destinations($this->db);
        $features = $feat->getFeatures();
        $this->data['features'] = $features;
        $this->data['menu'] = $menu;
        $this->loadView("main",$this->data);
        \http_response_code(200);
        }
        catch(Exception $ex){
            $this->insertErrorInFile($ex->getMessage());
            \http_response_code(500);
        }  
        
    }

   

}