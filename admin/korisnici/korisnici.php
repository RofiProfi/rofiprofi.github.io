<?php 
require_once 'DAOKorisnici.php';

$dao=new DAOKorisnici();
      $korisnici=$dao->selectKorisnike();

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
<th>Korisnik email</th>
    <th>Korisnik sifra</th> 
     <th>Edit</th>
     <th>Delete</th>     
  </tr>
    <?php
        foreach($korisnici as $k){?>
  <tr>
    <td><?php
    echo $k["korisnik_id"];?></td>
<td><?php echo $k["korisnik_email"];?></td>    
<td><?php echo $k["korisnik_sifra"];?></td>
    <td>
   <a href='../korisnici/?action=editKorisnika&kId=<?php echo $k['korisnik_id'];?>'>Edit</a>
 </td>
 <td>
   <a href='?action=deleteKorisnika&kId=<?php echo $k["korisnik_id"];?>'>Delete</a>
 </td>
  <?php }?>
</tr>
</table>
</div>


	  <?php echo $msg;?>

</body>
</html>
