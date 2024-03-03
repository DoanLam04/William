<?php
  $id = $_GET['id'];
  $sql = "SELECT * FROM USER WHERE ID = $id";
  $user = $core->getOne($sql);

?>


<div class="container register">
  <div class ="">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=doupdateaccount&id=<?=$id?>" method= "post" autocomplete="on" enctype="multipart/form-data">
        
        <!-- content -->
        <div class="row content"> 
          
          <div class="col-md-5 registerForm">
            <!-- logo -->
            <div class="row image">
              <img
                src="Assets\images\img\pt logo png.png"
                class="w-50 mx-auto"
              />
            </div>
            
            <!-- -->
            <div class="">
              <!-- greeting -->
              <div class="row greeting">
                <h1 class="" >
                  Update Form
                </h1>
              </div>
              <!-- thông tin cá nhân-->
              <div class="row info"> 
                <div class="">

                    <!-- User Name -->                
                    <input
                        class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 value-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                        type="text" pattern="\S+" maxlength="32" name = "username" value="<?=$user['username']?>" require autofocus
                        
                    />               

                    <!-- Password -->
                    <input
                        class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 value-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                        type="password" pattern="\S+" maxlength="32" name="pw" value="<?=$user['password']?>" require
                    />

                    <!-- Name -->
                    <input
                        class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 "
                        type="text" maxlength="100" name="name" value="<?=$user['name']?>" require  
                                        
                    />                

                    <!-- GENDER -->
                    <div class="row register-switch mt-4">
                        <input type="radio" name="gender" value=0 id="sex_f" class="register-switch-input">
                        <label for="sex_f" class="register-switch-label">Female</label>
                        <input type="radio" name="gender" value=1 id="sex_m" class="register-switch-input" checked>
                        <label for="sex_m" class="register-switch-label">Male</label>
                    </div>                

                    <!-- Date of birth -->                
                    <input
                        class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 value-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                        type="date" id = "datemin" name="dateofbirth" max = "2020-01-02" 
                        value="<?= date("d-m-Y", strtotime($user['dateofbirth'])) ?>"               
                    /> 

                    <!-- Phone -->
                    <input
                        class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 value-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                        type="text" pattern="\S+" maxlength="12" name ="phone" value="<?=$user['phone']?>" require
                        
                    />               

                    <!-- Email -->               
                    <input
                        class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 value-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                        type="email" pattern="\S+" maxlength="50" name ="mail" value="<?=$user['email']?>" require
                        
                    />             

                    <!-- Address -->                
                    <input
                        class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 value-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                        type="text" maxlength="100" name = "address" value="<?=$user['address']?>" require
                        
                    />                

                                  
                  
                    <!-- upload avatar --> 
                    <div>
                        <label 
                            class="avatar row px-8 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-dark value-gray-500 text-md"
                            for="files" class="btn">Avatar: Click here!
                        </label>
                        <input id="files" style="visibility:hidden;" type="file" name="avatar" />
                    </div>
                    
                  

                    <!-- UPDATE -->
                    <div class="row remember py-2 mt-4 rounded-lg"> 
                        <button 
                            class="row btnLogin rounded-lg "
                            type="submit" 
                            name="update"               
                        >                    
                            <svg
                            class="col-md-4"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            >
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                                
                            </svg>
                            <span class="col-md-6 my-4">Update</span>
                            
                        </button>
                    </div>  
                </div>
              </div>

            </div>
          </div>  

          <!-- hình nền  -->
          <div class="col-md-7 registerBackground">
            <div class="mx-4 image">
                <img src="Assets\images\img\couple.png" height="800" >
            </div>
          </div>
        </div> 
    </form>
  </div>
</div>