<?php 
require("db.php");

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
        <h1>Регистрация</h1>
        <form method="post">
            <label>Ваше имя: <input type="text" name="name"></label>
            <label>Логин: <input type="text" name="login"></label>
            <label>Пароль: <input type="password" name="password"></label>
            <button>Зарегистрироваться</button>
        </form>

        <?php 
if(!empty($_POST)){
    $name = $_POST['name'];
    $login =$_POST['login'];
    $password = md5($_POST['password']);

    $query = $db->query("INSERT INTO `users` (`id`, `login`, `password`, `name`, `role`) VALUES (NULL, '$login', '$password', '$name', 'user')");

    if($query){
        echo "<script>alert('Аккаунт создан! Можно авторизоваться'); location.href = 'login.php'</script>";
    } else{
        echo "<script>alert('У вас ошибка!')</script>";
        print_r($db->errorInfo());
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