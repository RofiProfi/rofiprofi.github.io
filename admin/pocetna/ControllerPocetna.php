<?php
class ControllerPocetna{
    
    function pocetna() {
       include '../pocetna/pocetna.php'; //ovo je dodanto ali ne valja valjda

       // include ''
    }
    
    function gologin() {
        include '../login/login.php';
        
    }

    function goKorisnici() {
        include '../korisnici/korisnici.php';
        
    }
    
    function Idinarudzbenice() {
     //include 'narudzbenice/narudzbenice.php';
     header("Location:../narudzbenice");
 }    

 function goProizvodi(){
   // header("Location:../?action=goProizvodi");     
    include '../proizvodi/proizvodi.php';
}
    
    function IdiNaKategorije(){
    header("Location:../kategorije");
 
    }
    function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location:../admin/?action=logout");
    }
    
}
?>