<?php

// номер 2
// file_put_contents('test.txt', "12345");

// номер 3
// $files = ['1.txt', '2.txt', '3.txt'];
// $combFile = "";

// foreach ($files as $file) {
//     if (file_exists($file)) {
//         $combFile .= file_get_contents($file);
//     } else {
//         echo "Файл $file не найден";
//     }
// }

// file_put_contents('new.txt', $combFile);

// номер 4
// $files = ['1.txt', '2.txt', '3.txt'];

// foreach ($files as $file) {
//     if (file_exists($file)) {
//         $new = file_get_contents($file);
//         $new .= "!";
//         file_put_contents($file, $new);
//     } else {
//         echo "Файл $file не найден";
//     }
// }

// номер 5

// $file = 'count.txt';

// if (file_exists($file)) {
//     $count = (int)file_get_contents($file);
// } else {
//     echo "Файл $file не найден";
// }

// $count++;
// file_put_contents($file, $count);

// номер 6
$file = 'test.txt';

if (file_exists($file)) {
    $chisl = (int)file_get_contents($file);
} else {
    echo "Файл $file не найден";
}

$chisl = $chisl**2;
file_put_contents($file, $chisl);







