<?php $msg=isset($msg)?$msg:"";
//$korpa = isset($_SESSION['korpa'])? $_SESSION['korpa'] : array();
require_once '../kolica/DAOKolica.php';

$dao=new DAOKolica();?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a >Kozmo  lend</a></li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
			<?php echo $msg;
			
			if($korpa){ ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Proizvod</td>
							<td class="description">Opis</td>
							<td class="price">Cena</td>
							<td class="quantity">Kolicina</td>
							<td class="total">Izbrisi stavku</td>
							<td class="total">Ukupno</td>
							
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php $cena=0;//for ($cena= 0, $i = 0; $i < count($korpa); $cena+= $korpa[$i]['product_price']*$korpa[$i]['kolicina'],$i++){
			foreach($korpa as $k){
			?>
					
						<tr>	
						
							
									
							<td class="cart_product">
							<?php echo "<img src='../admin/proizvodi/". $k['proizvod_slika2']. "''> ";?>

							</td>
							
							
							<td class="cart_description">
								<p><?php echo $k["proizvod_opis"]?></p>
							</td>
							<td class="cart_price">
									<p>						<?php echo $k["proizvod_cena"]?>
									</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								<?php 
								
								echo $k["kolica_kolicina"]?>
								</div>
							</td>
							<td class="cart_delete">
							<a href='?action=deleteJedan&idart=<?php echo $k["proizvod_id"];?>' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Obrisi</a>
							
							</td>
							
							<?php 
						//	$narudzb=$dao->insertnarudzb($korpa[$i]['product_title'], $korpa[$i]['product_img1'], $korpa[$i]['product_desc']);
							
							//$cena+=$k["product_price"]*$k["kolicina"];
					    } ?>	
							
							<td class="cart_total">
								<p class="cart_total_price">
								<?php  $ukupno=$dao->ukupno($_SESSION['ulogovan']["korisnik_id"]);
								foreach($ukupno as $u){
								    //Moze i ovako
								//echo $u['SUM(kolica_kolicina*proizvod_cena)'];}
								//$_SESSION['cena']=$cena;
									echo $u["sum"];}
									?></p>
							</td>
							</tr>
					</tbody>
				</table>
					
			</div>
		</div>
		<?php 
	}else {
						    
						?>	
	</section> 
	
	
	<section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							
						</ul>
						<ul class="user_info">
							
						</ul>
					
						<h4>Vasa Korpa je prazna</h4>
						
					</div>
				</div>
				
				</div>
			</div>
		</div>
	</section>
	<?php }?>
