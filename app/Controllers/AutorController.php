<?php

namespace app\Controllers;
use app\Models\Menu;



class AutorController extends Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function autorStrana() {
        try{
            $menu1 = new Menu($this->db);
            $menu = $menu1->getMenu();
            $this->data['menu'] = $menu;
            $this->loadView("author",$this->data);
            \http_response_code(200);
        }
        catch(Exception $ex){
            $this->insertErrorInFile($ex->getMessage());
            \http_response_code(500);
        }  
       
    }

 

}