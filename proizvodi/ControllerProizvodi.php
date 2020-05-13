<?php
require_once 'DAOProizvodi.php';

class ControllerProizvodi{
    
   /* function pocetna() {
        header("Location:../admin/?action=pocetna");
    }*/
    
    function pocetna() {
        header("Location:../admin/proizvodi");
    }
    
    function goLogin() {
        header("Location:../login/?action=gologin");
        
    }
    
        function goProizvodi(){
   // header("Location:../?action=goProizvodi");     
    include '../proizvodi/proizvodi.php';
}

 function goInsertProizvod(){
    include '../proizvodi/proizvodi-insert.php';
 }


    function proizvodi() {
        $dao=new DAOProizvodi();
        $dao->selectProizvode();
         include '../proizvodi/proizvodi.php';   
    }

    function obrisiProizvod()
    {
     $Idn = isset($_GET['Idn'])?$_GET['Idn']:'';

        $dao=new DAOProizvodi();
        $dao->deleteProizvode($Idn);
        include 'proizvodi.php';
    }
    
function selectProizvodeById()
    {
     $Idn = isset($_GET['Idn'])?$_GET['Idn']:'';
        $dao=new DAOProizvodi();
        $dao->selectProizvodeById($Idn);
        include 'proizvodi.php';
    }

    function goEditProizvode(){
        $Idn=isset($_GET['Idn'])?$_GET['Idn']:"";
        include '../proizvodi/proizvodi-edit.php';

    }

        function goEditSlikuProizvode(){
        $Idn=isset($_GET['Idn'])?$_GET['Idn']:"";
        include '../proizvodi/proizvodi-editSliku.php';
//header("Loaction:upload.php");
    }


function editProizvode()
{        
$proizvod_id=isset($_POST['Idn'])?$_POST['Idn']:"";
    $proizvod_kategorija_id= isset($_POST['proizvod_kategorija_id'])?$_POST['proizvod_kategorija_id']:"";
    $proizvod_naziv= isset($_POST['proizvod_naziv'])?$_POST['proizvod_naziv']:"";
$proizvod_cena= isset($_POST['proizvod_cena'])?$_POST['proizvod_cena']:"";
$proizvod_opis= isset($_POST['proizvod_opis'])?$_POST['proizvod_opis']:"";

$dao=new DAOProizvodi();
if(!empty($proizvod_id)&&!empty($proizvod_kategorija_id)&&!empty($proizvod_naziv)&&!empty($proizvod_cena)&&!empty($proizvod_opis)){
$proizvodi=$dao->updateProizvode($proizvod_id,$proizvod_kategorija_id,$proizvod_naziv,$proizvod_cena,$proizvod_opis);
include'../proizvodi/proizvodi.php';
}
else{
$msg="Popunite sva polja";
include'../proizvodi/proizvodi-edit.php';

}
}

function editSlikuProizvoda(){
    $proizvod_id=isset($_POST['Idn'])?$_POST['Idn']:"";

    $file= $_FILES['file'];
    $fileName= $_FILES['file']['name'];
    $fileTmpName= $_FILES['file']['tmp_name'];
    $fileSize= $_FILES['file']['size'];
    $fileError= $_FILES['file']['error'];
    $fileType= $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
                     $dao=new DAOProizvodi();
    if(in_array($fileActualExt, $allowed)){
        if($fileError===0)
        {
            if($fileSize<1000000){
                $fileNameNew= uniqid('', true). "." . $fileActualExt;
                $fileDestination = 'uploads/'. $fileNameNew; 
                move_uploaded_file($fileTmpName, $fileDestination);
               include 'proizvodi.php';
                  }
        } else {
            $msg= "Tvoj fajl je prevelik!!";
            include 'proizvodi-editSliku.php';
        }

}
            $dao->updateSlikuProizvoda($fileDestination,$fileDestination,$proizvod_id); 

    $dao->updateSlikuProizvodaKolica($fileDestination,$proizvod_id); 

}



function insertProizvod(){
$proizvod_kategorija_id=isset($_POST['cars'])?$_POST['cars']:"";
    $proizvod_naziv=isset($_POST['proizvod_naziv'])?$_POST['proizvod_naziv']:"";
    $proizvod_cena=isset($_POST['proizvod_cena'])?$_POST['proizvod_cena']:"";
    $proizvod_opis=isset($_POST['proizvod_opis'])?$_POST['proizvod_opis']:"";
    $fileInsert= $_FILES['fileInsert'];
    $fileNameInsert= $_FILES['fileInsert']['name'];
    $fileTmpNameInsert= $_FILES['fileInsert']['tmp_name'];
    $fileSizeInsert= $_FILES['fileInsert']['size'];
    $fileErrorInsert= $_FILES['fileInsert']['error'];
    $fileTypeInsert= $_FILES['fileInsert']['type'];
    $fileExtInsert = explode('.', $fileNameInsert);
    $fileActualExtInsert = strtolower(end($fileExtInsert));
    $allowedInsert = array('jpg', 'jpeg', 'png', 'pdf');
    $dao=new DAOProizvodi();

    if(in_array($fileActualExtInsert, $allowedInsert)){
        if($fileErrorInsert===0)
        {
            if($fileSizeInsert<1000000){
                $fileNameNewInsert= uniqid('', true). "." . $fileActualExtInsert;
                $fileDestinationInsert = 'uploads/'. $fileNameNewInsert; 
                move_uploaded_file($fileTmpNameInsert, $fileDestinationInsert);  }
     include 'proizvodi.php';

         } else {
            $msg= "Tvoj fajl je prevelik!!";
            include 'proizvodi-insert.php';
        }

$dao->insertProizvod($proizvod_kategorija_id,$proizvod_naziv,$fileDestinationInsert,$fileDestinationInsert,$proizvod_cena,$proizvod_opis);
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