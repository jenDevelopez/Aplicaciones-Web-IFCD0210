<?php
ini_set('display_errors', 1);
require './utils/utils_db.php';
if (!isset($_SESSION["user"])) {
  header("location: login.php");
} else {
  $user = $_SESSION["user"];
}
connect_server();
if (isset($_SESSION["user"])) {
  $query = "SELECT * FROM usuarios WHERE email='$user'";
  $resultUser = query($query);
  $row = mysqli_fetch_array($resultUser);
  $name = $row['nombre'];
  $email = $row['email'];
  $id = $row['id'];

  $query = "SELECT * FROM noticia WHERE id_usuario='$id'";
  $resultNoticias = query($query);
  $numNoticias = mysqli_num_rows($resultNoticias);

  $query = "SELECT DISTINCT categoria FROM noticia ORDER BY  categoria";
  $resultCategorias = query($query);
}

$escribir = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['escribir'])) {
    $escribir = true;
  }
  if (isset($_GET['close'])) {
    $escribir = '';
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de usuario</title>
  <link rel="stylesheet" href="./css/profile.css">
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/formulario.css">
</head>

<body>
  <header>
    <div class="user">
      <a href="index.php" class="icon-user header-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-home">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
          <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
          <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
        </svg>
      </a>

    </div>
    <?php
    if (!isset($_SESSION['user'])) {
      echo "<a href='login.php'>Iniciar sesión</a>";
    } else {
      echo "<a class='link-user header-link' href='profile.php'>
        <svg  xmlns='http://www.w3.org/2000/svg'  width='24'  height='24'  viewBox='0 0 24 24'  fill='none'  stroke='currentColor'  stroke-width='2'  stroke-linecap='round'  stroke-linejoin='round'  class='icon icon-tabler icons-tabler-outline icon-tabler-user-circle'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0' /><path d='M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0' /><path d='M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855' /></svg>
        <span>Mi perfil<span>
        </a>";
    }
    ?>

  </header>

  <main>
    <aside class="datos-usuario">
      <h2>Mi perfil</h2>
      <ul>
        <li><?php echo $name ?></li>
        <li><?php echo $email ?></li>
      </ul>
      <a class="logout" href="logout.php">Cerrar sesión</a>

    </aside>


    <section class="articulos">
      <div class="titulo">
        <h2>Mis artículos</h2>
        <a href="profile.php?escribir='true'">Escribir noticia</a>
      </div>


      <?php if ($numNoticias == 0)
        echo "<h3>No has escrito ninguna noticia</h3>" ?>

        <ul class="lista-articulos">
        <?php while ($row = mysqli_fetch_array($resultNoticias)) { ?>
          <li>
            <article class="noticia">
              <h3><?php echo $row['titulo'] ?></h3>
              <p>
                <?php
                $strFinal = substr($row["contenido"], 0, 100);
                echo substr($row['contenido'], 0, 100);
                if ($strFinal < $row["contenido"]) {
                  echo "...";
                }
                ?>
              </p>
              <div class="acciones">
                <a href="<?php echo "noticia.php?id=" . $row["id"]; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                  </svg>
                </a>
                <a href="<?php echo "noticia.php?id=" . $row["id"] . "&modificar='true'" ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-highlight">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 19h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                    <path d="M12.5 5.5l4 4" />
                    <path d="M4.5 13.5l4 4" />
                    <path d="M21 15v4h-8l4 -4z" />
                  </svg>
                </a>
                <a href="<?php echo "delete.php?id=" . $row["id"] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                  </svg>
                </a>
              </div>
            </article>
          </li>
        <?php } ?>
      </ul>


    </section>
    <section <?php if ($escribir != '') { ?>>




        <form action="./send.php" method="post">
          <input type="hidden" name="id_usuario" value="<?php echo $id ?>">
          <div class="campo">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo">
          </div>
          <div class="campo">
            <label for="contenido">Contenido:</label>
            <textarea id="contenido" name="contenido"></textarea>
          </div>
          <div class="campo">
            <label for='category'>Categoría:</label>
            <input type='text' id='categoria' name='categoria' list='categorias'>
            <datalist id='categorias'>
              <?php while ($row = mysqli_fetch_array($resultCategorias)) { ?>
                <option value='<?php echo $row['categoria'] ?>'><?php echo $row['categoria'] ?></option>
              <?php } ?>
            </datalist>
          </div>
          <div class="campo">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen">
          </div>
          <button type="submit">Enviar</button>
          <a class="close" href="profile.php?close='true'">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="icon icon-tabler icons-tabler-outline icon-tabler-x">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M18 6l-12 12" />
              <path d="M6 6l12 12" />
            </svg>
          </a>
        </form>


      </section <?php } ?>>









  </main>


</body>

</html>