<?php

namespace src\Controllers;

use src\View\View;
use src\Models\Articles\Article;

class ArticleController
{
    // Приватное свойство для хранения экземпляра класса View
    private $view;
    // Инициализирует View, указывая путь к шаблонам (/templates)
    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__))."/templates");
    }
    // Список статей
    public function index()
    {
        // статический метод модели, который загружает все статьи из БД
        $articles = Article::findAll();
        // рендерит шаблон main/main.php, передавая массив статей
        $this->view->renderHtml('main/main', ['articles' => $articles]);
    }

    // Отображает одну статью по её ID
    public function show(int $id)
    {
        $article = Article::getById($id);

        if ($article === null) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        $this->view->renderHtml('article/show', [
            'article' => $article,
            // загружает автора статьи через связь с моделью User
            'author' => $article->getAuthor()
        ]);
    }

    // Показывает форму редактирования статьи
    public function edit(int $id)
    {
        $article = Article::getById($id);

        if ($article === null) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        $this->view->renderHtml('article/edit', ['article' => $article]);
    }

    public function update(int $id) {
        $article = Article::getById($id);
        if (!$article) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }
    
        // Использует $_POST для получения данных из формы
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        // метод модели, который сохраняет изменения,вызывает INSERT или UPDATE в БД
        $article->save();
        
        // HTTP-редирект на страницу статьи
        header('Location: /PHP_NR/Project1/www/article/' . $id);
        exit();
    }

    // Показывает пустую форму для создания статьи
    public function create()
    {
        $this->view->renderHtml('article/create');
    }

    // Создаёт новую статью на основе данных из формы
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: '. dirname($_SERVER['SCRIPT_NAME']) . '/article/create');
            exit();
        }

        try {
            $article = new Article();
            $article->setName($_POST['name']);
            $article->setText($_POST['text']);
            $article->setAuthorId(2);
            $article->save();

            $articleId = $article->getId();
            header('Location: '. dirname($_SERVER['SCRIPT_NAME']) . '/article/'. $articleId);
            exit();
        } catch (\Exception $e) {
            $this->view->renderHtml('article/create', [
                'error' => 'Ошибка при создании статьи: '. $e->getMessage()
            ]);
        }
    }

    // Удаляет статью и перенаправляет на главную
    public function delete(int $id)
    {
        $article = Article::getById($id);
        
        if ($article === null) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        // метод модели, который выполняет DELETE в БД
        $article->delete();
        header('Location: /'. trim(dirname($_SERVER['SCRIPT_NAME']), '/'));
        exit();
    }
}

    