<?php 
require('db.php');

if($_SESSION['user']['role']!='admin'){
    echo('
    <script>alert(`Вам сюда нельзя!`); window.location.href=`index.php`</script>
    ');
};


if(!empty($_POST)){
    if($_POST['realy']){
        
        print_r($_POST);
        $db->query("UPDATE `film` SET `genre` = '$_POST[genre]', 
        `img` = '$_POST[img]',
        `date`='$_POST[date]'
        ,`time`='$_POST[time]'
        ,`colposition`='$_POST[colposition]'
        ,`rating`='$_POST[rating]'
        ,`info`='$_POST[info]'
        ,`author`='$_POST[author]'
        ,`actors`='$_POST[actors]'
        ,`genre`='$_POST[genre]'
        ,`price`='$_POST[price]'
        ,`formD`='$_POST[formD]' 
        
        WHERE `film`.`id` = $_POST[id]");


        echo('
        <script>location.href=`admin.php`.</script>
        ');
        
    };

    // INSERT INTO `film` (`id`, `name`, `date`, `time`, `colposition`, `rating`, `info`, `author`, `actors`, `genre`, `img`, `price`, `formD`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '', '')

    if($_POST['realyuser']){
        print_r($_POST);

        $db->query("UPDATE `users` SET `login` = '$_POST[login]', `name` = '$_POST[name] ', `role` = '$_POST[role]' WHERE `users`.`id` = $_POST[id]
        
        ");
        echo("
        <script>location.href='admin.php'</script>
        ");

    };

    if($_POST['realynew']){
        print_r($_POST);

        $db->query("
        INSERT INTO `film` 
        (`id`, `name`, `date`, `time`, `colposition`, `rating`, `info`, `author`, `actors`, `genre`, `img`, `price`, `formD`) 
        VALUES 
        (NULL, '$_POST[name]', '$_POST[date]', '$_POST[time]', '$_POST[colposition]', '$_POST[rating]', '$_POST[info]', '$_POST[author]', '$_POST[actors]', '$_POST[genre]', '$_POST[img]', '$_POST[price]', '$_POST[formD]')
        ");
        echo("
        <script>location.href='admin.php'</script>
        ");
    };

    if($_POST['realydelete1'] and $_POST['realydelete2']){
        $db->query("
        DELETE FROM `film` WHERE `film`.`id` = '$_POST[id]'
        ");
    }
    
};


$films = $db->query('SELECT * FROM `film`');

$users = $db->query('SELECT * FROM `users`');

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
            
            <a href="index.php">Обратно к юзерам</a>
        </div>
    </header>
    <!-- Поиск -->
    <section class="content">
        <h1>Админ панель</h1>
        <div>
            <h2>Фильмы</h2>
            <hr>
            <?php foreach($films as $film){?>
                <div class='filmshere'>
                    <p><?php print($film['name'])?></p>
                    <form method="post">
                        <input type="hidden" name="id" value='<?php print($film['id']) ?>'>

                        <input type="date" name="date" id="" value='<?php print($film['date'])?>'>

                        <input type="time" name="time" id="" value='<?php print($film['time'])?>'>\

                        <input type="number" name="colposition" id="" value='<?php print($film['colposition']) ?>'>

                        <input type="number" name="rating" id="" value='<?php print($film['rating']) ?>'>
                        
                        <input type="text" name="info" id="" value='<?php print($film['info'])?>'>

                        <input type="text" name="author" id="" value='<?php print($film['author'])?>'>

                        <input type="text" name="actors" id="" value='<?php print($film['actors'])?>'>

                        <input type="text" name="genre" id="" value='<?php print($film['genre'])?>'>

                        <input type="number" name="price" id="" value='<?php print($film['price'])?>'>

                        <input type="text" name="formD" id="" value='<?php print($film['formD'])?>'>

                        <img class='imgfilm' src="<?php print($film['img'])?>" alt="img">

                        <input type="text" name="img" id="" value='<?php print($film['img'])?>'>

                        <input type="checkbox" name="realy" id="">

                        <input type="submit" value="Изменить">

                    </form>
                </div>
                <form method="post">
                    <b>Удаление</b>
                    <input type="hidden" name="id" value="<?php print($film['id']) ?>">
                    <input type="checkbox" name="realydelete1" id="">
                    <input type="checkbox" name="realydelete2" id="">
                    <input type="submit" value="Удалить">
                </form>
            <?php } ?>
        </div>

        <hr>
        <h2>Добавить Фильм</h2>
        <form method="post">
            <input type="text" required name="name" id="" placeholder='name'>
            <input type="date" required name="date" id="" placeholder='date'>
            <input type="time" required name="time" id="" placeholder='time'>
            <input type="number" required name="colposition" id="" placeholder='colposition'>
            <input type="number" required name="rating" id="" placeholder='rating'>
            <input type="text" required name="info" id="" placeholder='info'>
            <input type="text" required name="author" id="" placeholder='author'>
            <input type="text" required name="actors" id="" placeholder='actors'>
            <input type="text" required name="genre" id="" placeholder='genre'>
            <input type="text" name="img" id="" placeholder='img'>

            <input type="number" required name="price" id="" placeholder='price'>
            <input type="text" required name="formD" id="" placeholder='formD'>
            <input type="checkbox" name="realynew" required id="">
            <input type="submit" value="Добавить фильм">

        </form>
        
    </section>
    <hr>
    <section class='content'>
        <h2>Пользователи</h2>
        <hr>
        <?php foreach($users as $user){?>
                <div class='userhere'>
                    
                    <form method="post">
                        <input type="hidden" name="id" value='<?php print($user['id']) ?>'>
                        
                        <input type="text" name="login" id="" value='<?php print($user['login'])?>'>

                        <input type="text" name="name" id="" value='<?php print($user['name'])?>'>

                        <input type="text" name="role" id="" value='<?php print($user['role'])?>'>

                        <input type="checkbox" name="realyuser" id="">

                        <input type="submit" value="Изменить">

                    </form>
                </div>
            <?php } ?>
    </section>


    <br><br>
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