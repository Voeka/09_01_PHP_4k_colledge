<?php 
require('db.php');

//тут будет удаление
if (isset($_GET["delete"])){
    $id = $_GET["delete"];

if($db->query("DELETE FROM tours WHERE id=$id")){
    echo "<script>
        alert('Успешно удалено!');
        location.href = 'index.php';
        </script>";
}else{
    print_r($db->errorInfo());
}
}

$data = $db->query("SELECT * FROM tours")->fetchAll(2);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="add.php">Добавить тур</a>

<div class='container'>

<?php foreach($data as $item):?>
    <div class='tour'>
    <img src="<?php echo $item['photo'];?>" width='200' alt="photo">
    <h2><?php echo $item['city'];?></h2>
    <p><?php echo $item['period'];?></p>
    <p><?php echo $item['price'];?></p>

    <a href="?delete=<?php echo $item['id'];?>">Delete</a>
    <a href="edit.php?id=<?php echo $item['id'];?>">Изменить</a>
</div>
<?php endforeach;?>
</div>

    
</body>
</html>




