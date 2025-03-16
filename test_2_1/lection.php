<?php

// номер 25 
// if (isset($_GET['number'])) {
//     $number = $_GET['number'];
//     $square = $number * $number;
//     echo "Квадрат введенного числа: " . $square;
// } else {
//     echo "Число не было передано.";
// }

// номер 26
// if (isset($_GET['number'])) {
//     $number = $_GET['number'];
//     echo "Число: " . $number;
// } else {
//     echo "Число не было передано.";
// }

// номер 27
// if (isset($_GET['number'])) {
//     $number = $_GET['number'];
//     if ($number==1){
//         echo "Привет";
//     } elseif ($number == 2) {
//         echo "пока";
//     } else {
//         echo "Введено не 1 и не 2";
//     }
// } else {
//     echo "Число не было передано";
// }

// номер 28
// if (isset($_GET['number1']) && isset($_GET['number2'])) {
//     $number1 = $_GET['number1'];
//     $number2 = $_GET['number2'];
//     $sum = $number1 + $number2;
//     echo "Сумма: " . $sum;
// } else {
//     echo "Числа не были переданы.";
// }

// номер 29
if (isset($_GET['number'])) {
    $number = $_GET['number'];
    echo "Число: $number";
} else {
    echo "Нажмите на ссылку ниже:";
}
echo '<BR>';
echo '<a href="?number=1">Ссылка 1</a><BR>';
echo '<a href="?number=2">Ссылка 2</a><BR>';
echo '<a href="?number=3">Ссылка 3</a><BR>';
?>