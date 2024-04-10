<?php
session_start();
if(!isset($_SESSION["user"]) ) {
  header("location: login.php");
}


if($_SERVER['REQUEST_METHOD'] == 'GET'){
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conexion = connect_server();
    $db = 'noticias';
    $query = "SELECT * FROM usuarios WHERE id='$id'";
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de usuario</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
      <div class="user">
        <a href="profile.php" class="icon-user">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
          </svg>
        </a>
        <h2>
          <?php
          if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
						echo $user;
          }
          ?>
        </h2>
      </div>
      <?php 
			if (!isset($_SESSION['user'])){
				echo "<a href='login.php'>Iniciar sesión</a>";
			}else{
				echo "<a href='logout.php'>Cerrar sesión</a>";
			}
			?>

    </header>

  <section class="datos-usuario">
    <h2>Perfil</h2>
    <ul>
      <li>Nombre: <span id="nombre">Nombre del usuario</span></li>
      <li>Correo electrónico: <span id="correo">correo@ejemplo.com</span></li>
      <li>Fecha de nacimiento: <span id="fecha-nacimiento">01/01/2000</span></li>
    </ul>
  </section>

  <section class="articulos">
    <h2>Artículos escritos</h2>
    <ul id="lista-articulos">
      </ul>
  </section>

  <section class="acciones">
    <button id="btn-modificar">Modificar perfil</button>
    <button id="btn-eliminar">Eliminar cuenta</button>
  </section>


</body>
</html>
