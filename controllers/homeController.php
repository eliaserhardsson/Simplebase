<?php

require_once __DIR__ . '/../vendor/autoload.php';

use League\Plates\Engine;

class homeController {
    public function __construct() {

    }

    public function render() {
        $templates = new Engine('../templates');
        echo $templates->render('home');
    }
}