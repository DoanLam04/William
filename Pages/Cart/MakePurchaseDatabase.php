<?php

// thêm vào bảng order
$userid = isset($_SESSION["id"])?$_SESSION["id"]:0;
$date = date("Y-m-d H:i:s");

$sql = "SELECT * FROM ORDERS";
$count_orders = count($core->getAll($sql));
$count_orders++;

$orders = array(
    'id' => $count_orders,
    'user_id' => $userid,
    'order_date' => $date,
);
$core->addRecord("orders", $orders);


// thêm vào bảng order detail
$userid = isset($_SESSION["id"])?$_SESSION["id"]:0;

$sql = "SELECT * FROM ORDERS WHERE USER_ID = $userid ORDER BY ID DESC LIMIT 0,1";
$sqlorders = $core->getOne($sql);
//print_r($sqlorders);
$order_id = $sqlorders['id'];

// 

foreach ($_SESSION['cart'] as $product_id => $quantity) {

    $sql = "SELECT * FROM PRODUCT WHERE ID = $product_id";
    $product = $core->getOne($sql);
    
    if(isset($product['name'])){
        $order_detail = array(
            'order_id' => $order_id,
            'product_id' => $product['id'],
            'quantity' => $quantity,
            'price' => isset($product['discount'])?($product['price'] -$product['price']*$product['discount']/100):$product['price'],
            'total_price' => $quantity*(isset($product['discount'])?($product['price'] - $product['price']*$product['discount']/100):$product['price']),

        );

        $core->addRecord("order_detail", $order_detail);
        unset($_SESSION['cart']);
    }
}

header("Location: index.php");

?>