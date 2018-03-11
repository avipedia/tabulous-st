<?php

define('APP', __DIR__);
spl_autoload_register(function ($klass) {
    $klass = '/' . strtolower(str_replace('\\', '/', $klass)) . '.php';
    foreach (['', '/pdf', '/system'] as $path) {
        $filename = APP . $path . $klass;
        if (is_file($filename) || is_link($filename)) {
            return include $filename;
        }
    }
    return false;
});

session_name('tabulousSessID');
session_start();

$tourn = new Tournament();
