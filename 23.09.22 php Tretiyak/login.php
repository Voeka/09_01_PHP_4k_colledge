<?php

require("db.php");

if (!empty($_POST)) {
  $email = $_POST["email"];
  $password = md5($_POST["password"]);

  $query = $db->query("SELECT id, name, role FROM users WHERE email='$email' and password='$password'");

  if ($query) {
    $user = $query->fetchAll(2);
    
    if (count($user)) {

      $_SESSION["user"] = $user[0];
      echo "<script>
        alert('Добро пожаловать');
        location.href = 'index.php';
      </script>";

    } else {
      echo "Неверный логин или пароль!";
    }
  } else {
    print_r($db->errorInfo()); 
  }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h1>Авторизация</h1>
  <form action="#" method="post">
    <label>
      Почта: <input type="text" name="email">
    </label>
    <label>
      Пароль: <input type="password" name="password">
    </label>
    <button>Войти</button>
  </form>
</body>
</html>