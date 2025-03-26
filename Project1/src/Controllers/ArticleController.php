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
        $sql = 'SELECT * FROM `articles`';
        $articles = $this->db->query($sql, [], Article::class);
        // var_dump($articles);
        $this->view->renderHtml('main/main', ['articles'=>$articles]);
    }

    public function show(int $id){
        // получение статьи
        $sql = "SELECT * FROM `articles` WHERE `id`=:id";
        $article = $this->db->query($sql, [':id'=>$id], Article::class);

        if ($article == null){
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        // получение автора из таблицы users
        $authorSql = "SELECT * FROM `users` WHERE `id` = :author_id";
        $author = $this->db->query($authorSql, ['author_id' => $article[0]->getAuthorId()], User::class);
        
        $this->view->renderHtml('article/show', ['article' => $article[0],'author' => $author[0]
        ]);
    }
}