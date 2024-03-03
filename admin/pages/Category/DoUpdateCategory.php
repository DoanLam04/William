<?php
    
    if(isset($_POST['updatecategory'])){    
        $id = $_GET['id'];

        $category_name = $_POST['category_name'];
        $created_at=date("Y-m-d H:i:s");
        $trang = $_POST['trang'];

        $category = array(
            'category_name' => $category_name,
            'created_at' => $created_at,
            'trang' => $trang,
        );
        $core->editRecord("category", $id, $category);
        echo "successfully update!";
        header("Location: index.php?page=categorylist");
    }
    else{
        header("Location: index.php?page=admin");
    }
    
    
?>