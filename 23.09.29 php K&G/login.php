<?php 
require('db.php');

if(!empty($_POST)){
    $login = $_POST["login"];
    $password = md5($_POST["password"]);

    $query = $db->query("SELECT * FROM users where login='$login' and password='$password'");

    if($query){
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($res)){
            $_SESSION["user"] = $res[0];
            echo "<script>alert('Вы успешно вошли!'); location.href='index.php'</script>";

        } else{
            echo "<script>alert('Неверный логин или пароль!')</script>";
        }
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
    <main>
        <section>
        <h1>Авторизация</h1>
        <form action='#' method='post'>
            <label>
                Логин: <input type='text' name='login'>
            </label>
            <label>
                Пароль: <input type='password' name='password'>
            </label>
            <button>Войти</button>

        </form>
        <p>Нет аккаунта?<a href='register.php'>Зарегистрироваться</a></p>


        </section>
    </main>
    
</body>
</html>