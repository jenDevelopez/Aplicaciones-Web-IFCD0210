<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Concurso</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">

      <?php
      $nombres = array(
        "Liam", "Olivia", "Noah", "Emma", "Oliver", "Ava", "Elijah", "Charlotte", "William", "Sophia",
        "James", "Amelia", "Benjamin", "Isabella", "Lucas", "Mia", "Henry", "Evelyn", "Alexander", "Harper"
    );
      if (isset($_POST['cantidadGanadores'])) {
        $cantidadGanadores = $_POST['cantidadGanadores'];

        function asignarGanadores($cantidadPremios, $cantidadGanadores,$maximoPremio)
        {
          $ganadores = array();
          $premios = array();
          $cantidadGanadores -= 1;
          while (count($ganadores) < $cantidadPremios) {
            $ganador = rand(0, $cantidadGanadores);
            $premio = rand(0, $maximoPremio) * 100;
            if (!in_array($ganador, $ganadores)) {
              $ganadores[] = $ganador;
              $premios[] = $premio;
            }
          }
         rsort($premios);
        
            
          return array_combine($ganadores, $premios);
        }

        $listaGanadores = asignarGanadores($cantidadGanadores, count($nombres),100);
        ?>
        <div class="ganadores">
         
          <?php
        if(count($listaGanadores) == 0){
          echo "<h1>Selecciona un numero de ganadores</h1>";
        }else{
          echo "<h1>Ganadores</h1>";
        }
        ?>
        <ol><?php
         foreach ($listaGanadores as $ganador => $premio) {
          echo "<li>".$nombres[$ganador]. " - ". $premio. "€</li>";
        }

        $direccion = $_SERVER['HTTP_REFERER'];
        echo "<a class='link' href='$direccion'>VOLVER AL FORMULARIO</a>";
        ?>
        </ol>
        </div>
        <?php
      } else {
        echo "
      
      <form action='index.php' method='post' autocomplete='off' autocapitalize='on'>
        <div class='lottery'>
          <img src='./lottery.svg' alt=''>
        </div>
        <div class=' form'>
        <div class='input-container'>
          <label for='cantidadGanadores'>Elige la cantidad de ganadores</label>
          <select name='cantidadGanadores' id='cantidadGanadores'>
            <option value=''></option>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='5'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
            <option value='9'>9</option>
            <option value='10'>10</option>
          </select>
        </div>
        <button class='boton' type='submit'>Generar Ganadores</button>
      </div>
    </form>
      ";
      }
      ?>
  </div>
</body>
</html>