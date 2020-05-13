<?php
require_once 'DAONarudzbenice.php';

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
            function goKorisnici() {
        include '../korisnici/korisnici.php';
        
    }

     function goProizvodi(){
    //header("Location:../proizvodi/?action=goProizvodi");     
    include 'proizvodi/proizvodi.php';
}

    function narudzbenice() {
        $dao=new DAONarudzbenice();
        $dao->selectOrders();
         include 'narudzbenice.php';   
    }

    function obrisiNarudzbenicu()
    {
     $idn = isset($_GET['idn'])?$_GET['idn']:'';

        $dao=new DAONarudzbenice();
        $dao->deleteNarudzbenicu($idn);
        include 'narudzbenice.php';
    }
    
function selectNarudzbenicuById()
    {
     $idn = isset($_GET['idn'])?$_GET['idn']:'';
        $dao=new DAONarudzbenice();
        $dao->selectOrdersById($idn);
        include 'narudzbenice.php';
    }

    function goEditNarudzbenice(){
        $Idn=isset($_GET['Idn'])?$_GET['Idn']:"";
        include '../narudzbenice/narudzbenice-edit.php';

    }

function editNarudzbenice()
{        
$narudzbenica_id=isset($_POST['Idn'])?$_POST['Idn']:"";
    $ime= isset($_POST['ime'])?$_POST['ime']:"";
    $prezime= isset($_POST['prezime'])?$_POST['prezime']:"";
$email= isset($_POST['email'])?$_POST['email']:"";
$adresa= isset($_POST['adresa'])?$_POST['adresa']:"";
$grad= isset($_POST['grad'])?$_POST['grad']:"";
$drzava= isset($_POST['drzava'])?$_POST['drzava']:"";
$postanskiBroj= isset($_POST['postanskiBroj'])?$_POST['postanskiBroj']:'';
$telefon= isset($_POST['telefon'])?$_POST['telefon']:'';
$brojRacuna= isset($_POST['brojRacuna'])?$_POST['brojRacuna']:'';
$nacinPlacanja= isset($_POST['nacinPlacanja'])?$_POST['nacinPlacanja']:'';
$ukupno= isset($_POST['ukupno'])?$_POST['ukupno']:'';
$datumNarucivanja= isset($_POST['datumNarucivanja'])?$_POST['datumNarucivanja']:'';
$dao=new DAONarudzbenice();
if(!empty($ime)&&!empty($prezime)&&!empty($email)&&!empty($adresa)&&!empty($grad)&&!empty($drzava)&&!empty($postanskiBroj)&&!empty($telefon)&&!empty($brojRacuna)&&!empty($nacinPlacanja)&&!empty($ukupno)&&!empty($datumNarucivanja) && !empty($narudzbenica_id)){
$narudzbenice=$dao->updateNarudzbenicu($ime,$prezime,$email,$adresa,$grad,$drzava,$postanskiBroj,$telefon,$brojRacuna,$nacinPlacanja,$ukupno,$datumNarucivanja,$narudzbenica_id);
include'../narudzbenice/narudzbenice.php';
}
else{
$msg="Popunite sva polja";
include'../narudzbenice/narudzbenice-edit.php';

}
}


    
    function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location:../admin/");
    }
    
}


?>