<?php
    if(isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM PRODUCT WHERE CAT_ID = $id";
        $result = $core->getOne($sql);

        if(empty($result)){
            $sql = "DELETE FROM CATEGORY WHERE ID = $id";
            $core->setQuery($sql);
            
            echo "xóa thành công";
        }
        else{
            echo "KHÔNG ĐƯỢC XÓA!";
        }

        header("Location: index.php?page=categorylist");
    }
    else{
        header("Location: index.php");
    }
?>
