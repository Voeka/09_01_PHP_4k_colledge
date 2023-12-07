<?php

require("db.php");

$posts = $db->query("SELECT * FROM posts")->fetchAll(2);

if (isset($_GET["logout"])) {
  unset($_SESSION["user"]);
}

if (isset($_GET["delete"])) {
  $id = $_GET["delete"];
  if ($db->query("DELETE FROM posts WHERE id=$id")) {
    echo "<script>
      alert('Успешно удалено!');
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
  <title>Blog</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <?php
    if (isset($_SESSION["user"])) { ?>
          <h1>Доброе утро, <?= $_SESSION["user"]["name"]?></h1>
          <div>
            <a href="?logout=1">Выйти</a>
          </div>
    <?php } else { ?>
        <div>
          <a href="login.php">Войти</a>
          <a href="register.php">Создать аккаунт</a>
        </div>
    <?php } ?>
  </header>
  <main>
    
    <?php if (isset($_SESSION["user"])) { ?>
      <a href="add.php">Добавить пост</a>
    <?php } ?>

    <?php foreach($posts as $post): ?>
      <?php
        $author = $db->query("SELECT name FROM users
                        WHERE id=$post[author_id]");
        $author = $author->fetchAll(2)[0];
        
      ?>
      <div class="post">
        <h2><?= $post["title"]; ?></h2>
        <p>Автор: <?= $author['name'] ?></p>
        <p><?= $post["text"] ?></p>

        <?php
          if (isset($_SESSION["user"])) {
            if ($_SESSION["user"]["role"] == 1 ||
            $_SESSION["user"]["id"] == $post["author_id"]) {
              ?>
              <a href="?delete=<?= $post['id']; ?>">Удалить</a>
              <?php
            }
          }
        ?>
      </div>
    <?php endforeach; ?>

  </main>
</body>
</html>