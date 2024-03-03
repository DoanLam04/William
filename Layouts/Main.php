<?php			
    if(isset($_GET['page'])){
        $page = $_GET['page'];			
        $route = [            	
            'home' => 'Layouts\Home.php',
            'listinggrid' => 'Layouts\ListingGrid.php',
            'category' => 'Layouts\Category.php',
            'detail' => 'Layouts\Detail.php',
            'login' => 'Pages\User\Login.php',
            'logout' => 'Pages\User\Logout.php',            
            'register' => 'Pages\User\Register.php',
            'forgotten' => 'Pages\User\Forgotten.php',
            'cart' => 'Layouts\Cart.php',
            'account' => 'Pages\User\Account.php',
            'search' => 'Pages\Search\Search.php',
            'clothes' => 'Pages\Category\Clothes.php',
            'electronics' => 'Pages\Category\Electronics.php',
            'inventory' => 'Pages\Category\Inventory.php',
            'accessory' => 'Pages\Category\Accessory.php',
            'accountupdate' => 'Pages\User\AccountUpdate.php',
            'addtocart' => 'Pages\Cart\AddToCart.php',
            'remove' => 'Pages\Cart\Remove.php',
            'clearcart' => 'Pages\Cart\ClearCart.php',
            'updatequantity' => 'Pages\Cart\UpdateQuantity.php',
            'makepurchase' => 'Pages\Cart\MakePurchase.php',
            'makepurchasedatabase' => 'Pages\Cart\MakePurchaseDatabase.php',
            'order' => 'Pages\Orders\Order.php',
            'message' => 'Pages\User\Message.php',
            'doupdateaccount' => 'Pages\User\doUpdateAccount.php',
            'successpurchase' => 'Pages\Cart\SuccessPurchase.php',
           
            
        ];
        foreach($route as $key => $value){					
            if($key == $page){
                require($value);
            }
        }
    }
    else{
        require('Layouts\Home.php');
    }				
?>
