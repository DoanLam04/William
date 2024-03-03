<?php

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $core->addToCart($id, 1); 
}

header("Location: index.php?page=listinggrid");
?>