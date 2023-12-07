<?php
require('db.php');

if(!isset($_SESSION["user"])){
   echo "<script>alert('Пожалуйста, автаризуйтесь!'); location.href='login.php'; </script>";
}

$cart = [];

foreach ($_SESSION["cart"] as $id){
    $info = $db->query("SELECT * from items where id=$id")->fetchAll(PDO::FETCH_ASSOC);
    $cart[] = $info[0];
}

if(!empty($_GET)){
    if(isset($_GET["remove"])){
        $_SESSION["cart"] = array_filter($_SESSION["cart"],function($el){
            return $el !== $_GET["remove"];
        });
    }

    if(isset($_GET["buy"])){
        $user_id = $_SESSION["user"]["id"];

        foreach ($_SESSION["cart"] as $id){
            $db->query("INSERT into orders set user_id=$user_id, itme_id=$id");
        }

        unset($_SESSION["cart"]);
        echo "<script>alert('Вы успешно купили! Администратор обработает ваш заказ'); location.href='index.php'</script>";
    }




}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Корзина</h1>
        <h3>Вы выбрали следующие товары:</h3><br>
        <div class='container'>
            <?php foreach ($cart as $item) { ?>
                <div class='item'>
                    <form action='#'>
                        <h2><?= $item['name']?></h2>
                        <p>Цена: <? $item["price"]?></p>
                        <input type='hidden' name='remove' value="<?= $item['id']?>">
                        <button> удалить из корзины</button>
                    </form>
                </div>
            <?php }?>
        </div>

        <form action=''>
                <input type='hidden' name='buy'>
                <button>Купить!</button>


            </form>





    </main>

    
</body>
</html>