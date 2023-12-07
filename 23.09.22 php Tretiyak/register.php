<?php

require("db.php");

if (!empty($_POST)) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  if ($db->query("INSERT INTO users SET name='$name', 
                  email='$email',
                  password='$password'")) {

    echo "<script>
      alert('Регистрация успешна!');
      location.href='index.php';
    </script>";
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
  <title>Register</title>
</head>
<body>
  <h1>Регистрация</h1>
  <form action="#" method="post">
    <label>
      Ваше имя: 
      <input type="text" name="name" required>
    </label>
    <label>
      Почта: 
      <input type="text" name="email" required>
    </label>
    <label>
      Пароль: 
      <input type="password" name="password" required>
    </label>

    <button>Зарегистрироваться</button>
  </form>
</body>
</html>