<?php 
require("db.php");

$filmToday = $db->query("SELECT * FROM film ORDER BY id DESC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);

$cinimas = $db->query('SELECT * FROM `cinima`')->fetchAll();

if(!empty($_GET)){
    if(isset($_GET['logout'])){
        unset($_SESSION['user']);
    }

    echo('<script>alert("Вы успешно вышли!"); location.href = "index.php"</script>');
}

// print_r($_SESSION);

// print_r($filmToday)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>КиноGO</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
        <nav>
            <a href="">Поиск</a>
            <a href="">Фильмы сегодня</a>
            <a href="">Кинотеатры</a>
        </nav>


        <div>
        <?php if(!isset($_SESSION['user'])){ ?>
            <a href="login.php">Войти</a>
            <a href="regin.php">Зарегистрироваться</a>
        <?php }else{ ?>

            <a href="?logout">Выйти</a>

            <?php if($_SESSION['user']['role']=='admin'){?>
                <a href="admin.php">Админ панель</a>
            <?php }?>
        <?php }?>
        </div>
    </header>
    <!-- Поиск -->
    <section class="serch">
        <form>
            <h1>Поиск кино</h1>
            <label>
                Категория : <select name="" id="" required>
                    <option value="1">Уже в кино</option>
                    <option value="2">Скоро будет</option>
                </select>

            </label>
            <input type="date" required><br>
            <input type="submit" value="Поиск">
            
        </form>
    </section>
    <!-- Слайдер -->
    <section class="slider_here">
        <button class="left">⬅︎</button>
        <button class="right">➡︎</button>
        <!-- Сдесь слайдер, а пока дальше пошёл -->


    </section>
    <!-- Фильмы сегодня -->
    <section class="today">
    <?php foreach($filmToday as $film){?>
        <div>
            <img class='todayimg' src='<?php print($film["img"]); ?>' alt='<?php print($film["id"]); ?>'>
            <h1><?php print($film["name"]); ?></h1>
            <p><b><?php print($film["rating"]); ?>/10✩</b></p>
            <a href="movie.php?id=<?php print($film["id"]); ?>"><button>Подробнее</button></a>
            <!-- <p><?print($film["price"]) ;?></p> -->

        </div>

    <?php }?>

        <!-- <div>
            <img src="images/posters/bond.jpeg" alt="Bond">
            <h1>Не время умирать</h1>
            <p><b>4/5✩</b></p>
            <a href="movie.html"><button>Подробнее</button></a>
        </div>
        <div>
            <img src="images/posters/bond.jpeg" alt="Bond">
            <h1>Не время умирать</h1>
            <p><b>4/5✩</b></p>
            <a href="movie.html"><button>Подробнее</button></a>
        </div>
        <div>
            <img src="images/posters/bond.jpeg" alt="Bond">
            <h1>Не время умирать</h1>
            <p><b>4/5✩</b></p>
            <a href="movie.html"><button>Подробнее</button></a>
            
        </div> -->

    </section>
    <section class="getSpam">
        <h1>Подписа на рассылку</h1>
        <form>
            <input type="email" required>
            <input type="submit" value="Подписаться">
        </form>
    </section>
    <!-- o	Блок с доступными кинотеатрами  -->
    <section class="cinima">
        <? foreach($cinimas as $cinima){ ?>
            <div>
                <img src='<?php print($cinima["image"]); ?>' alt=" <?php print($cinima["name"]); ?>">
                <h1><?php print($cinima["name"]); ?></h1>
            </div>

        <?php }?>

        <!-- <div>
            <img src="images/cinemas/1.jpeg" alt="1">
            <h1>Фауна</h1>
        </div>
        <div>
            <img src="images/cinemas/2.jpeg" alt="1">
            <h1>Фауна</h1>
        </div>
        <div>
            <img src="images/cinemas/3.jpeg" alt="1">
            <h1>Фауна</h1>
        </div> -->

    </section>

    <footer>
        <div>
            
            <a href="index.php"><img src="images/logo.png " alt="Logo"></a>
            <nav>
                <a href="">Поиск</a>
            <a href="">Фильмы сегодня</a>
            <a href="">Кинотеатры</a>
            </nav>
        
        </div>
        <p>Все права защищены™</p>
    </footer>
<!-- SCRIPT -->
    <script src="scripts/jquery-3.7.1.min.js"></script>
    <script>
        var img = 1
        
        $('.left').click(function(){
            clearInterval(slider);
            clearTimeout(sliderrestart);
            var sliderrestart = setTimeout(function(){
                var slider =  setInterval(function(){
            img++;
            if(img>=4){
            img=1;
            }
        if(img<=0){
            img=4
        }
            if(img==1){
                $('.slider_here').css('background-image', 'url(' + "images/slides/1.jpeg" + ')');
            }
            if(img==2){
                $('.slider_here').css('background-image', 'url(' + "images/slides/2.jpeg" + ')');
            }
            if(img==3){
                $('.slider_here').css('background-image', 'url(' + "images/slides/3.jpeg" + ')');
            }

           
            
        },5000)

            },10000)
            img--;
            console.log(img);
            if(img>=4){
            img=1;
            }
        if(img<=0){
            img=3
        }
            if(img==1){
                $('.slider_here').css('background-image', 'url(' + "images/slides/1.jpeg" + ')');
            }
            if(img==2){
                $('.slider_here').css('background-image', 'url(' + "images/slides/2.jpeg" + ')');
            }
            if(img==3){
                $('.slider_here').css('background-image', 'url(' + "images/slides/3.jpeg" + ')');
            }
        })
        $('.right').click(function(){
            clearInterval(slider);
            clearTimeout(sliderrestart);
            var sliderrestart = setTimeout(function(){
                var slider =  setInterval(function(){
            img++;
            if(img>=4){
            img=1;
            }
        if(img<=0){
            img=4
        }
            if(img==1){
                $('.slider_here').css('background-image', 'url(' + "images/slides/1.jpeg" + ')');
            }
            if(img==2){
                $('.slider_here').css('background-image', 'url(' + "images/slides/2.jpeg" + ')');
            }
            if(img==3){
                $('.slider_here').css('background-image', 'url(' + "images/slides/3.jpeg" + ')');
            }

           
            
        },5000)

            },10000)
            img++;
            console.log(img);
            if(img>=4){
            img=1;
            }
        if(img<=0){
            img=4
        }
            if(img==1){
                $('.slider_here').css('background-image', 'url(' + "images/slides/1.jpeg" + ')');
            }
            if(img==2){
                $('.slider_here').css('background-image', 'url(' + "images/slides/2.jpeg" + ')');
            }
            if(img==3){
                $('.slider_here').css('background-image', 'url(' + "images/slides/3.jpeg" + ')');
            }
        })

    var slider =  setInterval(function(){
            img++;
            if(img>=4){
            img=1;
            }
        if(img<=0){
            img=4
        }
            if(img==1){
                $('.slider_here').css('background-image', 'url(' + "images/slides/1.jpeg" + ')');
            }
            if(img==2){
                $('.slider_here').css('background-image', 'url(' + "images/slides/2.jpeg" + ')');
            }
            if(img==3){
                $('.slider_here').css('background-image', 'url(' + "images/slides/3.jpeg" + ')');
            }

           
            
        },5000)

    slider;
        
    

    </script>

    <script>

    </script>
</body>
</html>