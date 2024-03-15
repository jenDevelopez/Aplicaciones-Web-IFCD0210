<?php
session_start();  // Starts a PHP session

if (!isset($_SESSION['user'])) {
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    a{
      background-color: red;
  color: white;
  padding: 10px;
  border-radius: 5px;
  text-decoration: none;
  float:right;
    }
  </style>
</head>
<body>

<header>
  <a href="logout.php">Logout</a>
</header>
<main>
  <h1>Bienvenido <?php echo $_SESSION['user']?></h1>
  Mira que foto mas chula<br>
  <img src="https://picsum.photos/200/300" width="50%" alt="">
</main>

</body>
</html>