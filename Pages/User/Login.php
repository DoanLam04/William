<?php  
    // cookie 
    if(isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        $pass = $_COOKIE["pass"];   
        echo $_COOKIE["user"];
        echo $_COOKIE["pass"];  

        // kiểm tra dữ liệu trong database
        $sql = "SELECT * FROM USER WHERE USERNAME = '$user' AND PASSWORD = '$pass'";

        $username = $core->getOne($sql);  
       
        if($username !== null){ 

            $_SESSION["user"] = $username['username'];
            $_SESSION["pass"] = $username['password'];
            
            $_SESSION["name"] = $username['name'];    
            $_SESSION["gender"] = $username['gender'];   
            $_SESSION["address"] = $username['address'];         
            $_SESSION["email"] = $username['email'];
            $_SESSION["avatar"] = $username['avatar'];
            $_SESSION["phone"] = $username['phone'];
            $_SESSION["dateofbirth"] = $username['dateofbirth'];
            $_SESSION["id"] = $username['id'];
            //echo "cookie updated!";
            //header("Location: index.php");
        }           
    }
   

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnLogin'])){
        // Lấy thông tin người dùng gởi đến Server
        $user = $_POST['username'];
        $pass = $_POST['pw'];

        // cookie 
        if(isset($_POST['remember'])) {
            setcookie("user", $user, time() + 3600);
            setcookie("pass", $pass, time() + 3600);
            // echo $_COOKIE["user"];
            // echo $_COOKIE["pass"];
            echo "cookie updated!";
        }

        // kiểm tra dữ liệu trong database
        $sql = "SELECT * FROM USER WHERE USERNAME = '$user' AND PASSWORD = '$pass'";
        $username = $core->getOne($sql);  
       
        if($username !== null){ 

            $_SESSION["user"] = $username['username'];
            $_SESSION["pass"] = $username['password'];
            
            $_SESSION["name"] = $username['name'];    
            $_SESSION["gender"] = $username['gender'];   
            $_SESSION["address"] = $username['address'];         
            $_SESSION["email"] = $username['email'];
            $_SESSION["avatar"] = $username['avatar'];
            $_SESSION["phone"] = $username['phone'];
            $_SESSION["dateofbirth"] = $username['dateofbirth'];
            $_SESSION["id"] = $username['id'];
            //echo "session updated!";
            header("Location: index.php");
        }           
    }
?>

<?php
// xử lý forgotten password
if(isset($_POST['forget']) && $flag == false) {
    
    header("Location: index.php?page=forgotten");
}
?>


<!-- Form Login -->
<div class="login">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=login" method="POST" enctype="multipart/form-data">
        <div class="container login">
            <div class="col-md-12">
                <!-- logo -->
                <div class="row col-md-5">
                    <img
                    src="Assets\images\img\pt logo png.png"
                    class="image"  height="150" 
                    />
                </div>

                <div >
                    <!-- greeting -->
                    <div class="row greeting">
                        <h1>
                            Wiliam PT say Hello
                        </h1>
                    </div>
                    <br>
                    <!-- thông tin cá nhân-->
                    <div class="row info"> 
                        <div class="">

                            <!-- User Name -->  
                            <label class="user ml-2"> User Name: </label>
                                                                  
                            <input
                                class="row col-md-12 px-8 py-2 mb-4 bg-gray-100  rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                                type="text" 
                                pattern="\S+" 
                                maxlength="32" 
                                name = "username" 
                                placeholder="User Name" 
                                require                  
                            />
                           
                            <!-- Password --> 
                           
                            <label class="pass ml-2"> Password: </label>                                                                 
                            <input
                                class="row col-md-12 px-8 py-2 mb-4 bg-gray-100  rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                                type="password" 
                                pattern="\S+" 
                                maxlength="32" 
                                name = "pw" 
                                placeholder="PassWord" 
                                require                  
                            />   
                            
                            
                            <input class="mx-2 my-4" 
                                    type="checkbox" 
                                    name="remember"
                                    value="remember"
                                    checked
                            />
                                <label class=""> Remember login </label>
                           


                            <br>

                            <!-- Log In -->
                            <button
                                class="row btnLogin tracking-wide font-semibold text-gray-100 w-full py-4 rounded-lg transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
                                type="submit" 
                                name="btnLogin"               
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                                <span class="mx-4">
                                    Log In
                                </span>
                            </button>

                            <button class="btnForgotten"
                                    type="submit" 
                                    name="forget"                                     
                            >                                    
                                    Forgotten password?
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    
</div>

