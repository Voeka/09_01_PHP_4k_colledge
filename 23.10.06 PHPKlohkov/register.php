<?php 

require('db.php');

if(!empty($_POST)){
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    if($db->query("INSERT into users (login, password) values ( '$login', '$password')")){
        echo "
            <script> alert('Вы успешно зарегестрированны!');
            location.href = 'login.php';</script>
        ";
    } else{
        print_r($db->errorInfo());
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <h1>Регистрация</h1>
    <form action="#" method='post'>
        <label>Логин: <input type="text" name="login" required></label>
        <label>Пароль: <input type="password" name="password" required></label>

        <button>Зарегистрироваться</button>

    </form>


    
</body>
</html>