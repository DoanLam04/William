<?php
    $id = $_GET['id'];

    // update view tăng 1 đơn vị
    $core->updateViews($id); 
    
    $sql = "SELECT * FROM PRODUCT WHERE id = $id";
    
    $result = $core->getOne($sql);   
  	$temp = $result['cat_id'];
    $sql_cate = "SELECT * FROM CATEGORY WHERE id = $temp";
    $cate = $core->getOne($sql_cate);
?>    

<section class="py-3 bg-light">
  <div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#"><?=$cate['category_name']?></a></li>
        <li class="breadcrumb-item"><a href="#">Sub category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Items</li>
    </ol>
  </div>
</section>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg-white padding-y">
	<div class="container">
		<div class="row">
			<aside class="col-md-6">
				<div class="card">
					<article class="gallery-wrap"> 
						<div class="img-big-wrap">
							<div> <a href="#"><img src="Assets/images/items/<?=$result['image']?>"></a></div>
						</div> <!-- slider-product.// -->
						<div class="thumbs-wrap">
							<a href="#" class="item-thumb"> <img src="Assets/images/items/<?=$result['image']?>"></a>	 
						</div> <!-- slider-nav.// -->
					</article> <!-- gallery-wrap .end// -->
				</div> <!-- card.// -->
			</aside>
			<main class="col-md-6">
				<article class="product-info-aside">

					<h2 class="title mt-3" id="detailName"><?=$result['name']?> </h2>

					<div class="rating-wrap my-3">
						<div class="stars">
							<form action="">
								<input class="star star-5" id="star-5" type="radio" name="star"/>
								<label class="star star-5" for="star-5"></label>
								<input class="star star-4" id="star-4" type="radio" name="star"/>
								<label class="star star-4" for="star-4"></label>
								<input class="star star-3" id="star-3" type="radio" name="star"/>
								<label class="star star-3" for="star-3"></label>
								<input class="star star-2" id="star-2" type="radio" name="star"/>
								<label class="star star-2" for="star-2"></label>
								<input class="star star-1" id="star-1" type="radio" name="star"/>
								<label class="star star-1" for="star-1"></label>
							</form>
						</div>
						<small class="label-rating text-muted">132 reviews</small>
						<small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
					</div> <!-- rating-wrap.// -->

					<div class="mb-3"> 
						<var class="price h4">USD $<?=$result['price']?></var> 
						<span class="text-muted">USD 562.65 incl. VAT</span> 
					</div> <!-- price-detail-wrap .// -->

					<p>Compact sport shoe for running, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat </p>


					<dl class="row">
						<dt class="col-sm-3">Manufacturer</dt>
						<dd class="col-sm-9"><a href="#">Great textile Ltd.</a></dd>

						<dt class="col-sm-3">Article number</dt>
						<dd class="col-sm-9">596 065</dd>

						<dt class="col-sm-3">Guarantee</dt>
						<dd class="col-sm-9">2 year</dd>

						<dt class="col-sm-3">Delivery time</dt>
						<dd class="col-sm-9">3-4 days</dd>

						<dt class="col-sm-3">Availabilty</dt>
						<dd class="col-sm-9">in Stock</dd>
					</dl>

					<div class="form-row  mt-4">		
						
						<!-- quantity -->
						<div class="quantity">
							<span class="minus btn btn-info">-</span>
							<span class="num btn">01</span>
							<span class="plus btn btn-success">+</span>
						</div>

						<script src="Assets\js\quantity.js"></script>


						<div class="form-group col-md">
							<a href="index.php?page=addtocart&id=<?=$id?>"  class="btn  btn-primary"> 
								<i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span> 
							</a>
							<a href="#" class="btn btn-light">
							<i class="fas fa-envelope"></i> <span class="text">Contact supplier</span> 
							</a>
						</div> <!-- col.// -->
					</div> <!-- row.// -->

				</article> <!-- product-info-aside .// -->
			</main> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y bg">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h5 class="title-description">Description</h5>
				<p>
					<?=$result['description']?>
				</p>
				<ul class="list-check">
					<li>Material: Stainless steel</li>
					<li>Weight: 82kg</li>
					<li>built-in drip tray</li>
					<li>Open base for pots and pans</li>
					<li>On request available in propane execution</li>
				</ul>

				<h5 class="title-description">Specifications</h5>
				<table class="table table-bordered">
					<tr> <th colspan="2">Basic specs</th> </tr>
					<tr> <td>Type of energy</td><td>Lava stone</td> </tr>
					<tr> <td>Number of zones</td><td>2</td> </tr>
					<tr> <td>Automatic connection	</td> <td> <i class="fa fa-check text-success"></i> Yes </td></tr>

					<tr> <th colspan="2">Dimensions</th> </tr>
					<tr> <td>Width</td><td>500mm</td> </tr>
					<tr> <td>Depth</td><td>400mm</td> </tr>
					<tr> <td>Height	</td><td>700mm</td> </tr>

					<tr> <th colspan="2">Materials</th> </tr>
					<tr> <td>Exterior</td><td>Stainless steel</td> </tr>
					<tr> <td>Interior</td><td>Iron</td> </tr>

					<tr> <th colspan="2">Connections</th> </tr>
					<tr> <td>Heating Type</td><td>Gas</td> </tr>
					<tr> <td>Connected load gas</td><td>15 Kw</td> </tr>

				</table>
			</div> <!-- col.// -->
			
			<aside class="col-md-4">

				<div class="box">
				
					<h5 class="title-description">Files</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>

					<h5 class="title-description">Videos</h5>
			

					<article class="media mb-3">
						<a href="#"><img class="img-sm mr-3" src="images/posts/3.jpg"></a>
						<div class="media-body">
							<h6 class="mt-0"><a href="#">How to use this item</a></h6>
							<p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
						</div>
					</article>

					<article class="media mb-3">
						<a href="#"><img class="img-sm mr-3" src="images/posts/2.jpg"></a>
						<div class="media-body">
							<h6 class="mt-0"><a href="#">New tips and tricks</a></h6>
							<p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
						</div>
					</article>

					<article class="media mb-3">
						<a href="#"><img class="img-sm mr-3" src="images/posts/1.jpg"></a>
						<div class="media-body">
							<h6 class="mt-0"><a href="#">New tips and tricks</a></h6>
							<p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
						</div>
					</article>


				
				</div> <!-- box.// -->
			</aside> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
