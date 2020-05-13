<?php 
require_once 'DAOKategorije.php';

$dao=new DAOKategorije();
      $kategorije=$dao->selectKategorije();

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
<th>Kategorija ID</th>
    <th>Kategorija naziv</th> 
    <th>Kategorija opis</th>
     <th>Edit</th>
     <th>Delete</th>     

  </tr>


  </tr>
    <?php
        foreach($kategorije as $k){?>
  <tr>
    <td><?php
    echo $k["kategorija_id"];?></td>
<td><?php echo $k["kategorija_naziv"];?></td>    
<td><?php echo $k["kategorija_opis"];?></td>
    <td>
   <a href='../kategorije/?action=editKategoriju&kId=<?php echo $k['kategorija_id'];?>'>Edit</a>
 </td>
 <td>
   <a href='?action=deleteKategoriju&kId=<?php echo $k["kategorija_id"];?>'>Delete</a>
 </td>
  <?php }?>
</tr>
</table>
  <a href='../kategorije/?action=goInsertKategorija'>Dodajte novu kategoriju</a>

</div>


	  <?php echo $msg;?>

</body>
</html>
