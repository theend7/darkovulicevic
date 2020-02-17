<?php session_start();


require_once "app/Config/autoload.php";
require "app/Config/database.php";
use app\Models\DB;
$db = new DB(DB_SERVER,DB_DATABASE,DB_USERNAME,DB_PASSWORD);
use app\Controllers\MainController as Main;
use app\Controllers\DestinationController as Destination;
use app\Controllers\LoginController as Login;
use app\Controllers\RegisterController as Register;
use app\Controllers\AutorController as Author;
use app\Controllers\NewsController as News;
use app\Controllers\AdminController as Admin;
use app\Controllers\Controller as Controller;
ob_start();


if(isset($_GET["page"])) {
    switch($_GET["page"]) {
        case "home" : 
            $mainController = new Main($db);
            $mainController->homeStrana();
            $mainController = new Destination($db);
           
            break;
        case "404" : 
            $glavniController = new Controller($db);
            $glavniController->_404();
            break;
        case "403" : 
            $glavniController = new Controller($db);
            $glavniController->_403();
            break;
        case "301" : 
            $glavniController = new Controller($db);
            $glavniController->_301();
            break;
        case "destinations" : 
            $destinationController = new Destination($db);
            $destinationController->destinationPage();
            break;
        case "searchDestinations" : 
            $destinationController = new Destination($db);
            $destinationController->search();
            break;
        case "sortDestinationsASC" : 
            $destinationController = new Destination($db);
            $destinationController->sortDestASC();
            break;
        case "sortDestinationsDESC" : 
            $destinationController = new Destination($db);
            $destinationController->sortDestDESC();
            break;
        
        case "login" : 
            $loginController = new Login($db);
            $loginController->loginStrana();
            $loginController->login($_POST);
            break;
        case "logout" : 
            $loginController = new Login($db);
            $loginController->logout();
            break;
        case "register" : 
            $registerController = new Register($db);
            $registerController->registerStrana();
            $registerController->register($_POST);
            break;
        case "author" : 
            $autorController = new Author($db);
            $autorController->autorStrana();
            break;
        case "news" : 
            $newsController = new News($db);
            $newsController->newsStrana();
            $newsController->insertN($_POST);
            break;
        case "admin" : 
            $adminController = new Admin($db);
            $adminController->adminStrana();
            break;
        case "delete" : 
            $adminController = new Admin($db);
            $adminController->adminStrana();
            $adminController->deleteD($_GET['id']);
            break;
        case "deleteNews" : 
            $newsController = new News($db);
            $newsController->newsStrana();
            $newsController->deleteNews($_GET['idNews']);
            break;
        case "userDel" : 
            $adminController = new Admin($db);
            $adminController->adminStrana();
            $adminController->deleteUser($_GET['idUser']);
            break;
        case "insert" : 
            $insert = new Admin($db);
            $insert->insertStrana();
            $insert->insertDest($_POST);
            break;
        case "update" : 
            $update = new Admin($db);
            $update->updateStrana($_GET['id']);
            $update->updateDest($_POST);
            break;
        case "userUpdate" : 
            $update = new Admin($db);
            $update->updateStrana($_GET['idUser']);
            $update->upKorisnik($_POST);
            break;
        
        
      
           
        
    }
}else{
    $mainController = new Main($db);
    $mainController->homeStrana();
}



