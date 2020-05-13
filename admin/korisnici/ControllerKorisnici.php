<?php
require_once 'DAOKorisnici.php';

class ControllerKorisnici{
    
    
    function goLogin() {
        header("Location:../login/?action=gologin");
        
    }
 function goProizvodi(){
    header("Location:../?action=goProizvodi");     
    include '../proizvodi/proizvodi.php';
}

 function goKategorija(){
    header("Location:../?action=goKategorija");     
    include '../kategorije/kategorije.php';
}


    function goEditKorisnici(){
       $kId=isset($_GET['kId'])?$_GET['kId']:"";
        include '../korisnici/korisnici-edit.php';
    }
    
    
    function korisnici() {
        $dao=new DAOKorisnici();
        $dao->selectKorisnike();
         include '../korisnici/korisnici.php';   
    }

    function obrisiKorisnika()
    {
     $kId = isset($_GET['kId'])?$_GET['kId']:'';

        $dao=new DAOKorisnici();
        $dao->deleteKorisnika($kId);
        include '../korisnici/korisnici.php';
        $msg="Cannot delete or  update a parent row: a foreign key constraint fails";
    }
    
function selectKorisnikaById()
    {
     $kId = isset($_GET['kId'])?$_GET['kId']:'';
        $dao=new DAOKorisnici();
        $dao->selectKorisnikaById($kId);
        include 'korisnici-edit.php';
    }

function editKorisnika()
{
    $korisnik_id=isset($_POST['kId'])?$_POST['kId']:"";
    $korisnik_email= isset($_POST['korisnik_email'])?$_POST['korisnik_email']:"";
    $korisnik_sifra= isset($_POST['korisnik_sifra'])?$_POST['korisnik_sifra']:"";

$dao=new DAOKorisnici();
if(!empty($korisnik_id)&&!empty($korisnik_email)&&!empty($korisnik_sifra)){

$korisnici=$dao->updateKorisnika($korisnik_email,$korisnik_sifra,$korisnik_id);
include'../korisnici/korisnici.php';
}
else{
$msg="Popunite sva polja";
include'../korisnici/korisnici-edit.php';

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