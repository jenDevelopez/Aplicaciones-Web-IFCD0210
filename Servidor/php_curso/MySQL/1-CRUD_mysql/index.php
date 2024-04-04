<?php
ini_set('display_errors', 1);
require("../utils_db.php");
#parseo las credenciales
$credentials = parse_credentials("../php.ini");
$host = $credentials[0];
$user = $credentials[1];
$password = $credentials[2];

#realizo la conexion
$conexion = mysqli_connect($host, $user, $password);


#conexion con la base de datos
$db = "noticias";
mysqli_select_db($conexion, $db);

$titulo = $contenido = $categoria = $imagen = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
  }

  if (isset($_POST['contenido'])) {
    $contenido = $_POST['contenido'];
  }
  if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
  }


  $imagen = "./img/default.jpg";
  if (isset($_FILES["imagen"])) {
    $imagePath = "./img/" . $_FILES["imagen"]["name"];
    if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagePath)) {
      $mensaje = "ERROR: No se ha subido la noticia <a href='index.php'>Volver</a>";
      echo $mensaje;
      exit;
    }
    $imagen = $imagePath;
  }

  $q = "INSERT INTO noticia SET id_usuario='1', titulo='$titulo', contenido='$contenido', categoria='$categoria', imagen='$imagen'";

  mysqli_query($conexion, $q);
}

#intento de solicitar datos y mostrar en pantalla
$q = "SELECT * FROM noticia";

#hago la consulta
$result = result_query($conexion, $q);

#obtengo el numero de filas de la result
$nfilas = mysqli_num_rows($result);

$q = "SELECT DISTINCT categoria FROM noticia";
$resultadoCategorias = result_query($conexion, $q);

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


    <div class="container">
      <div class="columna">
        <h1>Formulario de Noticias</h1>
        <form autocomplete="off" class="formulario" action="index.php" method="post" enctype="multipart/form-data">
          <label for="title">Título:</label>
          <input type="text" id="title" name="titulo" placeholder="Ingrese el título de la noticia">
          <br>
          <label for="text">Texto:</label>
          <textarea id="text" name="contenido" placeholder="Ingrese el contenido de la noticia"></textarea>
          <br>
          <label for="category">Categoría:</label>
          <input type="text" id="category" name="categoria" list="categorias">
          <datalist id="categorias">
          <?php while ($row = mysqli_fetch_array($resultadoCategorias)) { ?>
            <option value="<?php echo $row["categoria"] ?>"><?php echo $row["categoria"] ?></option>
          <?php } ?>
          </datalist>
          <br>
          <label for="image">Imagen:</label>
          <input type="file" id="image" name="imagen">
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
                  $contenido = substr($contenido, 0, $limit_char);
                  echo $contenido; ?>
                  <a href="<?php echo "noticia.php?id=" . $row["id"]; ?>">Leer más...</a>
                  <a href="<?php echo "noticia.php?id=" . $row["id"] . "&modificar='true'" ?>">Modificar</a>
                  <a href="<?php echo "delete.php?id=" .$row["id"] ?>">x</a>
                </td>
                <td>
                  <?php echo $row["categoria"] ?>
                </td>
                <td>
                  <?php echo $row["fecha"] ?>
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