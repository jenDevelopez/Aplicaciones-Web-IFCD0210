<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sorteo</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  $nameErr = '';
  $name = '';
  $premioErr1 = $premioErr2 = $premioErr3 = '';
  $premio1 = $premio2 = $premio3 = '';
  $listaNombres = "";
  $listaGanadores = array();
  ?>

  <div class="container">
    <div class="formularios">
      <!-- formulario añadir concursante -->
      <div>
        <h1>Apúntate al sorteo</h1>


        <form action="index.php" method="post" enctype="multipart/form-data">
          <label for="name">Nombre:</label>
          <input type="text" id="name" name="name">
          <button type="submit">Añadir</button>
          <span class="error">
            <?php echo $nameErr; ?>
          </span>
        </form>

        <?php

        function test_input($data)
        {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if (empty($_POST['name'])) {
            $nameErr = 'Tienes que poner un nombre';
          } else {
            $name = $_POST['name'];
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
              $nameErr = "Este campo solo permite letras y espacios";
            }
            $archivoLista = fopen('lista.txt', 'a');
            if (!$archivoLista) {
              $archivoLista = fopen('lista.txt', 'w');
            }
            fwrite(fopen('lista.txt', 'a'), $_POST['name'] . "<br>");
            $lista = file_get_contents('lista.txt');
            fclose($archivoLista);
          }
        }
        ?>
      </div>
      <!-- formulario escoger ganadores -->
      <div>
        <form action="index.php" method="post" enctype="multipart/form-data">
          <h2>Añadir los premios</h2>
          <fieldset>
            <label for="premio1">Premio 1:</label>
            <input type="number" id="premio1" name="premio1">
            <span class="error">
              <?php echo $premioErr1 ?>
            </span>
          </fieldset>
          <fieldset>
            <label for="premio2">Premio 2:</label>
            <input type="number" id="premio2" name="premio2">
            <span class="error">
              <?php echo $premioErr1 ?>
            </span>

          </fieldset>
          <fieldset>
            <label for="premio3">Premio 3:</label>
            <input type="number" id="premio3" name="premio3">
            <span class="error">
              <?php echo $premioErr1 ?>
            </span>
          </fieldset>
          <button type="submit">Enviar</button>
        </form>

        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if (empty($_POST['premio1'])) {
            $premioErr1 = 'El premio 1 es requerido';
          } else {
            $premio1 = $_POST['premio1'];
          }
          if (empty($_POST['premio2'])) {
            $premioErr2 = 'El premio 2 es requerido';
          } else {
            $premio2 = $_POST['premio2'];
          }
          if (empty($_POST['premio3'])) {
            $premioErr3 = 'El premio 3 es requerido';
          } else {
            $premio3 = $_POST['premio3'];
          }

          function asignarGanadores($cantidadPremios, $cantidadGanadores, $listaPremios)
          {
            $ganadores = array();
            $cantidadGanadores -= 1;
            while (count($ganadores) < $cantidadPremios) {
              $ganador = rand(0, $cantidadGanadores);
              if (!in_array($ganador, $ganadores)) {
                $ganadores[] = $ganador;
              }
            }
            return array_combine($ganadores, $listaPremios);
          }

          $listaNombres = file_get_contents('lista.txt');
          $listaNombres = explode("<br>", $listaNombres);
          array_pop($listaNombres);
          $listaPremios = array($premio1, $premio2, $premio3);

          $listaGanadores = asignarGanadores(count($listaPremios), count($listaNombres), $listaPremios);
        }
        ?>
      </div>
    </div>

    <div class="resultado">
      <div class="lista-concursantes">
        <h2>Concursantes</h2>
        <ol>
          <?php
          foreach ($listaNombres as $nombre) {
            echo "<li>$nombre</li>";
          }

          ?>
        </ol>
      </div>
      <div class="ganadores">
        <h2>Ganadores</h2>
        <ol>
          <?php
          if (count($listaGanadores) > 0) {
            foreach ($listaGanadores as $ganador => $premio) {
              echo "<li>$listaNombres[$ganador]-$premio</li>";
            }
          }
          ?>
        </ol>
      </div>
    </div>
  </div>
</body>

</html>