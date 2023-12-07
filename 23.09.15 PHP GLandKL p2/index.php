<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="action.php" method="post">
        <label>Ваше имя: <input type="text" name="name"></label>
        <label>Ваш возраст: <input type="text" name="age"></label>
        <label>Пароль: <input type="text" name="password"></label>
        <input type='submit' value='Жмяк'>
    </form>
<hr>
PRIM2
    <form action="action2.php" method="get">
        <label>A: <input type="number" name="a"></label>
        <label>B: <input type="number" name="b"></label>
        <label>C: <input type="number" name="c"></label>
        <input type='submit' value='Жмяк'>
    </form>

    <hr>
    PRIM3
    <form action="multi.php" method="post">
        <input type="text" name="first" size='4' maxlength='4'>
        <input type="text" name="second" size='4' maxlength='4'>
        <input type="submit" value="Умножить">

    </form>

    <hr>
    Prim4
    <name>
<form action="array.php" method="post"> Имя: <input type="text" name="user[name]"><br>
E-mail: <input type="text" name="user[e-mail]"><br> Хобби: <br>
<select multiple name="hobbi[]">
<option value="книги">Книги
<option value="компьютер">Компьютер
<option value="музыка">Музыка
<option value="спорт">Спорт
</select>
<input type="submit" value="Отправить">
</form>
<name>

    
</body>
</html>