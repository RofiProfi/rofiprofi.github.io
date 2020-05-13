 
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
                case 'goKorisnici':
                $controller->goKorisnici();
                break;      
                
            case 'gologin':
                $controller->loginAdmin();
                break;
                
                case 'goNarudzbenice':
              $controller->Idinarudzbenice();
              break;
                case 'goProizvodi':
                $controller->goProizvodi();
            case 'logout':
                $controller->logout();
                break;
            
            
        }
        
    case "POST":
        switch ($action){
            case 'Login':
                $controller->loginAdmin();
                break;
            
            
        }
        
}
?>
