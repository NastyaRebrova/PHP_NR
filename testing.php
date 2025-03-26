<?php
$host = 'localhost';
$dbname = 'project';
$user = 'root';
$password = 'na20re06';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    echo "Подключение успешно!";
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}