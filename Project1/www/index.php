<?php

spl_autoload_register(function(string $className) {
    // Удаляем префикс 'src\' если он есть
    $className = ltrim($className, 'src\\');
    // Формируем правильный путь
    $filePath = dirname(__DIR__).'/src/'.str_replace('\\', '/', $className).'.php';
    
    if (file_exists($filePath)) {
        require_once $filePath;
        return;
    }
    
    throw new Exception("Class file not found: ".$filePath);
});

$route = $_GET['route'] ?? '';
$patterns = require 'route.php';
$findRoute = false;

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