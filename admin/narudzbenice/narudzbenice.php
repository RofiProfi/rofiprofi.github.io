<?php 
require_once 'DAONarudzbenice.php';

$dao=new DAONarudzbenice();
  
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
   <style>
   
table {
  width:10%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 2px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: #1E90FF;
  color: white;
}
h2{
color:#1E90FF;}
</style>
</head><!--/head-->

<body>
<h2 align="center">Spisak narudzbenica</h2>
<a href="?action=logout">Nazad na izbor</a>
<a href="#">Nazad na izbor</a>
	<br><br><br><br><br><br>
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
     <th>Proizvod naziv</th>
     <th>Proizvod cena</th>
      <th>Datum narucivanja</th>
     <th>Kolicina proizvoda u korpi</th>
     
  </tr>
  	<?php
  	$narudzbenice=$dao->selectOrders();
  	foreach($narudzbenice as $n){?>
  <tr>
    <td><?php echo $n["narudzbenica_id"];?></td>
<td><?php echo $n["korisnik_id"];?></td>    
<td><?php echo $n["ime"];?></td>
<td><?php echo $n["prezime"];?></td>  
 <td><?php echo $n["email"];?></td>
<td><?php echo $n["adresa"];?></td>   
 <td><?php echo $n["grad"];?></td>
<td><?php echo $n["drzava"];?></td>  
 <td><?php echo $n["postanskiBroj"];?></td>
<td><?php echo $n["telefon"];?></td>   
 <td><?php echo $n["brojRacuna"];?></td>
<td><?php echo $n["nacinPlacanja"];?></td>   
 <td><?php echo $n["ukupno"];?></td>
  <td><?php echo $n["proizvod_naziv"];?></td>
  <td><?php echo $n["proizvod_cena"];?></td>
    <td><?php echo $n["datumNarucivanja"];?></td>
  
  <td><?php echo $n["kolica_kolicina"];?></td>
 
  <?php }?>
</table>

	
</body>
</html>
