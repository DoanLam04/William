<?php
//get 
$sql = "SELECT * FROM product, category WHERE product.cat_id = category.id AND category.id = 1 ORDER BY product.created_at DESC LIMIT 0,8";
$list_product = $core->getAll($sql);	

?>

<section class="padding-bottom">
	<header class="section-heading heading-line">
		<h4 class="title-section text-uppercase">Clothes</h4>
	</header>

	<div class="card card-home-category">
		<div class="row no-gutters">

			<div class="col-md-3">
				
				<div class="home-category-banner bg-light-orange">
					<h5 class="title">Best trending clothes only for summer</h5>
					<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					<a href="#" class="btn btn-outline-primary rounded-pill">Source now</a>
					<img src="Assets/images/items/2.jpg" class="img-bg">
				</div>

			</div> <!-- col.// -->


			<div class="col-md-9">
				<ul class="row no-gutters bordered-cols">
					<!-- PHP -->
				<?php
				
				foreach($list_product as $product){
				?>
				<!-- PHP END -->
					<li class="col-6 col-lg-3 col-md-4">
						<a href="#" class="item"> 
							<div class="card-body">
								<h6 class="title"><?=$product['name']?></h6>
								<img class="img-sm float-right" src="Assets/images/items/<?=$product['image']?>"> 
								<p class="text-muted"><i class="fa fa-map-marker-alt"></i> Guanjou, China</p>
							</div>
						</a>
					</li>

				<?php
				}

				?>
				</ul>
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- card.// -->
</section>