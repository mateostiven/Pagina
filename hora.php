<?php
$hora1 = $_POST['hora1'];
$hora2 = $_POST['hora2'];

$inicio = new DateTime($hora1);
$fin = new DateTime($hora2);

$Diferencia= $inicio -> diff($fin);


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Calcular hora</title>
    <style media="screen">
      .Horas{
        text-align: center;
        font-size: 16px;
        font-family: cursive;
        font-style: oblique;
        color: green;
      }
    </style>
  </head>
  <body>
    <center>
    <form class="Horas" action="hora.php" method="post">
      <h1>Calcular Diferencia de Horas en PHP</h1>
      Asigne la hora de entrada <input type="time" name="hora1"><br><br>
      Asigne la hora de salida  <input type="time" name="hora2"><br><br>
      <input type="submit" name="" value="Calcular"><br><br>

      <?php
      echo "La hora ingresada fue: $hora1 - $hora2 <br>";
      echo  "La Diferencia de hora es: " .$Diferencia -> format('%H horas %i minutos');

      ?>
    </form>
  </center>
  </body>
</html>