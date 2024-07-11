<?php

require_once (__DIR__ . '/vendor/autoload.php');

// environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

spl_autoload_register(function ($class) {
    $controllers = dirname(__FILE__) . '/App/Controllers/' .$class . '.php';
    $models = dirname(__FILE__) . '/App/Models/' .$class . '.php';
    $views = dirname(__FILE__) . '/App/Views/' .$class . '.php';
    $core = dirname(__FILE__) . '/App/Core/' . $class . '.php';
    $database = dirname(__FILE__) . '/App/Database/' . $class . '.php';
    $request = dirname(__FILE__) . '/App/Requests/' . $class . '.php';

    if (file_exists($database)) {
        require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '/App/Database/'.$class.'.php');
    }

    if (file_exists($request)) {
        require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '/App/Requests/'.$class.'.php');
    }

    if(file_exists($controllers)){
        require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'App/Controllers/'.$class.'.php');
    }
    if(file_exists($models)) {
        require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'App/Models/'.$class.'.php');
    }

    if(file_exists($views)) {
        require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'App/Views/'.$class.'.php');
    }

    if (file_exists($core)) {
        require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '/App/Core/'.$class.'.php');
    }

});


