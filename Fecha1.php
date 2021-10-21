<?php
include "./mysql1.php";

$oMysql = new MySQL();
$row=$oMysql -> conBDOB();
echo $row["Fecha"];
?>