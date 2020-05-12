<?php
	require_once '../kolica/ControllerKolica.php';
	$controller = new ControllerKolica();

	$action=isset($_REQUEST['action'])?$_REQUEST['action']:''; 	
	
	switch($_SERVER['REQUEST_METHOD']) {
	    case "GET":
     	switch ($action){
     	    case 'pocetna':
     	        $controller->pocetna();
     	        break;
     	        
     	 
     	 
     	        
     	    case 'gocart':
     	        $controller->gocart();
     	        break;
     	        
     	   
     	        
     		case 'logout':
     			$controller->logout();
     			break;
     		case 'addtocart':
     			$controller->addToCart();
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
     		/*case 'delete':
     		    $controller-> potvrdica();*/
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
     	                case 'potvrda':
     	               $controller->narudzbenica();
     	               $controller-> potvrdica();
     	               
     	                break;
     	        }
		
	}
?>