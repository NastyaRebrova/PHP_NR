<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$active_elem = $_GET['elem'] ?? 'menu';
if (!in_array($active_elem, ['menu', 'add', 'delete'])) {
    $active_elem = 'menu';
}

$mysqli = mysqli_connect('localhost', 'root', '', 'friends');
if (mysqli_connect_errno()) {
    die("Ошибка подключения к БД: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_GET['id'])) {
    $firstname = mysqli_real_escape_string($mysqli, $_POST['firstname'] ?? '');
    $name = mysqli_real_escape_string($mysqli, $_POST['name'] ?? '');
    $lastname = mysqli_real_escape_string($mysqli, $_POST['lastname'] ?? '');
    $date = $_POST['date'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $comment = mysqli_real_escape_string($mysqli, $_POST['comment'] ?? '');

    $sql = "INSERT INTO `notes` 
            (`firstname`, `name`, `lastname`, `date`, `email`, `phone`, `comment`)
            VALUES ('$firstname', '$name', '$lastname', '$date', '$email', '$phone', '$comment')";
    
    if (!mysqli_query($mysqli, $sql)) {
        die("Ошибка добавления записи: " . mysqli_error($mysqli));
    }
    header("Location: index.php?elem=menu");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    $firstname = mysqli_real_escape_string($mysqli, $_POST['firstname'] ?? '');
    $name = mysqli_real_escape_string($mysqli, $_POST['name'] ?? '');
    $lastname = mysqli_real_escape_string($mysqli, $_POST['lastname'] ?? '');
    $date = $_POST['date'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $comment = mysqli_real_escape_string($mysqli, $_POST['comment'] ?? '');

    $sql = "UPDATE `notes` SET
            `firstname` = '$firstname',
            `name` = '$name',
            `lastname` = '$lastname',
            `date` = '$date',
            `email` = '$email',
            `phone` = '$phone',
            `comment` = '$comment'
            WHERE `id` = $id";
    
    if (!mysqli_query($mysqli, $sql)) {
        die("Ошибка обновления записи: " . mysqli_error($mysqli));
    }
    header("Location: index.php?elem=menu");
    exit;
}

if ($active_elem === 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM `notes` WHERE `id` = $id";
    
    if (!mysqli_query($mysqli, $sql)) {
        die("Ошибка удаления записи: " . mysqli_error($mysqli));
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
    case 'menu':
    default:
        $per_page = 10;
        $current_page = max(1, $_GET['page'] ?? 1);
        $offset = ($current_page - 1) * $per_page;

        $sort_field = $_GET['sort'] ?? 'id';
        $sort_order = $_GET['order'] ?? 'ASC';

        $count_sql = "SELECT COUNT(*) as total FROM `notes`";
        $count_result = mysqli_query($mysqli, $count_sql);
        $total_rows = mysqli_fetch_assoc($count_result)['total'];
        $total_pages = ceil($total_rows / $per_page);

        $sql = "SELECT * FROM `notes` ORDER BY `$sort_field` $sort_order LIMIT $offset, $per_page";
        $result = mysqli_query($mysqli, $sql);
        
        require('menu.php');
        break;
}

mysqli_close($mysqli);

require('footer.php');
?>