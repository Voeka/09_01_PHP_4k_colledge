<?require("db.php");
$id = $_GET["id"];
$cinima = $_GET["cinima"];
$time = $_GET["time"];

$films = $db->query("SELECT * from film where id=$id")->fetchAll();


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

    <?php foreach($films as $film){?>
        
        <h1><?php print($film["name"]);?></h1>
        <p><?php print($time);?></p>
        <p><?php print($cinima);?></p>
        
        
        <form method='post'>
            <label>Место: <input type="text" name="posi" max='<?php print($film["colposition"]);?>' value='5' require></label>
            
            
            <a href="booking.php?id=<?php print($id);?>&time=<?php print($time);?>&pos=<?php print($_POST["posi"]);?>&cinima=<?php print($_GET["cinima"]);?>">Купить</a>

        <?php }?>
           <!-- <button>Купить</button> -->
        </form>
        
        
        
        
       


        

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