<?php 
require('db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='#' method='post'>
        <label>
            Логин: <input type='text' name='login'>
        </label>
        <label>
            Пароль: <input type='password' name='password'>
        </label>
        <button>Создать аккаунт</button>
    </form>

    <p>Есть аккаунт? <a href='login.php'>Войти</a></p>
    
<div class='errors'>
    
    <?php
        if(!empty($_POST)){
            $login = $_POST["login"];
            $password = md5($_POST["password"]);

            $query = $db->query("INSERT into users set login='$login', password='$password', role=0");

            if($query){
                echo "<script>alert('Аккаунт создан! Можно авторизоваться'); location.href = 'login.php'</script>";
            } else{
                echo "<script>alert('У вас ошибка!')</script>";
                print_r($db->errorInfo());
            }
        }

    ?>
</div>

</body>
</html>