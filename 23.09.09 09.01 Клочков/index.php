<?php 
// Primer 1
$a = 5;

if($a<10){
	$skidka = 0;
} elseif (($a>=10)&&($a<=49)){
	$skidka=5;
}elseif (($a>=50)&&($a<=99)){
	$skidka=10;
}elseif ($a>=100){
	$skidka=15;
}

echo($skidka);

// Primer 2

$answer = 'yes';
if($answer =='yes') echo 'Продолжай работать!';
elseif($answer =='no') echo'Завершаем работу!';
else echo"Некоректный ввод";

// Primer3

$b = -17; 

$b = $b < 0 ? : $b;

echo $b; //17

// zadania

// z1

$x = 15;
$y = 15;

if($x*$y>100){
	echo(2*$x**2);
	echo($y/2);
}

//z2
if($x+$y>20){
	echo(3*$x**2);
	echo($y**3);
}

//z3

if($x*$y>50){
	echo(2*sqrt($x));
	echo($y**2);
}
//z4

if($x>$y){
	echo($x*2);
	echo($y/3);
}else{
	echo($y*2);
	echo($x/3);
}

//z5

$az = 55;
$bz = 30;

if($az*$bz>100){
	if($az>$bz){
		echo($az**2);
		echo($bz*2);
	}else{
		echo($bz**2);
		echo($az*2);
	}
}


?>