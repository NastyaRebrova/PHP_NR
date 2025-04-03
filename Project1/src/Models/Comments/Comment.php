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

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

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

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public static function getByArticleId(int $articleId): array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . static::getTableName() . ' WHERE article_id = :article_id ORDER BY created_at DESC';
        return $db->query($sql, [':article_id' => $articleId], static::class);
    }
}