<?php

include_once 'autoload.php';
include_once 'src/route/rota_web.php';

include_once 'vendor/autoload.php';

$rota = new Rota_web();
$rota->pegarURL();

?>