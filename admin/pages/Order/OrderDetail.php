<?php
    $id = 0;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    else{
        header("Location: index.php?page=order");
    }
?>
<div class="container">
    <table >
        <thead>
            <tr >
                <th >order_id</th>
                <th >product_id</th>
                <th >quantiy</th>
                <th >price</th>
                <th >total_price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM ORDER_DETAIL WHERE ORDER_ID = $id";
                $result = $core->getAll($sql);
                foreach($result as $orderDetail){

                
            ?>
            <tr >
                <td ><?=$orderDetail['order_id']?></td>
                <td ><?=$orderDetail['product_id']?></td>
                <td ><?=$orderDetail['quantity']?></td>
                <td ><?=$orderDetail['price']?></td>
                <td ><?=$orderDetail['total_price']?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>