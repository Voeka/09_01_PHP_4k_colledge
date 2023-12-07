<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Пример 1</h1>
    <?php 
    $a =1;
    if($a<2){
        echo 'a<2';
    } elseif($a<3){
        echo'a<3';
    } elseif($a<4){
        echo 'a<4';
    }
    else{
        echo 'a>=4';
    }
    
    ?>
    <h1>P2</h1>

    <?php   
    $direction = "вперёд";
    
    
    if ($direction == "вперёд"){
        print ("счастье найдёшь");
    } else if ($direction == "направо"){
        print ("жизнь поткряешь");
    } else {
        print ("коня потеряешь");
    }
    
    ?>
    <h1>p3</h1>

    <?php
    $shop = true;

    //Одна инструкция
    if ($shop)
        echo "Иду в магазин";
    echo "Иду домой";

    //Группа инструкций
    if ($shop) {
        echo "Иду в магазин";
        echo "Покупаю хлеб";
    }
    echo "Иду домой";
    ?>
<h1>p4</h1>

<?php
$shop = "open";
//Одна инструкция
if ($shop == "open")
echo "Иду в магазин";
else
echo "Иду в киоск";
echo "Иду домой";
?>


<hr>
Введите 1-7 задание(в а)
<form method='post'>
    <p>a= <input type="number" name="a" id="a"></p>
    <p>x=<input type="number" name="x" id="x"></p>
    <p>y=<input type="number" name="y" id="y"></p>
    <input type="submit" value="">
</form>



<?php 
$a = $_POST['a'];
$x = $_POST['x'];
$y = $_POST['y'];

if($a==1){
    if($x>$y){
        echo $x*5;
    }
    else echo $y*5;
}
elseif($a==2){
    # code...
    if($x>$y){
        echo $y/10;
    }
    else echo $x/10;
}
elseif($a==3){
    # code...
    if($x*$y>=100){
        echo (2*$x**3);
    }
}
elseif($a==4){
    # code...
    if($x+$y>=20){
        echo 3*$x**3;
    }else echo $y**2;
}
elseif($a==5){
    # code...
    if($x*$y>=50){
        echo sqrt($x**2)*2;
    };
}
elseif($a==6){
    # code...
    if($x+$y>=100){
        echo sin($x)*2;
    }
}
elseif($a==7){
    # code...
    if($x>$y){
        echo $x**2;
    } else echo $y**2;
}



?>

    
</body>
</html>