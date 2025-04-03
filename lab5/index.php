<?php 
require('header.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$mysqli = mysqli_connect('localhost', 'root', '', 'friends');
if(mysqli_connect_errno()) {
    die("Ошибка подключения к БД: " . mysqli_connect_error());
}

// Insert
if(!empty($_POST) && empty($_GET['id'])) {
    $sql = "INSERT INTO `notes` 
            (`firstname`, `name`, `lastname`, `date`, `email`, `phone`, `comment`)
            VALUES (
                '".htmlspecialchars($_POST['firstname'])."',
                '".htmlspecialchars($_POST['name'])."',
                '".htmlspecialchars($_POST['lastname'])."',
                '".$_POST['date']."',
                '".$_POST['email']."',
                '".$_POST['phone']."',
                '".htmlspecialchars($_POST['comment'])."'
            )";
    mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) echo mysqli_error($mysqli);
}

// Update
if(!empty($_POST) && !empty($_GET['id'])) {
    $sql = "UPDATE `notes` SET
            `firstname`='".htmlspecialchars($_POST['firstname'])."',
            `name`='".htmlspecialchars($_POST['name'])."',
            `lastname`='".htmlspecialchars($_POST['lastname'])."',
            `date`='".$_POST['date']."',
            `email`='".$_POST['email']."',
            `phone`='".$_POST['phone']."',
            `comment`='".htmlspecialchars($_POST['comment'])."'
            WHERE `id`=".$_GET['id'];
    mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) echo mysqli_error($mysqli);
}

// Delete
if(isset($_GET['id']) && empty($_POST)) {
    $sql = "DELETE FROM `notes` WHERE `id`=".$_GET['id'];
    mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) echo mysqli_error($mysqli);
}

if(!isset($_GET['elem'])) $_GET['elem'] = 'menu';
if(in_array($_GET['elem'], ['menu', 'add', 'delete'])) {
    require($_GET['elem'].'.php');
}

mysqli_close($mysqli);
require('footer.php');
?>