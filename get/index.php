<?php
// 26 задание

    // if (isset($_GET['number'])) {
    //     $number = $_GET['number'];
    //     echo "Число: " . $number;
    // } else {
    //     echo "Число не было передано.";
    // }

// 27 задание
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

// 28 задание
    if (isset($_GET['number1']) && isset($_GET['number2'])) {
        $number1 = $_GET['number1'];
        $number2 = $_GET['number2'];
        $sum = $number1 + $number2;
        echo "Сумма: " . $sum;
    } else {
        echo "Числа не были переданы.";
    }
?>
