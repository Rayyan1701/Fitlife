   <?php
  //index.php
  //Include Configuration File

  if(isset($_GET["code"])){
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
}
?> 


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome To Fitlife</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <style>
    .tes {
    background-color: #367c2b; 
    height: 40vh; 
    width: 26vw; 
    margin: auto;
    color: white; 
    padding: 1rem;
    transition: all 0.3s ease-in-out;
    margin-bottom: 1.3rem;
}

.tes:hover {
    transform: scale(1.1);
}

  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbarMain">
    <div class="container-fluid" style="height: 70px; margin-bottom: 10px; ">
      <a class="navbar-brand" href="#" style="font-weight:normal; font-size:40px; margin-left: 20px;"> FitLife</a>
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
              <li><a class="dropdown-item" href="./Calculators/BodyFatCalculator.html">BodyFat Percentage</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="./Calculators/CalorieCalculator.html">Calories Calculator</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="./Calculators/IdealWeightCalculator.html">Ideal weight Calculator</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
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
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Members Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="./AddExercise/AddExercise.php">Add Exercise</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="./AddExercise/GetExercise.php">Get Exercise List</a>
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
          <a href="logout.php"><button class="btn btn-danger" 
          onclick="alert('You will be returned to the Landing Page')">Log Out</button></a>
        </div>
      </div>
    </div>
  </nav> <br />

  <div class="container">
    
     <?php
      if(isset($_GET["code"])){
        echo "<span style='display: flex;'><img src=".$_SESSION["user_image"]." class='img-responsive img-circle img-thumbnail'
        style='margin: auto;' /></span><br/>
        <h1 style='text-align: center'>Welcome, ".$_SESSION['user_first_name']." ".$_SESSION['user_last_name']."</h1>";
      }
    
    ?>
  </div><hr/>

  <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
      style="margin: 0px 100px 0px 100px;">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./IntroductionImages/img1.jpg" class="d-block w-100" height="500" width="500" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./IntroductionImages/img2.jpg" class="d-block w-100" height="500" width="500" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./IntroductionImages/img3.jpg" class="d-block w-100" height="500" width="500" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
    <br/>
  </div>
  <hr/>

  <div class="container">
    <h1 style="text-align: center;">What are you waiting for? Look around the website and explore its features to get started!</h1><br>
    <h3 style="text-align: center;">Here are some of our Testimonials!</h3><br>
    <div class="testimonials" style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
      <div class="tes">
        <p>
          “I am so happy with this gym. It is clean, affordable, and has a great staff and very knowledgeable trainers. 
          This is a gym for everyone from beginners to body builders. All the equipment is new.  
          Centrally located so if I do feel like working out late in the evening I feel safe.”
        </p>
        <p><i>-Prateek</i></p>
      </div>
      <div class="tes">
        <p>
          “I think this place is great. Plenty of equipment and everything is clean. 
          The staff I have come in contact with have been really nice and helpful. 
          The trainers seem to be knowledgeable and they have a large variety of classes."
        </p>
        <p><i>-Prashanth</i></p>
      </div>
      <div class="tes">
        <p>
          “I am really enjoying the new gym… Everything is clean, the staff is friendly and helpful, 
          the Matrix equipment is smooth and easy to use, and I can go whenever I want! What else could a person ask for!?”
        </p>
        <p><i>-Kushal</i></p>
      </div>
      <div class="tes">
        <p>
          “Since I like to work out at 4:30 am, FitLife is just perfect. 
          Clean, comfortable and all the equipment I need. It is close to home so I ride my bike to and from the gym. 
          Can’t beat it!”
        </p>
        <p><i>-Manish</i></p>
      </div>
      <div class="tes">
        <p>
          “Best thing I’ve EVER done for myself….
          I actually look forward to coming every day because the atmosphere is SO welcoming & inviting! I feel worlds better afterward.”
        </p>
        <p><i>-Kaushik</i></p>
      </div>
      <div class="tes">
        <p>
          “I was able to bring my cholesterol down within a normal range naturally, deposit a ton of my stress at the gym (!) 
          and become much more flexible. I was a size 8 last fall but would have never admitted it. 
          Now, I am down to a size 4 and proud to show it off as I sport my new clothes!”
        </p>
        <p><i>-Ramesha</i></p>
      </div>
    </div>
  </div>
  <br/><hr/>

  <footer style="height: 30vh; background-color: #f8f9fa; padding: 20px;">
    <div style="display: flex;"><h6 style="margin: auto;" class="logo">Check out our other links here!</h6></div><br><br>
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
      <span style="margin: auto; grid-column: 2/3;"><a href="./index.html"
        style="color: black; text-decoration: none;" class="logo">&copy; FitLife</a></span> 
    </div>
</footer>
<script src="https://kit.fontawesome.com/6713bd8137.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
  <script src="themeChange.js"></script>
  
</body>

</html>