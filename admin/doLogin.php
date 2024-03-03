<?php
    session_start();

    require("../Lib/coreFunction.php");
    $core = new coreFunction();
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    $sql = "SELECT * FROM USER WHERE USERNAME = '$username' AND PASSWORD = '$password' AND ROLE='ADMIN'";
    $user = $core->getOne($sql);
    print_r($user);

    $flag = false;

    if(!empty($user)){
        echo "successfully login!";
        if(isset($_POST['remember'])){
            setcookie('ADMIN', 'ADMIN', time() + 3600, "/","", 0);
            echo $_COOKIE['ADMIN'];
        }                
        $_SESSION['ADMIN'] = 'ADMIN';
        $flag = true;
    }

    if($flag){
        //echo $_SESSION['ADMIN'];
        //echo $_COOKIE['ADMIN'];
        header("Location: ../admin/index.php");
    }
    else{
        header("Location: ../admin/login.php");
    }

?>