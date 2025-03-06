<?php

    if (isset($_POST['val'])) { 
        $res = calculate($_POST['val']); 
        if (is_numeric($res)) { 
            echo $res; 
        } else { 
            echo 'Ошибка выведения выражения: ' . $res; 
        }
    }

    //проверка: является ли результат числом
    function isnum($x) {
        return is_numeric($x); 
    }

    // вычиление введенного выражения
    function calculate($val) {
        if (empty($val)) return 'Выражение не задано!'; 
        // empty - пустое выражение или нет
        if (!scobCorrect($val)) {
            return 'Неправильная расстановка скобок!';
        }

        // удаление пробелов
        $val = str_replace(' ', '', $val);

        // Обработка - в начале выражения (если первый символ -, то в начало выражения добавляется 0)
        if (substr($val, 0, 1) == '-') {
            $val = '0' . $val;
        }

        //вычисление выражений в скобках
        while (preg_match('/\(([^()]+)\)/', $val, $matches)) {
            $val = str_replace($matches[0], calculate($matches[1]), $val);
        }

        //вычисление умножения и деления
        while (preg_match('/(\-?\d+\.?\d*)([\/\*])(\-?\d+\.?\d*)/', $val, $matches)) {
            $res = $matches[2] == '*' ? $matches[1] * $matches[3] : $matches[1] / $matches[3];
            $val = str_replace($matches[0], $res, $val);
        }

        //вычисление сложения и вычитания
        while (preg_match('/(\-?\d+\.?\d*)([\+\-])(\-?\d+\.?\d*)/', $val, $matches)) {
            $res = $matches[2] == '+' ? $matches[1] + $matches[3] : $matches[1] - $matches[3];
            $val = str_replace($matches[0], $res, $val);
        }

        return $val; 
    }

    //проверка: корректность расстановки скобок в выражении
    function scobCorrect($str) {
        $count = 0;
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] == '(') {
                $count++;
            } elseif ($str[$i] == ')') {
                $count--;
                if ($count < 0) {
                    return false; 
                }
            }
        }
        return $count == 0; 
    }

?>