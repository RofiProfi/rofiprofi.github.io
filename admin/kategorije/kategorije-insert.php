<?php 
require_once 'DAOKategorije.php';
$dao=new DAOKategorije();
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
 

<h2>Insert 'Kategorije'</h2>
<h3>Sva polja moraju biti popunjena!</h3>
 <form action="../kategorije/" method="post">
Kategorija Naziv:<input type="text" name="kategorija_naziv"><br><br>
Kategorija Opis:<input type="text" name="kategorija_opis"><br><br>
<br><br>
<input type="submit" name="action" value="Insert">
</form>
  <?php echo $msg;?>

</div>
  
</body>
</html>
