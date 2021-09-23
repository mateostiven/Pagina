<?php
include ('../../../Config.php');
system ("cd /var/www/html/Pagina && git reset --hard && git pull && "+$USER+" && "+$TOKEN+"");
?>
