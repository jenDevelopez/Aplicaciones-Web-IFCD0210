<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<?php 
	#creo el contenido dinamico
		$contenido = array(
			array("imagenes/llegar.png","Como estás","Honestos, ágiles y eficientes."),
			array("imagenes/que_se_nos_da_bien.png","¿Qué se nos
			da bien?","Dotar a las compañías de las soluciones que lideran el mercado, asegurando el éxito de la implantación y su calidad."),
			array("imagenes/llegar.png","¿Cómo hemos
			llegado hasta aquí?","Con pasión y esfuerzo en nuestro trabajo, y con la colaboración de nuestros clientes desde hace más de 25 años."),
			array("imagenes/quienes_somos.png","Cómo trabajamos","on nuestra propia metodología qImplanta que nos asegura el éxito y la calidad de los proyectos, implantando las soluciones de manera más efectiva")
		);

		#itero el array y añado el contenido a una plantilla de html
		foreach($contenido as $dato){

			echo "
				<div class='caja'>
					<img src='./$dato[0]' />
					<div class='texto'>
						<h2>$dato[1]</h2>
						<p>$dato[2]</p>
					</div>
				</div>
			";
		}
	?>



</body> 
</html>