<?php

    if(isset($_SESSION['user'])){
        session_destroy();
    }
    

    if(isset($_COOKIE['user'])) {

        setcookie("user", " ", time() + 36000);
        setcookie("pass"," ",time() + 36000);

    }
    header("Location: index.php");
?>