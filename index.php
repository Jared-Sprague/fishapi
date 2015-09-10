<?php
require_once '/var/www/html/fishapi/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/highscores/', function () {
    // Add the score to the current high scores list
    try {
        $highscores_json = file_get_contents('highscores.json');
    } catch (exception $e) {
        error_log("highscores.json not found");
        $highscores_json = '[]';
    }

    echo $highscores_json;
});

$app->post('/highscores/', function () use ($app) {
    try {
        $highscores_array = json_decode(file_get_contents('highscores.json'), true);
    } catch (exception $e) {
        error_log("highscores.json not found");
        $highscores_array = array();
    }

    $highscores_array[] = $_POST;
    rsort($highscores_array);

    // sort and write out the file
    file_put_contents('highscores.json', json_encode($highscores_array));
});

$app->run();
