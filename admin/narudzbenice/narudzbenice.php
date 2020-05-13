<?php 
require_once 'DAONarudzbenice.php';
$dao=new DAONarudzbenice();
    $narudzbenice=$dao->selectOrders();
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
     <th>Edit</th>
     <th>Delete</th>     

  </tr>

    <?php
    foreach($narudzbenice as $n){?>
  <tr>
    <td><?php
    echo $n["narudzbenica_id"];?></td>
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

    <td><?php echo $n["datumNarucivanja"];?></td>
    <td>
     <a href='../narudzbenice/?action=goedit&Idn=<?php echo $n['narudzbenica_id'];?>'>Edit</a> </td>
 <td>
   <a href='?action=deleteNarudzbenicu&idn=<?php echo $n["narudzbenica_id"];?>'>Delete</a>
 </td>
 </tr>
  <?php }?>
</table>

</div>
</div>




</body>
</html>
