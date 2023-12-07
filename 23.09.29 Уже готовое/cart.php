<?php

require("db.php");

if (!isset($_SESSION["user"])) {
    echo "<script>alert('Пожалуйста, авторизуйтесь!'); location.href='login.php';</script>";
}

if (!empty($_GET)) {
    if (isset($_GET["remove"])) {
        $_SESSION['cart'] = array_filter($_SESSION["cart"], function($el) {
            return $el !== $_GET["remove"];
        });
    }

    if (isset($_GET["buy"])) {
        $user_id = $_SESSION["user"]["id"];

        foreach ($_SESSION['cart'] as $id) {
            $db->query("insert into orders set user_id=$user_id, item_id=$id");
        }

        unset($_SESSION["cart"]);
        echo "<script>alert('Вы успешно купили! Администратор обработает ваш заказ'); 
        location.href='index.php'</script>";
    }
}

$cart = [];

foreach ($_SESSION['cart'] as $id) {
    $info = $db->query("select * from items where id=$id")->fetchAll(PDO::FETCH_ASSOC);
    $cart[] = $info[0];
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
<header>
    <a href="index.php">На главную</a>
    <a href="index.php?logout=1">Выйти</a>
</header>
<main>
    <h1>Корзина</h1>
    <h3>Вы выбрали следующие товары:</h3><br>

    <div class="container">
        <?php foreach ($cart as $item) { ?>
            <div class="item">
                <form action="#">
                    <h2><?= $item['name'] ?></h2>
                    <p>Цена: <?= $item["price"] ?></p>
                    <input type="hidden" name="remove" value="<?= $item['id'] ?>">
                    <button>Удалить из корзины</button>
                </form>
            </div>
        <?php } ?>
    </div>

    <form action="">
        <input type="hidden" name="buy">
        <button>Купить!</button>
    </form>
</main>
</body>
</html>
