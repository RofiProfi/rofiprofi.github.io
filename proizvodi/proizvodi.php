<?php 
require_once 'DAOProizvodi.php';
$dao=new DAOProizvodi();
    $proizvodi=$dao->selectProizvode();
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
<a href='../proizvodi/?action=goInsertProizvod'>Dodajte novi proizvod</a>

 <table id="t01" align="center">
  <tr>
<th>Proizvod ID</th>
    <th>Proizvod kateogrija ID</th> 
    <th>Proizvod naziv</th>
    <th>Proizvod slika 2</th> 
    <th>Proizvod cena</th>
    <th>Proizvod opis</th>
      <th>Edit</th>
    <th>Delete</th>
    <th>Edit Sliku</th>
  </tr>

    <?php
    foreach($proizvodi as $p){?>
  <tr>
    <td><?php
    echo $p["proizvod_id"];?></td>
<td><?php echo $p["proizvod_kategorija_id"];?></td>    
<td><?php echo $p["proizvod_naziv"];?></td>
 <td><?php echo "<img src='" .$p["proizvod_slika2"]."' height='100' width='100'>" ;?></td>
<td><?php echo $p["proizvod_cena"];?></td>   
 <td><?php echo $p["proizvod_opis"];?></td>
    <td>
     <a href='../proizvodi/?action=goEditProizvod&Idn=<?php echo $p["proizvod_id"];?>'>Edit</a> </td>
 <td>
   <a href='?action=deleteProizvod&Idn=<?php echo $p["proizvod_id"];?>'>Delete</a>
 </td>
  <td>
   <a href='../proizvodi/?action=goEditSlikuProizvoda&Idn=<?php echo $p["proizvod_id"];?>'>Edit sliku</a>
 </td>
 </tr>
  <?php }?>
</table>
</div>
</div>
</body>
</html>