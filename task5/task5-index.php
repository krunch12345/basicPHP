<?php

$link = mysqli_connect('localhost', 'root', 'root', 'images');
if (! $link) {
    die('ERROR: db not found!');
}

$result = mysqli_query($link, 'SELECT * FROM images WHERE 1 ORDER BY viewed DESC');
if (! $result) {
    die('ERROR: db not found!');
}


while ($row = mysqli_fetch_assoc($result)) {
    echo '<a href="/task5/task5-showimages.php?image_id=' . $row['id'] . '">';
    echo '<img height="100" src="' . '/task5' . $row['image_path'] . '">';
    echo '</a>';
}

mysqli_close($link);