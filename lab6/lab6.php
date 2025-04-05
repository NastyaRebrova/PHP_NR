<?php
// номер 1
// session_start();

// if (!isset($_SESSION['test'])) {
//     $_SESSION['test'] = 'test';
//     echo "Обновите страницу";
// } else {
//     echo "Содержимое сессии: " . $_SESSION['test'];
// }

// номер 5
// session_start();

// if (!isset($_SESSION['first_time_visit'])) {
//     $_SESSION['first_time_visit'] = time();
//     echo "Обновите страницу";
// } else {
//     $timeAgo = time() - $_SESSION['first_time_visit'];
//     echo "Первое посещение сайта $timeAgo секунд назад.";
// }

// номер 3
// session_start();

// if (!isset($_SESSION['update_count'])) {
//     $_SESSION['update_count'] = 0;
//     echo "Вы еще не обновляли страницу";
// } else {
//     $_SESSION['update_count']++;
//     echo "Количество обновлений: " . $_SESSION['update_count'];
// }

// номер 7
// if (!isset($_COOKIE['test'])) {
//     setcookie('test', '123', time() + 3600, '/');
//     echo "Обновите страницу";
// } else {
//     echo "Содержимое куки 'test': " . htmlspecialchars($_COOKIE['test']);
// }

// номер 9
if (isset($_COOKIE['counter'])) {
    $count = $_COOKIE['counter'] + 1;
} else {
    $count = 1;
}

setcookie('counter', $count, time() + 3600, '/');

echo "Вы посетили наш сайт $count раз!";
?>