<?php

namespace Core;

use App\Http\Controllers\NotFoundController;

class App
{
    public function run($routes)
    {
        $url = '/';
        isset($_GET['url']) ? $url .= $_GET['url'] : '';
        ($url != '/') ? $url = rtrim($url, '/') : '';

        $requestMethod = $_SERVER['REQUEST_METHOD'];

        $routerFound = false;

        foreach ($routes as $path => $controller) {
            $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $path) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                $routerFound = true;

                if (is_array($controller)) {
                    if (isset($controller[$requestMethod])) {
                        $controllerAction = $controller[$requestMethod];
                    } else {
                        echo "Método {$requestMethod} não permitido para esta rota.";
                        return;
                    }
                } else {
                    $controllerAction = $controller;
                }

                [$currentController, $action] = explode('@', $controllerAction);

                $file = __DIR__ . "/../app/Http/Controllers/{$currentController}.php";
                if (file_exists($file)) {
                    require_once $file;
                    $fullControllerName = "App\\Http\\Controllers\\$currentController";

                    $newController = new $fullControllerName();

                    if ($requestMethod == 'POST') {
                        $postData = $_POST;
                        $newController->$action($postData);
                    } else {
                        if (isset($matches[0])) {
                            $newController->$action($matches[0]);
                        } else {
                            $newController->$action($matches);
                        }
                    }
                } else {
                    echo "Erro: Arquivo do controlador não encontrado.";
                }
            }
        }

        if (!$routerFound) {
            require_once __DIR__ . '/../app/Http/Controllers/NotFoundController.php';
            $controller = new NotFoundController();
            $controller->index();
        }
    }
}
