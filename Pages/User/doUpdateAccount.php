<?php
    $id = $_GET['id'];
    if(isset($_POST['update'])){
        $username = $_POST['username'];
        $password = $_POST['pw'];
        $name = $_POST['name'];
        $email = $_POST['mail'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $created = date("Y-m-d H:i:s");
        $dateofbirth = $_POST['dateofbirth'];
  
        $i = "temp.png";
        
        if ($_FILES['avatar']['size'] > 0) {
            require("lib/file.php");
            $file = $_FILES['avatar'];
            $i = $file['name'];
            $u = new Upload();
            $u->doUpload($file);
        }
        
        if ($_FILES['avatar']['size'] > 0) {
            $user = array(
                'username' => $username,
                'password' => $_POST['pw'],
                'name' => $_POST['name'],
                'email' => $_POST['mail'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'gender' => $_POST['gender'],
                'dateofbirth' => $_POST['dateofbirth'],
                'avatar' => $i
            );
            $core->editRecord("user", $id, $user);
        }
        
    }
    else{
        echo "chưa có update!";
    }
?>