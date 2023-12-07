<?php
require("db.php");
// if (!isset($_GET["id"])){
//     echo "<script>
//     alert('Вы не выбрали фильм!');
//     location.href = 'index.php';
//     </script>";    
// }
   

$id = $_GET["id"];
$_SESSION["idfilm"]=$id;

$films = $db->query("SELECT * from film where id=$id");


// print_r($_SESSION['idfilm']);

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
        <?php foreach($films as $film){?>
        <img class='todayimg' src='<?php print($film["img"]);?>' alt='<?php print($film["name"]);?>'>
        <h1><?php print($film["name"]);?></h1>
        <h2><?php print($film["genre"]);?></h2>
        <p><?php print($film["author"]);?></p>
        <p><?php print($film["actors"]);?>
            
        </p>

        <!-- rating -->
        <p>Рейтинг: <?php print($film["rating"]);?>/10✩</p>
        <?php if(isset($_SESSION['user'])){?>
        <form method='post'>
            <!-- <input type="text" name="cinima" id="" value='Фауна'> -->
            
            <select name="cinima" id="">
                <option value="Фауна">Фауна</option>
                <option value="Big">Big</option>
            </select>
            <input type="text" name="formD" id="" value='<?php print($film["formD"]);?>'>

            <input type="date" name="date">
            
            <input type="time" name="time" id="" value='<?php print($film["time"]);?>'>
            
            <input type="text" name="" id="" value='<?php print($film["price"]);?>Р' disabled><br>
            <!-- <a href="seat.php">Купить</a> -->
            
            <button>Купить</button>
        </form>

        <?php }?>
        
        
        
        
       <? }

       if(!empty($_POST)){
        $_SESSION['formD']=$_POST["formD"];
        $_SESSION['time']=$_POST["time"]; 
        $_SESSION['cinima']=$_POST['cinima'];
        $_SESSION['date']=$_POST['date'];
        
        echo("<script>location.href='seat.php'</script>");
        
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

    <script src="scripts/jquery-3.7.1.min.js"></script>
    <script>
        

    </script>
</body>
</html>