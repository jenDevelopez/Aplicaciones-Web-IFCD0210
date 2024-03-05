<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Básico</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <div class="container">

    <form action="procesa.php" method="post" autocomplete="off" autocapitalize="on">
      <div class="send">
        <img src="../send.svg" alt="icon send">
      </div>
      <div class=" form">


        <div>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre">
        </div>

        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Escribe tu email">
        </div>

        <div>
          <label for="edad">Edad:</label>
          <input type="number" id="edad" name="edad" placeholder="Escribe tu edad">
        </div>

        <button type="submit">Enviar</button>
      </div>
    </form>
  </div>




</body>

</html>