<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insertproduct'])) {
        $sql = "SELECT * FROM PRODUCT ORDER BY ID DESC LIMIT 0,1";
        $result=$core->getOne($sql);       
        $count = $result['id'] + 1;

        $product_name = $_POST['name'];
        $catid = $_POST['catid'];
       
        $price = $_POST['price'];
        $description = $_POST['description'];
        $isonsale = $_POST['isonsale'];
        $discount = $_POST['discount'];
        $created_at = date("Y-m-d H:i:s");       
        $views = 0;
        $updatedat = date("Y-m-d H:i:s"); 
        
        $i = "temp.png";

        if ($_FILES['image']['size'] > 0) {
            require("../admin/Lib/file.php");
            $file = $_FILES['image'];
            $i = $file['name'];
            $u = new Upload();
            $u->doUpload($file);
           
        }

        $product = array(
            'name' => $product_name,
            'cat_id' => $catid,
            'image' => $i,
            'price' => $price,
            'description' => $description,
            'is_on_sale' => $isonsale,
            'discount' => $discount,
            'created_at' => $created_at,
            'views' => $views,
            'updated_at' => $updatedat,

        );

        $core->addRecord("product", $product);
        header("Location: index.php?page=product");

    }
?>
<div class="updateproduct">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=insertproduct" method="POST" enctype="multipart/form-data">       
        <table>
            
            <!-- name -->
            <tr>
                <td>
                    <th width="150">Product Name: </th>
                </td>
                <td>
                    <input type="text" name="name" placeholder="Product name" size="20" require autofocus />
                </td>                
            </tr>
            
            <!-- catid -->
            <tr>
                <td>
                    <th width="150">Cat_id: </th>
                </td>
            
                <td>
                    <select name="catid" id="">
                    <?php
                        $sql="SELECT * FROM CATEGORY";
                        $result = $core->getAll($sql);
                        foreach($result as $category){ ?>
                        <option value="<?=$category['id']?>">
                            <?=$category['category_name']?>
                        </option>
                        <?php
                        }
                    ?>

                    </select>
                    
                </td>                 
            </tr>

            <!-- price -->
            <tr>
                <td>
                    <th width="150">Price: </th>
                </td>
            
                <td>
                    <input type="text" name="price" size="20" placeholder="price" require/>
                </td>                 
            </tr>

            <!-- description -->
            <tr>
                <td>
                    <th width="150">Description: </th>
                </td>
            
                <td>
                    <input type="text" name="description" size="20" placeholder="description" require/>
                </td>                 
            </tr>

            <!-- isonsale -->
            <tr>
                <td>
                    <th width="150">is_on_sale: </th>
                </td>
            
                <td>
                    <input type="text" name="isonsale" size="20" placeholder="is_on_sale" require/>
                </td>                 
            </tr>
            
            <!-- discount -->
            <tr>
                <td>
                    <th width="150">Discount: </th>
                </td>
            
                <td>
                    <input type="number" name="discount" size="20" placeholder="discount" max="100"/>
                </td>                 
            </tr>

            <!-- image -->
            <tr>
                <td>
                    <th>
                        Image:
                        <input id="files" style="visibility:hidden;" type="file" name="image" require/>
                    </th>
                </td> 
                <td>
                    <label 
                        class=""
                        for="files" class="btn" style="border: 1px solid black;" name="image">Image: Click here!
                    </label>
                </td>   
                            
            </tr>

        </table>

        <br>
        <button type="sumbmit" name="insertproduct">Add a New Product</button>
    </form>
</div>

