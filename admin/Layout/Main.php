<?php			
    if(isset($_GET['page'])){
        $page = $_GET['page'];			
        $route = [  
            'admin' => '../admin/Layout/Home.php',  

            'categorylist' => '../admin/pages/Category/CategoryList.php',
            'updatecategory' => '../admin/pages/Category/UpdateCategory.php',
            'doupdatecategory' => '../admin/pages/Category/DoUpdateCategory.php',           
            'insertcategory' => '../admin/pages/Category/InsertCategory.php',
            'doinsertcategory' => '../admin/pages/Category/DoInsertCategory.php',            
            'deletecategory'=>'../admin/pages/Category/DeleteCategory.php',
           
            'product' => '../admin/pages/Product/Product.php',
            'updateproduct' => '../admin/pages/Product/UpdateProduct.php',
            'doupdateproduct' => '../admin/pages/Product/DoUpdateProduct.php',
            'insertproduct' => '../admin/pages/Product/InsertProduct.php',
            'doinsertproduct' => '../admin/pages/Product/DoInsertProduct.php',
            'deleteproduct' => '../admin/pages/Product/DeleteProduct.php',
            
            'user' => '../admin/pages/User/User.php',
            'userdetail' => '../admin/pages/User/UserDetail.php',

            'order' => '../admin/pages/Order/Order.php',
            'orderdetail' => '../admin/pages/Order/OrderDetail.php',



            
            
        ];
        foreach($route as $key => $value){					
            if($key == $page){
                require($value);
            }
        }
    }
    else{
        require('../admin/Layout/Home.php');
    }				
?>
