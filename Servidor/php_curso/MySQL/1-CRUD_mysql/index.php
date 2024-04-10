<?php
session_start();
require("../utils_db.php");

#realizo la conexion con el servidor
$conexion = connect_server();

$inicio = 0;
$num = 3;
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
$resultNoticias = query($conexion, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<div class="container">
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
			if (!isset($_SESSION['user'])) {
				echo "<a href='login.php'>Iniciar sesión</a>";
			} else {
				echo "<a href='logout.php'>Cerrar sesión</a>";
			}
			?>

		</header>
		<div class="columna">
			<h2>Tabla de Noticias</h2>
			<?php echo "Numero de noticias: $numFilas" ?>
			<table class="tabla-noticias">
				<thead>
					<tr>
						<th><a class="th" href="index.php?columna=id">Id</a></th>
						<th><a class="th" href="index.php?columna=titulo">Título</a></th>
						<th><a class="th" href="index.php?columna=contenido">Noticia</a></th>
						<th><a class="th" href="index.php?columna=categoria">Categoría</a></th>
						<th><a class="th" href="index.php?columna=fecha">Fecha</a></th>
						<th><a class="th" href="index.php?columna=imagen">Imagen</a></th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($resultNoticias)) { ?>

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
								if ($strFinal < $row["contenido"]) {
									echo "...";
								}
								?>
								<a href="<?php echo "noticia.php?id=" . $row["id"]; ?>">Leer más...</a>


								<div <?php if (isset($_SESSION['user'])) { ?>>
									<a href="<?php echo "noticia.php?id=" . $row["id"] . "&modificar='true'" ?>">Modificar</a>
									<form action="delete.php" method="post">
										<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
										<input type="hidden" name="imagen" value="<?php echo $row['imagen']; ?>">
										<input type="submit" value="x" class="eliminar">
									</form>
								</div <?php } ?>>
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
			<div>
				<?php echo $_GET['inicio'] ?>

				<?php if ($incio > 0) { ?>
					<a href="index.php?inicio=<?php echo $inicio - $num ?>">
						<< Atrás</a>
						<?php } ?>

						<?php if ($inicio + $num <= $numFilas) { ?><a href="index.php?inicio=<?php echo $incio + $num ?>">Siguiente
								>></a>
						<?php
						} ?>

			</div>
		</div>
	</div>
</body>

</html>