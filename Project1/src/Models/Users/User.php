<?php

namespace src\Models\Users;

use src\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAuthToken(): string
    {
        return $this->authToken;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}