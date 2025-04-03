<?php

namespace src\Controllers;

use src\Models\Comments\Comment;
use src\Models\Articles\Article;
use src\View\View;

class CommentController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)) . '/templates');
    }

    public function store(int $articleId)
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $articleId);
            exit();
        }

        $comment = new Comment();
        $comment->setText($_POST['text']);
        $comment->setAuthorId(2); // Пока жестко задано, должно быть текущим пользователем
        $comment->setArticleId($articleId);
        $comment->save();

        header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $articleId);
        exit();
    }

    public function edit(int $id)
    {
        $comment = Comment::getById($id);
        if ($comment === null) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        $this->view->renderHtml('comment/edit', ['comment' => $comment]);
    }

    public function update(int $id)
    {
        $comment = Comment::getById($id);
        if ($comment === null) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        $comment->setText($_POST['text']);
        $comment->save();

        header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $comment->getArticleId());
        exit();
    }

    public function delete(int $id)
    {
        $comment = Comment::getById($id);
        if ($comment === null) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        $articleId = $comment->getArticleId();
        $comment->delete();

        header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $articleId);
        exit();
    }
}