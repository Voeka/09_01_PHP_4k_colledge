<?php 
// БД подключение
require 'db.php';

session_start();
$user = $_SESSION["user"] ??[];

$posts = [];
if($query = $db->query("SELECT * FROM posts")){
    $posts = $query->fetchAll();
} else{
    print_r($db->errorInfo());
}


if(isset($_GET["logout"])){
    $_SESSION["user"] = [];
    $user = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class='links'>
            <?php if(!$user):?>
                <a href="login.php">Войти</a>
                <a href="singup.php">Зарегистрироваться</a>
            <? else:?>
                <a href="?logout">Выйти</a>
            <?php endif; ?>
        </div>
        <!-- Выводим тут данные -->
        <?php foreach($posts as $post): ?>
            <div class='post'>
                <p id='author'>Автор: <?= $post['author']?></p>
                <h2><?= $post['title'] ?></h2>
                <p id='postText'><?= $post['text'] ?></p>

            
        
        
        <div class='comments'>
            <a class='addComment' href="create.php?post=<?= $post["id"]?>">Прокоментировать</a>
            
            <?php 
                $post_comments=[];
                if($cq = $db->query("SELECT * FROM comments WHERE post_id=$post[id]")){
                    $post_comments = $cq->fetchAll();
                } else{
                    print_r($db->errorInfo());
                }

            ?>


        
  
            <?php foreach($post_comments as $comment):?>
                <div class='comment'>
                    <i><?= $comment['author']?></i>
                    <p><?= $comment['text'] ?></p>

                </div>
                <?php endforeach ?>
        </div>
    </div>
<?php endforeach ?>
    </main>
    
</body>
</html>