
<?php
    $sql = "SELECT * FROM ORDERS";
    $result = $core->getAll($sql);
?>
<div class="container">
    <table >
        <thead>
            <tr >
                <th width="30px" >ID</th>
                <th width="100px" >USER ID</th>
                <th width="150px" >order_date</th>
                <th width="30px" >Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($result as $order){ 
            ?>
                <tr >
                    <td >
                        
                        <?=$order['id']?>                   
                    </td>
                    <td ><?=$order['user_id']?></td>
                    <td><?=$order['order_date']?></td> 
                    <td> 
                        <a href="index.php?page=orderdetail&id=<?=$order['id']?>">
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"><path d="M830 850H170q-8 0-14-6t-6-14V170q0-8 6-14t14-6h660q8 0 14 6t6 14v660q0 8-6 14t-14 6zM70 90v820q0 8 6 14t14 6h820q8 0 14-6t6-14V90q0-8-6-14t-14-6H90q-8 0-14 6t-6 14zm200 160h61q8 0 13.5 6t5.5 14v61q0 8-5.5 13.5T331 350h-61q-8 0-14-5.5t-6-13.5v-61q0-8 6-14t14-6zm200 0h260q8 0 14 6t6 14v61q0 8-6 13.5t-14 5.5H470q-9 0-14.5-5.5T450 331v-61q0-8 5.5-14t14.5-6zM270 450h61q8 0 13.5 5.5T350 470v60q0 9-5.5 14.5T331 550h-61q-8 0-14-5.5t-6-14.5v-60q0-9 6-14.5t14-5.5zm200 0h260q8 0 14 5.5t6 14.5v60q0 9-6 14.5t-14 5.5H470q-9 0-14.5-5.5T450 530v-60q0-9 5.5-14.5T470 450zM270 650h61q8 0 13.5 5.5T350 669v61q0 8-5.5 14t-13.5 6h-61q-8 0-14-6t-6-14v-61q0-8 6-13.5t14-5.5zm200 0h260q8 0 14 5.5t6 13.5v61q0 8-6 14t-14 6H470q-9 0-14.5-6t-5.5-14v-61q0-8 5.5-13.5T470 650z"/>
                            </svg>
                        </a> 
                    </td>                
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>