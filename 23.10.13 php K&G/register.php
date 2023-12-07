<?php
require('db.php');




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action='#' method="post">
<label>Login <input type="text" name="login"></label>
<label>Password <input type="text" name="password"></label>
<label>Имя <input type="text" name="Name"></label>
<label>Фамилия <input type="text" name="LName"></label>
<label>Отчество <input type="text" name="SName"></label>
<label>Телефон <input type="text" name="tel"></label>
<label>ДатаРождения <input type="text" name="DateB"></label>

<button>Создать аккаунт</button>

</form>

<?php 



if(!empty($_POST)){
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $Name = $_POST['Name'];
    $LName = $_POST['LName'];
    $SName = $_POST['SName'];
    $tel = $_POST['tel'];
    $DateB = $_POST['DateB'];
    $query = $db->query("INSERT INTO users 
    (`id`, `login`, `password`, `Name`, `SName`, `LName`, `number`, `DateB`, `rule`) VALUES 
    (NULL, '$login', '$password', '$Name', '$SName', '$LName', '$tel', '$DateB', 'user')");
    
    if($query){
        echo "<script>alert('Аккаунт создан! Можно авторизоваться'); location.href = 'login.php'</script>";
    }{
        echo "<script>alert('У вас ошибка!')</script>";
                    print_r($db->errorInfo());
    }
}




?>
    
</body>
</html>