<?php

namespace src\Models\Articles;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;

class Article extends ActiveRecordEntity
{
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;
    protected $authorNickname;

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function getAuthorNickname(): string
    {
        return $this->authorNickname ?? $this->getAuthor()->getNickname();
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }
}