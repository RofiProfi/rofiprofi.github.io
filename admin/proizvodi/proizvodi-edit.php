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
 <table id="t01" align="center">
  <tr>
<th>Proizvod ID</th>
    <th>Proizvod kateogrija ID</th> 
    <th>Proizvod naziv</th>
      <th>Proizvod slika 2</th>
    <th>Proizvod cena</th>
    <th>Proizvod opis</th>


  </tr>

  <tr>
    <td><?php
    echo $Proizvodi["proizvod_id"];?></td>
<td><?php echo $Proizvodi["proizvod_kategorija_id"];?></td>    
<td><?php echo $Proizvodi["proizvod_naziv"];?></td>
 <td><?php echo $Proizvodi["proizvod_slika2"];?></td>
<td><?php echo $Proizvodi["proizvod_cena"];?></td>   
 <td><?php echo $Proizvodi["proizvod_opis"];?></td>
    
 </tr>
</table>


<h2>Edit Proizvodi</h2>
<h3>Sva polja moraju biti popunjena, izmeniti polje ili polja koja zelite da editujete</h3>
 <form action="../proizvodi/" method="post">
Proizvod id:<br><input type="hidden" name="Idn" value="<?php echo $Proizvodi["proizvod_id"];?>"><?php echo $Idn;?>
<br><br>
Proizvod kategorija id:<input type="text" name="proizvod_kategorija_id" value="<?php echo $Proizvodi["proizvod_kategorija_id"];?>"><br><br>
Proizvod naziv:<input type="text" name="proizvod_naziv" value="<?php echo $Proizvodi["proizvod_naziv"];?>"><br><br>
Proizvod cena:<input type="text" name="proizvod_cena" value="<?php echo $Proizvodi["proizvod_cena"];?>"><br><br>
Proizvod opis:<input type="text" name="proizvod_opis" value="<?php echo $Proizvodi["proizvod_opis"];?>"><br><br>
<br><br>
<input type="submit" name="action" value="Save" name="Save">
</form>
  <?php echo $msg;?>


</div>
</body>
</html>