<?php
require_once 'ControllerNarudzbenice.php';

class ControllerNarudzbenice{
    
   /* function pocetna() {
        header("Location:../admin/?action=pocetna");
    }
    
    function pocetna() {
        header("Location:../admin/narudzbenice");
    }*/
    
    function goLogin() {
        header("Location:../login/?action=gologin");
        
    }
    
    
    function narudzbenice() {
include     'narudzbenice.php';   
    }
    
    
    function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location:../admin/");
    }
    
}


?>