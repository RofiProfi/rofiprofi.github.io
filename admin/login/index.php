 
<?php
require_once 'ControllerLogin.php';
$controller = new ControllerLogin();

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action){
            case 'pocetna':
                $controller->pocetna();
                break;
                
                
            case 'gologin':
                $controller->gologin();
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
