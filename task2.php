<?php

/*
    Задание 1.
    Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
    Затем написать скрипт, который работает по следующему принципу:
        если $a и $b положительные, вывести их разность;
        если $а и $b отрицательные, вывести их произведение;
        если $а и $b разных знаков, вывести их сумму;
    Ноль можно считать положительным числом.
 */

echo "<p>Задание 1.</p>";

$a = -10;
$b = -2;

if ( $a >= 0 && $b >= 0 ) echo $a - $b;
    else if ( $a < 0 && $b < 0 ) echo $a * $b;
    else echo $a + $b;



/*
    Задание 2.
    Присвоить переменной $а значение в промежутке [0..15].
    С помощью оператора switch организовать вывод чисел от $a до 15.
*/

echo "<p>Задание 2.</p>";

$a = 10;

switch ($a) {
    case 0: echo '0 <br>';
    case 1: echo '1 <br>';
    case 2: echo '2 <br>';
    case 3: echo '3 <br>';
    case 4: echo '4 <br>';
    case 5: echo '5 <br>';
    case 6: echo '6 <br>';
    case 7: echo '7 <br>';
    case 8: echo '8 <br>';
    case 9: echo '9 <br>';
    case 10: echo '10 <br>';
    case 11: echo '11 <br>';
    case 12: echo '12 <br>';
    case 13: echo '13 <br>';
    case 14: echo '14 <br>';
    case 15: echo '15 <br>';
}



/*
    Задание 3.
    Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
    Обязательно использовать оператор return.
 */

function addition($x, $y) {
    return $x + $y;
}

function subtraction($x, $y) {
    return $x - $y;
}

function multiplication($x, $y) {
    return $x * $y;
}

function division($x, $y) {
    return $x / $y;
}



/*
    Задание 4.
    Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
    где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
    В зависимости от переданного значения операции выполнить одну из арифметических операций
    (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
 */

echo "<p>Задание 3, 4.</p>";

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'addition': return addition($arg1, $arg2);
        case 'subtraction': return subtraction($arg1, $arg2);
        case 'multiplication': return multiplication($arg1, $arg2);
        case 'division': return division($arg1, $arg2);
        default: return 'error';
    }
}

$c = mathOperation(10, 2, 'multiplication');
echo "$c <br>";



/*
    Задание 5.
    Посмотреть на встроенные функции PHP.
    Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.
 */

echo "<p>Задание 5.</p>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 2</title>
    <meta charset="UTF-8">
</head>
<body>
    <footer>
        <?= date('Y') ?>
    </footer>
</body>
</html>

<?php

/*
    Задание 6*.
    С помощью рекурсии организовать функцию возведения числа в степень.
    Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
 */

echo "<p>Задание 6*.</p>";

function power($val, $pow) {
    if ($pow === 0) {
        return 1;
    }
    else if ($pow > 0) {
        return $val * power($val, $pow - 1);
    }
    return power(1/$val, -$pow);
}

$d = power(2, 3);
echo "$d <br>";



/*
    Задание 7*.
    Написать функцию, которая вычисляет текущее время
    и возвращает его в формате с правильными склонениями, например:
        22 часа 15 минут
        21 час 43 минуты
 */

echo "<p>Задание 7*.</p>";

function getTime() {
    $h = date("H")+3; // Msk
    $m = date("i");

    if ($h==1 || $h==21) {
        $hours = " час";
    } else if (($h>=2 && $h<=4) || ($h>=22 && $h<=24)) {
        $hours = " часа";
    } else {$hours = " часов";
    }

    if (($m < 20) || ($m > 10)) {
        $minutes = " минут.";
    } else if (($m % 10) === 1) {
        $minutes = " минута.";
    } else if (( ($m % 10) >= 2 ) && ( ($m % 10) <= 4) ) {
        $minutes = " минуты.";
    } else {
        $minutes = " минут.";
    }

    echo $h . $hours . " " . $m . $minutes;
}

getTime();
