 
<?php
require 'ControllerProizvodi.php';
$controller = new ControllerProizvodi();

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action){
        
          case 'goLogin':
                $controller->goLogin();
                break;
        
          case 'goNarudzbenice':
              $controller->narudzbenice();
              break;
         case 'goProizvodi':
          $controller->goProizvodi();
          break;
          case 'goInsertProizvod':
          $controller->goInsertProizvod(); 
          break;
            case 'pocetna':
                $controller->pocetna();
                break;

            case 'deleteProizvod':
            $controller->obrisiProizvod();
                break;

            case 'goEditProizvod':
         $controller->goEditProizvode();
                break;
            case 'goEditSlikuProizvoda':
                $controller->goEditSlikuProizvode();
                break;
                
            case 'logout':
                $controller->logout();
                break;
         case 'goInsertProizvod':
         $controller->goInsertProizvod();
         break;
         case 'upload':
            $controller->editSlikuProizvoda();
            break; }
        
    case "POST":
        switch ($action){
            case 'Login':
                $controller->login();
                break;
            case 'Save':
                $controller->editProizvode();
                break;
            case 'upload':
            $controller->editSlikuProizvoda();
            break;
            case 'Insert':
            $controller->insertProizvod();
            break;
        }
        
}
?>
