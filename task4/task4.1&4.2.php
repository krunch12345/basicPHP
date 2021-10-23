<?php

/*
    ВНИМАНИЕ! Задания 1 и 2 объединил в одно:

    Создать галерею фотографий.
    Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде
    и форму для загрузки нового изображения.
    При клике на фотографию она должна открыться в браузере в новой вкладке.
    Размер картинок можно ограничивать с помощью свойства width.
    При загрузке изображения необходимо делать проверку на тип и размер файла.

    Создать фотогалерею, не указывая статичные ссылки к файлам,
    а просто передавая в функцию построения адрес папки с изображениями.
    Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
*/

function upload_file($file) {
    if ($file['name'] === '') {
        echo 'Файл не выбран!';
        return;
    }

    if ($file['type'] === 'image/jpeg' || $file['type'] === 'image/png') {
        $pic = $file['name'];
        if (copy($file['tmp_name'], 'img/' . $file['name'])) {
            echo "Файл $pic успешно загружен";
        } else {
            echo "Ошибка $pic загрузки файла";
        }
    } else {
        echo "Файл должен иметь расширение jpeg или png!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 4.1</title>
    <style>
        img {
            width: 350px;
        }
    </style>
</head>
<body>

    <h1>
        Добавить изображение
    </h1>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Загрузить файл">
    </form>

    <?php

        if (isset($_FILES['file'])) {
            upload_file($_FILES['file']);
        }

    ?>

    <h1>
        Галерея
    </h1>

    <?php

        $images = scandir('img');
        foreach ($images as $image) {
            if (is_file('img/' . $image)) {
                ?>
                <a href='img/<?php echo $image; ?>' target='_blank'>
                    <img src='img/<?php echo $image; ?>' alt='<?php echo $image['name']; ?>'>
                </a>
                <?php
            }
        }

    ?>

</body>
</html>
