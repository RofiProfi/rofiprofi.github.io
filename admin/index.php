 
<?php
/*
require 'login/ControllerLogin.php';
$controller = new ControllerLogin();

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action){
        
          case 'gologin':
                $controller->gologin();
                break;
        
            case 'pocetna':
                $controller->pocetna();
                break;
                
                
          case 'goNarudzbenice':
              $controller->narudzbenice();
              break;
         
                
                
            case 'logout':
                $controller->logout();
                break;
            
            default:
                // ZA POGRESNE RUTE IZLOGOVATI KORISNIKA
                $controller->pocetna();
                break;
        }
        
    case "POST":
        switch ($action){
            case 'LoginAdmin':
                $controller->loginAdmin();
                break;
            
            
        }
        
}*/
header("Location:login/?action=gologin");
?>
