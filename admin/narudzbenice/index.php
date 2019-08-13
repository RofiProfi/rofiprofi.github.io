 
<?php
require 'ControllerNarudzbenice.php';
$controller = new ControllerNarudzbenice();

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'goNarudzbenice';

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action){
        
          case 'goLogin':
                $controller->goLogin();
                break;
        
          case 'goNarudzbenice':
              $controller->narudzbenice();
              break;
                
            case 'pocetna':
                $controller->pocetna();
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
            case 'Login':
                $controller->login();
                break;
            case 'register':
                $controller->register();
                break;
            
        }
        
}
?>
