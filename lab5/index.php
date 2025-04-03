<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Определение активного элемента
$active_elem = $_GET['elem'] ?? 'menu';
if (!in_array($active_elem, ['menu', 'add', 'delete'])) {
    $active_elem = 'menu';
}

// Подключение к БД
$mysqli = mysqli_connect('localhost', 'root', '', 'friends');
if (mysqli_connect_errno()) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Обработка форм
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['id'])) {
        // Обновление записи
        $sql = "UPDATE `notes` SET 
                `firstname` = '" . mysqli_real_escape_string($mysqli, $_POST['firstname']) . "',
                `name` = '" . mysqli_real_escape_string($mysqli, $_POST['name']) . "',
                `lastname` = '" . mysqli_real_escape_string($mysqli, $_POST['lastname']) . "',
                `date` = '" . $_POST['date'] . "',
                `email` = '" . $_POST['email'] . "',
                `phone` = '" . $_POST['phone'] . "',
                `comment` = '" . mysqli_real_escape_string($mysqli, $_POST['comment']) . "'
                WHERE `id` = " . (int)$_GET['id'];
    } else {
        // Добавление записи
        $sql = "INSERT INTO `notes` 
                (`firstname`, `name`, `lastname`, `date`, `email`, `phone`, `comment`)
                VALUES (
                    '" . mysqli_real_escape_string($mysqli, $_POST['firstname']) . "',
                    '" . mysqli_real_escape_string($mysqli, $_POST['name']) . "',
                    '" . mysqli_real_escape_string($mysqli, $_POST['lastname']) . "',
                    '" . $_POST['date'] . "',
                    '" . $_POST['email'] . "',
                    '" . $_POST['phone'] . "',
                    '" . mysqli_real_escape_string($mysqli, $_POST['comment']) . "'
                )";
    }
    
    mysqli_query($mysqli, $sql);
    if (mysqli_errno($mysqli)) {
        die("Ошибка запроса: " . mysqli_error($mysqli));
    }
    header("Location: index.php?elem=menu");
    exit;
}

// Удаление записи
if ($active_elem === 'delete' && isset($_GET['id'])) {
    $sql = "DELETE FROM `notes` WHERE `id` = " . (int)$_GET['id'];
    mysqli_query($mysqli, $sql);
    if (mysqli_errno($mysqli)) {
        die("Ошибка удаления: " . mysqli_error($mysqli));
    }
    header("Location: index.php?elem=menu");
    exit;
}

require('header.php');

switch ($active_elem) {
    case 'add':
        require('add.php');
        break;
    case 'delete':
        require('delete.php');
        break;
    default:
        require('menu.php');
}

mysqli_close($mysqli);
require('footer.php');
?>