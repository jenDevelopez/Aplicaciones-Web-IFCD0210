<?php

require("../utils_db.php");
#parseo las credenciales
$credentials = parse_credentials("../php.ini");
$host = $credentials[0];
$user = $credentials[1];
$password = $credentials[2];


#realizo la conexion
$conexion = connect_server($host,$user,$password);


#conexion con la base de datos
$db = "noticias";
connect_db($conexion,$db);

$titulo = $contenido = $categoria = $imagen = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset ($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
  }

  if (isset ($_POST['contenido'])) {
    $contenido = $_POST['contenido'];
  }
  if (isset ($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
  }

 
  $imagen = "img/default.jpg";
  if(isset($_FILES["file"])) {
    $imagePath = "img/" . $_FILES["file"]["name"];
    if(!move_uploaded_file($_FILES["file"]["tmp_name"],$imagePath)){
      $mensaje = "ERROR:No se ha subido la noticia <href='index.php'>Volver</a>";
      echo $mensaje;
      exit;
    }
  }

  $q = "INSERT INTO noticia SET titulo='$titulo', contenido='$contenido', categoria='$categoria', imagen='$imagen'";

  mysqli_query($conexion,$q);
}

#intento de solicitar datos y mostrar en pantalla
$q = "SELECT * FROM noticia";

#hago la consulta
$result = result_query($conexion,$q);

#obtengo el numero de filas de la result
$nfilas = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accediendo a datos de mysql</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class="container">
    <div class="columna">
      <h1>Formulario de Noticias</h1>
      <form class="formulario" autocomplete="off" action="index.php" method="post" enctype="multipart/form-data">
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
    </div>

    
    <div class="columna">
      <h2>Tabla de Noticias</h2>
      <table class="tabla-noticias">
        <thead>
          <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Noticia</th>
            <th>Categoría</th>
            <th>Fecha</th>
            <th>Imagen</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
              <td>
                <?php echo $row["id"] ?>
              </td>
              <td>
                <?php echo $row["titulo"] ?>
              </td>
              <td>
                <?php 
                  $contenido = $row["contenido"];
                  $long_palabras_contenido = str_word_count($contenido);
                  $limit_char = $long_palabras_contenido * 2;
                $contenido = substr($contenido,0, $limit_char);
                echo $contenido; ?>
                <a href="<?php echo "noticia.php?id=" . $row["id"]; ?>">Leer más...</a>
                <a href="<?php echo "noticia.php?id=" .$row["id"] . "&modificar='true'" ?>">Modificar</a>
                <form action="delete.php" method="post">
                  <input type="hidden" name="id" value="<?php $row["id"]?> ">
                  <input type="submit" value="X">
                </form>
              </td>
              <td>
                <?php echo $row["categoria"] ?>
              </td>
              <td>
                <?php echo $row["fecha_de_creacion"] ?>
              </td>
              <td>
                <img src='<?php echo $row["imagen"] ?>'>
              </td>
            </tr>
          <?php } ?>
        </tbody>

      </table>
    </div>
  </div>


</body>

</html>