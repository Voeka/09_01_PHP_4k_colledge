<?php

require("db.php");

if (!isset($_GET["id"])){
    echo "<script>
    alert('Вы не выбрали тур!');
    location.href = 'index.php';
    </script>";    
}

$id = $_GET["id"];

$item = $db->query("SELECT * FROM tours where id=$id")->fetchAll(2)[0];

    if (isset($_GET["city"])) {
    $city = $_GET["city"];
    $photo = $_GET["photo"];
    $price = $_GET["price"];
    $period = $_GET["period"];

    if ($db->query("UPDATE tours SET city='$city', photo='$photo', price=$price, period='$period' WHERE id=$id")) {
    echo "<script>
    alert('Успешно изменено');
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
Город:
<input value="<?php echo $item['city']; ?>" type="text" name="city" required> </label>
<label>
Ссылка на фото:
<input value="<?php echo $item['photo']; ?>" type="text" name="photo" required> </label>
<label>
Срок тура:
<input value="<?php echo $item['period']; ?>" type="text" name="period" required> </label>
<label>
Цена:
<input value="<?php echo $item['price']; ?>" type="number" name="price" required> 
</label>

<input type="hidden" name="id" value="<?php echo $item['id']; ?>"> 
<button>Изменить</button>
</form>
</body>
</html>