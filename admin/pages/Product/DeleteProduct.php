<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $result = $core->deleteProduct($id);
        if($result){
            echo "xóa thành công!";
        }
        else{
            echo "xóa không thành công!";
        }

        if(isset($_GET['catid'])){
            $catid=$_GET['catid'];
            header("Location: index.php?page=product&catid=$catid");
        }
        else{
            header("Location: index.php?page=product");
        }        
    } 
    else {
        header("Location: index.php");       
    }
?>
