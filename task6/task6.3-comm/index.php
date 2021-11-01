<?php

echo '<a href="cat01.jpg">
        <img height="200" src="cat01.jpg">
      </a>
      <br>
';

echo '<h3>Добавить комментарий:</h3>';

echo "
    <form enctype='multipart/form-data' method='post' action='index.php'>
        <b>Пользователь:</b> <input name='name' type='text' placeholder='Имя' required/><br>
        <b>Текст:</b><br><textarea name='text' cols='40' rows='3' placeholder='Текст' required></textarea><br><br>
        <input value='Отправить' type='submit'/>
    </form>
    ";

$name = $_POST['name'];
$text = $_POST['text'];

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_base = 'images';
$db_table = 'comm';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
} catch (PDOException $e) {
    die('ERROR: db not found!');
}

$data = array( 'name' => $name, 'text' => $text );
$query = $db->prepare("INSERT INTO $db_table (user_name, text) values (:name, :text)");
$query->execute($data);

echo '<h3>Все комментарии:</h3>';

$getComments = $db->query('SELECT * FROM comm');
foreach ($getComments as $comment) {
        if ($comment) {
            echo '<br><b>Пользователь: </b>' . $comment['user_name'];
            echo '<br><b>Текст: </b>' . $comment["text"] . '<br>';
        } else echo "<br>Отзывы отсутствует! ";
}
