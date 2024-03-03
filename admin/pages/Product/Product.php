<?php  
    $_SESSION['trang'] = isset($_POST['counter']) ? $_POST['counter'] : 1; 
?>

<?php
    $sql = "SELECT * FROM PRODUCT";
    $sqlCount = "SELECT COUNT(*) FROM PRODUCT";

    if(isset($_GET['catid'])){
        $catid = $_GET['catid'];

        $sql = "SELECT * FROM PRODUCT WHERE CAT_ID = $catid";
        $result = $core->getAll($sql);
        if(empty($result)){
            //echo "Chưa có sản phẩm này!";
            header("Location: index.php?page=categorylist");
        }
        else{
            $sqlCount = $sqlCount . " WHERE cat_id = $catid";
        }
    }
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['items10'])){
            $_SESSION['items'] = 10;
        }
        else if(isset($_POST['items20'])){
            $_SESSION['items'] = 20;
        }
        else if(isset($_POST['items30'])){
            $_SESSION['items'] = 30;
        }
        else if(isset($_POST['itemsall'])){
            $result = $core->getAll($sql);
            $_SESSION['items'] = count($result);
        }
    }

    $itemsPerPage = isset($_SESSION['items'])?$_SESSION['items']:10;
  
    $totalPages = $core->totalpages($sqlCount, $itemsPerPage);

    $result = $core->pagination(isset($_SESSION['trang'])?$_SESSION['trang']:1,$sqlCount,$sql, $itemsPerPage);


    $list_product = $result;
    
?>
<div class="product">
    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th width="150">Name</th>
                <th width="60">Cat_Id</th>
                <th width="150">Image</th>
                <th width="80">Price</th>
                <th width="250">Description</th>
                <th width="60">Is_on_sale</th>
                <th width="80">Discount</th>            
                <th width="150">Created At</th>
                <th width="150">Updated At</th>
                <th width="80">Views</th>
                <th width="100">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($list_product as $product){
            ?>
            <tr>
                <td><?=$product['id']?></td>
                <td><?=$product['name']?></td>
                <td><?=$product['cat_id']?></td>
                <td>
                    <div> 
                        <a href="#"><img src="../Assets/images/items/<?=$product['image']?>" width="100px">
                        </a>
                    </div>
                </td>
                <td><?=$product['price']?></td>
                <td><?=$product['description']?></td>
                <td><?=$product['is_on_sale']?></td>
                <td><?=$product['discount']?></td>
                <td><?=$product['created_at']?></td>
                <td><?=$product['updated_at']?></td>          
                <td><?=$product['views']?></td>
                <td>
                    <div class="update" style="float:left;">
                        <form action="index.php?page=updateproduct&id=<?=$product['id']?>" method="POST"> 
                            <button type="submit"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <div class="delete" style="float:right;">
                        <form action="index.php?page=deleteproduct&id=<?=$product['id']?>" method="POST">
                            <input type="hidden" value="<?=$product['id']?>" name="delete"></input>
                            <button type="submit"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>

            <?php
            }
            ?>
        </tbody>
    </table>

    <!-- add new product & pagination-->
    <div class="container row" style="margin-top: 20px;">

        <div class="col-md-4">
            <form action="index.php?page=insertproduct" method="POST"> 
                <label>Add a New Product: </label>
                <button type="submit"> 
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18" width="20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                    </svg>      
                </button>
            </form>
        </div>

        <div class="pagination col-md-4">		
            <div class="mb-4" aria-label="Page navigation sample">
                <div class="row">
                    <div class="<?=$_SESSION['trang']==1?'disabled':'active'?>" style="border: 1px solid black; float:left; margin: 5px;">
                        <!-- PREVIOUS BUTTON -->
                        <div class="prev">
                            <form method="post" action="index.php?page=product<?=isset($_GET['catid'])?'&catid='.$_GET['catid']:''?>">
                                <input type="hidden" name="counter" value="<?php echo (isset($_POST['counter']) && $_POST['counter']>1) ? $_POST['counter'] - 1 : 1; ?>">
                                <input type="submit" name="update" value="Previous"     style="border:none; background-color: transparent;"
                                <?php 
                                    if($_SESSION['trang'] == 1){
                                        echo "disabled";
                                    }
                                ?>
                                >
                            </form>
                        </div>
                    </div>
                    
                <?php
                    
                    for($i = 1; $i<=$totalPages; $i++){
                    ?>
                        <div class="page-link" style="float:left; margin-top: 5px;">
                            <form method="post" action="index.php?page=product<?=isset($_GET['catid'])?'&catid='.$_GET['catid']:''?>">
                                <input type="hidden" name="counter" value="<?=$i?>">
                                <input type="submit" name="update" class="page-link" value="<?=$i?>"
                                    <?php
                                        if($_SESSION['trang'] == $i){
                                            echo "disabled";
                                        }
                                    ?>
                                    >
                            </form>
                        </div>
                    <?php
                    }	
                ?>
                    
                    <?php
                    if(!isset($_POST['counter'])){
                        $_POST['counter'] = 1;
                    }
                    ?>

                    <div class="<?=$_POST['counter']<$totalPages?'active':'disabled'?>" style="border: 1px solid black; float:left; margin: 5px;">
                        <!-- NEXT BUTTON -->
                        <div class="next">
                            <form method="post" action="index.php?page=product<?=isset($_GET['catid'])?'&catid='.$_GET['catid']:''?>">
                                <input type="hidden" name="counter" value="<?php 
                                    if(isset($_POST['counter'])){
                                        if($_POST['counter']<$totalPages){
                                            echo $_POST['counter'] + 1;
                                        }
                                        else{
                                            echo $_POST['counter'];
                                        }            
                                    }
                                    else{
                                        echo 2;
                                    }
                                ?>">
                                <input type="submit" name="update" value="Next" style="border:none; background-color: transparent;"
                                <?php 
                                    if($_SESSION['trang'] == $totalPages){
                                        echo "disabled";
                                    }
                                ?>>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <form action="index.php?page=product<?=isset($_GET['catid'])?'&catid='.$_GET['catid']:''?>" method="post">
                <label for="">Items Per Page: </label>
                <button type="submit" value="10" name="items10">10</button>
                <button type="submit" value="20" name="items20">20</button>
                <button type="submit" value="30" name="items30">30</button>
                <button type="submit" value="all" name="itemsall">All</button>
            </form>
        </div>

    </div>


</div>