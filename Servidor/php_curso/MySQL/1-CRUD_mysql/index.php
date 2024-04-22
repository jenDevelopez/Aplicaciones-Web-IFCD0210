<?php
ini_set('display_errors', 1);
require './utils/utils_db.php';

#realizo la conexion con el servidor
$conexion = connect_server();

$inicio = 0;
$num = 4;
if (isset($_GET['inicio'])) {
	$inicio = $_GET['inicio'];
}
$q = "SELECT * FROM noticia";

$numFilas = contar_filas($conexion, $q);

$columna = 'id';
if (isset($_GET['columna'])) {
	$columna = $_GET['columna'];
}

#selecciono los datos que se van a mostrar
$q = "SELECT * FROM noticia ORDER BY $columna LIMIT $inicio,$num";
$resultNoticias = query($q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/header.css">
</head>

<body>
	<div class="container">
		<header>
			<div class="user">
				<a href="index.php" class="header-link">
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
			<aside class="aside">
				<div>
					<select id="criterioOrdenacion">
						<option value="">Ordenar por</option>
						<option value="nombre">Nombre</option>
						<option value="categoria">Categoría</option>
						<option value="fecha">Fecha</option>
						<option value="categoriaFecha">Categoría y fecha</option>
						<option value="autor">Autor</option>
					</select>
				</div>

			</aside>
			<div class="columna">

				<section class="noticias">
					<?php while ($row = mysqli_fetch_array($resultNoticias)) { ?>
						<div class="noticia">
							<h2><?php echo $row["titulo"] ?></h2>
							<p>
								<?php
								$strFinal = substr($row["contenido"], 0, 100);
								echo substr($row['contenido'], 0, 100);
								if ($strFinal < $row["contenido"]) {
									echo "...";
								}
								?>
							</p>
							<div>
								<p><?php echo $row["categoria"] ?></p>
								<date><?php echo substr($row["fecha"], 0, 10) ?></date>
							</div>
							<a class="link-noticia" href="noticia.php?id=<?php echo $row["id"] ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
									stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
									class="icon icon-tabler icons-tabler-outline icon-tabler-link">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M9 15l6 -6" />
									<path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
									<path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
								</svg>
							</a>
						</div>
					<?php } ?>
				</section>
				<div class="links">
					<?php if ($inicio > 0) { ?>
						<a href="index.php?inicio=<?php echo $inicio - $num ?>">
							<< Atrás</a>
							<?php } ?>

							<?php if ($inicio + $num <= $numFilas) { ?><a
									href="index.php?inicio=<?php echo $inicio + $num ?>">Siguiente
									>></a>
								<?php
							} ?>

				</div>
			</div>
		</main>
	</div>
</body>

</html>