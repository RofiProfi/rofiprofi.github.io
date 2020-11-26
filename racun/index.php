<?php
require_once '../racun/ControllerRacun.php';
$controller = new ControllerRacun();

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action) {
            case 'pocetna':
                $controller->pocetna();
                break;


            case 'gologin':
                $controller->gologin();
                break;

            case 'gocart':
                $controller->gocart();
                break;



            case 'logout':
                $controller->logout();
                break;

            case 'deleteJedan':
                $controller->obrisiJedan();
                break;
            case 'deletecart':
                $controller->obrisiSve();
                break;


            case 'goRacun':
                $controller->goRacun();
                break;

                /*case 'product':
                $controller->proizvodByKategodija();
                break;
            case 'delete':
                $controller-> potvrdica();
                break;
                */
            default:
                // ZA POGRESNE RUTE IZLOGOVATI KORISNIKA
                $controller->pocetna();
                break;
        }

    case "POST":
        switch ($action) {
                /* case 'Login':
                $controller->login();
                break;
            case 'register':
                $controller->register();
                break;*/
            case 'potvrda':
                $controller->narudzbenica();
                break;
        }
}
