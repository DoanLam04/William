<?php
$sql = "SELECT * FROM product WHERE is_on_sale = 1 ORDER BY created_at DESC LIMIT 0,5";

$list_product = $core->getAll($sql);

?>

<section class="padding-bottom">
<div class="card card-deal">

  <div class="col-heading content-body">
    <header class="section-heading">
      <h3 class="section-title">Deals and offers</h3>
      <p>Count Down to New Year</p>
    </header><!-- sect-heading -->

    <div class="countdown">
        <div class="timer">
            <span id="days">00</span> ngày
            <span id="hours">00</span> giờ  
            <span id="minutes">00</span> phút
            <span id="seconds">00</span> giây
        </div>
    </div>
    <script src="Assets\js\Clock.js"></script>
  </div> <!-- col.// -->


<div class="row no-gutters items-wrap">

  <?php
  foreach($list_product as $product){
  ?>
  <div class="col-md col-6">
    <figure class="card-product-grid card-sm">
      <a href="index.php?page=detail&id=<?=$product['id']?>" class="img-wrap"> 
        <img src="Assets/images/items/<?=$product['image']?>"> 
      </a>
      <div class="text-wrap p-3">
        <a href="index.php?page=detail&id=<?=$product['id']?>" class="title"><?=$product['name']?></a>      
        <span class="badge badge-danger"> -<?=$product['discount']?>%</span>
      </div>
    </figure>
  </div> <!-- col.// -->
  <?php
    }
  ?>

  <!-- <div class="col-md col-6">
  <figure class="card-product-grid card-sm">
  <a href="#" class="img-wrap"> 
  <img src="Assets/images/items/4.jpg"> 
  </a>
  <div class="text-wrap p-3">
  <a href="#" class="title">Some category</a>
  <span class="badge badge-danger"> -5% </span>
  </div>
  </figure>
  </div> 

  <div class="col-md col-6">
  <figure class="card-product-grid card-sm">
  <a href="#" class="img-wrap"> 
  <img src="Assets/images/items/5.jpg"> 
  </a>
  <div class="text-wrap p-3">
  <a href="#" class="title">Another category</a>
  <span class="badge badge-danger"> -20% </span>
  </div>
  </figure>
  </div> 

  <div class="col-md col-6">
  <figure class="card-product-grid card-sm">
  <a href="#" class="img-wrap"> 
  <img src="Assets/images/items/6.jpg"> 
  </a>
  <div class="text-wrap p-3">
  <a href="#" class="title">Home apparel</a>
  <span class="badge badge-danger"> -15% </span>
  </div>
  </figure>
  </div> 

  <div class="col-md col-6">
  <figure class="card-product-grid card-sm">
  <a href="#" class="img-wrap"> 
  <img src="Assets/images/items/7.jpg"> 
  </a>
  <div class="text-wrap p-3">
  <a href="#" class="title text-truncate">Smart watches</a>
  <span class="badge badge-danger"> -10% </span>
  </div>
  </figure>
  </div>  -->

  </div>
</div>

</section>