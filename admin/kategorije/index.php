 
<?php
require 'ControllerKategorije.php';
$controller = new ControllerKategorije();

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action){
        
          case 'goLogin':
                $controller->goLogin();
                break;

                case 'goKorisnici':
                $controller->goKorisnici();
                break;      
        
          case 'goKategorija':
              $controller->kategorije();
              break;

              case 'editKategoriju';
              $controller->goEditKategorije();
              break;
                
            case 'pocetna':
                $controller->pocetna();
                break;

            case 'deleteKategoriju':
            $controller->obrisiKategoriju();
                break;

                case 'goProizvodi':
                $controller->goProizvodi();
                break;

                case 'goInsertKategorija':
                $controller->goInsertKategoriju();
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
                case 'Save':
                $controller->editKategoriju();
                break;
                case 'Insert':
                $controller->insertKategoriju();
                break;
        }
        
}
?>
