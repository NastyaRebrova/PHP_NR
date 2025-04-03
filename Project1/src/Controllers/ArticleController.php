<?php

namespace src\Controllers;

use src\View\View;
use src\Models\Articles\Article;
use src\Models\Users\User;

class ArticleController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__))."/templates");
    }

    public function index()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main', ['articles' => $articles]);
    }

    public function show(int $id)
    {
        $article = Article::getById($id);

        if ($article === null) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        $this->view->renderHtml('article/show', [
            'article' => $article,
            'author' => $article->getAuthor()
        ]);
    }

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
    
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        $article->save();
        
        header('Location: /PHP_NR/Project1/www/article/' . $id);
        exit();
    }

    public function create()
    {
        $this->view->renderHtml('article/create');
    }

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

    public function delete(int $id)
    {
        $article = Article::getById($id);
        
        if ($article === null) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        $article->delete();
        header('Location: /'. trim(dirname($_SERVER['SCRIPT_NAME']), '/'));
        exit();
    }
}

    