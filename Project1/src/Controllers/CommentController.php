<?php

namespace src\Controllers;

use src\Models\Comments\Comment;
use src\View\View;

class CommentController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)) . '/templates');
    }

    // Создаёт новый комментарий к статье
    public function store(int $articleId)
    {
        // Проверяет, что запрос отправлен методом POST
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $articleId);
            exit();
        }

        // Создает объект Comment и заполняет его данные
        $comment = new Comment();
        $comment->setText($_POST['text']);
        $comment->setAuthorId(2);
        $comment->setArticleId($articleId);
        // Сохраняет комментарий в БД через save()
        $comment->save();

        // Перенаправляет обратно на страницу статьи.
        header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $articleId);
        exit();
    }

    // Показывает форму редактирования комментария
    public function edit(int $id)
    {
        // Загружает комментарий через Comment::getById($id)
        $comment = Comment::getById($id);
        if ($comment === null) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        // Рендерит шаблон comment/edit.php
        $this->view->renderHtml('comment/edit', ['comment' => $comment]);
    }

    // Обновляет текст комментария и перенаправляет на статью
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

    // Удаляет комментарий и перенаправляет на статью
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