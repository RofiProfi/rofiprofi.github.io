<?php
require_once 'DAOLogin.php';

class ControllerLogin{
    
    function pocetna() {
        header("Location:../admin/?action=pocetna");
    }
    
    function gologin() {
        include 'login.php';
        
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
    
    function login(){
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
                include '../admin/narudzbenice/narudzbenice.php';
                
            }else{
                // LogIN ERROR
                $msg = 'Pogresni parametri za logovanje!!!';
                include 'login.php';
            }
        }else{
            $msg = 'Morate popuniti sva polja!!!';
            include 'login.php';
        }
    }
}


?>