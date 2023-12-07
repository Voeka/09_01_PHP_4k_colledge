<?php

require("db.php");

if (!isset($_SESSION["user"])) {
  echo "<script>
      alert('Вам сюда нельзя!');
      location.href = 'index.php';
    </script>";
}

if (!empty($_POST)) {
  $title = $_POST["title"];
  $text = $_POST["text"];
  $id = $_SESSION["user"]["id"];

  if ($db->query("INSERT INTO posts VALUES (null, $id, '$title', '$text')")) {
    echo "<script>
      alert('Успешно добавлено!');
      location.href = 'index.php';
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
  <title>Добавление</title>
</head>
<body>
  <h1>Добавление поста</h1>
  <form action="#" method="post">
    <label>
      Название поста: <input type="text" name="title">
    </label>
    <label>
      Текст поста:
      <textarea name="text"></textarea>
    </label>

    <button>Добавить!</button>
  </form>
</body>
</html>