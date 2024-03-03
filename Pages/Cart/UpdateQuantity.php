<?php

    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        if($product_id == $_GET['id']){

            //increase
            if(isset($_POST['increase'])){
                if($_SESSION['cart'][$product_id] < 5){
                    $_SESSION['cart'][$product_id]++;
                }
                
            }
            
            // decrease
            if(isset($_POST['decrease'])){
                if($_SESSION['cart'][$product_id] > 1){
                    $_SESSION['cart'][$product_id]--;
                }
            }
          
            // cart
            header("Location: index.php?page=cart");
        }
    
    }
?>