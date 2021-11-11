<?php
    include '../../Config.php';
    if(isset($_POST['FechaIn']) && isset($_POST['FechaFn']) && isset($_POST['MinIn']) && isset($_POST['MinFn'])){
    $conexion = new mysqli($Host, $Usuario, $Clave, 'taxi');

    $FIn = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['FechaIn'] . " " . $_POST['MinIn'] . ':00', new DateTimeZone('GMT-5'))->getTimestamp();
    $FIn = strval($FIn * 1000);
    $FFn = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['FechaFn'] . " " . $_POST['MinFn'] . ':00', new DateTimeZone('GMT-5'))->getTimestamp();
    $FFn = strval($FFn * 1000);
    date_default_timezone_set("America/Bogota");

    $sql = "SELECT * FROM datos AND Fecha WHERE BETWEEN $FIn AND $FFn ORDER BY Fecha ASC";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $Fecha = date('Y-m-d H:i:s', doubleval($row['Fecha']) / 1000);
        $Tabla[] = array($row['Longitud'], $row['Latitud'], $Fecha, $row['rpm'],$row['Taxi']);
      };
    } else {
      $Tabla[] = ['NADA'];
    }
    
    echo json_encode($Tabla);
    }
    ?>
