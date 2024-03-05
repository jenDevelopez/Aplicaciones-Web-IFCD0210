<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Básico</title>
  <link rel="stylesheet" href="../style.css">
  <script>
    addEventListener("DOMContentLoaded", function(e
    ) {
      document.querySelector("img").classList.add("volando")
    })
  </script>
</head>

<body>
  <div class="container">

    <form action="index.php" method="post" autocomplete="off" autocapitalize="on">
      <div class="send">
        <img src="../send.svg" alt="icon send">
      </div>
      <div class=" form">


        <div>

          <?php
           if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['edad'])){
            echo "<h1>Completa el formulario</h1>";
            http_response_code(404);
            exit;
          }else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            echo "<h1>Datos recibidos</h1>";
            echo "<ul >";
            echo "<li>Nombre: " . $_POST['nombre'] . "</li>";
            echo "<li>Email: " . $_POST['email'] . "</li>";
            echo "<li>Edad: " . $_POST['edad'] . "</li>";
            echo "</ul>";
          }
          ?>
        </div>
      </div>
    </form>