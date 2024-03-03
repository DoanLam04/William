<?php
    $id= $_GET['id'];
    $sql="SELECT * FROM category WHERE id=$id";
    
    $result = $core->getOne($sql);
    //print_r($result);
?>


<form action="index.php?page=doupdatecategory&id=<?=$result['id']?>" method="POST">       
    <table>
        <thead width="200">
            <tr>
                <td>
                    <th width="150">Category_name: </th>
                </td>
                <td>
                    <input type="text" name="category_name" value="<?=$result['category_name']?>" width="200" />
                </td>                
            </tr>
        </thead>
        
        <tbody width="500">
            <tr>
                <td>
                    <th width="150">Trang: </th>
                </td>
            
                <td>
                    <input type="text" name="trang" width="200" value ="<?=$result['trang']?>"/>
                </td>                 
            </tr>
        </tbody>
    </table>

    <br>
    <button type="sumbmit" name="updatecategory">Update</button>
</form>