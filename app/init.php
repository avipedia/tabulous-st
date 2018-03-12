<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('APP', __DIR__);
spl_autoload_register(function ($klass) {
    $klass = '/' . strtolower(str_replace('\\', '/', $klass)) . '.php';
    foreach (['', '/controllers', '/models', '/pdf', '/system'] as $path) {
        $filename = APP . $path . $klass;
        if (is_file($filename) || is_link($filename)) {
            return include $filename;
        }
    }
    return false;
});

session_name('tabulousSessID');
session_start();

$_SESSION['t'] = new Tournament();
