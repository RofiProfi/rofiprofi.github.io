<?php require_once '../racun/DAORacun.php';

//var_dump($dao->selectOrders($_SESSION['ulogovan']["customer_id"]));
//session_start(); 
//$_SESSION['korpa']= $dao->selectArtikalByUserId($_SESSION['ulogovan']["customer_id"]);

$korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();

$msg=isset($msg)?$msg:"";
$msg2=isset($msg2)?$msg2:"";

if(isset($_SESSION['ulogovan'])){
//include '../partials/korpa-potvrda.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
    
</head><!--/head-->

<body>
<?php include '../partials/header.php';?>
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p></p>
							
							<a class="btn btn-primary" href="../korisnik/?action=pocetna">Nazad na kupovinu</a>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
						<h3>Podaci o Vasoj posiljci: 					
							<p> <?php 
							    echo $msg;
							    ?></p>
				</div>
				
							<div class="form-one">
							<div id="myDIV">
								<!--<a href="../potvrda/?action=delete" onclick="myFunction()">Potvrdi kupovinu</a>-->
							</div></div>
						</div>
					</div>
								
				</div>
			</div>
			<section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
						<div class="chose_area">
					
					
						
					</div>
				</div>
				
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
						<?php include '../partials/footer2.php';?>
			
</script>
	</body>
	</html>
	<?php }else{
	    header("Location:../login/?action=gologin");
	}?>