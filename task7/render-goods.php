<?php

require_once 'db.php';

$result = mysqli_query($link, 'select * from goods where 1 order by id');

while ($row = mysqli_fetch_assoc($result)) {

    ?>

    <div class="rendered">
        <img width="150px" src="<?= $row['img'] ?>">
        <h4><?= $row['good_name'] ?></h4>
        <span>price: <?= $row['price'] ?></span><br>
        <form action="add-to-cart.php" method="post">
            <button value="<?= $row['id'] ?>" name="<?= $row['id'] ?>" type="submit">Купить </button>
        </form>
    </div>

    <?php
}
?>