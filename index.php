<?php

require_once 'autoload.php';
require_once 'src/route/rota_web.php';

require_once 'vendor/autoload.php';

$rota = new Rota_web();
$rota->pegarURL();

?>