<?php
//session_start();
require_once '../korisnik/DAOProizvodi.php';

class ControllerKorisnik{

    public function pocetna() {
        $dao=new DAOProizvodi();
       
        $artikli =$dao->selectArtikli();
include 'pocetna.php';
    }
    
    public function gologin() {
      include '../login/login.php';
        
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
    //function potvrda(){
       // include 'potvrda.php';
   // }
    
    
    function proizvodByKategodija(){
        $id=isset($_GET['id'])?$_GET['id']:"";
        $dao=new DAOProizvodi();
        $kat=$dao->selectKategorije();
        $artikli =$dao->selectProizvodByKateogorija($id);
        include 'pocetna.php';
        
        
    }
    
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ?action=pocetna");
    }
	
	function goRegisterUser () {
	    include 'login.php';
	}
	public function addTokolica(){
	    $dao=new DAOProizvodi();
	    $idart = isset($_GET['idart'])?$_GET['idart']:'';
	    if(!empty($idart)){
	        $artikal = $dao->selectArtikalByID($idart);
	        if($artikal){
	            
	            session_start();
	            // kreiranje atributa korpa ako ne postoji u sesiji
	            if(!isset($_SESSION['korpa']))
	                
	                $_SESSION['korpa'] = array();
	                $_SESSION['korpa'] = $artikal;
	                
	                
	                $dao = new DAOProizvodi();
	                
	                
	                $p= $dao->selectArtikalByUserId($_SESSION['ulogovan']["korisnik_id"]);
	                $postoji=array_column($p,'proizvod_id');
	                if(in_array($idart,$postoji)){
	                    $_SESSION['korpa']=$dao->updateKolicina($_SESSION['ulogovan']["korisnik_id"],$idart);
	                    header("Location:?action=pocetna");}else{
	                        $artikal['kolicina']=1;
	                   
		                        
	                        $_SESSION['korpa']=$dao->insertkolica($_SESSION['ulogovan']["korisnik_id"],$artikal['proizvod_id'],$artikal['proizvod_opis'],$artikal['proizvod_slika2'],$artikal['proizvod_cena'],$artikal['proizvod_opis'],$artikal['kolicina']);
	                        $artikli = $dao->selectArtikli();
	                        $korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();
	                        
	                        $_SESSION['korpa']= $dao->selectArtikalByUserId($_SESSION['ulogovan']["korisnik_id"]);
	                        
	                        header("Location:?action=pocetna"); }
	                        
	        }else{
	            $msg = 'Pogresan idart!!!';
	            $artikli = $dao->selectArtikli();
	            include '../kolica/cart.php';
	        }
	    }else{
	        $msg = 'Ne postoji idart!!!';
	        $artikli = $dao->selectArtikli();
	        include '../kolica/cart.php';
	    }
	    
	    
	}
	
	
	
}
?>
