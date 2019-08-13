<?php 	//session_start();
//if(isset($_SESSION['ulogovan']))	    {
$korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();
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
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
  
</head><!--/head-->

<body>
	<?php	
	include '../partials/header.php';?>
	<?php include '../partials/cart_items.php';?>
	
	

	<?php include '../partials/racun-centar.php';?>

	

	
<?php 
	include '../partials/footer2.php';?>	


 
</body>
</html>
<?php 
//}else{
//    include 'login.php';
//}?>