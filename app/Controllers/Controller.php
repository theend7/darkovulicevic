<?php 

namespace app\Controllers;
use app\Models\Errors;

class Controller {

    protected function loadView($view,$data=null) {
        include 'app/Views/fixed/header.php';
        include 'app/Views/pages/' . $view . ".php";
        include 'app/Views/fixed/footer.php';
    }
    public function redirect($page){
        header("Location: index.php?page=".$page);
    }
    protected function loadViewError($view) {
        include 'app/Views/pages/' . $view . ".php";
    }
    public function _404(){
        $this->loadViewError("404");
    }
    public function _403(){
        $this->loadViewError("403");
    }
    public function _301(){
        $this->loadViewError("301");
    }
    public function Error($err){
        $modelErr = new Errors($this->db);
        $modelErr->Error($err);
    }

    

}