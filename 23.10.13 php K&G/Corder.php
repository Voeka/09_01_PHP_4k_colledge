<?php 
    require('db.php');


    if(!isset($_SESSION['user'])){
        echo "<script>alert('Вам сюда рано!');
        location.href='index.php'</script>";
    };

    $user = $_SESSION['user'] ?? [];


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

<form action="#" method="post">
<label>Номер машины <input type="text" name="idCar"></label>
<label>Коментарий <input type="text" name="comment"></label>
<button>Создать запрос</button>
</form>


<?php

if(!empty($_POST)){
    $idCar = $_POST['idCar'];
    $comment = $_POST['comment'];
    $idUser = $user['id'];

    $query = $db->query("INSERT INTO `orders` 
    (`id`, `idCAR`, `idUser`, `Status`, `comment`) VALUES 
    (NULL, '$idCar', '$idUser', 'Прошёл', '$comment')");
    //  echo "<script>alert('Тут?!'); </script>";
// query
    if($query){
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        // echo "<script>alert('Прощёл!'); </script>";

        if(!empty($res)){
            echo "<script>alert('Вы успешно отправили запрос!'); location.href='Lorder.php'</script>";
        } else{
            echo "<script>alert('Что-то пошло не так! Но запрос отправлен!')</script>";

        }
        echo "<script>location.href='Lorder.php'</script>";
    }
    else{
        echo "<script>alert('Ошибка!'); </script>";
        print_r($db->errorInfo());
    }


}

// INSERT INTO `orders` (`id`, `idCAR`, `idUser`, `Status`, `comment`) VALUES (NULL, '', '', '', '')

?>
    
</body>
</html>