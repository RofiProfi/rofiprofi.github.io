<?php 
require_once 'DAOKategorije.php';

$dao=new DAOKategorije();
$kategorije=$dao->selectKategorijeById($kId);
		$msg=isset($msg)?$msg:"";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
 </head>
<body>
   <?php
include '../partials/sidebar.php';
   ?>

<div class="main">
 <table id="t01" align="center">
  <tr>
    <th>Kategorija ID</th>
    <th>Kategorija naziv ID</th> 
    <th>Kategorija opis</th>
  </tr>

  <tr>
    
<td><?php echo $kategorije["kategorija_id"];?></td>    
<td><?php echo $kategorije["kategorija_naziv"];?></td>
<td><?php echo $kategorije["kategorija_opis"];?></td>  
 
</tr>
 <?php // }
  ?>
</table>
<br><br><br>

<h2>Edit 'Kategorije'</h2>
<h3>Sva polja moraju biti popunjena, izmeniti polje ili polja koja zelite da editujete</h3>
 <form action="../kategorije/" method="post">
ID:<br><input type="hidden" name="kId" value="<?php echo $kategorije["kategorija_id"];?>"><?php echo $kId;?>
<br><br>
Kategorija Naziv:<input type="text" name="kategorija_naziv" value="<?php echo $kategorije["kategorija_naziv"];?>"><br><br>
Kategorija Opis:<input type="text" name="kategorija_opis" value="<?php echo $kategorije["kategorija_opis"];?>"><br><br>
<br><br>
<input type="submit" name="action" value="Save">
</form>
  <?php echo $msg;?>

</div>
	
</body>
</html>
