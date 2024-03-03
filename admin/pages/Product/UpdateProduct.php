<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateproduct'])) {
        $id =  $_SESSION['productid'];
        $product_name = $_POST['name'];
        $catid = $_POST['catid'];
       
        $price = $_POST['price'];
        $description = $_POST['description'];
        $isonsale = $_POST['isonsale'];
        $discount = $_POST['discount'];
        $updatedat = date("Y-m-d H:i:s");

        if($_FILES['image']['size'] > 0){
           
            $i = "temp.png";
            require("../admin/Lib/file.php");
            $file = $_FILES['image'];
            $i = $file['name'];
            $u = new Upload();
            $u->doUpload($file);
    
            $product = array(
                'name' => $product_name,
                'cat_id' => $catid,
                'image' => $i,
                'price' => $price,
                'description' => $description,
                'is_on_sale' => $isonsale,
                'discount' => $discount,             
                'updated_at' => $updatedat,
            );
    
            $core->editRecord("product", $id, $product);
            echo "update CO IMEAGE";
        }
        else{
            $i = $_POST['productimage'];
            echo "image: " . $i;
            $product = array(
                'name' => $product_name,
                'cat_id' => $catid,
                'image' => $i,
                'price' => $price,
                'description' => $description,
                'is_on_sale' => $isonsale,
                'discount' => $discount,             
                'updated_at' => $updatedat,
    
            );
            
            $core->editRecord("product", $id,$product);
            echo "update ko co image!";
        }
        if(isset($_GET['catid'])){
            $catid=$_GET['catid'];
            header("Location: index.php?page=product&catid=$catid");
        }
        else{
            header("Location: index.php?page=product");
        }      
    }
?>

<?php
    
    $id= $_GET['id'];
    $_SESSION['productid']=$id;
    
    $sql="SELECT * FROM product WHERE id=$id";
    
    $result = $core->getOne($sql);
    
?>

<div class="updateproduct">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=updateproduct" method="post" enctype="multipart/form-data">       
        <table> 
            
            <!-- name -->
            <tr>
                <td>
                    <th width="150">Product Name: </th>
                </td>
                <td>
                    <input type="text" name="name" value ="<?=$result['name']?>" width="200" />
                </td>                
            </tr>
            
            <!-- catid -->
            <tr>
                <td>
                    <th width="150">Cat_id: </th>
                </td>
            
                <td>
                    <input type="text" name="catid" width="200" value ="<?=$result['cat_id']?>"/>
                </td>                 
            </tr>

            

            <!-- price -->
            <tr>
                <td>
                    <th width="150">Price: </th>
                </td>
            
                <td>
                    <input type="text" name="price" width="200" value ="<?=$result['price']?>"/>
                </td>                 
            </tr>

            <!-- description -->
            <tr>
                <td>
                    <th width="150">Description: </th>
                </td>
            
                <td>
                    <input type="text" name="description" width="200" value ="<?=$result['description']?>"/>
                </td>                 
            </tr>

            <!-- isonsale -->
            <tr>
                <td>
                    <th width="150">is_on_sale: </th>
                </td>
            
                <td>
                    <input type="text" name="isonsale" width="200" value ="<?=$result['is_on_sale']?>"/>
                </td>                 
            </tr>
            
            <!-- discount -->
            <tr>
                <td>
                    <th width="150">Discount: </th>
                </td>
            
                <td>
                    <input type="text" name="discount" width="200" value ="<?=$result['discount']?>"/>
                </td>                 
            </tr>

            <!-- image -->
            <tr>
                <td>
                    <th>
                        Image:
                        <input id="files" style="visibility:hidden;" type="file" name="image"/>
                    </th>
                </td> 
                <td>
                    <label 
                        class=""
                        for="files" class="btn" style="border: 1px solid black;" name="image">Image: Click here!
                    </label>
                </td>   
                            
            </tr>
            <input type="hidden" name="productimage" value="<?=$result['image']?>"/>
         
        </table>

        <br>
        <button type="sumbmit" name="updateproduct">Update</button>
    </form>
</div>

