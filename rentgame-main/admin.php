<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>RentGame - Аренда игр по выгодным ценам | Админпанель</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="container">
        <?php include "back.php"; ?>

        <form action="" method="POST" class="adminform">
            <p class="headertext">Добавить новый товар</p>
            <div class="site">
                <div class="leftSite">
                    <div class="inputStyle">
                        <p>Название игры</p>
                        <input type="text" name="gameName" placeholder="Название игры">
                    </div>
                    <div class="inputStyle">
                        <p>Цена STEAM</p>
                        <input type="text" name="steamPrice" placeholder="Цена STEAM">
                    </div>
                    <div class="inputStyle">
                        <p>Отзывы в STEAM</p>
                        <input type="text" name="steamReview" placeholder="Отзывы в STEAM">
                    </div>
                    <div class="inputStyle">
                        <p>Достижения в STEAM</p>
                        <input type="text" name="steamAchivment" placeholder="Достижения в STEAM">
                    </div>
                    <div class="inputStyle">
                        <p>Дата релиза</p>
                        <input type="text" name="dateRelise" placeholder="Дата релиза">
                    </div>
                    <div class="inputStyle">
                        <p>Разработчик</p>
                        <input type="text" name="developer" placeholder="Разработчик">
                    </div>
                    <div class="inputStyle">
                        <p>Ссылка на игру STEAM</p>
                        <input type="text" name="steamLink" placeholder="Ссылка на игру STEAM">
                    </div>
                </div>
                <div class="rightSite">

                    <?php
                        require_once "server/connect.php";
                        $query = "SELECT * FROM `categories`";
                        mysqli_set_charset($db_server, "utf8");
                        $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                    ?>
                    <div class="inputStyle">
                        <p>Категории</p>
                        <select name="categories" id="categories">
                            <? while($row = mysqli_fetch_assoc($result)): ?>
                                <option value="<?=$row['id']?>"> <?=$row['name']?></option>
                            <? endwhile; ?>
                        </select>


                        <form action="" method="post">
                            <input type="text" name="categor" placeholder="Добавить новую категорию">
                            <input type="submit" value="SING UP" name="categorbut" class="but">
                        </form>

                        <?php

                            if(isset($_POST["categorbut"]) &&
                            isset($_POST["categor"]))
                            {
                                $categor = $_POST["categor"];
                                $query = "INSERT INTO categories VALUES" . "(NULL, '$categor')";
                                $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                                mysqli_close($db_server);
                                exit("<meta http-equiv='refresh' content='0; url= admin.php'>");
                            }

                        ?>

                    </div>

                    <script>

                        $('#categories').change(function(){
                            let val = $(this).val(); // Получаем значение селекта
                            let selectedText = $("#categories option:selected").text(); // Получаем текст выбранного элемента

                            // Проверяем, есть ли выбранный элемент и нет ли его среди существующих
                            if (val && !$('#block-wrap').find(`input[value="${val}"]`).length) {
                                let elem = `
                                    <span class="category-item">
                                        <input type="hidden" name="category[]" value="${val}">
                                        ${selectedText}
                                        <span class="remove-category" style="cursor: pointer; color: #3A35FB; padding-left: 5px; padding-right: 5px;">X</span>
                                    </span>
                                `;
                                $('#block-wrap').append(elem); // Добавляем блок в обертку
                            } else if (val) {
                                alert('Эта категория уже добавлена.');
                            }
                        });

                        // Обработчик для удаления элемента
                        $(document).on('click', '.remove-category', function(){
                            $(this).parent().remove(); // Удаляем родительский элемент (span с категорией)
                        });

                    </script>

                    <div id="block-wrap" class="category"></div>

                    <div class="inputStyle">
                        <p>Картинка товара</p>
                        <input type="text" name="imgLink" placeholder="Фото товара" >
                    </div>
                    <div class="inputStyle">
                        <p>Описание товара, напишите самое главное и выжное о товаре</p>
                        <textarea type="text" name="description" placeholder="Описание товара"></textarea>
                    </div>
                    <div class="inputStyle">
                        <p>Количество товара</p>
                        <input type="text" name="quality" placeholder="Количество товара"></input>
                    </div>
                    <div class="inputStyle">
                        <p>Цена товара</p>
                        <input type="text" name="price" placeholder="Цена товара"></input>
                    </div>
                    <div class="inputStyle">
                        <p>Что получает покупатель после оплаты</p>
                        <textarea type="text" name="msgInfo" placeholder="Письмо с данными"></textarea>
                    </div>
                    <input type="submit" value="Предпросмотр карточки товара" name="but" class="but">
                    <input type="submit" value="Создать товар" name="but" class="but">
                </div>
            

                <?php

                if(isset($_POST["but"]) &&
                isset($_POST["gameName"]) &&
                isset($_POST["steamPrice"]) &&
                isset($_POST["steamReview"]) &&
                isset($_POST["steamAchivment"]) &&
                isset($_POST["dateRelise"]) &&
                isset($_POST["developer"]) &&
                isset($_POST["steamLink"]) &&
                isset($_POST["imgLink"]) &&
                isset($_POST["description"]) &&
                isset($_POST["quality"]) &&
                isset($_POST["price"]) &&
                isset($_POST["msgInfo"]))
                {
                    $gameName = $_POST["gameName"];
                    $steamPrice = $_POST["steamPrice"];
                    $steamReview = $_POST["steamReview"];
                    $steamAchivment = $_POST["steamAchivment"];
                    $dateRelise = $_POST["dateRelise"];
                    $developer = $_POST["developer"];
                    $steamLink = $_POST["steamLink"];
                    $imgLink = $_POST["imgLink"];


                    $description = $_POST["description"];
                    $quality = $_POST["quality"];
                    $price = $_POST["price"];
                    $msgInfo = $_POST["msgInfo"];

                         



                    $query = "SELECT * FROM `products` WHERE namegame = '$gameName';";
                    $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                    if (mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                            $idGame = $row['id'];
                        }
                    }
                    else {
                        $query = "INSERT INTO products VALUES" . "(NULL, '$gameName', '$steamPrice', '$steamReview', '$steamAchivment', '$dateRelise', '$developer', '$steamLink', '$imgLink')";
                        $result = mysqli_query($db_server, query: $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                        $query = "SELECT * FROM `products` WHERE namegame = '$gameName';";
                        $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                        if (mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                            {
                                $idGame = $row['id'];
                            }
                        }
                    } 
            
                    $query = "INSERT INTO aboutproduct VALUES" . "(NULL, '$description', '$price', '$quality', '$msgInfo', '1', '$idGame', '1')";
                    $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                    $query = "SELECT * FROM `aboutproduct` WHERE specifically = '1' and game = '$idGame' and shop = '1';";
                    $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                    if (mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                            $idAbout = $row['id'];
                        }
                    }

                    
                    for($i = 0; $i < count($_POST['category']); $i++) {

                        $categorys = $_POST['category'][$i];
                        $query = "INSERT INTO categoryproduct VALUES" . "(NULL, '$idAbout', '$categorys')";
                        $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                    }  

                    mysqli_close($db_server);
                    exit("<meta http-equiv='refresh' content='0; url= admin.php'>");
                }
                ?>

            </div>
        </form>
    </div>
</body>
</html>