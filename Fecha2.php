<?php
include "./mysql2.php";

$oMysql = new MySQL();
$row=$oMysql -> conBDOB();
echo $row["Fecha"];
?>