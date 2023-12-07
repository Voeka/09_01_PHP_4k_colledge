<?php
require('db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>КиноGO</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
        <nav>
            <a href="">Поиск</a>
            <a href="">Фильмы сегодня</a>
            <a href="">Кинотеатры</a>
        </nav>


        <div>
            
            <a href="">Зарегистрироваться</a>

            <a href="">Выйти</a>

            <a href="">Админ панель</a>
        </div>
    </header>
    <!-- Поиск -->
    <section class="content">
        <h1>Вход</h1>
        <form method="post">
            <label>Логин: <input type="text" name="login"></label>
            <label>Пароль: <input type="password" name="password"></label>
            <button>Войти</button>
        </form>

        <?php 
if(!empty($_POST)){
    $login =$_POST['login'];
    $password = md5($_POST['password']);

    $query = $db->query("SELECT * FROM `users` WHERE login='$login' and password='$password'  ");

    if($query){
        $res = $query->fetchAll();

       if(!empty($res)){
        $_SESSION['user']=$res[0];
        echo "<script>alert('Вы успешно вошли!'); location.href='index.php'</script>";
       } else{
        echo "<script>alert('Неверный логин или пароль!');</script>";
       }
    }


    
}

?>        
        
    </section>

    <footer>
        <div>
            
            <a href="index.php"><img src="images/logo.png " alt="Logo"></a>
            <nav>
            <a href="">Поиск</a>
            <a href="">Фильмы сегодня</a>
            <a href="">Кинотеатры</a>
            </nav>
        
        </div>
        <p>Все права защищены™</p>
    </footer>

 
   
</body>
</html>