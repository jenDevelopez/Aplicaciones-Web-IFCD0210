<?php
#ini
$host = "localhost";
$user = "developez";
$password = "developez";

#realizo la conexion
$conexion = mysqli_connect($host, $user, $password) or die ("No se ha podido realizar la conexion");

#Mensaje de verificacion
//echo "La conexion con la base de datos se ha realizado con exito <br>";

#conexion con la base de datos
$database = "noticias";
mysqli_select_db($conexion, $database) or die ("No se puede seleccionar la base de datos");
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

  if (isset ($_POST['imagen'])) {
    $imagen = $_POST['imagen'];
  }

  $q = "INSERT INTO noticia SET titulo='$titulo', contenido='$contenido', categoria='$categoria', imagen='$imagen'";

  mysqli_query($conexion,$q);
}

#intento de solicitar datos y mostrar en pantalla
$q = "SELECT * FROM noticia";

#hago la consulta
$result = mysqli_query($conexion, $q) or die ('Fallo en la conexion');

#obtengo el numero de filas de la result
$nfilas = mysqli_num_rows($result);

#cierro la conexion 
// mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accediendo a datos de mysql</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="columna">
      <h1>Formulario de Noticias</h1>
      <form class="formulario" action="index.php" method="post" enctype="multipart/form-data">
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

    <?php
    $titulo = $contenido = $categoria = $imagen = "";
   
    ?>
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
                <?php echo $row["contenido"] ?>
              </td>
              <td>
                <?php echo $row["categoria"] ?>
              </td>
              <td>
                <?php echo $row["fecha_de_cracion"] ?>
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