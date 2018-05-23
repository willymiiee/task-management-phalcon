<?php

define('APP_PATH', __DIR__ . '/../');
include APP_PATH . 'vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(APP_PATH);
$dotenv->load();