 
<?php
require 'ControllerKorisnici.php';
$controller = new ControllerKorisnici();

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action){
        
          case 'goLogin':
                $controller->goLogin();
                break;
        
          case 'goKategorija':
              $controller->kategorije();
              break;

              case 'editKorisnika':
              $controller->goEditKorisnici();
              break;
                case 'goKorisnici':
                $controller->korisnici();
                break;

            case 'deleteKorisnika':
            $controller->obrisiKorisnika();
                break;

                case 'goProizvodi':
                $controller->goProizvodi();
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
                $controller->editKorisnika();
                break;
        }
        
}
?>
