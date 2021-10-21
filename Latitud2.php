<?php
include "./mysql2.php";

$oMysql = new MySQL();
$row=$oMysql -> conBDOB();
echo $row['Latitud'] . "_" . $row['Longitud']
?>