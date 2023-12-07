<?php 
require('db.php');

$id=$_SESSION['id'];

// print_r($_SESSION);


$films = $db->query("SELECT * from film where id=$id");

if(!empty($_GET)){
    $food = $_GET['food'];
    // $id = 1;
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
        
        <h1>Ваше бронирование</h1>
        <p><?php print($film['name']);?></p>
        <p><?php print($_SESSION['time']);?></p>
        <p><?php print($_SESSION['cinima']);?></p>
        <p><?php print($_SESSION['posi']);?></p>
        
        <p><?php print($film["price"]);?></p>
        <form method='post'>
            <label>Допокупить еду<select name="food" id="">
                <option value="Нет">Нет</option>
                <option value="Комбо"Напиток+попкорн">Комбо"Напиток+попкорн"</option>
                <option value="Начос">Начос</option>
                <option value="Только попкорн">Только попкорн</option>
                
            </select></label><br>
            <!-- <a href="ticket.php">Оплатить</a> -->
            <button>Оплатить</button>
            <?php 
                
                if(!empty($_POST)){
                    $_SESSION['food'] = $_POST['food'];
                    $idfilm = $_SESSION['idfilm'];
                    $iduser =$_SESSION['user']['id'];
                    $time = $_SESSION['time'];
                    $cinima = $_SESSION['cinima'];
                    $pos = $_SESSION['posi'];
                    $date = $_SESSION['date'];


                    $query = $db->query("INSERT INTO `ticket` 
                    (`id`, `idUser`, `film`, `time`, `date`, `cinima`, `selectedpos`, `colhuman`) VALUES 
                    (NULL, '$iduser', '$idfilm', '$time', '$date', ' $cinima', '$pos', '1')");

                    if($query){
                        echo('<script>alert("Вы успешно оформили билет!")</script>');
                        echo("<script>location.href='ticket.php'</script>");
                    }else{
                        echo "<script>alert('У вас ошибка!')</script>";
                        print_r($db->errorInfo());
                    }
                    
                    
                    

                    
                    
                }
        
        ?>
        </form>
        
        
       
        
        
        
        
       


        

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