<?php
ini_set('display_errors', 1);
require("../utils_db.php");



#realizo la conexion
$conexion = connect_server();


// #conexion con la base de datos
$db = "noticias";
connect_db($conexion, $db);



$titulo = $contenido = $categoria = $imagen = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // login
 /* if (isset($_POST['email']) && isset($_post['password'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
  } else {
  }*/
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
}
/*
  $q = "INSERT INTO noticia SET id_usuario='1', titulo='$titulo', contenido='$contenido', categoria='$categoria', imagen='$imagen'";

  mysqli_query($conexion, $q);


  $desde = 0;
  $hasta = 3;

  if (isset($_GET['desde'])) {
    $desde = $_GET['desde'];
  }
  $columna = 'id';
  if (isset($_get['columna'])) {
    $columna = $_get['columna'];
  }
  // #intento de solicitar datos y mostrar en pantalla
  $q = "SELECT * FROM noticia ORDER BY $columna LIMIT $desde,$hasta";

  //q = "SELECT * FROM noticia";
  // #hago la consulta
  $result = query($conexion, $q);
  $q = "SELECT * FROM noticia";

  // #obtengo el numero de filas de la result
  $numFilas =  contar_filas($conexion, $q);


  $q = "SELECT DISTINCT categoria FROM noticia ORDER BY  categoria";
  $resultadoCategorias = query($conexion, $q);
}*/
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
    <header>
      <div class="user">
        <div class="icon-user">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
          </svg>
        </div>
        <h2>
          <?php
          if (isset($_SESSION['user'])) {
            echo $user;
          }
          ?>
        </h2>
      </div>
      <a class="logout" href="logout.php">Logout</a>

    </header>
    <main>


      <div class="columna">
        <h2>Tabla de Noticias</h2>
        <table class="tabla-noticias">
          <thead>
            <tr>
              <th><a href="index.php?columna=id">Id</a></th>
              <th><a href="index.php?columna=titulo">Título</a></th>
              <th><a href="index.php?columna=contenido">Noticia</a></th>
              <th><a href="index.php?columna=categoria">Categoría</a></th>
              <th><a href="index.php?columna=fecha">Fecha</a></th>
              <th><a href="index.php?columna=imagen">Imagen</a></th>
            </tr>
          </thead>

          <tbody>
            <!-- 
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
                  $strFinal = substr($row["contenido"], 0, 100);
                  echo substr($row['contenido'], 0, 100);
                  if ($strFinal < $row['contenido']) {
                    echo "...";
                  }

                  echo   " <br><a href='noticia.php?id=" . $row['id'] . "'>Ir a la noticia completa -></a><br>";

                  /* <a href="<?php echo "noticia.php?id=" . $row["id"]; ?>">Leer más...</a>
                  <a href="<?php echo "noticia.php?id=" . $row["id"] . "&modificar='true'" ?>">Modificar</a>
                  <a href="<?php echo "delete.php?id=" . $row["id"] ?>">x</a>*/
                  ?>
                  <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <input type="hidden" name="imagen" value="<?php echo $row['imagen']; ?>">
                    <input type="submit" value="Eliminar" class="eliminar">
                  </form>
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
             -->
           
          </tbody>
         
        </table>
        <!-- Enlaces de paginación -->
<?php if ($desde > 0) {
?>
  <a href="index.php?comienzo=<?php echo $desde - $hasta; ?>">
    << Retroceder <?php echo $hasta; ?> </a>
    <?php } ?>
    <?php if ($desde + $hasta <= $numfilas) { ?>
      <a href="index.php?desde=<?php echo $desde + $hasta; ?>">
        Avanzar >>
        <?php echo $hasta; ?>
      </a>
    <?php } ?>
    </div>

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
    </main>
    </body> 
</html>