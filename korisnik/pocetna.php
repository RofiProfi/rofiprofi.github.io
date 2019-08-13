<?php session_start();
require_once '../korisnik/DAOProizvodi.php';



?>
        

  
  <?php
//	session_start();
	//var_dump($_SESSION);
		$msg=isset($msg)?$msg:"";

?>
<?php // PROMENLJIVE ZA VIEW
	$artikli = isset($artikli) ? $artikli : array();
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
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
   
</head><!--/head-->

<body>
	<?php include '../partials/header.php';echo $msg;
	?>
	
	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
<div class="left-sidebar">
						<h2>Kategorije</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										</h4>
<ul class="nav nav-pills nav-stacked">
									
									<?php 
									$dao=new DAOProizvodi();
									$kat=$dao->selectKategorije();
									foreach($kat as $k){?>
									    <li><a href='?action=product&id=<?php echo $k["kategorija_id"];?>'><?php echo $k["kategorija_naziv"];?></a> </li>
									    
								<?php }?>									
								</ul>								
													
								</div>
								
							</div>
						</div><!--/category-products-->
						
						
					
						
						
						<div class="shipping text-center"><!--shipping-->
							<img src="../images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>				</div>
				
				<div class="col-sm-9 padding-right">
					
					<div class="features_items"><!--features_items-->
					
					
					
						<h2 class="title text-center">Predlozeni proizvodi</h2>
						
						
							<div class="product-image-wrapper">
					
						<?php
										foreach ($artikli as $pom){
						?>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
									<div class="productinfo text-center">
									<?php echo $pom['proizvod_slika1']?>
										<h2><?php echo "$".$pom['proizvod_cena']?></h2>
										<p><?php echo $pom['proizvod_opis']?></p>
									<?php 
												if(!isset($_SESSION['ulogovan'])){
											    ?>
												
												<?php
												}else{?>
												<a href='?action=addtocart&idart=<?php echo $pom["proizvod_id"];?>' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Dodaj u kolica</a>
								        
								
																								<?php }?>	
									</div>
									
								
								
							</div>
						</div>
						<?php }?>
						
					
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php include '../partials/footer2.php' ?>
		
	</footer><!--/Footer-->
</body>
</html>
