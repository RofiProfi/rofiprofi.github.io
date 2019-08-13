	<?php require_once '../model/DAO.php';
	?>
	<div class="left-sidebar">
						<h2>Kategorije</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										</h4>
<ul class="nav nav-pills nav-stacked">
									
									<?php 
									$dao=new DAO();
									$kat=$dao->selectKategorije();
									foreach($kat as $k){?>
									    <li><a href='?action=product&id=<?php echo $k["cat_id"];?>'><?php echo $k["cat_title"];?></a> </li>
									    
								<?php }?>									
								</ul>								
													
								</div>
								
							</div>
						</div><!--/category-products-->
						
						
					
						
						
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						<div class="shipping text-center"><!--shipping-->
							<img src="../images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>