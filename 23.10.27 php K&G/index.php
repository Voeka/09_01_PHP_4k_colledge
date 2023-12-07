<?php 
require("db.php")


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
        <a href="index.html"><img src="images/logo.png" alt="Logo"></a>
        <nav>
            <a href="">Поиск</a>
            <a href="">Фильмы сегодня</a>
            <a href="">Кинотеатры</a>
        </nav>


        <div>
            <a href="">Войти</a>
            <a href="">Зарегистрироваться</a>

            <a href="">Выйти</a>

            <a href="">Админ панель</a>
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
        </div>
        <div>
            <img src="images/posters/bond.jpeg" alt="Bond">
            <h1>Не время умирать</h1>
            <p><b>4/5✩</b></p>
            <a href="movie.html"><button>Подробнее</button></a>
            
        </div>

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
        <div>
            <img src="images/cinemas/1.jpeg" alt="1">
            <h1>Фауна</h1>
        </div>
        <div>
            <img src="images/cinemas/1.jpeg" alt="1">
            <h1>Фауна</h1>
        </div>
        <div>
            <img src="images/cinemas/1.jpeg" alt="1">
            <h1>Фауна</h1>
        </div>

    </section>

    <footer>
        <div>
            
            <a href="index.html"><img src="images/logo.png " alt="Logo"></a>
            <nav>
                <a href="">Поиск</a>
            <a href="">Фильмы сегодня</a>
            <a href="">Кинотеатры</a>
            </nav>
        
        </div>
        <p>Все права защищены™</p>
    </footer>

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
</body>
</html>