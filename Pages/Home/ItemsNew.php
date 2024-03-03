<?php
    $sql = "select * from product order by created_at desc limit 0,6";

    $list_product = $core->getAll($sql);	
?>

<section  class="padding-bottom-sm">

<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase">Latest Items</h4>
</header>

<div class="row row-sm">

	<?php
		foreach($list_product as $product){		
	?>
	<div class="col-xl-2 col-lg-3 col-md-4 col-6">
		<div class="card card-sm card-product-grid">
			<div class="img-wrap"> 
				<?php 
				if($product['discount']){
				?>
					<label class="badge badge-danger"> -<?=$product['discount']?>%</label>						
				<?php
				}
				else{
				?>
				<span class="badge badge-danger"> Newest </span>
				<?php
				}
				?>
				<a href="index.php?page=detail&id=<?=$product['id']?>"> 
					<img src="Assets/images/items/<?=$product['image']?>"> 
				</a>
			</div> <!-- img-wrap.// -->
			<figcaption class="info-wrap">
				<a href="index.php?page=detail&id=<?=$product['id']?>" class="title"><?=$product['name']?></a>
				<!-- price -->
				<br>
				<?php
					if(isset($product['discount'])){ ?>
						<p class="price" style="text-decoration: line-through">$<?=$product['price']?></p>
				<?php
					}
					else{ ?>
						<p class="price">$<?=$product['price']?></p>
				<?php
					}
				?>                				
				<p class="saleprice">
				<?php                     
                    if($product['discount']){
                        $sale_price = $product['price'] - $product['price']*$product['discount']/100;
                        echo "<br>Sale Price: $" .$sale_price;
                    }
                    else{
                        echo "<br>Hot deal";
                    }                    
                ?>
				</p>
			</figcaption>
		</div>
	</div> <!-- col.// -->
	<?php
	}
	?>
</div> <!-- row.// -->
</section>