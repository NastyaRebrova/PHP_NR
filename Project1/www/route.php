<?php

    return [
        "~/article/(\d+)$~" => [src\Controllers\ArticleController::class, 'show'],
        "~/article/(\d+)/edit$~" => [src\Controllers\ArticleController::class, 'edit'],
        "~/article/(\d+)/update$~" => ['src\Controllers\ArticleController', 'update'],
        "~^/article/create$~" => [src\Controllers\ArticleController::class, 'create'],
        "~^/article/store$~" => [src\Controllers\ArticleController::class, 'store'],
        "~^/$~" => [src\Controllers\ArticleController::class, 'index'], 
        "~^/hello/(.*)$~" => [src\Controllers\MainController::class, 'sayHello'],
        "~^/bye/(.*)$~" => [src\Controllers\MainController::class, 'sayBye'],
        "~/article/(\d+)/delete$~" => [src\Controllers\ArticleController::class, 'delete'],
    ];

    

    


        

    

    

    

    

    

    
    

    