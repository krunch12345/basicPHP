<?php

$link = mysqli_connect('localhost', 'root', 'root', 'images');
if (! $link) {
    die('ERROR: db not found!');
}

$id = $_GET['image_id'] ?? null;

if ($id && is_numeric($id)) {
    mysqli_query($link, 'UPDATE images SET viewed = viewed + 1 WHERE id =' . $id);
    $result = mysqli_query($link,  'SELECT * FROM images WHERE id =' . $id);
    $image = mysqli_fetch_assoc($result);
    if ($image) {
        echo 'просмотров: ' . $image['viewed'];
        echo '<img src="' . '/task5' . $image['image_path'] . '">';
    } else {
        die("Can't find image with id = " . $id);
    }
}

mysqli_close($link);