 <?php 
 
 require('db.php');

 if(empty($_SESSION['user'])|| $_SESSION['user']['role'] != 'admin'){
    echo "<script>alert('Вам сюда нельзя!'); location.href = 'index.php';</script>";

    exit();
 }


 if(!empty($_GET)){
    $name = $_GET['name'];
    $photo = $_GET['photo'];
    $price = $_GET['price'];

    if($db->query("INSERT into cakes (name, photo, price) values('$name', '$photo', '$price')")){
        echo "<script>alert('Успешно добавлено!'); location.href = 'index.php';</script>";
    } else{
        print_r($db->errorInfo());
    }
 }
 
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление торта</title>
 </head>
 <body>
    <form action="#">
        <label>Название <input type="text" name="name"></label>
        <label>Сслыка на фото <input type="text" name="photo"></label>
        <label>Цена <input type="number" name="price"></label>

        <button>Добавить</button>
    </form>
    
 </body>
 </html>