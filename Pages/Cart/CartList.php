<?php
	if(!isset($_SESSION['user'])){
		echo "Đăng nhập để xem!";
		exit();
	}

	if (empty($_SESSION['cart'])) {
		echo "Giỏ hàng trống.";
	}

?>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
	<div class="container">

		<div class="row">
			<main class="col-md-9">
				<div class="card">
					
					<!--	CONTENT CART	-->
					<table class="table table-borderless table-shopping-cart">
						<thead class="text-muted">
							<tr class="small text-uppercase">
								<th scope="col">Product</th>
								<th scope="col" width="200">Quantity</th>
								<th scope="col" width="120">Price</th>
								<th scope="col" class="text-right" width="200"> </th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								// Hiển thị giỏ hàng
								$_SESSION['totalprice'] = 0;
								$_SESSION['discount'] = 0;
								if(!isset($_SESSION['cart'])){
									$_SESSION['cart'] = array();
								}
								foreach ($_SESSION['cart'] as $product_id => $quantity) {

									$sql = "SELECT * FROM PRODUCT WHERE ID = $product_id";
									$product = $core->getOne($sql);
									
									if(isset($product['name'])){
							?>
									<tr>
										<td>
											<figure class="itemside">
												<div class="aside"><img src="Assets/images/items/<?=$product['image']?>" class="img-sm"></div>
												<figcaption class="info">
													<a href="index.php?page=detail&id=<?=$product['id']?>" class="title text-dark"><?=$product['name']?></a>
													<p class="text-muted small">Size: XL, Color: blue, <br> ID: <?=$product['id']?></p>
												</figcaption>
											</figure>
										</td>
										<td>
										<div class="row">
											<span class="col-md-3" style="border: none; min-width: 50px;">
												<form method="post" action="index.php?page=updatequantity&id=<?=$product_id?>">
													<input  class="p-1 form-control" type="submit" name ="decrease" value="-"
														<?php 
															if($quantity <= 1){
																echo "disabled";
															}
														?>
													>
												</form>
											</span>
											
											<span class="col-md-6 form-control" style="font-weight: bold; max-width: 50px;">
												<?= $quantity ?>
											</span>	

										
											<span class="col-md-3" style="border: none; min-width: 50px;">
												<form method="post" action="index.php?page=updatequantity&id=<?=$product_id?>">
													<input class="p-1 form-control" type="submit" name ="increase" value="+" 
														<?php 
															if($quantity >= 5){
																echo "disabled";
															}
														?>
													>
												</form>
											</span>
										</div>
											
										</td>
										<td> 
											<div class="price-wrap"> 
												<var class="price">$
													<?php
													$_SESSION['totalprice'] += $quantity*$product['price'];
													echo $quantity*$product['price'];
													$_SESSION['discount'] += $quantity*$product['discount'];
													?>
												</var> 
												<small class="text-muted"> $<?=$product['price']?> each </small> 
											</div> <!-- price-wrap .// -->
										</td>
										<td class="text-right"> 
 
										<a href="index.php?page=remove&id=<?=$product['id']?>" class="remove btn btn-light"> Remove</a>
										</td>
									</tr>
							<?php
									}
								}
								
							?>
						</tbody>
					</table>

					<div class="card-body border-top">	
						<?php
							if(count($_SESSION['cart']) != 0){
								//echo count($_SESSION['cart']);
						?>
						<a href="index.php?page=makepurchase" class="btn btn-primary float-md-right"> 
							Make Purchase <i class="fa fa-chevron-right"></i> 
						</a>
						<?php
							}
						?>
						<a href="index.php?page=listinggrid" class="btn btn-light"> <i class="fa fa-chevron-left"></i> 
							Continue shopping 
						</a>
					</div>	
					<div class="card-body border-top">	
					<?php
						if (count($_SESSION['cart']) != 0) {
					?>
						<div class="card-body border-top">						
							<a href="index.php?page=clearcart" class="clearallcart  btn btn-light"> 
								Clear All Cart 
							</a>
						</div>
					<?php
						}
					?>
						
					</div>
				</div> <!-- card.// -->

				<div class="alert alert-success mt-3">
					<p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
				</div>

			</main> <!-- col.// -->
			<aside class="col-md-3">
				<div class="card mb-3">
					<div class="card-body">
					<form>
						<div class="form-group">
							<label>Have coupon?</label>
							<div class="input-group">
								<input type="text" class="form-control" name="" placeholder="Coupon code">
								<span class="input-group-append"> 
									<button class="btn btn-primary">Apply</button>
								</span>
							</div>
						</div>
					</form>
					</div> <!-- card-body.// -->
				</div>  <!-- card .// -->
				<div class="card">
					<div class="card-body">
							<dl class="dlist-align">
								<dt>Total price:</dt>
								<dd class="text-right"><strong>$<?=$_SESSION['totalprice']?></strong></dd>
							</dl>
							<dl class="dlist-align">
								<dt>Discount:</dt>
								<dd class="text-right" style="color: red;"><strong> - $<?=$_SESSION['discount']?></strong></dd>
							</dl>
							<dl class="dlist-align">
								<dt>Total:</dt>
								<dd class="text-right  h5" style="color: blue;"><strong>$ <?=$_SESSION['totalprice'] - $_SESSION['discount']?> </strong>
								</dd>
							</dl>
							<hr>
							<p class="text-center mb-3">
								<img src="Assets/images/misc/payments.png" height="26">
							</p>
							
					</div> <!-- card-body.// -->
				</div>  <!-- card .// -->
			</aside> <!-- col.// -->
		</div>

	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

