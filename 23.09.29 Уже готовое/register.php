<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
<header>
    <a href="index.php">На главную</a>
</header>
<main>
    <section>
        <h1>Регистрация</h1>

        <div class="errors">
            <?php

            require("db.php");

            if (!empty($_POST)) {
                $login = $_POST["login"];
                $password = md5($_POST["password"]);

                $query = $db->query("insert into users set login='$login', password='$password', role=0");

                if ($query) {
                    echo "<script>alert('Аккаунт создан! Можно авторизоваться'); location.href='login.php'</script>";
                } else {
                    echo "<script>alert('У вас ошибка!')</script>";
                    print_r($db->errorInfo());
                }
            }
            ?>
        </div>

        <form action="#" method="post">
            <label>
                Логин: <input type="text" name="login">
            </label>
            <label>
                Пароль: <input type="password" name="password">
            </label>
            <button>Создать аккаунт</button>
        </form>

        <p>Есть аккаунт? <a href="login.php">Войти</a></p>
    </section>
</main>
</body>
</html>
