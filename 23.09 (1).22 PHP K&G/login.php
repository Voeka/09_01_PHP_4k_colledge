<?php 
// БД подключение
require 'db.php'; 

session_start();

if($_POST){

    $login = $_POST['email'];
    $password = $_POST["password"];

    $user = [];

    // Если запрос к БД без траблов
    if($query = $db->query("SELECT*FROM users Where login='$login' and password='$password'")){
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $code = '';
        // Proverka na Usera

        if($result){
            $_SESSION['user'] = $result[0];
            $code = "alert('Yokoso!');location.href='index.php'";
        } else{
            $code = "alert('Неверный логин или пароль!');location.href='login.php'";
        }

        echo "<script>$code</script>";


    }else{
        echo $db->errorInfo()[2];
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

<form action="#" method='post'>
    <h1>Авторизация</h1>
    <label >
        Логин <input type='text' required name='email'>
    </label>
    <label >
        Пароль <input type='password' required name='password'>
    </label>
    <button>Войти</button>

    <p class='create_acc'>
        Нет аккаунта? <a href="singup.php">Создать</a>

    </p>

</form>
    
</body>
</html>