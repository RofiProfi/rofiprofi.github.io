<?php 
require_once 'DAOProizvodi.php';
$dao=new DAOProizvodi();
    $Proizvodi=$dao->selectProizvodeById($Idn);
		$msg=isset($msg)?$msg:"";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/mejn.css" rel="stylesheet">

	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
 </head>
<body>
   <?php
include '../partials/sidebar.php';
   ?>

<div class="main">
<h2>Edit Proizvodi</h2>
<h3>Ízaberite sliku za edit</h3>
  
  <?php echo $msg;?>

<form action="../proizvodi/" method="post" enctype="multipart/form-data">
    Proizvod id:<br><input type="hidden" name="Idn" value="<?php echo $Proizvodi["proizvod_id"];?>"><?php echo $Idn;?>
<br><br>
Proizvod kategorija id:<input type="hidden" name="proizvod_kategorija_id" value="<?php echo $Proizvodi["proizvod_kategorija_id"];?>"><br><br>
Proizvod naziv:<input type="hidden" name="proizvod_naziv" value="<?php echo $Proizvodi["proizvod_naziv"];?>"><br><br>
Proizvod cena:<input type="hidden" name="proizvod_cena" value="<?php echo $Proizvodi["proizvod_cena"];?>"><br><br>
Proizvod opis:<input type="hidden" name="proizvod_opis" value="<?php echo $Proizvodi["proizvod_opis"];?>"><br><br>
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="action" value="upload">
</form>


</div>
</div>

</body>
</html>