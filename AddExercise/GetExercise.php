<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webProj";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET["code"]))
{
   $sql = " SELECT * FROM `newexercises` where name=".$_SESSION['user_first_name'].$_SESSION['user_last_name'];
}
else
{
  $sql = " SELECT * FROM `newexercises`";
}


$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

$conn->close();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'
    integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
  <link rel='stylesheet' href='../style.css'>
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbarMain">
    <div class="container-fluid" style="height: 70px; margin-bottom: 10px; ">
      <a class="navbar-brand" href="../index.html"
        style="font-weight:normal; font-size:40px; margin-left: 20px;"> FitLife</a>
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

          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Members Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="AddExercise.php">Add Exercise</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="GetExercise.php">Get Exercise List</a>
              </li>
            </ul>
            </li>

        </ul>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle themeChangeDropdown" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <span id="themeDropDown">Change Theme</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item lightMode" href="#" onclick="lightMode()">Light Mode</a></li>
            <li><a class="dropdown-item darkMode" href="#" onclick="darkMode()">Dark Mode</a></li>
          </ul>
        </div>
        <div>
          <a href="../logout.php"><button class="btn btn-danger" 
          onclick="alert('You will be returned to the Landing Page')">Log Out</button></a>
        </div>
      </div>
    </div>
  </nav><br />

  <div style='min-height: 55vh;'>
     <?php
   
      if( mysqli_num_rows($result) == 0)
      {
        echo "
          <div style='display: flex; flex-direction: column;'>
            <h2 style='margin: auto;'>You have not logged any workouts yet!</h2><br/>
            <h4 style='margin: auto;'><a href = 'AddExercise.php'>Add your Exercise</a> to get started.</h4>
          </div>
        ";
      }
      else
      {
        while($row = mysqli_fetch_array($result))
        {
        echo "
    <div class='container' style='display: flex;'>
      <div class='card infoHolder' style='width: 18rem; margin: auto;'>
        <div class='card-body'>
          <h3 class='card-text'>".$row["date"]."</h3><hr/>
          <h4 class='card-title'>".$row["workout"]."</h4>
          <h6 class='card-subtitle mb-2 text-muted'>Calories burnt: ".$row["calories"]."</h6>
          <h5 class='card-text'>Time: ".substr($row["time"], 0, 5)."</h5>
          <h5 class='card-text'>Duration: ".$row["duration"]." minutes</h5>
        </div>
      </div>
    </div><hr/>
    ";
      }
    }
    ?> 
    <br/>
    </div>
    <footer style="height: 30vh; background-color: #f8f9fa; padding: 20px; border-top: 1px solid black;" id="fTop">
      <div style="display: flex;" class="logo"><h6 style="margin: auto;">Check out our other links here!</h6></div><br><br>
      <div class="container" style="display: grid; grid-template-columns: 1fr 1fr 1fr; width: 50%;">
      <div style="margin: auto;" class="logo">
        <i class="fab fa-2x fa-instagram" ></i>
      </div>
      <div style="margin: auto;" class="logo">
        <i class="fab fa-2x fa-facebook"></i>
      </div>
      <div style="margin: auto; " class="logo">
        <i class="fab fa-2x fa-twitter"></i>
      </div>
        <div style="height: 6vh;"></div>
        <div style="height: 6vh;"></div>
        <div style="height: 6vh;"></div>
        <span style="margin: auto; grid-column: 2/3;"><a href="../index.html"
          style="color: black; text-decoration: none;" class="logo">&copy; FitLife</a></span> 
      </div>
  </footer>

    <script src="https://kit.fontawesome.com/6713bd8137.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
  <script src="TcGe.js"></script>
</body>
</html>