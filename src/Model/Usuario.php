<?php

include_once '../database/database.php';

$db = Database::getInstance();
$pdo = $db->getPdo();

var_dump($pdo);



?>