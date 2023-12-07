<?php 
// БД подключение
require 'db.php'; 

if($_POST){
    $login = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if ($query = $db->query("INSERT INTO users SET login='$login', password='$password'")){
        echo "<script>alert('Вы успешно зарегистрированы');location.href='login.php';</script>";
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
        <h1>Регистрация</h1>

        <label>
            Логин (почта)
            <input type="text" required name="email">
        </label>

        <label>
            Пароль
            <input type="password" required name="password">
        </label>

        <button>Зарегистрироваться</button>
</body>
</html>