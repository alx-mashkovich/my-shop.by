<?php

spl_autoload_register(function($class) {

    $params = include(ROOT . '/config/autoload_params.php');

    foreach ($params as $param) {
        if (file_exists(ROOT . '/' . $param . '/' . $class . '.php')) {
            include_once (ROOT . '/' . $param . '/' . $class . '.php');
            break;
        }
    }
});
