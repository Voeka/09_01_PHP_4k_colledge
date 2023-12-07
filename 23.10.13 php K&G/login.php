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

<button>Войти</button>

</form>

<?php 




if(!empty($_POST)){
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $query = $db->query("SELECT * FROM `users` WHERE login='$login' and password='$password'  ");

    if($query){
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($res)){
            $_SESSION['user']=$res[0];
            echo "<script>alert('Вы успешно вошли!'); location.href='index.php'</script>";
        } else{
            echo "<script>alert('Неверный логин или пароль!')</script>";
        }
    }
}




?>
    
</body>
</html>