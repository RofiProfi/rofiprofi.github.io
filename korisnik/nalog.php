
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
	include '../partials/header.php';
	?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Promenite sifru:</h2>
						<form action="" method="post">
		Unesite novu sifru: <input type="password" name="customer_pass"><br>
		Potvrdite novu sifru: <input type="password" name="password_confirm"><br>

		<input type="submit" name="action" value="Promeni" class="btn btn-default">
	</form>
	<?php if(isset($msg)) echo $msg;?>
							
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
				</div>
				<div class="col-sm-4">
			</div>
		</div>
	</section><!--/form-->
	
	
	<footer id="footer"><!--Footer-->
		<?php include '../partials/footer2.php' ?>
		
	</footer><!--/Footer-->

</body>
</html>
