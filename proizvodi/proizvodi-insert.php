<?php 
require_once 'DAOProizvodi.php';
require_once '../kategorije/DAOKategorije.php';
$dao=new DAOProizvodi();
$daoKategorije= new DAOKategorije();
$kategorije=$daoKategorije->selectKategorijaId();
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

<h2>Dodaj Proizvod</h2>
<h3>Sva polja moraju biti popunjena</h3>

<form action="../proizvodi/" method="post" enctype="multipart/form-data">
<br><br>
Proizvod kategorija id:
<select name="cars">
  <?php foreach($kategorije as $k){?>
  <option value="<?php echo $k["kategorija_id"];?>"><?php echo $k["kategorija_id"];?></option>
<?php }?>
</select>
roizvod naziv:<input type="text" name="proizvod_naziv"><br><br>
Proizvod cena:<input type="text" name="proizvod_cena" ><br><br>
Proizvod opis:<input type="text" name="proizvod_opis"><br><br>
<br><br>
Select Image File to Upload:
<input type="file" name="fileInsert">
<input type="submit" name="action" value="Insert"> 
</form>
  <?php echo $msg;?>


</div>
</body>
</html>