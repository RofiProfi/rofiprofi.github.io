<?php

require 'ControllerPocetna.php';
$controller = new ControllerPocetna();

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action){
        
          case 'gologin':
                $controller->gologin();
                break;
                
          case 'goKorisnici':
                $controller->goKorisnici();
                break;      
        
            case 'pocetna':
                $controller->pocetna();
                break;
                
                
          case 'goNarudzbenice':
              $controller->Idinarudzbenice();
              break;
         
         case 'goKategorija':
              $controller->IdiNaKategorije();
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
            case 'LoginAdmin':
                $controller->loginAdmin();
                break;
            
            
        }
        
}

?>