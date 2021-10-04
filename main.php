<?php
include "./mysql.php";

$oMysql = new MySQL();
$row=$oMysql -> conBDOB();
echo "" . $row["Fecha"]. " ".$row["Hora"]." " . $row["Longitud"]." ". $row["Latitud"];
