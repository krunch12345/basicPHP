<?php

session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>

<div>
    <a href="index.php">Index</a>
    <div>
        <div>
            <h3>List goods</h3>
        </div>
    </div>
    <div>
        <?php
            require_once 'render-cart.php';
        ?>
    </div>
</div>

</body>
</html>