
<?php

$nameErr = $emailErr = $genderErr = $addErr = $phoneErr = $userErr = $passErr = $dateofbirthErr = "";
$name = $email = $gender = $add = $phone = $username = $pass = $dateofbirth = "";
$flag = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $flag = 0;
    } else {
        $name = test_input($_POST["name"]);
        $flag = 1;
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $flag = 0;
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $flag = 0;
    } else {
        $gender = test_input($_POST["gender"]);
        $flag = 1;
    }

    if (empty($_POST["mail"])) {
        $emailErr = "Email is required";
        $flag = 0;
    } else {
        $email = test_input($_POST["mail"]);
        $flag = 1;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $flag = 0;
        }
    }

    if (empty($_POST["dateofbirth"])) {
        $dateofbirthErr = "Date of birth is required";
        $flag = 0;
    } else {
        $dateofbirth = test_input($_POST["dateofbirth"]);
        $flag = 1;
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
        $flag = 0;
    } else {
        $phone = test_input($_POST["phone"]);
        $flag = 1;
        $phone_pattern = "/^\d+$/";
        if (!preg_match($phone_pattern, $phone)) {
            $phoneErr = "Only numbers are allowed";
            $flag = 0;
        }
    }

    if (empty($_POST["address"])) {
        $addErr = "Address is required";
        $flag = 0;
    } else {
        $add = test_input($_POST["address"]);
        $flag = 1;
    }

    if (empty($_POST["username"])) {
        $userErr = "Username is required";
        $flag = 0;
    } else {
        $username = test_input($_POST["username"]);
        $flag = 1;
    }

    $sql4 = "SELECT * FROM USER WHERE USERNAME = '$username'";
    $result4 = $core->getOne($sql4);
    if(empty($result4)){

    }

    if (empty($_POST["pw"])) {
        $passErr = "Password is required";
        $flag = 0;
    } else {
        $pass = test_input($_POST["pw"]);
        $flag = 1;
    }
    
    if ($flag == 1) {
        $i = "temp.png";
        
        if ($_FILES['avatar']['size'] > 0) {
            require("lib/file.php");
            $file = $_FILES['avatar'];
            $i = $file['name'];
            $u = new Upload();
            $u->doUpload($file);
        }
        
        if ($_FILES['avatar']['size'] > 0) {
            $user = array(
                'username' => $username,
                'password' => $_POST['pw'],
                'name' => $_POST['name'],
                'email' => $_POST['mail'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'gender' => $_POST['gender'],
                'dateofbirth' => $_POST['dateofbirth'],
                'avatar' => $i
            );
            
            $core->addRecord("user", $user);
            
            header("Location: index.php");
        }

        // upload ko co avatar
        $user = array(
            'username' => $username,
            'password' => $_POST['pw'],
            'name' => $_POST['name'],
            'email' => $_POST['mail'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'gender' => $_POST['gender'],
            'dateofbirth' => $_POST['dateofbirth']            
        );
        $core->addRecord("user", $user);
        
        header("Location: index.php");


    }
    
  }



?>

<div class="container register">
  <div class ="">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=register" method= "post" autocomplete="on" enctype="multipart/form-data">
        
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
                  William PT
                </h1>
              </div>
              <!-- thông tin cá nhân-->
              <div class="row info"> 
                <div class="">

                  <!-- Name -->
                  <input
                      class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 "
                      type="text" maxlength="100" name="name" autofocus placeholder="Name" require  
                                      
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
                      class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                      type="date" id = "datemin" name="dateofbirth" max = "2020-01-02" value="1996-04-24"                   
                  /> 

                  <!-- Phone -->
                  <input
                      class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                      type="text" pattern="\S+" maxlength="12" name ="phone" placeholder="Phone" require
                    
                  />               

                  <!-- Email -->               
                  <input
                      class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                      type="email" pattern="\S+" maxlength="50" name ="mail" placeholder="Email" require
                      
                  />             

                  <!-- Address -->                
                  <input
                      class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                      type="text" maxlength="100" name = "address" placeholder="Address" require
                      
                  />                

                  <!-- User Name -->                
                  <input
                      class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                      type="text" pattern="\S+" maxlength="32" name = "username" placeholder="User Name" require
                    
                  />               

                  <!-- Password -->
                  <input
                      class="row px-4 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-md focus:outline-none focus:border-gray-400 focus:bg-white"
                      type="password" pattern="\S+" maxlength="32" name="pw" placeholder="Password" require
                  />                
                  
                  <!-- upload avatar --> 
                  <div>
                      <label 
                          class="avatar row px-8 py-2 mt-4 rounded-lg font-medium bg-gray-100 border border-dark placeholder-gray-500 text-md"
                          for="files" class="btn">Avatar: Click here!
                      </label>
                      <input id="files" style="visibility:hidden;" type="file" name="avatar" />
                  </div>

                  <!-- REMEMBER ME COOKIES -->
                  <div class="row remember py-2 mt-4 rounded-lg">
                    <label class=""> Remember login &emsp;</label>
                    <input class=""   
                            type="checkbox" 
                            name="remember" 
                            checked
                    />
                  </div>
                  

                  <!-- SIGN UP -->
                  <div class="row remember py-2 mt-4 rounded-lg"> 
                  <button 
                      class="row btnLogin rounded-lg "
                      type="submit" 
                      name="btnLogin"               
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
                    <span class="col-md-6 my-4">Register</span>
                    
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


<!-- KIỂM TRA GỬI THÀNH CÔNG -->
<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    require("Pages\User\Account.php");
  }
?>