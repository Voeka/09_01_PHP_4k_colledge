<?php 
require('db.php');

if (!empty($_GET)) {
    $city = $_GET['city'];
    $photo = $_GET['photo']; $price = $_GET['price'];
    $period = $_GET['period'];

    if ($db-> query(
    "INSERT INTO tours
    (city, photo, price, period) VALUES 
    ('$city', '$photo', $price, '$period')")) {
    echo "<script>
        alert('Успешно добавлено!');
        location.href = 'index.php';
    </script>";
    }else{
    print_r($db->errorInfo());
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
<form action="#">
    <label>
        Город: <input type="text" name="city" require>
    </label>
    <label>
        Ссылка на фото: <input type="text" name="photo" require>
    </label>
    <label>
        Срок тура: <input type="text" name="period" require>
    </label>
    <label>
        Цена: <input type="number" name="price" require>
    </label>

    <button>Добавить</button>
</form>
    
</body>
</html>