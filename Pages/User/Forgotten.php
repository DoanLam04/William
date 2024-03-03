<!-- Form Login -->
<div class="login">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=forgotten" method= "post" autocomplete="off">
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
                            Tự nhớ lại đi
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
                                name = "nameforgotten" 
                                placeholder="User Name" 
                                require                  
                            />
                           
                            <!-- Password --> 
                           
                            <label class="pass ml-2"> Email: </label>                                                                 
                            <input
                                class="row col-md-12 px-8 py-2 mb-4 bg-gray-100  rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                                type="email" 
                                pattern="\S+" 
                                maxlength="32" 
                                name = "emailforgotten" 
                                placeholder="Email" 
                                require                  
                            />  
                                                        

                            <!-- Log In -->
                            <button 
                                class="row btnLogin tracking-wide font-semibold text-gray-100 w-full py-4 rounded-lg transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
                                type="submit" 
                                name="forgotten"               
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                                <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                                <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
                            </svg>
                            <span class="mt-2 ml-4">
                                Send
                            </span>
                            </button>

                            <?php
    if(isset($_POST['forgotten'])){
        $sql = "SELECT * FROM user";
        $list_user = $core->getAll($sql);
        $found = false;
        foreach($list_user as $key){
            if($key['username'] == $_POST['nameforgotten'] && $key['email'] == $_POST['emailforgotten']){
?>
            <div style="display: flex; justify-content: center; ">
                <label  class="w-full px-4 py-3 mb-4 rounded-lg font-medium bg-gray-100 border border-dark placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                        style = "font-family: 'Croissant One', cursive; color: green;">
                    <?php
                        echo "Pass nè: ".$key['password'];
                        $found = true;
                        die("<br><br>Hên là còn nhớ cái email!");
                    ?>
                </label>
<?php
            }
        }

        if(!$found){ ?> 
            <label class="w-full px-8 py-3 mb-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                    style = "font-family: 'Croissant One', cursive; color: red;">
                <?php                         
                    echo "Thôi tạo tài khoản mới đi!<br><br>Tầm này sao mà cứu được nữa";
                ?>
            </label>                                                   
        </div>
            
<?php
        }
    }
?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
    if(isset($_POST['forgotten'])){
        $sql = "SELECT * FROM user";
        $list_user = $core->getAll($sql);
        $found = false;
        foreach($list_user as $key){
            if($key['username'] == $_POST['nameforgotten'] && $key['email'] == $_POST['emailforgotten']){
?>
            <div style="display: flex; justify-content: center; ">
                <label  class="w-full px-8 py-3 mb-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                        style = "font-family: 'Croissant One', cursive; color: green;">
                    <?php
                        echo "Pass nè: ".$key['password'];
                        $found = true;
                        die("<br><br>Hên là còn nhớ cái email!");
                    ?>
                </label>
<?php
            }
        }

        if(!$found){ ?> 
            <label class="w-full px-8 py-3 mb-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                    style = "font-family: 'Croissant One', cursive; color: red;">
                <?php                         
                    echo "Thôi tạo tài khoản mới đi!<br><br>Tầm này sao mà cứu được nữa";
                ?>
            </label>                                                   
        </div>
            
<?php
        }
    }
?>