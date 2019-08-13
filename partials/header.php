
<div class="header_top"><!--header_top-->
<div class="container">
<div class="row">
<div class="col-sm-6">
<div class="contactinfo">
<ul class="nav nav-pills">

<li><?php
if(!isset($_SESSION['ulogovan'])){    
    echo "Dobrodosao gost!";

}
else{
    echo "Dobrodosao " .$_SESSION['ulogovan']["korisnik_ime"];
    echo "<a href='?action=logout'>Logout</a>";}
    
    ?>
</li>
</ul>
</div>
</div>
<div class="col-sm-6">
<div class="social-icons pull-right">
<ul class="nav navbar-nav">

</ul>
</div>
</div>
</div>
</div>
</div><!--/header_top-->

<div class="header-middle"><!--header-middle-->
<div class="container">
<div class="row">
<div class="col-sm-4">


<?php 
if(!isset($_SESSION['ulogovan'])){
?>
</div>
<div class="col-sm-8">
<div class="shop-menu pull-right">
<ul class="nav navbar-nav">
<li><a href="../login?action=gologin"><i class="fa fa-lock"></i> Login ILI Registracija</a></li>

</ul>
</div>
</div>
</div>
</div>
</div><!--/header-middle-->

<?php
}else{
    ?>

</div>
<div class="col-sm-8">
<div class="shop-menu pull-right">
<ul class="nav navbar-nav">
<li><a href="#"><i class="fa fa-user"></i> Nalog</a></li>
<li><a href="../kolica/?action=gocart"><i class="fa fa-shopping-cart"></i> Kolica</a></li>

</ul>
</div>
</div>
</div>
</div>
</div><!--/header-middle-->
<?php }?>


<div class="header-bottom"><!--header-bottom-->
<div class="container">
<div class="row">
<div class="col-sm-9">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div class="mainmenu pull-left">
<ul class="nav navbar-nav collapse navbar-collapse">
<li><a href="../korisnik/?action=pocetna" class="active">Pocetna</a></li>
</ul>
</div>
</div>
<div class="col-sm-3">
<div class="search_box pull-right">

</div>
</div>
</div>
</div>
</div><!--/header-bottom-->
