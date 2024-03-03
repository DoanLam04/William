<div class="container mt-10">
    <div class="row">
        <div class="col-md-6 makepurchase" style="float: left;">
            <form action="index.php?page=makepurchasedatabase" method="post">

                <table style="border: 1px solid black;">
                    <!-- họ tên -->
                    <tr style="border-bottom: 1px solid black;">
                        <td >
                            <th width="200" style="border-right: 1px solid black;  padding: 5px;">
                                Họ tên:
                            </th>
                        </td>
                        <td width="200" style="padding-left: 10px; ">
                            <?=isset($_SESSION["name"])?$_SESSION["name"]:'default name'?>
                        </td>                       
                    </tr>
                    <!-- điện thoại -->
                    <tr style="border-bottom: 1px solid black; ">
                        <td>
                            <th style="border-right: 1px solid black;  padding: 5px;">
                                Điện thoại:
                            </th>
                        </td>
                        <td style="padding-left: 10px;">
                        <?=isset($_SESSION["phone"])?$_SESSION["phone"]:'0123456789'?>
                        </td>                       
                    </tr>
                    <!-- email -->
                    <tr style="border-bottom: 1px solid black;">
                        <td>
                            <th style="border-right: 1px solid black;  padding: 5px;">
                                Email:
                            </th>
                        </td>
                        <td style="padding-left: 10px;">
                        <?=isset($_SESSION["email"])?$_SESSION["email"]:'default@gmail.com'?>
                        </td>                       
                    </tr>
                    <!-- email -->
                    <tr style="border-bottom: 1px solid black;">
                        <td>
                            <th style="border-right: 1px solid black;  padding: 5px;">
                                Address:
                            </th>
                        </td>
                        <td style="padding-left: 10px;">
                        <?=isset($_SESSION["address"])?$_SESSION["address"]:'default address'?>
                        </td>                       
                    </tr>
                </table>
                
                <br><button type="submit">Purchase</button>
            </form>
        </div>

        <div class="col-md-06">
            <table class="" style="border:1px solid black;">
                <thead>
                    <tr style="border-bottom: 1px solid black; ">
                        <th width="200" style="border-right: 1px solid black; padding: 5px;">Tên sản phẩm</th>
                        <th width="100" style="border-right: 1px solid black; padding: 5px;">Đơn giá</th>
                        <th width="100" style="border-right: 1px solid black; padding: 5px;">Số lượng</th>
                        <th width="100" style="padding: 5px;">Thành tiền</th>
                    </tr>   
                </thead>
                <tbody>

                    <?php
                        // Hiển thị giỏ hàng

                        foreach ($_SESSION['cart'] as $product_id => $quantity) {

                            $sql = "SELECT * FROM PRODUCT WHERE ID = $product_id";
                            $product = $core->getOne($sql);
                            
                            if(isset($product['name'])){
                    ?>
                    <tr style="border-bottom: 1px solid black;">
                        <td style="border-right: 1px solid black; padding-left: 10px;">
                            <a href="index.php?page=detail&id=<?=$product['id']?>" class="title text-dark"><?=$product['name']?></a>
                        </td>
                        <td style="border-right: 1px solid black; padding: 5px;">
                            <div class=""> 
                                $<?php
                                    $price = 0;
                                    if(isset($product['discount'])){
                                        $price = $product['price'] - $product['price']*$product['discount']/100;
                                    }
                                    else{
                                        $price = $product['price'];
                                    }
                                    echo $price;
                                ?>

                            </div> 
                        </td>
                        <td style="border-right: 1px solid black; padding: 5px;">
                            <?= $quantity ?>
                        </td>
                        <td style="border-right: 1px solid black; padding: 5px;">
                            $<?=$price*$quantity?>
                        </td>
                    </tr>

                    <?php
                            }
                        }
                        
                    ?>
                </tbody>
                <tfoot>
                    <tr style="font-weight: bold;">
                        <td colspan="3" style="border-right: 1px solid black; padding: 5px;">
                            Tổng Cộng:
                        </td>
                        <td style="color: red; padding: 5px;">
                            <?=$_SESSION['totalprice'] - $_SESSION['discount']?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>