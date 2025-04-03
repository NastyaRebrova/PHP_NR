<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

    spl_autoload_register(function(string $className){
        require_once dirname(__DIR__).'\\'.$className.'.php';
    });

    $route = $_GET['route'] ?? '';
    $patterns = require 'route.php';
    $findRoute = false;  // Инициализация переменной

    foreach ($patterns as $pattern => $controllerAndAction) {
        if (preg_match($pattern, $route, $matches)) {
            $findRoute = true;
            unset($matches[0]);
            $nameController = $controllerAndAction[0];
            $actionName = $controllerAndAction[1];
            $controller = new $nameController();
            $controller->$actionName(...$matches);
            break;
        }
    }

    if (!$findRoute) {
        $controller = new src\Controllers\ArticleController();
        $controller->index();
    }

    $user = new src\Models\Users\User('Ivan');
    $article = new src\Models\Articles\Article('title', 'text', $user);

    // var_dump($user);
    // var_dump($article);