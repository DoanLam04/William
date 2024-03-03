<?php
	$sql = "SELECT * FROM CATEGORY";
	$result = $core->getAll($sql);
	
?>

<section class="section-content padding-y">
	<div class="container">

		<nav class="row">
			<!-- PHP -->
			<?php
			$list_product = $result;
			foreach($list_product as $product){
			?>
			<!-- PHP END -->
			<a href="index.php?page=<?=$product['trang']?>">
			<div class="col-md-3">				
				<div class="card card-category">
					<div class="img-wrap" style="background: #c2d2e9;">					
					<img src="Assets/images/items/<?=$product['id']?>.jpg">					
					</div>
					<div class="card-body">
					<h4 class="card-title"><a href="index.php?page=<?=$product['trang']?>"><?=$product['category_name']?></a></h4>
					<ul class="list-menu">
						<li><a href="">Unisex T shirts</a></li>
						<li><a href="">Casual shirts</a></li>
						<li><a href="">Scherf Ice cream</a></li>
						<li><a href="">Another category</a></li>
						<li><a href="">Great items name</a></li>
						<li><a href="">Great items name</a></li>
					</ul>
					</div>
				</div>
			</div> <!-- col.// -->
			</a>
			<?php
			}
			?>
		</nav> <!-- row.// -->


	</div> <!-- container .//  -->
</section>