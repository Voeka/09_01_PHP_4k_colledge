<?php 
require('db.php');

$id=$_GET['id'];
$cinima = $_GET["cinima"];
$time = $_GET["time"];
$pos = $_GET['pos'];

$films = $db->query("SELECT * from film where id=$id")->fetchAll();

if(!empty($_GET)){
    $food = $_GET['food'];
    $id
}
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
        <a href="index.html"><img src="images/logo.png" alt="Logo"></a>
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
        <?foreach($films as $film){
            ?>
        <h1>Ваше бронирование</h1>
        <p><?php print($film['name']);?></p>
        <p><?php print($time);?></p>
        <p><?php print($cinima);?></p>
        <p><?php print($pos);?></p>
        
        <p><?php print($film["price"]);?></p>
        <form>
            <label>Допокупить еду<select name="food" id="">
                <option value="1">Нет</option>
                <option value="2">Комбо"Напиток+попкорн"</option>
                <option value="3">Начос</option>
                <option value="4">Только попкорн</option>
                
            </select></label><br>
            <!-- <a href="ticket.php">Оплатить</a> -->
            <button>Оплатить</button>
        </form>
        
        
       
        
        <?}?>
        
        
       


        

    </section>

    <footer>
        <div>
            
            <a href="index.html"><img src="images/logo.png " alt="Logo"></a>
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