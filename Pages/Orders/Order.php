<?php
	if(!isset($_SESSION['user'])){
		echo "Đăng nhập để xem!";
		exit();
	}

	$id = $_SESSION['id'];
    $sql = "SELECT * FROM ORDERS, ORDER_DETAIL WHERE ORDERS.ID = ORDER_DETAIL.ORDER_ID AND USER_ID = $id ORDER BY ORDER_DATE DESC";
    $list_order = $core->getAll($sql);
    //print_r($list_order);
?>

<section class="section-content padding-y">
	<div class="container">

		<div class="row">
			<main class="col-md-9">
				<div class="card">
					
					<!--	CONTENT CART	-->
					<table class="table table-borderless table-shopping-cart" style="border: 1px solid black;">
						<thead class="text-muted">
							<tr class="text-uppercase" style="color: black; border-bottom: 1px solid black;">
								<th scope="col" style="border-right: 1px solid black;">Product</th>
								<th scope="col" width="120" style="border-right: 1px solid black;">Price</th>
								<th scope="col" width="200" style="border-right: 1px solid black;">Quantity</th>								
								<th scope="col" class="text-right" width="200">Total Price</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								// Hiển thị giỏ hàng
                                $_SESSION['totalprice'] = 0;
                                $_SESSION['discount'] = 0;
                                foreach ($list_order as $order) {
                                    $product_id = $order['product_id'];
                                    $sql = "SELECT * FROM PRODUCT WHERE ID = $product_id";
                                    $product = $core->getOne($sql);
							?>
									<tr style="border-bottom: 1px solid black;">
										<td style="border-right: 1px solid black;">
											<figure class="itemside">
												<div class="aside"><img src="Assets/images/items/<?=$product['image']?>" class="img-sm"></div>
												<figcaption class="info">
													<a href="index.php?page=detail&id=<?=$product['id']?>" class="title text-dark"><?=$product['name']?></a>
													<p class="text-muted small">Size: XL, Color: blue, <br> ID: <?=$product['id']?></p>
												</figcaption>
											</figure>
										</td>

										<td style="border-right: 1px solid black;"> 
											<div class="text-muted" > $<?=$order['price']?></div>
										</td>

										<td style="border-right: 1px solid black;">
											<div class="row">
												<span class="col-md-6 form-control" style="font-weight: bold; max-width: 50px;">
													<?= $order['quantity'] ?>
												</span>
											</div>
										</td>
										
										<td class="text-right" style="border-right: 1px solid black;"> 
											<?php
												$_SESSION['totalprice'] += $order['total_price'];
												$_SESSION['discount'] += $order['quantity']*$product['discount'];
											?>
											<div class="text-muted"> $<?=$order['total_price']?></div> 
										</td>
									</tr>
							<?php
									}
								
								
							?>
						</tbody>
					</table>

					
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