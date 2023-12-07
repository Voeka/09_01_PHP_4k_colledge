<?php

require("db.php");

if(!empty($_POST)){
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $result = $db->query("SELECT * from users where login='$login' and password='$password'")->fetchAll(2);

    if(count($result)>0){
        $_SESSION['user'] = $result[0];

        echo "<script>
        alert('Yokoso!'); location.href = 'index.php';
        </script>";
    } else{
        echo "<script>
        alert('Неверный логин или пароь!');
        </script>";
    };
};




?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>
<body>
    <h1>Вход</h1>
    <form action="#" method='post'>
        <label>Логин: <input type="text" name="login" required></label>
        <label>Пароль: <input type="password" name="password" required></label>

        <button>Войти</button>

    </form>


    
</body>
</html>