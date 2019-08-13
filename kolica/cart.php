
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
<?php // PROMENLJIVE ZA VIEW
//session_start();
//if(isset($_SESSION['ulogovan']))	    {

include '../partials/header.php'; ?>


<body>
	<?php ?>
<?php 	
/*require_once '../model/DAO.php';
//session_start();
$msg=isset($msg)?$msg:"";
//if(isset($_SESSION['ulogovan'])){
   $dao=new DAO();
    $korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();
$_SESSION['korpa']= $dao->selectArtikalByUserId($_SESSION['ulogovan']["customer_id"]);
$korpa =$dao->selectArtikalByUserId($_SESSION['ulogovan']["customer_id"]);
  // $korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();
  // var_dump($korpa);*/
require_once '../kolica/DAOKolica.php';
 
$dao=new DAOKolica();
 //$korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();
// $korpa =$dao->selectArtikalByUserId($_SESSION['ulogovan']["customer_id"]);
 
 $msg=isset($msg)?$msg:"";
 $msgUkupno=isset($msgUkupno)?$msgUkupno:"";
 
?>


<?php include '../partials/cart_items.php'?>
						<?php include '../partials/cart-dugmici.php'?>
	
	


<?php include'../partials/footer2.php';?>
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php 
//}else{
	 //   echo "tetetet";
	//}
?>