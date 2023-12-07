<?php 
require('db.php');

if(!isset($_SESSION['user']) || $_SESSION['user']["role"]!=1){
    echo "<script>alert('Вам сюда нельзя!');location.href='index.php'</script>";
}

if(!empty($_GET)){
    if(isset($_GET["add"])){
        $name = $_GET['name'];
        $img = $_GET['img'];
        $price = $_GET['price'];


        if ($db->query("INSERT into items set name='$name', img='$img', price='$price'")){
            echo "<script>alert('Успешно добавлено!'); location.href=admin.php</script>";
        } else{
            print_r($db->errorInfo());
        }
    }
}

if(isset($_GET["delete"])){
    $id = $_GET["delete"];

    if($db->query("DELETE from items where id=$id")){
        echo "<script>alert('Успешно удалено!'); location.href='admin.php'</script>";
    }else{
        print_r($db->errorInfo());
    }
}

$orders = $db->query("SELECT *from orders");
$items = $db->query("SELECT *from items");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Панель администратора</h1>
    <section>
        <h2>Товары</h2>
            <div class='container'>
                <form action="#">
                    <label>
                        Название: <input type="text" name='name'>
                    </label>
                    <label>
                        Ссылка на фото: <input type="text" name='img'>
                    </label>
                    <label>
                        Цена: <input type="number" name='price'>
                    </label>

                    <input type="hidden" name='add'>
                    <button>Добавить</button>
                </form>

            </div>
            <hr>
            <?php foreach($items as $item) {?>
                <div class='item'>
                    <img src="<?= $item['img'];?>" alt="<?= $item['name'];?>">
                    <h2><?= $item['name'];?></h2>
                    <p><?= $item['price'];?> руб.</p>

                    <a href="?delete<?= $item['id']?>" class='button'>Удалить</a>
                </div>  
            <?php }?>  
    </section>
    <hr>
    <section>
        <h2>Заказы</h2>
                <div>
                    <?php foreach ($orders as $order){
                        $item  = [];
                        if($q = $db->query("SELECT name from items where id=$order[item_id]")){
                            $item = $q->fetchAll(PDO::FETCH_ASSOC)[0];
                        }

                        $user = [];
                        if($q = $db->query("SELECT login from items where id=$order[user_id]")){
                            $user = $q->fetchAll(PDO::FETCH_ASSOC)[0];
                        }
                    
                    ?>
                    <div class='item'>
                        <h3>Заказ N <b><?= $order['id']?></b></h3>
                        <p>Покупатель: <b><?= $user['login']?></b></p>
                        <p>Товар: <b><?= $item['name']?></b></p>
                    </div>
                    <?php } ?>
                </div>

    </section>

    
</body>
</html>