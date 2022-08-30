<?php

session_start(); 
include('admin/function.php');
if(!empty($_SESSION["student"])||!empty($_SESSION["admin"])||!empty($_SESSION["parent"])||!empty($_SESSION["tutor"])){
       
  header("Location: index.php");
}


if(isset($_POST["btn-login"])){

  $login = new Login();
  $result = $login->loginCheck($_POST["email"],$_POST["password"]);
 
  $_SESSION['UserID'] = $result['users_id'];

  switch($result['Type']){

    case "admin":
        $_SESSION['admin'] = $result['Name'];
        $_SESSION['email'] = $result['Email'];
        header("location:admin/index.php?&user=index");
        break;
    
    case "student":
        $_SESSION['student'] = $result['Name'];
        $_SESSION['UserID'] = $result['users_id'];
        header("location:".$localHostUrl."student/index.php?&action=home");
        break;

    case "parent":
      $_SESSION['parent'] = $result['Name'];
      $_SESSION['email'] = $result['Email'];
      $_SESSION['UserID'] = $result['users_id'];
      header("location:".$localHostUrl."parent/index.php?&action=home");
      break;

    case "tutor":
      $_SESSION['tutor'] = $result['Name'];
      $_SESSION['UserID'] = $result['users_id'];
      header("location:".$localHostUrl."tutor/index.php?&action=home");
      break;

    default :
     
    header('location:index.php');
  }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
    body {
    background: #222D32;
    font-family: 'Roboto', sans-serif;
}

.login-box {
    margin-top: 75px;
    height: auto;
    background: #1A2226;
    text-align: center;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.login-key {
    height: 100px;
    font-size: 80px;
    line-height: 100px;
    background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
    /* -webkit-background-clip: text; */
    -webkit-text-fill-color: transparent;
}

.login-title {
    margin-top: 15px;
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 15px;
    font-weight: bold;
    color: #ECF0F5;
}

.login-form {
    margin-top: 25px;
    text-align: left;
}

input[type=text] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #ECF0F5;
}

input[type=password] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
}

.form-group {
    margin-bottom: 40px;
    outline: 0px;
}

.form-control:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 2px solid #0DB8DE;
    outline: 0;
    background-color: #1A2226;
    color: #ECF0F5;
}

input:focus {
    outline: none;
    box-shadow: 0 0 0;
}
label {
    margin-bottom: 0px;
}
.form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
}
.btn-outline-primary {
    border-color: #0DB8DE;
    color: #0DB8DE;
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
.btn-outline-primary:hover {
    background-color: #0DB8DE;
    right: 0px;
}
.login-btm {
    float: left;
}

.login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
}
.login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
}
.loginbttm {
    padding: 0px;
}
  </style>

  </head>
  <body>
  <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                  Please Login
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" id="userId" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" id="pasword" name="password"  class="form-control" required>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary" name="btn-login">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
  </body>
</html>


