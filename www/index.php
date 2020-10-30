<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../include/Route.php';
require_once __DIR__ . '/../controllers/homeController.php';

use League\Plates\Engine;

Route::add('/', function() {
    $home = new homeController();
    $home->render();
});

Route::pathNotFound(function($path) {
    header('HTTP/1.0 404 Not Found');
    $templates = new Engine('../templates');
    echo $templates->render('404');
});

Route::methodNotAllowed(function($path, $method) {
    header('HTTP/1.0 405 Method Not Allowed');
    $templates = new Engine('../templates');
    echo $templates->render('404');
});

Route::run('/');