<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} else {
    session_start();
    define('DEFAULT_CONTROLLER', 'home');
    define('DEFAULT_METHOD', 'index');

    require_once "../vendor/autoload.php";
    require_once "../src/Functions/functions_twig.php";
    require_once "bootstrap/bootstrap.php";
}