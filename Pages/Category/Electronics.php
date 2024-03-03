<?php  
    $_SESSION['trang'] = isset($_POST['counter']) ? $_POST['counter'] : 1; 
?>

<?php 
	//get 
    $sql = "SELECT * FROM product, category WHERE product.cat_id = category.id AND category.id = 2";
   // đếm tổng sản phẩm
   $sqlCount = "SELECT COUNT(*) FROM product, category WHERE product.cat_id = category.id AND category.id = 2";

   $totalPages = $core->totalpages($sqlCount);

   $result = $core->pagination(isset($_SESSION['trang'])?$_SESSION['trang']:1,$sqlCount,$sql);	
?>

<section class="section-content padding-y">
	<div class="container">
		<!-- ============================  FILTER TOP  ================================= -->
		<div class="card mb-3">
			<div class="card-body">
				<div class="row">
					<div class="col-md-2"> Your are here: </div> <!-- col.// -->
					<nav class="col-md-8"> 
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
							<li class="breadcrumb-item"><a href="index.php?page=electronics">Listing Grid</a></li>
							<li class="breadcrumb-item"><a href="index.php?page=Electronics">Electronics</a></li>
							
						</ol>  
					</nav> <!-- col.// -->
				</div> <!-- row.// -->
				<hr>
				<div class="row">
					<div class="col-md-2">Filter by</div> <!-- col.// -->
					<div class="col-md-10"> 
						<ul class="list-inline">
						<li class="list-inline-item mr-3 dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">   Supplier type </a>
							<div class="dropdown-menu p-3" style="max-width:400px;">	
							<label class="form-check">
								<input type="radio" name="myfilter" class="form-check-input"> Good supplier
							</label>
							<label class="form-check">	
								<input type="radio" name="myfilter" class="form-check-input"> Best supplier
							</label>
							<label class="form-check">
								<input type="radio" name="myfilter" class="form-check-input"> New supplier
							</label>
							</div> <!-- dropdown-menu.// -->
						</li>
						<li class="list-inline-item mr-3 dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">  Country </a>
							<div class="dropdown-menu p-3">	
							<label class="form-check"> 	 <input type="checkbox" class="form-check-input"> China    </label>
							<label class="form-check">   	 <input type="checkbox" class="form-check-input"> Japan      </label>
							<label class="form-check">    <input type="checkbox" class="form-check-input"> Uzbekistan  </label>
							<label class="form-check">  <input type="checkbox" class="form-check-input"> Russia     </label>
							</div> <!-- dropdown-menu.// -->
						</li>
						<li class="list-inline-item mr-3 dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Feature</a>
							<div class="dropdown-menu">
								<a href="" class="dropdown-item">Anti backterial</a>
								<a href="" class="dropdown-item">With buttons</a>
								<a href="" class="dropdown-item">Extra safety</a>
							</div>
						</li>
						<li class="list-inline-item mr-3"><a href="#">Color</a></li>
						<li class="list-inline-item mr-3"><a href="#">Size</a></li>
						<li class="list-inline-item mr-3">
							<div class="form-inline">
								<label class="mr-2">Price</label>
								<input class="form-control form-control-sm" placeholder="Min" type="number">
									<span class="px-2"> - </span>
								<input class="form-control form-control-sm" placeholder="Max" type="number">
								<button type="submit" class="btn btn-sm btn-light ml-2">Ok</button>
							</div>
						</li>
						<li class="list-inline-item mr-3">
							<label class="custom-control mt-1 custom-checkbox">
							<input type="checkbox" class="custom-control-input">
							<div class="custom-control-label">Ready to ship
							</div>
							</label>
						</li>
						</ul>
					</div> <!-- col.// -->
				</div> <!-- row.// -->
			</div> <!-- card-body .// -->
		</div> <!-- card.// -->
		<!-- ============================ FILTER TOP END.// ================================= -->




		<header class="mb-3">
				<div class="form-inline">
					<strong class="mr-md-auto"> &emsp;	 <?=count($result)?> Items found </strong>
					<select class="mr-2 form-control">
						<option>Latest items</option>
						<option>Trending</option>
						<option>Most Popular</option>
						<option>Cheapest</option>
					</select>
					<div class="btn-group">
						<a href="index.php?page=listinglarge" class="btn btn-light" data-toggle="tooltip" title="List view"> 
							<i class="fa fa-bars"></i></a>
						<a href="index.php?page=electronics" class="btn btn-light active" data-toggle="tooltip" title="Grid view"> 
							<i class="fa fa-th"></i></a>
					</div>
				</div>
		</header><!-- sect-heading -->

		<div class="row">
			<!-- PHP -->
			<?php
			$list_product = $result;
			foreach($list_product as $product){
			?>
			<!-- PHP END -->

			<div class="col-md-3">
				<figure class="card card-product-grid">
					<div class="img-wrap"> 
						<?php 
						if($product['discount']){
						?>
							<label class="badge badge-danger"> -<?=$product['discount']?>%</label>						
						<?php
						}				
						?>
						
						<a href="index.php?page=detail&id=<?=$product['id']?>"> 
							<img src="Assets/images/items/<?=$product['image']?>"> 
						</a>
					</div> <!-- img-wrap.// -->
					<figcaption class="info-wrap">
							<a href="index.php?page=detail&id=<?=$product['id']?>" class="title mb-2" >
								<?=$product['name']?>
							</a>
							<div class="price-wrap">
								<?php
									if(isset($product['discount'])){?>
										<span class="price" style="color:green; text-decoration: line-through;">$<?=$product['price']?></span>
										<span class="price" style="color: red">$<?=$product['price'] - $product['price']*$product['discount']/100?></span>
								<?php
									}
									else{ ?>
										<span class="price" style="color:green;">$<?=$product['price']?></span> 
								<?php	
									}
								?>								
								<small class="text-muted">/per item</small>
							</div> <!-- price-wrap.// -->
							
							<p class="mb-2"> 2 Pieces  <small class="text-muted">(Min Order)</small></p>
							
							<p class="text-muted ">Guangzhou Yichuang Electronic Co</p>
						
							<hr>
							
							<p class="mb-3">
								<span class="tag"> <i class="fa fa-check"></i> Verified</span> 
								<span class="tag"> 2 Years </span> 
								<span class="tag"> <?=$product['views']?> view<?=$product['views']<=1?'':'s'?> </span>
								<span class="tag"> Japan </span>
							</p>
						
							<label class="custom-control mb-3 custom-checkbox">
							<input type="checkbox" class="custom-control-input">
							<div class="custom-control-label">Add to compare
							</div>
							</label>

							<a href="index.php?page=addtocart&id=<?=$product['id']?>" class="btn btn-outline-primary"> <i class="fa fa-envelope"></i> Add to Cart </a>
					</figcaption>
				</figure>
			</div> <!-- col.// -->
			<!-- PHP -->	
			<?php
			}
			?>
			<!-- PHP END -->
		</div> <!-- row end.// -->


		<div class="pagination">		
			<nav class="mb-4" aria-label="Page navigation sample">
				<ul class="pagination">
					<li class="page-item <?=$_SESSION['trang']==1?'disabled':'active'?>">
						<!-- PREVIOUS BUTTON -->
						<div class="page-link flex flex-col items-center" class="">
							<form method="post" action="index.php?page=electronics">
								<input type="hidden" name="counter" value="<?php echo (isset($_POST['counter']) && $_POST['counter']>1) ? $_POST['counter'] - 1 : 1; ?>">
								<input type="submit" name="update" value="Previous" style="border:none; background-color: transparent;">
							</form>
						</div>
					</li>
					
					<?php
					
					for($i = 1; $i<=$totalPages; $i++){
					?>
					<li class="page-item
					<?php
					if($_SESSION['trang'] == $i){
						echo 'active';
					}
					?>
					
					">
						<form method="post" action="index.php?page=electronics">
						<input type="hidden" name="counter" value="<?=$i?>">
						<input type="submit" name="update" class="page-link" value="<?=$i?>"></input>
						</form>
					</li>
					<?php
					}	
					?>
					
					<?php
					if(!isset($_POST['counter'])){
						$_POST['counter'] = 1;
					}
					?>

					<li class="page-item <?=$_POST['counter']<$totalPages?'active':'disabled'?>">
						<!-- NEXT BUTTON -->
						<div class="page-link flex flex-col items-center">
							<form method="post" action="index.php?page=electronics">
								<input type="hidden" name="counter" value="<?php 
									if(isset($_POST['counter'])){
										if($_POST['counter']<$totalPages){
											echo $_POST['counter'] + 1;
										}
										else{
											echo $_POST['counter'];
										}            
									}
									else{
										echo 2;
									}
								?>">
								<input type="submit" name="update" value="Next" style="border:none; background-color: transparent;">
							</form>
						</div>
					</li>

				</ul>
			</nav>
		</div>	


		<div class="box text-center">
			<p>Did you find what you were looking for？</p>
			<a href="" class="btn btn-light">Yes</a>
			<a href="" class="btn btn-light">No</a>
		</div>

	</div> <!-- container .//  -->
</section>