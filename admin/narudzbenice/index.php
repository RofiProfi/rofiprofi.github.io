 
<?php
require 'ControllerNarudzbenice.php';
$controller = new ControllerNarudzbenice();

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
          case 'goNarudzbenice':
              $controller->narudzbenice();
              break;
                 case 'goProizvodi':
          $controller->goProizvodi();
          break;   
            case 'pocetna':
                $controller->pocetna();
                break;

            case 'deleteNarudzbenicu':
            $controller->obrisiNarudzbenicu();
                break;

            case 'goedit':
         $controller->goEditNarudzbenice();
                break;
            case 'logout':
                $controller->logout();
                break;
            //default:
                // ZA POGRESNE RUTE IZLOGOVATI KORISNIKA
              //  $controller->pocetna();
                //break;
        }
        
    case "POST":
        switch ($action){
            case 'Login':
                $controller->login();
                
                break;

            case 'Save';
                $controller->editNarudzbenice();
                break;
        }
        
}
?>
