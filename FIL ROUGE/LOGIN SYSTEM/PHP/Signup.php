<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../CSS/Signup.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <title>Sign-Up</title>
</head>

<body>
  <form class="container" method="POST">
    <div class="form-group">
      <label for="Username">Username : </label>
      <input type="text" class="form-control" id="Username" name='Username' placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="Password">Password</label>
      <input type="password" class="form-control" id="Password" name='password' placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary button" href="Show.php">Submit</button>
  </form>
  <?php
  if (isset($_POST['Username'], $_POST['password'])) {
    include "../../Commun/conn.php" ;
    $Username = $_POST['Username'];
    $password = crypt($_POST['password'], "123");
    $sql = "INSERT INTO admins (username, password) VALUES( '$Username' , '$password') ";
    if (mysqli_query($conn, $sql)) {
      echo "you're now signed up Welcome ^^";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $conn->close();
  }
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="nav-bar ">
      <li><a href="./Signup.php">Signup</a></li>
      <li><a href="./Signin.php">Signin</a></li>
    </ul>
  </nav>
</body>

</html>