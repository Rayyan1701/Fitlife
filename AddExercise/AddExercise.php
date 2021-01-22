<?php
$insert = false;
if(isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";

    
    $con = mysqli_connect($server, $username, $password);
    
    
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
     
    $name = $_POST['name'];
    $workout = $_POST['Workout'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO `webProj`.`exercises` (`name`, `workout`, `date`, `time`, `duration`) 
    VALUES ('$name', '$workout', '$date', '$time', '$duration');";

    if($con->query($sql) == true){
      $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbarMain">
        <div class="container-fluid" style="height: 70px; margin-bottom: 10px; ">
          <a class="navbar-brand" href="../introduction.html" style="font-weight:normal; font-size:40px; margin-left: 20px;"> FitLife</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-bottom: 0px; font-size: large; ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Calculations
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="../Calculators/BodyFatCalculator.html">BodyFat Percentage</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="../Calculators/CalorieCalculator.html">Calories Calculator</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="../Calculators/IdealWeightCalculator.html">Ideal weight Calculator</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Workout
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="../WorkoutRoutines/Male.html">Male</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="../WorkoutRoutines/Female.html">Female</a></li>
    
                </ul>
              </li>
            </ul>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle themeChangeDropdown" href="#" id="navbarDropdown" 
              role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span id="themeDropDown">Change Theme</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item lightMode" href="#" onclick="lightMode()">Light Mode</a></li>
                <li><a class="dropdown-item darkMode" href="#" onclick="darkMode()">Dark Mode</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav> <br/>
    <div class="container">
        <h3>Enter your Workout Details</h3>
        <br/>
        <form action="AddExercise.php" method="post" style="margin: auto; width: 50%;">
            <div class="form-group">
                <label>Name: </label>
                <input type="text" class="form-control" id="name" name="name" />
            </div><br>
            <div class="form-group">
                <label>Workout: </label>
                <select class="form-control" id="Workout" name="Workout">
                    <option value="">---Select A Workout---</option>
                    <option value="Workout 1">Workout 1</option>
                    <option value="Workout 2">Workout 2</option>
                    <option value="Workout 3">Workout 3</option>
                    <option value="Workout 4">Workout 4</option>
                    <option value="Workout 5">Workout 5</option>
                </select>
            </div><br>
            <div class="form-group">
                <label>Date: </label>
                <input type="date" class="form-control" id="date" name="date">
            </div><br>
            <div class="form-group">
                <label>Time: </label>
                <input type="time" class="form-control" id="time" name="time">
            </div><br>
            <div class="form-group">
                <label>Duration: </label>
                <input type="number" class="form-control" id="duration" name="duration">
            </div><br>
            <div class="form-group" style="display: flex;">
                <!-- <input type="submit" class="btn btn-success" style="margin-left: auto;" value="Add Workout"/>
                <span style="margin: 10px;"></span>
                <button class="btn btn-danger" style="margin-right: auto;" onclick="resetValues();">Reset Values</button> -->
                <button class="btn btn-success" style="margin: auto;">Submit</button>
            </div>
        </form> <br>
        <button class="btn btn-primary" style="margin: auto;"><a href="./GetExercise.php" style="color: white; text-decoration: none;">
        See Your Exercises</a> </button> 
        <?php
        if($insert == true){
        echo "<span style = 'display: flex;'><h6 style='margin: auto; color: green;'>
        Your response has been submitted successfully!</h6></span>";
        }
    ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
    <script src="../themeChange.js"></script>
</body>
</html>