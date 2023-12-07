<?php

require('db.php');

if(!empty($_GET)){
    if(isset($_GET['logout'])){
        $_SESSION['user']= [];

        echo "<script>alert('До встречи!');
         location.href = 'index.php';</script>";
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        if($db->query("DELETE from cakes where id='$id'")){
            echo "<script>alert('Успешно удалено!'); location.href = 'index.php';</script>";
        } else{
            print_r($db->errorInfo());
        }
    }
}



$cakes = $db->query("SELECT * from cakes")->fetchAll(2);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Торты</title>
</head>
<body>
    <header>
        <?php if(empty($_SESSION['user'])):?>
            <a href="login.php">Войти</a>
            <a href="register.php">Зарегистрироватся</a>
        <?php else: ?>
            <a href="?logout">Выйти</a>
        <?php endif;?>
    </header>
    <main>
        <?php 
        if(!empty($_SESSION['user'])&& $_SESSION['user']['role'] == 'admin'): ?>
        <a href="add.php">Добавить торт</a>
        <?php endif;  ?>

        <div class='container'>
            <?php foreach($cakes as $cake): ?>
                <div class='cake'>
                    <img width='200' src="<?php echo $cake['photo']?>" alt='cake'>
                    <h2><?php  echo $cake['name']?></h2>
                    <p><?php echo $cake['price'] ?> руб.</p>

                    <?php if (!empty($_SESSION['user'])&& $_SESSION['user']['role']== 'admin'): ?>
                        <a href="?delete<?php echo $cake['id'];?>">Удалить</a>
                    <?php endif;?>
                </div>
            <?php endforeach;?>
        </div>
    </main>
    
</body>
</html>