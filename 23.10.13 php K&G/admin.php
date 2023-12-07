<?php
require('db.php');

if(!isset($_SESSION['user'])){
    if($_SESSION['user']['rule']!="admin"){
        echo "<script>alert('Вам сюда нельзя!');location.href='index.php'</script>";
    }
    
}


$items =[];

$items = $db->query('SELECT * FROM `orders`')->fetchAll(PDO::FETCH_ASSOC);


// 

// print_r($items);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Админ панель</h1>
    <a href="index.php">На главную</a>
<!-- Все запросы -->
    <div>
        <?php foreach($items as $item){ ?>
            <div>
            <form method="post">
                <h3><?= $item['id'] ?></h3>
                <p><?= $item['idCAR'] ?></p>
                <p><?= $item['comment'] ?></p>
                <input type="hidden" name="id" value='<?= $item['id'] ?>'>
                
                    <input type="text" name="Status" value='<?= $item['Status'] ?>'><br>
                    <button>Изменить</button>
             </form>

                <?php 

if(!empty($_POST)){
    
        
        $id = $_POST['id'];
        $statuss = $_POST['Status'];
        if(isset($statuss)){
        
            
    
            $query = $db->query("UPDATE `orders` SET `Status`='$statuss'WHERE `id`= $id;");
            if($query){
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
            
                if(!empty($res)){
                    echo "<script>alert('Вы успешно отправили запрос!'); location.href='admin.php'</script>";
                } else{
                    echo "<script>alert('Что-то пошло не так! Но запрос отправлен!'); location.href='admin.php'</script>";
                    
        
                }
            }
            else{
                echo "<script>alert('Ошибка!'); </script>";
                print_r($db->errorInfo());
            }
        }
    
    
}
                
                    


                    

                ?>


                <!-- <p></p> -->

            </div>
        <?php }?>
    </div>
    
</body>
</html>