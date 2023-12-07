<?php 
require('db.php');

if(empty($_SESSION['user'])|| $_SESSION['user']['role'] != 'admin'){
    echo "<script>alert('Вам сюда нельзя!'); location.href = 'index.php';</script>";

    exit();
}

if(!empty($_GET)){
    if(isset($_GET['role'])){
        $role = $_GET['role'];
        $id = $_GET['id'];

        if($db->query("UPDATE users set role='$role' where id='$id'")){
            if($_SESSION['user']['id']==$id){
                $_SESSION['user']['role'] = $role;
            }
            echo "<script>alert('Роль изменена!'); location.href = 'admin.php';</script>";
        } else{
            print_r($db->errorInfo());
        }

    }

    if(isset($_GET['name'])){
        $id = $_GET['id'];
        $name = $_GET['name'];
        $photo = $_GET['photo'];
        $price = $_GET['price'];
// Cтрока ниже - была ошибка в коде у преподователя, заместо cakes стоял users
        if($db->query("UPDATE cakes set name='$name', photo='$photo', price='$price' where id='$id'")){
            echo "<script>alert('Данные изменены!'); location.href = 'admin.php';</script>";
        } else{
            print_r($db->errorInfo());
        }
    }
}




$users = $db->query("SELECT * from users")->fetchAll(2);
$cakes = $db->query("SELECT * from cakes")->fetchAll(2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель админа</title>
</head>
<body>
    <header>
        <a href="index.php">На главную</a>
        <a href="index.php?logout">Выйти</a>
    </header>
    <main>
        <section class='users'>
            <?php foreach($users as $item): ?>
                <form action="#">
                    <label>
                        <input type="text" name="login" value="<?php echo $item['login']; ?>" disabled>
                    </label>
                    <label>
                        <input type="text" name="role" value="<?php echo $item['role']; ?>">
                    </label>
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">

                <button>Обновить</button>
                </form>
            <?php endforeach;?>
        </section>
        <section class='cakes'>
            <?php foreach($cakes as $cake): ?>
                <form action="#">
                    <img src="<?php echo $cake['photo']; ?>" alt="cake" width200>
                    <label>
                        <input type="text" name="name" value="<?php echo $cake['name']; ?>">
                    </label>
                    <label>
                        <input type="text" name="photo" value="<?php echo $cake['photo']; ?>">
                    </label>
                    <label>
                        <input type="number" name="price" value="<?php echo $cake['price']; ?>">
                    </label>
                    <input type="hidden" name="id" value="<?php echo $cake['id']; ?>">

                <button>Обновить</button>
                </form>
            <?php endforeach;?>
        </section>



    </main>
    
</body>
</html>