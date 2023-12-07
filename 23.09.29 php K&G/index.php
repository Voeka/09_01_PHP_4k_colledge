<?php 
require('db.php');

$items = $db->query("SELECT*FROM items")->fetchAll(PDO::FETCH_ASSOC);

if(!empty($_GET)){
    if(isset($_GET["logout"])){
        unset($_SESSION["user"]);
        unset($_SESSION["cart"]);

        echo "<script>alert('Вы успешно вышли!'); location.href='index.php'</script>";

    }

    if(isset($_GET["buy"])){
        if (!isset($_SESSION["cart"])){
            unset($_SESSION["cart"]);
        }

        $_SESSION["cart"][] = $_GET["buy"];
        echo "<script>location.href='index.php'</script>";
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
    <header>
        <?php if(isset($_SESSION["user"])){ ?>
            <?php if($_SESSION["user"]['role']==1){ ?>
                <a href='admin.php'>Панель администратора</a>
            <?php }?>

            <a href='?logout=1'>Выйти</a>
        <?php } else {?>
            <a href='login.php'>Войти</a>
        <?php  } ?>

        <div class='cart'>
            В корзине
            <a href='cart.php'>
                <?php
                if(isset($_SESSION['cart'])){
                    echo count($_SESSION['cart']);
                } else{
                    echo 0;
                }
                ?>
            </a>
            товаров
    </header>

    <main>
        <h1>Наши товары</h1>

        <div class='container'>
            <?php foreach($items as $item){?>
                <div class='item'>
                    <img src="<?php $item["img"];?>" alt="<?php $tiem["name"] ?>">
                    <h2><?= $item["name"]?></h2>
                    <p><?= $item["price"]?> руб.</p>

                    <?php if(isset($_SESSION["user"])){ ?>
                        <form action="#">
                            <input type="hiden" name="buy" value="<?php $item["id"]?>">

                            <?php if(isset($_SESSION["cart"]) && in_array($item["id"], $_SESSION["cart"])){?>
                                Уже в карзине!
                            <?php } else { ?>
                                <button>Купить </button>
                            <?php }?>
                        </form>
                    <?php }?>
                </div>
            <?php }?>
        </div> 
        
    </main>

    
</body>
</html>