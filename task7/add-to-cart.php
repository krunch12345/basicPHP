<?php

session_start();
require_once 'db.php';
$result = mysqli_query($link, 'select * from goods where 1 order by id');
$key = (key($_POST));

foreach ($result as $item) {
    if ($item['id'] == $key) {
        if (in_array($item, $_SESSION['cart'])) {
            echo 'Такой товар в корзине уже есть!!!';
            break;
        } else {
            $_SESSION['cart'][] = $item;
            echo 'Добавлен в корзину';
        }
    } else {
        continue;
    }
}

require_once 'refresh.php';
