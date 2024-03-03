<?php
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']); 
    }
    header("Location: index.php");
?>