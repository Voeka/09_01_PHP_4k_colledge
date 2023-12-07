<?php 
// БД подключение
require 'db.php';

session_start();
$user = $_SESSION['user'] ?? [];

$error = '';

if(!isset($_GET["post"])){
    $error = 'Вы не указали ID поста';
}

if(!$user){
    $error = 'Вы не авторизованы!';
}

if($error){
    echo "<script>alert('$error');location.href='index.php'</script>";
}

if($_POST){
    $author = $user['login'];
    $post_id = $_GET['post'];
    $text = $_POST['text'];

    print_r($user);
    print_r([$author,$text]);

    if($q = $db->query("INSERT INTO comments SET author = '$author', post_id=$post_id, text='$text'")){
        echo "<script>alert('Успешно добавлен!');location.href='index.php'</script>";
    } else{
        print_r($db->errorInfo());
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label>
    Комментарий:
    <textarea name='text' require></textarea>
    <button>Прокоментировать</button>


</label>
    </form>
    
</body>
</html>