<?php

require("db.php");

if(!isset($_SESSION['user'])){
    echo "<script>alert('Вам сюда рано!');
    location.href='index.php'</script>";
};

$items =[];

$iduser = $_SESSION['user']['id'];






$items = $db->query('SELECT * FROM `orders`')->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">На главную</a>

    <h1>Ваши запросы</h1>
    <div>
        <?php

        foreach($items as $item){?>
            <div>
                <h3><?= $item['id'] ?></h3>
                <p><?= $item['idCAR'] ?></p>
                <p><?= $item['comment'] ?></p>
                <p><?= $item['Status'] ?></p>
            </div>
        <?php }?>

    </div>
</body>
</html>