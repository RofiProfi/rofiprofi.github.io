<?php 
require_once 'DAONarudzbenice.php';

$dao=new DAONarudzbenice();
$Narudzbenice=$dao->selectOrdersById($Idn);
var_dump($Idn);
 // var_dump ($Narudzbenice);
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
    <th>Narudzbina ID</th>
    <th>Klijent ID</th> 
    <th>Ime</th>
      <th>Prezime</th>
    <th>Email</th> 
    <th>Adresa</th>
    <th>Grad</th>
    <th>Drzava</th>
    <th>Postanski broj</th>
    <th>Telefon</th>
    <th>Broj Racuna</th>
    <th>Nacin placanja</th>
    <th>Ukupno za placanje</th>
     
      <th>Datum narucivanja</th>
     

  </tr>
    <?php
   // foreach($Narudzbenice as $n){
      ?>
  <tr>
    
<td><?php echo $Narudzbenice["korisnik_id"];?></td>    
<td><?php echo $Narudzbenice["ime"];?></td>
<td><?php echo $Narudzbenice["prezime"];?></td>  
 <td><?php echo $Narudzbenice["email"];?></td>
<td><?php echo $Narudzbenice["adresa"];?></td>   
 <td><?php echo $Narudzbenice["grad"];?></td>
<td><?php echo $Narudzbenice["drzava"];?></td>  
 <td><?php echo $Narudzbenice["postanskiBroj"];?></td>
<td><?php echo $Narudzbenice["telefon"];?></td>   
 <td><?php echo $Narudzbenice["brojRacuna"];?></td>
<td><?php echo $Narudzbenice["nacinPlacanja"];?></td>   
 <td><?php echo $Narudzbenice["ukupno"];?></td>
    <td><?php echo $Narudzbenice["datumNarucivanja"];?></td>

</tr>
 <?php // }
  ?>
</table>
<br><br><br>

<h2>Edit Narudzbenice</h2>
<h3>Sva polja moraju biti popunjena, izmeniti polje ili polja koja zelite da editujete</h3>
 <form action="../narudzbenice/" method="post">
ID:<br><input type="hidden" name="Idn" value="<?php echo $Narudzbenice["narudzbenica_id"];?>"><?php echo $Idn;?>
<br><br>
Ime:<input type="text" name="ime" value="<?php echo $Narudzbenice["ime"];?>"><br><br>
Prezme:<input type="text" name="prezime" value="<?php echo $Narudzbenice["prezime"];?>"><br><br>
Email:<input type="text" name="email" value="<?php echo $Narudzbenice["email"];?>"><br><br>
Adresa:<input type="text" name="adresa" value="<?php echo $Narudzbenice["adresa"];?>"><br><br>
Grad:<input type="text" name="grad" value="<?php echo $Narudzbenice["grad"];?>"><br><br>
Drzava:<input type="text" name="drzava" value="<?php echo $Narudzbenice["drzava"];?>"><br><br>
Postanski broj:<input type="text" name="postanskiBroj" value="<?php echo $Narudzbenice["postanskiBroj"];?>"><br><br>
Telefon:<input type="text" name="telefon" value="<?php echo $Narudzbenice["telefon"];?>"><br><br>
Broj racuna:<input type="text" name="brojRacuna" value="<?php echo $Narudzbenice["brojRacuna"];?>"><br><br>
Nacin placanja:<input type="text" name="nacinPlacanja" value="<?php echo $Narudzbenice["nacinPlacanja"];?>"><br><br>
Ukupno:<input type="text" name="ukupno" value="<?php echo $Narudzbenice["ukupno"];?>"><br><br>
Datum narucivanja:<input type="text" name="datumNarucivanja" value="<?php echo $Narudzbenice["datumNarucivanja"];?>"><br><br>
<input type="submit" name="action" value="Save">
</form>




  <?php echo $msg;?>

</div>
	
</body>
</html>

*/?>