<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();

/**
 * Composer autoload
 */
include __DIR__ . '/../../vendor/autoload.php';

/**
 * Environment variables
 */
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../../');
$dotenv->load();
