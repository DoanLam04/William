<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM USER WHERE ROLE ='USER' AND ID = $id";
    $user = $core->getOne($sql);
    //print_r($list_user);
?>
<div class="user">
    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th width="140">Username</th>
                <th width="140">Password</th>
                <th width="140">Name</th>
                <th width="140">Email</th>
                <th width="140">Phone</th>
                <th width="140">Address</th>
                <th width="140">Gender</th>
                <th width="140">Date of Birth</th>
                <th width="140">Avatar</th>
                <th width="200">Created At</th>
            
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['username']?></td>
                <td><?=$user['password']?></td>
                <td><?=$user['name']?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['phone']?></td>
                <td><?=$user['address']?></td>
                <td>
                    <?=($user['gender'] == 1)?'Nam':'Nữ'?>
                </td>
                <td><?=$user['dateofbirth']?></td>
                <td><?=$user['avatar']?></td>
                <td><?=$user['created_at']?></td>
            </tr>

           
        </tbody>
    </table>
</div>