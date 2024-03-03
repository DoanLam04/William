<?php
    
    if(isset($_POST['insertcategory'])){  
        $created_at=date("Y-m-d H:i:s");   
        $category_name = $_POST['category_name'];
        $trang = $_POST['trang'];

        $sql = "SELECT * FROM CATEGORY ORDER BY ID DESC LIMIT 0,1";
        $result=$core->getOne($sql);       
        $count = $result['id'] + 1;

        $category=array(
            'id'=> $count,
            'category_name' => $category_name,
            'created_at' => $created_at,
            'trang' => $trang,
        );

        $core->addRecord("category",$category);
        header("Location: index.php?page=categorylist");
    }
    else{
        header("Location: index.php?page=categorylist");
    }

?>