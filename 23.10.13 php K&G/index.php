<?php
require('db.php');

if(!empty($_GET)){
    if(isset($_GET['logout'])){
        unset($_SESSION['user']);
    }

    echo "<script>alert('Вы успешно вышли!'); location.href='index.php'</script>";
}

print_r($_SESSION['user']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header>
    <?php if(isset($_SESSION["user"])){
        if($_SESSION['user']['rule']=="admin"){?>
       
            <a href="admin.php">Панель адмиина</a>
        <?php }?>
        <a href="?logout=1">Выйти</a>
        <a href="Corder.php">Создать заявление</a>
        <a href="Lorder.php">Ваши запросы</a>
    <?php } else {?>
        <a href="login.php">Войти</a>
        <a href="register.php">Зарегаться</a>
    <?php }?>


</header>

<h1>Нарушениям.Нет</h1>
<h2>Представляет собой информационную систему для помощи полиции по своевременной фиксации нарушений правил дорожного движения. </h2>
    
</body>
</html>