<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';

if(isset($_GET["code"]))
{
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 if(!isset($token['error']))
 {
  $google_client->setAccessToken($token['access_token']);
  $_SESSION['access_token'] = $token['access_token'];
  $google_service = new Google_Service_Oauth2($google_client);
  $data = $google_service->userinfo->get();

  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}

if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'" style="color: white; text-decoration: none;" >
 <button class="btn btn-primary">
 Login With Google
 </button></a>';
}

?>

<?php
//This script will handle login
// check if the user is already logged in
if(isset($_SESSION['email']))
{
    header("location: ./dashboard.html");
    exit;
}
require_once "config.php";

$email = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter email + password";
    }
    else{
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    }

if(empty($err))
{
    $sql = "SELECT  email, password FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_email);
    $param_email = $email;
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt,   $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                    if(password_verify($password, $hashed_password))
                    {
                    // this means the password is corrct. Allow user to login
                    session_start();
                    $_SESSION["email"] = $email;
                            
                    $_SESSION["loggedin"] = true;

                    //Redirect user to welcome page
                    header("location: dashboard.html");
                 
                }
            }

        }
    }
}    

}

?>

<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="loginstyles.css">
 
 
 </head>
 <body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbarMain">
    <div class="container-fluid" style="height: 70px; margin-bottom: 10px; ">
      <a class="navbar-brand" href="#" style="font-weight:normal; font-size:40px; margin-left: 20px;"> FitLife</a>
    </div>
  </nav>

  <div class="container">
  
   <br />
   
   <div class="panel panel-default">
   <div >
<script>
function clickedButton()
{
    var ret=true;
    var username = document.forms['myForm']["emailid"].value;
    var password = document.forms['myForm']["password"].value;
    
    if(username=="Rayyan" && password == "Rayyanmysql1701$")
    {
        window.location.href = "dashboard.php";
    
    }

    else
    {
      element = document.getElementById("failnotification");
      element.innerhtml="You are not a registered user! Create an account to continue";
    }
}

</script>

   </div>
    <h2 style="text-align: center;">Login to continue using FitLife</h2><br>
   <div class="loginbox" >
    <!-- <p style="text-align: center; font-size:large;" >Login using your username here!</p> -->
    <p id="failnotification" > </p>
    <form name="myForm">
      <table>
        <tr class="row" >
          <th colspan="2">Username</th>
          <td colspan="2"><input style="width: 160%;" name="emailid" type="text"  ><span class="formerror" ></span></td>
        </tr>
        <tr class="row" >
          <th colspan="2">Password</th>
          <td colspan="2"><input style="margin-right: 0px; width: 160%;"  name="password" type="password"  ><span class="formerror" >
          </span></td>
        </tr>
        <tr class="submit" >
          <td type="submit"><input type="button" class="btn btn-success" style="margin: auto;"
          value="Login" onClick="clickedButton()"/></td>
          <td style="width: 40%; ">

          <button class="btn btn-primary"><a href="signin.php" style="color: white; text-decoration: none;">
            Sign In</a></button>
            </td>
        </tr>
      </table>
    </form>
   <?php
       echo '<h3 align="center"> Or</h3><br/>';
       echo '<h2 align="center">Login or create account using Google Account</h2><br />';
       echo '<div align="center" " >'.$login_button . '</div></div>';
   ?>
   </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
  <script src="themeChange.js"></script>
  
 </body>
</html>