<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>RentGame - Аренда игр по выгодным ценам | Главная</title>
</head>
<body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            var scr = $(".slider");
            scr.mousedown(function () {
                var startX = this.scrollLeft + event.pageX;
                var startY = this.scrollTop + event.pageY;
                scr.mousemove(function () {
                    this.scrollLeft = startX - event.pageX;
                    this.scrollTop = startY - event.pageY;
                    return false;
                });
            });
            $(window).mouseup(function () {
                scr.off("mousemove");
            });
        }
    </script>

    <?php include "header.php"; ?>

    <div class="container">

        <div class="zagolovok">
            <p>Все игры</p>
            <div class="categorys">
                <button type="button" data-category="0" class="main active"></button>
                <div class="allCategoreys slider">
                    <button type="button" data-category="1" class="">Казуальные</button>
                    <button type="button" data-category="2" class="">Инди</button>
                    <button type="button" data-category="3" class="">Симуляторы</button>
                    <button type="button" data-category="1" class="">Казуальные</button>
                    <button type="button" data-category="2" class="">Инди</button>
                    <button type="button" data-category="3" class="">Симуляторы</button>
                    <button type="button" data-category="1" class="">Казуальные</button>
                    <button type="button" data-category="2" class="">Инди</button>
                    <button type="button" data-category="3" class="">Симуляторы</button>
                </div>
            </div>
            <input type="text" class="icon" value placeholder="Поиск">
        </div>

        <section class="allGame">


            <?php
                require_once "server/connect.php";
                $query = "SELECT * FROM aboutproduct AS ap INNER JOIN products AS p ON ap.game = p.id;";
                mysqli_set_charset($db_server, "utf8");
                $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $priceproduct = $row['priceproduct']; 
                        $game = $row['game']; 
                
                        echo '<article>
                                <div class="imageGame">
                                    <a href="gamepage.php?id='.$row['id'].'"><img src="' . $row['imagelink'] . '" alt="' . $row['namegame'] . '"></a>
                                </div>
                                <div class="gameInfo">
                                    <div class="widthName">
                                        <a href="gamepage.php?id='.$row['id'].'" class="gameName">' . $row['namegame'] . '</a>
                                    </div>
                                    <div class="categoryGame slider">';
                
                        // Это отдельный запрос для категорий
                        $queryCategories = "SELECT * FROM categoryproduct AS cp 
                                            INNER JOIN aboutproduct AS ap ON cp.aboutproduct_id = ap.id_about 
                                            INNER JOIN categories AS c ON cp.categories = c.id 
                                            WHERE cp.aboutproduct_id = $game;";
                        $resultCategories = mysqli_query($db_server, $queryCategories) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                
                        if(mysqli_num_rows($resultCategories) > 0) {
                            while($categoryRow = mysqli_fetch_array($resultCategories, MYSQLI_ASSOC)) {
                                // echo "Game ID: " . $game . "<br>";
                                // echo "Category ID: " . $categoryRow['categories'] . "<br>"; // Для отладки
                                echo '<span>' . $categoryRow['name'] . '</span>';
                            }
                        } else {
                            echo "Категории не найдены для Game ID: " . $game;
                        }
                        
                        echo '      </div>
                                    <div class="gamePrice">
                                        <div class="Price">
                                            <p>' . $priceproduct . '</p><p>руб</p>
                                        </div>
                                        <a href="#">Купить</a>
                                    </div>
                                </div>
                            </article>';
                    }
                } else {
                    echo "Игры не найдены.";
                }                
            ?>
            
        

        </section>

        <div class="pagination-block">
            <ul>
                <li class="paginate-navigate"><a href="#"><<</a></li>
                <li class="paginate-navigate"><a href="#"><</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="paginate-navigate"><a href="#">></a></li>
                <li class="paginate-navigate"><a href="#">>></a></li>
            </ul>
        </div>

        <section class="reviews">

            <div class="headerBlock">
                <div class="icons"></div>
                <p>Последние отзывы</p>
            </div>
            
            <div class="lastReviews">

                <div class="review">
                    <div class="background">
                        <div class="headReview">
                            <img src="image/test.jpg" alt="The Tenants">
                            <div class="infoReview">
                                <div class="gameInfo">
                                    <p class="games">The Tenants</p>
                                    <div class="gamePrice">
                                        <p>100</p>
                                        <p>руб</p>
                                    </div>
                                </div>
                                <div class="comets">
                                    <p>Типо тут отзыв человека о иг...</p>
                                </div>
                            </div>
                        </div>
                        <div class="footerReview">
                            <p>Nickname</p>
                            <div class="starReview">
                                <object type="image/svg+xml" data="image/stars.svg" width="20" height="20" class="goodStars"></object>
                                <object type="image/svg+xml" data="image/stars.svg" width="20" height="20" ></object>
                                <object type="image/svg+xml" data="image/stars.svg" width="20" height="20" ></object>
                                <object type="image/svg+xml" data="image/stars.svg" width="20" height="20" ></object>
                                <object type="image/svg+xml" data="image/stars.svg" width="20" height="20" ></object>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>

        </section>
    
    </div> 

</body>
</html>