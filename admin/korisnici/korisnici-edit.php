<?php 
require_once 'DAOKorisnici.php';

$dao=new DAOKorisnici();
$korisnici=$dao->selectKorisnikaById($kId);
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
    <th>Korisnik ID</th>
    <th>Korisnik email </th> 
    <th>Korisnik sifra</th>
  </tr>

  <tr>
    
<td><?php echo $korisnici["korisnik_id"];?></td>    
<td><?php echo $korisnici["korisnik_email"];?></td>
<td><?php echo $korisnici["korisnik_sifra"];?></td>  
 
</tr>
 <?php // }
  ?>
</table>
<br><br><br>

<h2>Edit 'Korisnici'</h2>
<h3>Sva polja moraju biti popunjena, izmeniti polje ili polja koja zelite da editujete</h3>
 <form action="../korisnici/" method="post">
ID:<br><input type="hidden" name="kId" value="<?php echo $korisnici["korisnik_id"];?>"><?php echo $kId;?>
<br><br>
Kategorija Naziv:<input type="text" name="korisnik_email" value="<?php echo $korisnici["korisnik_email"];?>"><br><br>
Kategorija Opis:<input type="text" name="korisnik_sifra" value="<?php echo $korisnici["korisnik_sifra"];?>"><br><br>
<br><br>
<input type="submit" name="action" value="Save">
</form>
  <?php echo $msg;?>

</div>
	
</body>
</html>
