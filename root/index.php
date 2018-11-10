<?php
include 'class.user.php';
session_start();
$data = new user;
$message ='';
if(isset($_POST["login"]))
{
    $field = array(
        'username'     =>     $_POST["log_email"],
        'password'     =>     $_POST["log_psw"]
    );
        if($data->can_login("users", $field))
        {
            echo 'Login success'; // Login success
        }
        else
        {
            echo 'Wrong email or password'; // Login Failed
        }
    }
if(isset($_POST["register"]))
{
    $field2 = array(
        'name'     =>     $_POST["reg_uname"],
        'email'        =>     $_POST["reg_email"],
        'password'     =>     $_POST["reg_psw"]
    );
        if($data->reg_user( $_POST["reg_uname"], $_POST["reg_email"], $_POST["reg_psw"]))
        {
            echo 'Registration successful';
        }
        else
        {
            echo 'Registration failed. Email already exists, please try again'; // Registration Failed
        }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login & Sign Up Form Concept</title>
    <script src="jquery-3.3.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
      <link rel="stylesheet" href="css/style.css">
</head>
<body >
  <div class="cotn_principal">
<div class="cont_centrar">
  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">
    <h2><span class="border-span">Don</span>'t have an account?</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
    <h2><span class="border-span">Have </span>an account?</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
       </div>
  </div>
    <div class="cont_back_info">
    </div>
      <div class="cont_forms cont_forms_active_login"  >
          <form method="post" >
     <div class="cont_form_login" >
   <h2><span class="border-span">Log</span>in <img src="images/logo_0.png" alt=""  > </h2>
         <span >Email </span>
     <input type="text" id="email_id_fake" name="log_email" required="required"  />
     <span class="icon_email_log"></span>
     <br>
     <span class="pass">Password </span>
     <input input type="password" id="password_id_fake"  name="log_psw" placeholder="" required  />
     <span class="icon_password_log"></span>
     <br>
<button class="btn_login_active" name="login" value="login" onclick="cambiar_login()">LOGIN</button>
  </div>
          </form>
          <form  method="post" >
          <div class="cont_form_sign_up">
     <h2><span class="border-span">Sig</span>n Up <img src="images/logo_0.png" alt=""  ></h2>
       <span >Name </span>
       <input  type="text" id="user_reg_id"   name="reg_uname" required="required"  />
       <span class="icon_user_log"></span>
       <br>
       <span >Email </span>
       <input type="text" id="email_reg_id"  name="reg_email" required="required" />
       <span class="icon_email_log"></span>
       <br>
       <span >Password </span>
       <input type="password" id="password_reg_id"   name="reg_psw" required="required" />
       <span class="icon_password_log"></span>
       <br>
    <button type="submit" class="btn_sign_up_active"  value="register" name="register">SIGN UP</button>
    </div>
          </form>
  </div>
      </div>
</div>
    <script  src="js/index.js"></script>
</div>
</body>
</html>
