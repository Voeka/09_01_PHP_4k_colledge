<?php

require("db.php");

if (!empty($_POST)) {
    $login = $_POST["login"];
    $password = md5($_POST["password"]);

    $query = $db->query("select * from users where login='$login' and password='$password'");

    if ($query) {
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($res)) {
            $_SESSION["user"] = $res[0];
            echo "<script>alert('Вы успешно вошли!'); location.href='index.php'</script>";
        } else {
            echo "<script>alert('Неверный логин или пароль!')</script>";
        }
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
<header>
    <a href="index.php">На главную</a>
</header>
<main>
    <section>
        <h1>Авторизация</h1>

        <form action="#" method="post">
            <label>
                Логин: <input type="text" name="login">
            </label>
            <label>
                Пароль: <input type="password" name="password">
            </label>
            <button>Войти</button>
        </form>

        <p>Нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
    </section>
</main>
</body>
</html>
