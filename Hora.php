<?php
include "./mysql.php";

$oMysql = new MySQL();
$row=$oMysql -> conBDOB();
echo $row["Hora"];
?>