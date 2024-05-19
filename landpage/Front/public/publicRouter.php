<?php

$url = $_SERVER['REQUEST_URI'];
$dir =  str_replace("/var/www/html", "", __DIR__);
$url = str_replace($dir . "/publicRouter.php?", "", $url);

chdir("../../Back/App/");
require '../../Back/App/router.php';
