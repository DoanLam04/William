<?php

if(isset($_GET['id'])){
    $core->removeFromCart($_GET['id']);
}

header("Location: index.php?page=cart");

?>