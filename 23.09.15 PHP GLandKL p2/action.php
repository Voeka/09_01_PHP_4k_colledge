<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Здравствуйте, <?php
    //ppr65
    echo $_POST['name'];

    ?>.
    Вам <?php echo $_POST['age'];?>лет.
    Пароль <?php echo $_POST['password'];?>.
    
</body>
</html>