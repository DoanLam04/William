<?php
    $product_name = $_GET['search'];
  

    $sql = "SELECT * FROM PRODUCT WHERE LOWER(name) LIKE LOWER('%$product_name%') ";
    // đếm tổng sản phẩm
    $sqlCount = "SELECT COUNT(*) FROM product WHERE LOWER(name) like LOWER('%$product_name%')";
    

    if($product_name === ''){
        $sql = "SELECT * FROM PRODUCT";
        $sqlCount = "SELECT COUNT(*) FROM product";
    }    

    $totalPages = $core->totalpages($sqlCount);

    $result = $core->pagination(isset($_SESSION['trang'])?$_SESSION['trang']:1,$sqlCount,$sql);
?>

<div class="container">
    <div class="row">
        <!-- PHP -->
        <?php
        $list_product = $result;
        foreach($list_product as $product){
        ?>
        <!-- PHP END -->

        <div class="col-md-3">
            <figure class="card card-product-grid">
                <div class="img-wrap" > 				
                    <img src="Assets/images/items/<?=$product['image']?>">				
                </div> <!-- img-wrap.// -->
                <figcaption class="info-wrap">
                        <a href="index.php?page=detail&id=<?=$product['id']?>" class="title mb-2" >
                            <?=$product['name']?>
                        </a>
                        <div class="price-wrap">
                            <span class="price">$<?=$product['price']?></span> 
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

                        <a href="#" class="btn btn-outline-primary"> <i class="fa fa-envelope"></i> Contact supplier </a>	
                        
                </figcaption>
            </figure>
        </div> <!-- col.// -->
        <!-- PHP -->	
        <?php
        }
        ?>
        <!-- PHP END -->
    </div> <!-- row end.// -->


    <nav class="mb-4" aria-label="Page navigation sample">
    <ul class="pagination">
        <li class="page-item <?=$_SESSION['trang']==1?'disabled':'active'?>">
            <!-- PREVIOUS BUTTON -->
            <div class="page-link flex flex-col items-center" class="">
                <form method="post" action="index.php?page=search&search=<?=$product_name?>">
                    <input type="hidden" name="counter" value="<?php echo (isset($_POST['counter']) && $_POST['counter']>1) ? $_POST['counter'] - 1 : 1; ?>">
                    <input type="submit" name="update" value="Previous" style="border:none; background-color: transparent;">
                </form>
            </div>
        </li>
        
            <?php
            for($i = 1; $i<=$totalPages; $i++){
            ?>
            <li class="page-item">
                <form method="post" action="index.php?page=search&search=<?=$product_name?>">
                <input type="hidden" name="counter" value="<?=$_SESSION['trang']=$i?>">
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
                <form method="post" action="index.php?page=search&search=<?=$product_name?>">
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


    <div class="box text-center">
        <p>Did you find what you were looking for？</p>
        <a href="" class="btn btn-light">Yes</a>
        <a href="" class="btn btn-light">No</a>
    </div>

</div> <!-- container .//  -->






