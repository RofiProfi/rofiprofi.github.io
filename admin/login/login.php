
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href=../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
    
</head><!--/head-->

<body>
	
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Admine Uloguj se!</h2>
						<form action="" method="post">
		<input type="email" name="admin_email" placeholder="username"><br>
		<input type="password" name="admin_pass" placeholder="password"><br>
		<input type="submit" name="action" value="Login" class="btn btn-default">
	</form>
	<?php if(isset($msg)) echo $msg;?>
					
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<footer id="footer"><!--Footer-->
		<?php include '../../partials/footer2.php' ?>
		
	</footer><!--/Footer-->

</body>
</html>
