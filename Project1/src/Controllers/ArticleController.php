<?php

namespace src\Controllers;

use src\View\View;
use src\Services\Db;
use src\Models\Articles\Article;
use src\Models\Users\User;

class ArticleController {
    private $view;
    private $db;
    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');
        $this->db = new Db();
    }

    public function index()
    {
        // получение nickname автора
        $sql = 'SELECT articles.*, users.nickname as author_nickname 
                FROM articles 
                LEFT JOIN users ON articles.author_id = users.id';
        $articles = $this->db->query($sql, [], Article::class);
        $this->view->renderHtml('main/main', ['articles'=>$articles]);
    }

    public function show(int $id) {
        // получение статьи
        $sql = "SELECT articles.*, users.nickname as author_nickname 
                FROM articles 
                LEFT JOIN users ON articles.author_id = users.id 
                WHERE articles.id = :id";
        $articles = $this->db->query($sql, [':id' => $id], Article::class);
    
        if (empty($articles)) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }
    
        $this->view->renderHtml('article/show', [
            'article' => $articles[0],
            'author' => $articles[0]
        ]);
    }

    public function edit(int $id)
    {
        // получение статьи для редактирования
        $sql = "SELECT * FROM `articles` WHERE `id`=:id";
        $article = $this->db->query($sql, [':id' => $id], Article::class);

        if ($article === null || empty($article)) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        $this->view->renderHtml('article/edit', ['article' => $article[0]]);
    }

    public function update(int $id)
    {
        // проверка, что запрос POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/'. $id . '/edit');
            exit();
        }

        try {
            $sql = "UPDATE `articles` SET `name`=:name, `text`=:text WHERE `id`=:id";
            $this->db->query($sql, [
                ':name' => $_POST['name'],
                ':text' => $_POST['text'],
                ':id' => $id
            ]);

            // перенаправление на страницу статьи
            header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/'. $id);
            exit();
        } catch (\Exception $e) {
            $article = new Article($_POST['name'], $_POST['text']);
            $article->id = $id;

            $this->view->renderHtml('article/edit', [
                'article' => $article,
                'error' => 'Ошибка при обновлении статьи: '. $e->getMessage()
            ]);
        }
    }
    public function create()
    {
        // отображение формы 
        $this->view->renderHtml('article/create');
    }

    public function store()
    {
        // проверка, что запрос POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/create');
            exit();
        }

        try {
            // Исправленный SQL-запрос
            $sql = "INSERT INTO `articles` (`name`, `text`, `author_id`) VALUES (:name, :text, :author_id)";
            $this->db->query($sql, [
                ':name' => $_POST['name'], 
                ':text' => $_POST['text'], 
                ':author_id' => 2
            ]);

            $articleId = $this->db->getLastInsertId();

            // перенаправление на страницу статьи
            header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $articleId);
            exit();
        } catch (\Exception $e) {
            // ошибка - показываем форму снова с сообщением об ошибке
            $this->view->renderHtml('article/create', [
                'error' => 'Ошибка при создании статьи: ' . $e->getMessage()
            ]);
        }
    }

    public function delete(int $id)
{
    // проверка, существует ли статья
    $sql = "SELECT * FROM `articles` WHERE `id`=:id";
    $article = $this->db->query($sql, [':id' => $id], Article::class);
    
    if (empty($article)) {
        $this->view->renderHtml('main/error', [], 404);
        return;
    }

    // удаляем статью
    $sql = "DELETE FROM `articles` WHERE `id`=:id";
    $this->db->query($sql, [':id' => $id]);

    // перенаправляем на главную страницу
    header('Location: /' . trim(dirname($_SERVER['SCRIPT_NAME']), '/'));
    exit();
}
}

    