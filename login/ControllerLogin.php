<?php

require_once '../login/DAOLogin.php';

class ControllerLogin{

    public function pocetna() {       
        header("Location:../korisnik/?action=pocetna");
    }
    
    public function gologin() {
       include 'login.php';
        
    }
    
    public function gocart() {
        include '../kolica/cart.php';
    }
    
    function goRegister() {
        include '../login/login.php';
    }
    
    function goRacun(){
        include '../racun/racun.php';
    }
  
    function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location:../korisnik/?action=pocetna");
    }
    
    function testInput ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
        
	 function login(){
	    $controller=new ControllerLogin();
	    $customer_email = isset($_POST['customer_email'])? $controller->testInput($_POST['customer_email']): "";
	    $customer_pass = isset($_POST['customer_pass'])? $controller->testInput($_POST['customer_pass']): "";
	    
	    if(!empty($customer_email) && !empty($customer_pass)){
	        $dao = new DAOLogin();
	        $klijent = $dao->selectKlijentByUsernameAndPassword($customer_email,$customer_pass);
	        
	        if ($klijent){
	            // LogIN OK
	            // dodavanje ulogovanog u sesiju
	            session_start();
	            $_SESSION['ulogovan'] = $klijent;
	            
	            
	            //include 'pocetna.php';
	            header("Location:../korisnik/");
	        }else{
	            // LogIN ERROR
	            $msg = 'Pogresni email ili sifra!';
	            include 'login.php';
	        }
	    }else{
	        $msg = 'Morate popuniti sva polja!';
	        include 'login.php';
	    }
	}

	
	
	function register() {
	    $controller=new ControllerLogin();
	    
	    $customer_name = isset($_POST['customer_name'])? $controller->testInput($_POST['customer_name']): "";
	    
	    $customer_email = isset($_POST['customer_email'])? $controller->testInput($_POST['customer_email']): "";
	    $customer_pass = isset($_POST['customer_pass'])? $controller->testInput($_POST['customer_pass']): "";
	    $password_c = isset($_POST['password_c'])? $controller->testInput($_POST['password_c']): "";
	    $customer_lastname = isset($_POST['customer_lastname'])? $controller->testInput($_POST['customer_lastname']): "";
	    if(!empty($customer_name) && !empty($customer_lastname) && !empty($customer_email) && !empty($customer_pass) && !empty($password_c)) {
	        if (strlen($customer_pass) >= 8) {
	            if($customer_pass == $password_c) {
	                $daoC = new DAOLogin();
	                $userC = $daoC->klijentExistByUsername($customer_email); //proverava da li postoji email vec u bazi
	                if( $userC>0) {
	                     
	                    $msg1 = "Username postoji, izaberite drugi";
	                    include 'login.php';
	                } else{$dao = new DAOLogin();
	                //$password = md5($password); //Calculate the md5 hash of a string
	                $newuser = $dao->insertUser($customer_name,$customer_lastname, $customer_email,$customer_pass);
	                
	                
	                $klijent = $dao->selectKlijentByUsernameAndPassword($customer_email,$customer_pass);
	                if ($klijent)
	                    session_start();
	                    $_SESSION['ulogovan'] = $klijent;
	                    $msg1 = "Uspesno ste se registrovali";
	                    header("Location:../korisnik/");
	                    
	                }} else {
	                $msg1 = "Sifra i potvrdjena sifra moraju biti iste";
	                include 'login.php';
	            }
	        } else {
	            $msg1 = "Sifra mora imati 8 i vise karaktera";
	            include 'login.php';
	        }
	    } else {
	        $msg1 = "Morate popuniti sva polja";
	        include 'login.php';
	    }
	}
    
}
	
	
?>
