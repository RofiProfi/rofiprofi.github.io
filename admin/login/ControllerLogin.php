<?php
require_once 'DAOLogin.php';

class ControllerLogin{
    
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
        
include 'narudzbenice/narudzbenice.php' ;   }
    
    
    function goProizvodi(){
  //  header("Location:../?action=goProizvodi");     
    include 'proizvodi/proizvodi.php';
}

    function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location:../admin/?action=logout");
    }
    
    function testInput ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function loginAdmin(){
        $controller=new ControllerLogin();
        $admin_email = isset($_POST['admin_email'])? $controller->testInput($_POST['admin_email']): "";
        $admin_pass = isset($_POST['admin_pass'])? $controller->testInput($_POST['admin_pass']): "";
        
        if(!empty($admin_email) && !empty($admin_pass)){
            $dao = new DAOLogin();
            $admin = $dao->selectAdminByUsernameAndPassword($admin_email,$admin_pass);
            //var_dump($osoba);
            if ($admin){
                // LogIN OK
                // dodavanje ulogovanog u sesiju
                session_start();
                $_SESSION['ulogovan'] = $admin;
                
                
                //include 'pocetna.php';
                //include '../pocetna/pocetna.php'; // i ovde je dodato ovo za pocetnu stranu, ispraviti to!
                header("Location:../pocetna/?action=pocetna");
            }else{
                // LogIN ERROR
                $msg = 'Pogresni parametri za logovanje!!!';
                include '../login/login.php';
            }
        }else{
            $msg = 'Morate popuniti sva polja!!!';
            include '../login/login.php';
        }
    }
}


?>