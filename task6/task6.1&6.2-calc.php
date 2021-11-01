<?php

/*
    Задание 1.
    Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление.
    Не забыть обработать деление на ноль!
    Выбор операции можно осуществлять с помощью тега <select>.

    Задание 2.
    Создать калькулятор, который будет определять тип выбранной пользователем операции,
    ориентируясь на нажатую кнопку.
 */

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $number1 = $_POST['number1'] ?? null;
    $number2 = $_POST['number2'] ?? null;
    $operation = $_POST['operation'];
    $reset = $_POST['reset'];

    if ($reset) {
        $number1 = null;
        $number2 = null;
        $operation = false;
        $result = 'Введите данные';
    }

    switch ($operation) {
        case "+":
            $result = $number1 + $number2;
            break;
        case "-":
            $result = $number1 - $number2;
            break;
        case "*":
            $result = $number1 * $number2;
            break;
        case "/":
            $result = ($number2 != 0) ? $number1 / $number2 : 'Делить на 0 нельзя';
            break;
        default:
            $result = 'Введите данные';
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6.1 & 6.2</title>
</head>

<body>

    <form enctype="multipart/form-data" method="post" action="task6.1&6.2-calc.php">
        <input name="number1" type="number" value="<?= $number1 ?>"><br>
        <input name="number2" type="number" value="<?= $number2 ?>"><br>

        <select name="operation" onchange="submit()">
            <option value="">Select operation</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br>
        <input name="operation" value="+" type="submit"/>
        <input name="operation" value="-" type="submit"/>
        <input name="operation" value="*" type="submit"/>
        <input name="operation" value="/" type="submit"/>
        <input name="reset" value="Reset" type="submit"/><br>

        <span>Результат: <?= $result ?? 'Введите данные' ?></span>
    </form>

</body>
</html>