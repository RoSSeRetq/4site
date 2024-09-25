<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПСБ-Строй | Запросить звонок</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.css">
    <link rel="icon" href="favicon.ico">
</head>
<body>
    <header>
        <div class="header-content">
            <div class="container">
                <div class="header-up">
                    <a href="index.php"><div class="logotype"></div></a>
                    <p>+7 (967) 555-42-56</p>
                </div>

                    <form class="form" method="post" action="">
                        <div class="form__item">
                            <p>Ваше имя</p>
                            <input class="form__input" type="text" name="name" placeholder="Ваше имя" required>

                        </div>
                        <div class="form__item">
                            <p>Номер телефона</p>
                            <input class="mask-phone form__input" type="text" name="phone" placeholder="Номер телефона" required>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
                        <script>
                            $(document).ready(function(){
                                $('.mask-phone').inputmask({
                                    mask: "+7 (999) 999-99-99",
                                    clearIncomplete: true,
                                    showMaskOnFocus: true,
                                    showMaskOnHover: false
                                });
                            });
                        </script>
                        <div class="form__item">
                            <p>Что требуется?</p>
                            <input class="form__input" type="text" name="requirement" placeholder="Ремонт, запросить прайс лист...">
                        </div>
                        <input class="form__input btn" type="submit" value="Отправить">
                        <input type="hidden" name="act" value="order">
                    </form>

                    <?php

                        if(isset($_POST['act']) &&
                        isset($_POST["name"]) &&
                        isset($_POST["phone"]))
                        {
                            $name = htmlentities(strip_tags($_POST['name']));
                            $phone = $_POST['phone'];
                            $requirement = $_POST['requirement'];
                            $now = date("d.m.Y H:i:s");
                            require_once "config/connect.php";
                            // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());


                            $query = "SELECT * FROM `blacklist` WHERE phone = '$phone';";
                            $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                            if (mysqli_num_rows($result) > 0)
                            {
                                $query = "INSERT INTO `request`(`id`, `name`, `phone`, `time`, `problem`, `status`) VALUES (NULL,'$name','$phone','$now','$requirement','Отклонено')";
                                $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                                mysqli_close($db_server);
                            }
                            else
                            {
                                $query = "INSERT INTO `request`(`id`, `name`, `phone`, `time`, `problem`, `status`) VALUES (NULL,'$name','$phone','$now','$requirement','Новая')";
                                $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                                $token = "7476588927:AAHyxRbCUaFitN89a5-XTCFGp-Xs8AbMpV4";
                                $chat_id = "-4214359677";
                                $txt = urlencode("<b>Новая заявка</b> (обратный звонок + требование) \n\n<b>Имя:</b> $name \n<b>Телефон:</b>  $phone \n<b>Требуется:</b> $requirement \n\n<b>Дата и время:</b> $now по МСК");
                                $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}";
                                $sendToTelegram = fopen($url,"r");
                                mysqli_close($db_server);
                            }
                        }

                    ?>
            </div>
        </div>
    </header>

    <main>

        <?php 
            if ($_POST)
            {
                echo '                                <div class="alert" id="message">
                <h3>Вы подали заявку</h3>
                <p>Наши операторы свяжуться с вами в ближайшее время!</p>
            </div>';
            }
        ?>
        <script>
            setTimeout(function(){
                document.getElementById('message').style.display = 'none';
            }, 5000);
        </script>

        <div class="container">
            <section class="contact">
                <h2>Контакты</h2>
                <div class="contact-block">
                    <div class="leftsaid">
                        <div class="block-contact">
                            <p class="name-contact">Телефон:</p>
                            <p class="contacts">+7 (967) 555-42-56</p>
                        </div>
                        <div class="block-contact">
                            <p class="name-contact">Почта:</p>
                            <p class="contacts">info@psb-stroi.ru</p>
                        </div>
                    </div>
                    <div class="rightsai">
                        <div class="block-contact">
                            <p class="name-contact">Адрес:</p>
                            <p class="contacts">г. Пермь, Ново-Бродовский ж/р, ул. Кленовая, д. 124</p>
                        </div>
                        <div class="block-contact">
                            <p class="name-contact">График работы:</p>
                            <p class="contacts">Пн-Пт: с 10:00 до 19:00 <br>
                                Сб: с 10:00 до 15:00 <br>
                                Вскр: Выходной</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    </main>
</body>
</html>
