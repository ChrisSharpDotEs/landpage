<?php

$url = $_SERVER['REQUEST_URI'];
$url = str_replace("/php/landpage/proyecto-front/public/publicRouter.php?", "", $url);

chdir("../../Back/App/");
require '../../Back/App/router.php';
