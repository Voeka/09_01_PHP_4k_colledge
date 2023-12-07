<?php 
require('db.php');

$id = $_SESSION['idfilm'];

$films = $db->query("SELECT * from film where id=$id");
// $film = $films[0];
// print_r($films);
print_r($_SESSION);

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
            <a href="">Войти</a>
            <a href="">Зарегистрироваться</a>

            <a href="">Выйти</a>

            <a href="">Админ панель</a>
        </div>
    </header>
    <!-- Поиск -->
    <section class="content">
        <h1>Ваш билет</h1>

        <?php foreach($films as $film){?>
        <img src="<?php print($film['img']); ?>" alt="<?php print($film['name']); ?>">
        <p><?php print($film['name']); ?></p>
        <p>Время начала: <?php print($_SESSION['time']); ?></p>
        <p>Кинотеарт: <?php print($_SESSION['cinima']); ?></p>
        <p>Место: <?php print($_SESSION['posi']); ?></p>
        <p>Дополнительно: <?php print($_SESSION['food']); ?></p>
        <br>
        <h2>QR-code для входа</h2>
        <img src="images/qr.png" alt="">

        <?php } ?>
        
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

    <script src="scripts/jquery-3.7.1.min.js"></script>
    <script>
        

    </script>
</body>
</html>