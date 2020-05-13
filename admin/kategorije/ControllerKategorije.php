<?php
require_once 'DAOKategorije.php';

class ControllerKategorije{
    
    function pocetna() {
        header("Location:../?action=goKategorija");
    }
    
    
    function goLogin() {
        header("Location:../login/?action=gologin");   
    }

        function goKorisnici() {
        include '../korisnici/korisnici.php';
        
    }


 function goProizvodi(){
    header("Location:../?action=goProizvodi");     
    include '../proizvodi/proizvodi.php';
}

    function goEditKategorije(){
       $kId=isset($_GET['kId'])?$_GET['kId']:"";
        include '../kategorije/kategorije-edit.php';
    }
    
    function goInsertKategoriju(){
        include '../kategorije/kategorije-insert.php';
    }
    
    function kategorije() {
        $dao=new DAOKategorije();
        $dao->selectKategorije();
         include '../kategorije/kategorije.php';   
    }

    function obrisiKategoriju()
    {
     $kId = isset($_GET['kId'])?$_GET['kId']:'';

        $dao=new DAOKategorije();
        $dao->deleteKategoriju($kId);
        include '../kategorije/kategorije.php';
        $msg="Cannot delete or  update a parent row: a foreign key constraint fails";
    }
    
function selectKategorijeById()
    {
     $kId = isset($_GET['kId'])?$_GET['kId']:'';
        $dao=new DAOKategorije();
        $dao->selectKategorijeById($kId);
        include 'kategorije-edit.php';
    }

function editKategoriju()
{
    $kategorija_id=isset($_POST['kId'])?$_POST['kId']:"";
    $kategorija_naziv= isset($_POST['kategorija_naziv'])?$_POST['kategorija_naziv']:"";
    $kategorija_opis= isset($_POST['kategorija_opis'])?$_POST['kategorija_opis']:"";

$dao=new DAOKategorije();
if(!empty($kategorija_id)&&!empty($kategorija_naziv)&&!empty($kategorija_opis)){

$kategorije=$dao->updateKategoriju($kategorija_naziv,$kategorija_opis,$kategorija_id);
include'../kategorije/kategorije.php';
}
else{
$msg="Popunite sva polja";
include'../kategorije/kategorije-edit.php';

}
}


function insertKategoriju(){
    $kategorija_naziv= isset($_POST['kategorija_naziv'])?$_POST['kategorija_naziv']:"";
    $kategorija_opis= isset($_POST['kategorija_naziv'])?$_POST['kategorija_naziv']:"";

    $dao= new DAOKategorije();
    if(!empty($kategorija_opis) && !empty($kategorija_naziv)){
$dao->insertKategoriju($kategorija_naziv,$kategorija_opis);
include 'kategorije.php';
    }
    else{
        $msg="Popunite sva polja!";
        include 'kategorije-insert.php';
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