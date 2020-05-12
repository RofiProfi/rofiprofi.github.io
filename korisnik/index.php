 
<?php
require_once '../korisnik/ControllerKorisnik.php';
$controller = new ControllerKorisnik();

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action){
            case 'pocetna':
                $controller->pocetna();
                break;
                
                // case 'potvrda':
                // $controller->potvrda();
                //  break;
                
            case 'gologin':
                $controller->gologin();
                break;
                
            case 'gocart':
                $controller->gocart();
                break;
            case 'goAccount':
                $controller->goAccount();
                break;
                
            case 'goregister':
                $controller->goRegister();
                break;
                
            case 'logout':
                $controller->logout();
                break;
            case 'addtocart':
                $controller->addTokolica();
                break;
            case 'deleteJedan':
                $controller->obrisiJedan();
                break;
            case 'deletecart':
                $controller->obrisiSve();
                break;
            case 'confirmshopping':
                $controller->confirmShopping();
                break;
                
            case 'goRacun':
                $controller->goRacun();
                break;
                
            case 'product':
                $controller->proizvodByKategodija();
                break;
            case 'delete':
                $controller-> potvrdica();
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
                case 'Promeni':
                $controller->promeniSifru();
                break;
            case 'potvrda':
                $controller->narudzbenica();
                break;
        }
        
}
?>
