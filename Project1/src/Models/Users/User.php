<?php
namespace src\Models\Users;

class User {
    private $id;
    private $nickname;
    private $email;
    private $is_confirmed;
    private $role;
    private $password_hash;
    private $auth_token;
    private $created_at;

    public function __set($name, $value) {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $name): string {
        return lcfirst(str_replace('_', '', ucwords($name, '_')));
    }

    public function getNickname() {
        return $this->nickname;
    }
}