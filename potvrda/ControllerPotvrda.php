<?php
session_start();

require_once '../potvrda/DAOPotvrda.php';

class ControllerPotvrda
{

    public function pocetna()
    {
        $dao = new DAOPotvrda();

        header("Location:../korisnik");
    }

    public function gologin()
    {
        include '../login/login.php';
    }

    public function gocart()
    {
        include '..kolica/cart.php';
    }

    function goRegister()
    {
        include '../login/login.php';
    }

    function goRacun()
    {
        include '../racun/racun.php';
    }
    //function potvrda(){
    // include 'potvrda.php';
    // }




    public function logout()
    {
        // session_unset();
        session_destroy();
        header("Location:../korisnik/?action=pocetna");
    }




    function potvrdica()
    {
        // unset($_SESSION['korpa']); 
        $dao = new DAOPotvrda();
        $dao->deletekolica($_SESSION['ulogovan']["customer_id"]);
        include 'potvrda.php';
    }
}
