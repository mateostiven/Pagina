<?php
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];

$fechainicial = new DateTime($fecha1);
$fechafin = new DateTime($fecha2);

$Diferencia = $fechainicial->diff($fechafin);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Calcular fecha1</title>
    <style media="screen">
        .Horas {
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
        <form class="Horas" action="fecha_1.php" method="post">
            <h1>Calcular Diferencia de fechas en PHP</h1>
            Asigne la primera Fecha <input type="date" name="fecha1"><br><br>
            Asigne la segunda Fecha <input type="date" name="fecha2"><br><br>
            <input type="submit" name="" value="Calcular"><br><br>

            <?php
            echo "Las Fechas ingresadas fueron: $fecha1 Y $fecha2 <br>";
            echo  "La Diferencia de fecha es: " . $Diferencia->format('%Y años %M meses %D dias');

            ?>
        </form>
    </center>
</body>

</html>