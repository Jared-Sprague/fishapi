<?php
require_once '/var/www/html/fishapi/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/highscores/', function () {
    echo "TODO return high scors as JSON";
});

$app->run();
