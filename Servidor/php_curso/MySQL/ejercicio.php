<?php
ini_set('display_errors', 1);

$host = "localhost";
$user = "dev";
$password = "142022";
$dbname = "noticias";
#hago la conexion con el servidor y la base de datos
$conexion = mysqli_connect($host, $user, $password, $dbname);

$query = "SELECT nombre,email FROM usuarios";
#obtengo los datos de los usuarios
$resultUsuarios = mysqli_query($conexion, $query);
$query = "SELECT * FROM noticia";
#obtengo los datos de las noticias
$resultNoticias = mysqli_query($conexion, $query);

$query = "DELETE FROM noticia WHERE categoria  LIKE 'c%'";
#elimino las noticias cuya catetoria comienza con c
$eliminarNoticias = mysqli_query($conexion, $query);

#recojo los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
  }
  if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
  }
  if (isset($_POST['contenido'])) {
    $contenido = $_POST['contenido'];
  }
  if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
  }

  #inserto los datos en la base de datos
  $query = "INSERT INTO noticia SET id_usuario='1', titulo='$titulo', contenido='$contenido', categoria='$categoria', imagen=''";
  mysqli_query($conexion, $query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    h2 {
      margin: 0;
    }

    p {
      margin: 0;
    }
  </style>
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($resultUsuarios)) { ?>
        <tr>
          <td>
            <p>
              <?php echo $row['nombre'] ?>
            </p>
          </td>
          <td>
            <p>
              <?php echo $row['email'] ?>
            </p>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Contenido</th>
        <th>Categoría</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($resultNoticias)) { ?>
        <tr>
          <td><?php echo $row['id'] ?></td>
          <td>
            <h2>
              <?php echo $row['titulo'] ?>
            </h2>
          </td>
          <td>
            <p>
              <?php echo $row['contenido'] ?>
            </p>
          </td>
          <td><?php echo $row['categoria'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <h2>Añade una noticia</h2>

  <form action="ejercicio.php" method="post">

    <input type="text" name="titulo" id="titulo" placeholder="Pon el titulo">
    <br>
    <input type="text" name="contenido" id="contenido" placeholder="Pon el contenido de la noticia">
    <br>
    <input type="text" name="categoria" id="categoria">
    <br>
    <input type="submit" value="Añadir noticia">
  </form>
</body>

</html>