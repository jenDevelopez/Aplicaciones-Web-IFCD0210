<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <?php
  function formatearDatos($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $nameErr = $emailErr = $coursesErr = $websiteErr = $commentErr = $genderErr = "";
  $name = $email = $comment = $website = $gender = $courses = "";


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
      $nameErr = 'Tienes que poner un nombre';
    } else {
      $name = formatearDatos($_POST['name']);
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Este campo solo permite letras y espacios";
      }
    }
    if (empty($_POST['email'])) {
      $emailErr = 'Tienes que poner un email';
    } else {
      $email = formatearDatos($_POST['email']);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato de email invalido";
      }
    }
    if (empty($_POST['website'])) {
      $websiteErr = 'Tienes que poner la url de tu sitio web';
    } else {
      $website = formatearDatos($_POST['website']);
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
        $websiteErr = "URL invalida";
      }
    }
    if ($_POST['comment'] == '') {
      $commentErr = 'Tienes que escribir un mensaje';
    } else {
      $comment = formatearDatos($_POST['name']);
    }
    if (empty($_POST["gender"])) {
      $genderErr = "Debes seleccionar un género";
    } else {
      $gender = formatearDatos($_POST["gender"]);
    }
    if (!isset($_POST['courses'])) {
      $coursesErr = 'Debes elegir al menos un curso';
    } else {
      $courses = $_POST['courses'];
    }
  }
  ?>
  <h1>Formulario Basico</h1>
  <form id="formulario" action="index.php" method="post">
    <fieldset>
      <label for="name">Nombre</label>
      <input type="text" name="name" id="name" placeholder="Escriba su nombre">
      <span class="error">
        <?php echo $nameErr; ?>
      </span>
    </fieldset>
    <fieldset>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Escriba su email">
      <span class="error">
        <?php echo $emailErr; ?>
      </span>
    </fieldset>
    <fieldset>
      <label for="text">Sitio Web</label>
      <input type="text" name="website" id="website" placeholder="Escriba su sitio web">
      <span class="error">
        <?php echo $websiteErr; ?>
      </span>
    </fieldset>
    <fieldset>
      <label for="comment">Mensaje</label>
      <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Escriba su mensaje"></textarea>
      <span class="error">
        <?php echo $commentErr; ?>
      </span>
    </fieldset>
    <fieldset>
      <h2>Género</h2>
      <div class="generos">
        <fieldset>
          <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male")
                                              echo "checked"; ?> value="female">
          <label for="male">Hombre</label>
        </fieldset>
        <fieldset>
          <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female")
                                              echo "checked"; ?> value="male">
          <label for="female">Mujer</label>
        </fieldset>
        <fieldset>
          <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other")
                                              echo "checked"; ?> value="other">
          <label for="other">Otro</label>
        </fieldset>
      </div>
      <span class="error">
        <?php echo $genderErr; ?>
      </span>
    </fieldset>
    <fieldset>
      <h2>Elige los cursos que quieres aprender</h2>
      <div class="cursos">
        <fieldset>
          <input type="checkbox" name="courses[]" id="frontend" value="frontend">
          <label for="frontend">Front End</label>
        </fieldset>
        <fieldset>
          <input type="checkbox" name="courses[]" value="backend" id="backend">
          <label for="backend">Backend</label>
        </fieldset>
        <fieldset>
          <input type="checkbox" name="courses[]" value="fullStack" id="fullStack">
          <label for="fullStack">Full Stack</label>
        </fieldset>
      </div>
      <span class="error">
        <?php echo $coursesErr; ?>
      </span>
    </fieldset>
    <input type="submit" value="Enviar">
  </form>
  <div id="modal" class="datos">
    <?php
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['website']) || $_POST['comment'] == '') {
      echo "<p>No has rellenado uno o varios campos del formulario</p>";
      http_response_code(404);
      exit;
    } else {
      echo "<h2>Datos del formulario</h2>";
    ?>
      <ul>
        <?php

        echo "<li>Nombre: $name</li>";

        echo "<li>Email: $email</li>";
        echo "      <li>Sitio Web: $website</li>
          ";
        echo " <li>Mensaje: $comment</li>";
        echo "<li>Genero: $gender</li>";

        echo "<span>Cursos elegidos</span>";

        ?>
        <ol>
          <?php
          foreach ($courses as $course) {
            echo "<li>$course</li>";
          }
          ?>


        </ol>
      </ul>
    <?php
    }
    ?>



  </div>
</body>

</html>