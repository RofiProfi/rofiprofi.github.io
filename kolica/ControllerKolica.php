<?php session_start();
require_once '../kolica/DAOKolica.php';

class ControllerKolica{

    public function pocetna() {
       $dao=new DAOKolica();
       
        header("Location:../korisnik/?action=pocetna");
    }
    
    public function gologin() {
       include '../login/login.php';
        
    }
    
    public function gocart() {
        $dao=new DAOKolica();
        $korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();
        $korpa =$dao->selectArtikalByUserId($_SESSION['ulogovan']["korisnik_id"]);
        
        include 'cart.php';
    }
    
    function goRegister() {
        include '../login.php';
    }
    
    function goRacun(){
        
      header("Location:../racun");
  }
  
  public function logout(){
      //
      session_unset();
      session_destroy();
      header("Location:../korisnik/?action=pocetna");
  }
    
   
	
	    
	    public function obrisiJedan(){
	        $idart = isset($_GET['idart'])?$_GET['idart']:'';
	        $dao=new DAOKolica();
	        
	        if(isset($_SESSION['ulogovan']))
	            //
	            if(isset($_SESSION["korpa"]))
	            $_SESSION["korpa"]= $dao->deleteProduct($_SESSION['ulogovan']["korisnik_id"],$idart);
	            //$korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();
	             $_SESSION["korpa"]=$dao->selectArtikalByUserId($_SESSION['ulogovan']["korisnik_id"]);
	             $korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();
	             
	        //session_destroy($_SESSION['korpa']);
	        include 'cart.php';
	       
	    }
	    
	    
	    
	    public function obrisiSve(){
	        
	        //
	        unset($_SESSION['korpa']);
	        
	        
	        $dao = new DAOKolica();
	        $_SESSION['korpa']  = $dao->deletekolica($_SESSION['ulogovan']["korisnik_id"]);	        
	        $_SESSION["korpa"]=$dao->selectArtikalByUserId($_SESSION['ulogovan']["korisnik_id"]);
	        $korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();
	        
	        
	        
	        include 'cart.php';
	    }
	
	    
}
?>
