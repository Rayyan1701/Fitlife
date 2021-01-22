<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webProj";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = " SELECT * FROM `exercises` where name = 'likith' ";
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
  <link rel='stylesheet' href='style.css'>
</head>
<body>
    <br>
    <?php
    while($row = mysqli_fetch_array($result))
    {
    echo "
    <div class='container'>
    <div class='card' style='width: 18rem;'>
        <div class='card-body'>
          <h5 class='card-title'>".$row["name"]."</h5>
          <h6 class='card-subtitle mb-2 text-muted'>".$row["workout"]."</h6>
          <p class='card-text'>".$row["date"]."</p>
          <p class='card-text'>".$row["time"]."</a>
          <p class='card-text'>".$row["duration"]."</a>
        </div>
      </div>
    </div>
    ";
    }
    ?>
    
    
    <script src='https://kit.fontawesome.com/6713bd8137.js' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'
    integrity='sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW'
    crossorigin='anonymous'></script>
  <script src='themeChange.js'></script>
</body>
</html>

<?php
?>