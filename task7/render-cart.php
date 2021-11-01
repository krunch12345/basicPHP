<?php

session_start();

foreach ($_SESSION['cart'] as $item) {
    ?>
    <div class="rendered">
        <img width="150px" src="<?= $item['img'] ?>">
        <h4><?= $item['good_name'] ?></h4>
        <span>price: <?= $item['price'] ?></span><br>
        <span>quantity: <?= $item['quantity'] ?></span>
        <br>
        <button> +1</button>
        <br>
        <form action="del-from-cart.php" method="post">
            <button value="<?= $item['id'] ?>" name="<?= $item['id'] ?>" type="submit">dell from cart</button>
        </form>

    </div>
    <?php
}
?>