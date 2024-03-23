<?php

if (!isset ($_GET["id"])) {
  $mensaje = "ERROR: fALTAN PARAMETROS";
  echo "$mensaje <a href='index.php'>Volver</a>";
} else {
  $id = $_GET["id"];
  #conexion a la base de datos
  $host = "localhost";
  $user = "developez";
  $password = "developez";

  #realizo la conexion
  $conexion = mysqli_connect($host, $user, $password) or die ("No se ha podido realizar la conexion");


  #conexion con la base de datos
  $database = "noticias";
  mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");

  $q = "SELECT * FROM noticia WHERE id=$id";
  $result = mysqli_query($conexion, $q) or die ("Error en la conexion");
  $noticia = mysqli_fetch_array($result);
  $titulo = $noticia["titulo"];
  $id = $noticia["id"];
  $contenido = $noticia["contenido"];
  $categoria = $noticia["categoria"];
  $imagen = $noticia["imagen"];
  $fecha = $noticia["fecha_de_creacion"];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Noticia
    <?php echo $titulo ?>
  </title>
  <link rel="stylesheet" href="./css/noticia.css">
</head>

<body>
  <div class="container">
    <div class="card">
      <img class="card-img-top" src="<?php echo $imagen ?>" alt="Imagen de noticia <?php echo $id ?>">
      <div class="card-body">
        <h2 class="card-title">
          <?php echo $titulo; ?>
        </h2>
        <p class="card-text">
          <?php echo $contenido; ?>
        </p>
        <div class="card-footer">
          <span class="badge badge-primary">
            <?php echo $categoria; ?>
          </span>
          <span class="badge badge-secondary">
            <?php echo $fecha; ?>
          </span>
        </div>
      </div>
     <a href="index.php">Volver</a>
    </div>
    <?php
    if (isset ($_GET["modificar"])) { ?>
      <div class="columna">
        <h1>Modificar noticia</h1>

        <form class="formulario" action="update.php" method="post">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <label for="title">Título:</label>
          <input type="text" id="title" name="titulo" placeholder="Ingrese el título de la noticia">
          <br>
          <label for="text">Texto:</label>
          <textarea id="text" name="contenido" placeholder="Ingrese el contenido de la noticia"></textarea>
          <br>
          <label for="category">Categoría:</label>
          <select id="category" name="categoria">
            <option value="">Seleccione una categoría</option>
            <option value="politica">Política</option>
            <option value="economia">Economía</option>
            <option value="deportes">Deportes</option>
            <option value="sociedad">Sociedad</option>
            <option value="tecnologia">Tecnología</option>
            <option value="ciencia">Ciencia</option>
            <option value="cultura">Cultura</option>
            <option value="internacional">Internacional</option>
          </select>
          <br>
          <label for="image">Imagen:</label>
          <input type="text" id="image" name="imagen">
          <br>
          <button type="submit">Enviar</button>
        </form>
      </div <?php } ?> >


</body>

</html>