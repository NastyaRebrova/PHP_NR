<?php

namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;
use src\Services\Db;

class Comment extends ActiveRecordEntity
{
    protected $text;
    protected $authorId;
    protected $articleId;
    protected $createdAt;

    // методы для чтения данных:

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    // Возвращает объект автора (User) через User::getById()
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    // методы для изменения данных:

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function setArticleId(int $articleId): void
    {
        $this->articleId = $articleId;
    }

    // возвращает имя таблицы в БД (comments), с которой работает модель
    protected static function getTableName(): string
    {
        return 'comments';
    }

    // Возвращает все комментарии к статье, отсортированные по дате (новые сверху)
    public static function getByArticleId(int $articleId): array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . static::getTableName() . ' WHERE article_id = :article_id ORDER BY created_at DESC';
        // выполняет запрос и возвращает массив объектов Comment
        return $db->query($sql, [':article_id' => $articleId], static::class);
    }
}