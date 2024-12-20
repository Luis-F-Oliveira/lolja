<?php

require_once __DIR__ . '/core/app.php';
require_once __DIR__ . '/routes/web.php';

use Core\App;

ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $baseDir = __DIR__ . '/';
    $file = $baseDir . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Erro: A classe '$class' não foi encontrada em '$file'.";
    }
});

$app = new App();
$app->run($routes);
