<?php

namespace src\Controllers;

use src\View\View;
use src\Services\Db;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)) . '/templates');
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello', [
            'name' => $name, 
            'title' => 'Страница приветствия'
        ]);
    }

    public function sayBye(string $name)
    {
        $this->view->renderHtml('main/bye', [
            'name' => $name, 
            'title' => 'Страница прощания'
        ]);
    }
}