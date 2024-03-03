<!-- get info -->
<?php 
    
    $user = '';
    $pass = '';
  
    /* check exists cookie */
    if(isset($_COOKIE['user'])){
        $user = $_COOKIE['user'];
        $pass = $_COOKIE['pass'];
    }

    if(isset($_SESSION["user"])){
        $user = $_SESSION["user"];
        $pass = $_SESSION["pass"];        
    }        

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $user=$_POST['username'];
        $pass=$_POST['pw'];               

        /* COOKIE NẾU BẤM VÀO GHI NHỚ */
        if(isset($_POST['remember'])&&($_POST['remember'])){
            setcookie("user",$user,time()+3600);
            setcookie("pass",$pass,time()+3600);
        }
    }

    /* Các lưu ý khi setcookie 
    1. tạo biến phải gán trước 1 giá trị 
    2. giá trị của biến không chứa khoảng trắng
    */  
    $sql = "SELECT * FROM USER WHERE USERNAME = '$user' AND PASSWORD = '$pass'";
    $result = $core->getOne($sql);

    if(!is_null($result)){
        $_SESSION["user"] = $result['username'];
        $_SESSION["pass"] = $result['password'];
        $_SESSION["name"] = $result['name'];
        $_SESSION["gender"] = $result['gender'];
        $_SESSION["dateofbirth"] = $result['dateofbirth'];
        $_SESSION["phone"] = $result['phone'];
        $_SESSION["email"] = $result['email'];
        $_SESSION["address"] = $result['address'];
        $_SESSION["id"] = $result['id'];
        $_SESSION["avatar"] = $result['avatar'];
    }
    else{
        //echo "wrong username or password";
    }    

    if(isset($_SESSION['user'])){
        $name = $_SESSION["name"];  
        $gender = $_SESSION["gender"]; 
    }

?>

<div class="container">
   
    <!-- content -->
    <div class="row account"> 
        <div class="col-md-7 leftside">

            <!-- title -->
            
            <?php
                if($user != "default"){                
            ?>            
            <div class="title">
                <span class="row px-8 py-2 my-4 rounded-lg">
                    Account Information
                </span>
            </div>    
            <?php
                }
                else{                
            ?>         
            <div class="title">
                <span class="row px-8 py-2 my-4 rounded-lg">
                    Default Information
                </span>
            </div>  

            <?php
                }
            ?>
            <!-- content -->
            <div class="content">           
                <div class="user-details">

                    <!-- full name-->
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <p class="w-full row px-8 py-2 mb-4 rounded-lg font-medium bg-orange-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white">
                            <?=isset($_SESSION["name"])?$_SESSION["name"]:'default'?>
                        </p>
                    </div>

                    <!-- gender -->
                    <div class="input-box">
                        <span class="details">Gender</span>
                        <p class="w-full row px-8 py-2 mb-4 rounded-lg font-medium bg-blue-200 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white">
                            <?php
                                if(isset($_SESSION["gender"])?$_SESSION["gender"]:1 == 0){
                                    echo "Nữ";
                                }
                                else{
                                    echo "Nam";
                                }
                            ?>
                        </p>
                    </div>

                    <!-- date of birth -->
                    <div class="input-box">
                        <span class="details">Date of Birth</span>
                        <p class="w-full row  px-8 py-2 mb-4 rounded-lg font-medium bg-orange-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white">
                            <?= date("d-m-Y", strtotime(isset($_SESSION["dateofbirth"])?$_SESSION["dateofbirth"]:'0001-01-01')) ?>
                        </p>
                    </div>

                    <!-- phone -->
                    <div class="input-box">
                        <span class="details">Phone</span>
                        <p class="w-full row  px-8 py-2 mb-4 rounded-lg font-medium bg-blue-200 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white">
                            <?= isset($_SESSION["phone"])?$_SESSION["phone"]:'0123456789'?>
                        </p>
                    </div>

                    <!-- mail -->
                    <div class="input-box">
                        <span class="details">EMail</span>
                        <p class="w-full row  px-8 py-2 mb-4 rounded-lg font-medium bg-orange-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white">
                            <?=isset($_SESSION["email"])?$_SESSION["email"]:'default@mail'?>
                        </p>
                    </div>

                    <!-- address -->
                    <div class="input-box">
                        <span class="details">Address</span>
                        <p class="w-full row  px-8 py-2 mb-4 rounded-lg font-medium bg-blue-200 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white">
                            <?=isset($_SESSION["address"])?$_SESSION["address"]:'default'?>
                        </p>
                    </div>

                     <!-- id -->
                     <div class="input-box">
                        <span class="details">ID</span>
                        <p class="w-full row  px-8 py-2 mb-4 rounded-lg font-medium bg-orange-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white">
                            <?=isset($_SESSION["id"])?$_SESSION["id"]:0?>
                        </p>
                    </div>

                    <!-- user -->
                    <div class="input-box">
                        <span class="details">User</span>
                        <p class="w-full row  px-8 py-2 mb-4 rounded-lg font-medium bg-orange-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white">
                            <?=isset($_SESSION["user"])?$_SESSION["user"]:'default'?>
                        </p>
                        
                    </div>

                    <!-- password -->
                    <div class="input-box">
                        <span class="details">PassWord</span>
                        <p class="w-full row  px-8 py-2 mb-4 rounded-lg font-medium bg-blue-200 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white">
                            <?=isset($_SESSION["pass"])?$_SESSION["pass"]:'default'?>
                        </p>
                    </div>
                    
                    <?php
                    $id = isset($_SESSION["id"])?$_SESSION["id"]:0;
                    if(isset($_SESSION["user"])){                    
                        ?>
                        <form action="index.php?page=accountupdate&id=<?=$id?>" method="post">
                            <button type="submit" name ="update">
                                Update
                            </button>
                        </form>
                    <?php
                    }
                    ?>
                </div>        
            </div>
        </div>

        <!-- hình nền  -->
        <div class="col-md-5 avt">
            <div class="image">
                <img src="Assets/images/avatar/<?=isset($_SESSION["avatar"])? $_SESSION["avatar"]:'default.png'?>" 
                alt="avatar" height="600" style="object-fit: contain;">                
            </div>
        </div>
    </div>  
    
    

</div>