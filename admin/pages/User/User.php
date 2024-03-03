<?php
    $sql = "SELECT * FROM USER WHERE ROLE ='USER'";
    $list_user = $core->getAll($sql);
    //print_r($list_user);
?>
<div class="container user">
    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th width="140">Name</th>
                <th width="140">Phone</th>
                <th width="140">Address</th>
                <th width="140">Gender</th>
                <th width="100">Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($list_user as $user){
            ?>
            <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['name']?></td>
                <td><?=$user['phone']?></td>
                <td><?=$user['address']?></td>
                <td>
                    <?=($user['gender'] == 1)?'Nam':'Nữ'?>
                </td>
                <td>
                    <a class="btn" href="index.php?page=userdetail&id=<?=$user['id']?>">
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