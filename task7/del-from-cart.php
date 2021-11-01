<?php

session_start();

$arr = $_SESSION['cart'];
$key = (key($_POST));

foreach ($arr as &$value) {
    if ($value['id'] == $key) {
        $index = array_search($value, $arr);
        if (isset($arr[$index])) {
            unset($arr[$index]);
        }

        $_SESSION['cart'] = $arr;
    }
}

header("refresh: 0; cart.php");