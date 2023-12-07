<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
$a=$_GET['a'];
$b=$_GET['b'];
$c=$_GET['c'];

$c++;

echo "a=$a,b=$b";
print "<br>c=$c";
echo "<br><a href=index.php>Новая передача</a>"

?>
    
</body>
</html>