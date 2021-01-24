<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JavaScript Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        .formdesign {
            font-size: 20px;

        }

        .formdesign input {
            width: 50%;
            padding: 12px 20px;
            border: 1px solid black;
            margin: 14px;
            border-radius: 4px;
            font-size: 15px;
        }

        .formerror {
            color: red;
            font-size:small;
        }

        .createaccountbox
        {
            width: 60%;
            margin: auto;
            border: 2px solid white;
            padding: 20px;
            margin-bottom: 100px;
        }

        .inputbox
        {
            width: 300%;

        }

        .tablebox
        {
            width: 100%;
            padding: 20px;
        }

        body{
            color: white;
            background-image: url('signInBackground.jpg')
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbarMain">
        <div class="container-fluid" style="height: 70px; margin-bottom: 10px; ">
            <a class="navbar-brand" href="#" style="font-weight:normal; font-size:40px; margin-left: 20px;"> FitLife</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent"
                style="margin-bottom: 0px; font-size: large; ">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Calculations
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./Calculators/BodyFatCalculator.html">BodyFat
                                    Percentage</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./Calculators/CalorieCalculator.html">Calories
                                    Calculator</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./Calculators/IdealWeightCalculator.html">Ideal weight
                                    Calculator</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Workout
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./WorkoutRoutines/Male.html">Male</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./WorkoutRoutines/Female.html">Female</a></li>

                        </ul>
                    </li>
                </ul>
               
            </div>
        </div>
    </nav> <br />

    <?php
    $insert = false;
if(isset($_POST['fname']))
{
  $server = "localhost";
  $username = "root";
  $password = "";
  $dbname = "webProj";

  $con = mysqli_connect($server, $username, $password, $dbname);

  if(!$con)
  {
      die("connection failed due to".mysqli_connect_error());
  }
  
    $name = $_POST['fname'];
    $email = $_POST['femail'];
    $phone = $_POST['fphone'];
    $password = $_POST['fpass'];

    $sql =" INSERT INTO `webProj`.`logindetails`( `name`, `email`, `password`, `phone`, `date`) 
    VALUES ( '$name', '$email', '$password', '$phone', current_timestamp());";
 
  if($con->query($sql) == true)
  {
    echo '<div style="width: 40%;
    margin: auto;
    font-size: x-large;
    font-weight: bold;
    font-style: initial;
    color: green;
    
    text-align: center;">
        <div  >Account created successfully</div><br><div style="margin-bottom: 50px;">
        Now click here and go to our <a href="dashboard.php" >home page</a></div>
    </div>';
    $insert = true;
   }
    else{
    echo "ERROR: $sql <br> $con->error";
      }
      $con->close();
}

?>
    <h1 style="text-align:center;"><br> Create your account to get started!</h1><br>
   
    <h3 id="donecreating" ></h3>
    <div class="createaccountbox">
        <form action="./signin.php" name="myForm" onsubmit="return validateForm()" method="post">
          <table class="tablebox">
            <tr class="formdesign" id="name">
               <td> Name: </td>
                <td><input class="inputbox" style="width: 60%; margin-right: 0px;" type="text" name="fname" ><b><br><span class="formerror"> 

                </span></b></td>
                
            </tr>
    
            <tr class="formdesign" id="email">
                <td>Email: </td>
                <td><input class="inputbox" style="width: 60%; margin-right: 0px;" type="email" name="femail" ><b><br><span class="formerror"> 
                    
                </span></b></td>
                
            </tr>
    
            <tr class="formdesign" id="phone">
               <td> Phone: </td>
                <td><input class="inputbox" style="width: 60%; margin-right: 0px;" type="phone" name="fphone" ><b><br><span class="formerror">
                     </span></b></td>
                
            </tr>
    
            <tr class="formdesign" id="password">
               <td> Password: </td>
                <td><input class="inputbox" style="width: 60%; margin-right: 0px;" type="password" name="fpass" ><b><br><span class="formerror"> 

                </span></b></td>
                
            </tr>
    
            <tr class="formdesign" id="cpass">
                <td>Confirm Password: </td>
                <td><input class="inputbox" style="width: 60%; margin-right: 0px;" type="password" name="fcpass" ><b><br><span class="formerror">
                     </span></b></td>
                
            </tr>

            <tr id="verify" >
                     <td colspan="2" style="text-align: center;" ><button class="btn btn-primary btn-lg" type="button"
                      onclick="validateForm()">Verify</button<b><br><span class="formerror"> </span></b> </td>
            </tr> 
                        
            <tr>
                     <td colspan="2" style="text-align: center;" ><input class="btn btn-success btn-lg" value="Submit" type="submit"></td>
            </tr>
          </table>    
          <p style="text-align: center; font-size: large;" >Already have an account?
           <a href="login.php" style="color: white;">Login</a></p>
        </form>
    </div>
    <!-- INSERT INTO `logindetails` (`sno`, `Name`, `email`, `password`, `phone`, `date`) 
    VALUES ('1', 'Rayyan', 'rayyan.is19@bmsce.ac.in', 'Rayyan123$', '9740966225', '2021-01-22 20:54:34'); -->
</body>

<script>
    function clearErrors(){

errors = document.getElementsByClassName('formerror');
for(let item of errors)
{
    item.innerHTML = "";
}

}
function seterror(id, error){
element = document.getElementById(id);
element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
var returnval = true;
clearErrors();


var name = document.forms['myForm']["fname"].value;

if (name.length == 0){
    seterror("name", "*Please enter a name");
    returnval = false;
}

var email = document.forms['myForm']["femail"].value;
if (email.length>25){
    seterror("email", "*Email length is too long");
    returnval = false;
}

var result = email.search(/@gmail.com$/);
var result1 = email.search(/@bmsce.ac.in$/);
var result2 = email.search(/@yahoo.com$/);
if(result==-1&&result1==-1&&result2==-1)
{
    seterror("email", "*Email invalid, please use Gmail,Yahoo or BMSCE Email ID");
    returnval = false;
}
var phone = document.forms['myForm']["fphone"].value;
if (phone.length != 10){
    seterror("phone", "*Phone number should be 10 digits long");
    returnval = false;
}

var password = document.forms['myForm']["fpass"].value;
if (password.length < 6){

   
    seterror("pass", "*Password should be atleast 6 characters long!");
    returnval = false;
}

var cpassword = document.forms['myForm']["fcpass"].value;
if (cpassword != password){
    seterror("cpass", "*Password and Confirm password should match!");
    returnval = false;
}

if(returnval==true)
{
    
    seterror("verify", "You can submit now!");
}
return returnval;
}
</script>

</html>

