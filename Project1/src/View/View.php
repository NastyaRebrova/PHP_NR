<?php 

namespace src\View;

class View{
    private $templatesPath;

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, $vars=[], $code=200)
    {
        // если заголовок не передан, устанавливаем его по умолчанию
        if (!isset($vars['title'])) {
            $vars['title'] = 'Мой блог';
        }
        http_response_code($code);
        extract($vars);
        include $this->templatesPath.'/'.$templateName.'.php';
    }

    public function renderHtml2(string $templateName, $vars=[])
    {
        // если заголовок не передан, устанавливаем его по умолчанию
        if (!isset($vars['title'])) {
            $vars['title'] = 'Мой блог';
        }

        extract($vars);
        include $this->templatesPath.'/'.$templateName;
    }
}