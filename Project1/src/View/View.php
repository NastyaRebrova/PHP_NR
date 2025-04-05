<?php
// отвечает за отображение (рендеринг) HTML-шаблонов 

namespace src\View;

class View{
    // хранит путь к папке с шаблонами
    private $templatesPath;

    // Принимает путь к директории с шаблонами
    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    // $templateName - имя шаблона; $vars - ассоциативный массив переменных для передачи в шаблон; $code - HTTP-код ответа (по умолчанию 200)
    public function renderHtml(string $templateName, $vars=[], $code=200)
    {
        // если заголовок не передан, устанавливаем его по умолчанию
        if (!isset($vars['title'])) {
            $vars['title'] = 'Мой блог';
        }
        // для отправки кода состояния
        http_response_code($code);
        // преобразует массив $vars в локальные переменные
        extract($vars);
        // подключение шаблона
        include $this->templatesPath.'/'.$templateName.'.php';
    }
}