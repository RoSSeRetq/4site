<?php 

    require_once "server/connect.php";
    $id = $_GET["id"];
    
    $query = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($db_server, $query);
    $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>RentGame - Аренда игр по выгодным ценам | Купить игру <?= $row['namegame']?></title>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="container">
        <?php include "back.php"; ?>

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


        <section class="gamePage">

            <div class="leftSite">
                <div class="imageGame">
                    <img src="<?= $row['imagelink']?>" alt="<?= $row['namegame']?>">
                </div>
                <div class="buyButton">
                    <a href="#">Купить</a>
                </div>
            </div>
            <div class="rightSite">
                <div class="headerInfo">
                    <div class="game">
                        <p><?= $row['namegame']?></p>
                        <a href="<?= $row['steamlink']?>"></a>
                    </div>
                    <?php   
                    
                        $query = "SELECT * FROM aboutproduct WHERE id_about = '$id'";
                        mysqli_set_charset($db_server, "utf8");
                        $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                        
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
                                echo '<span>' .$row['priceproduct']. ' руб</span>';
                            }
                        }
                       

                    ?>    
                </div>
                <div class="category slider">
                    <?php   
                    
                        require_once "server/connect.php";
                        $id = $_GET["id"];
    
                        $query = "SELECT * FROM products WHERE id = '$id'";
                        $result = mysqli_query($db_server, $query);
                        $row = mysqli_fetch_assoc($result);

                        // Это отдельный запрос для категорий
                        $queryCategories = "SELECT * FROM categoryproduct AS cp 
                        INNER JOIN aboutproduct AS ap ON cp.aboutproduct_id = ap.id_about 
                        INNER JOIN categories AS c ON cp.categories = c.id 
                        WHERE cp.aboutproduct_id = $id;";
                        $resultCategories = mysqli_query($db_server, $queryCategories) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                        if(mysqli_num_rows($resultCategories) > 0) {
                            while($categoryRow = mysqli_fetch_array($resultCategories, MYSQLI_ASSOC)) {
                                // echo "Game ID: " . $game . "<br>";
                                // echo "Category ID: " . $categoryRow['categories'] . "<br>"; // Для отладки
                                echo '<span>' . $categoryRow['name'] . '</span>';
                            }
                        } else {
                            echo "Категории не найдены для Game ID: " . $id;
                        }

                    ?>                 
                </div>
                <div class="gameDescription">
                    <p>Цена в Steam: <?= $row['steamprice']?> руб.</p>
                    <div class="steamSmall">
                        <p class="steamInfo">Отзывы в Steam: <span><?= $row['reviewssteam']?></span></p>
                        <p class="steamInfo ups">Достижений в Steam: <span><?= $row['achievements']?></span></p>
                    </div>
                </div>
                <div class="footerInfo">
                    <p>Дата выхода: <?= $row['releasedate']?></p>
                    <p>Разработчик: <?= $row['developer']?></p>
                </div>
            </div>

        </section>

        <section class="reviews">

            <div class="headerBlock">
                <div class="icons"></div>
                <p>Последние отзывы на <?= $row['namegame']?></p>
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