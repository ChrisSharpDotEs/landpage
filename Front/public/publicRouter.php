<?php

$url = $_SERVER['REQUEST_URI'];
$url = str_replace("/php/landpage/Front/public/publicRouter.php?", "", $url);

chdir("../../Back/App/");
require '../../Back/App/router.php';
