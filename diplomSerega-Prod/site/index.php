<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПСБ-Строй | Главная</title>
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

                <h1>Строительство, ремонт домов и коттеджей под ключ</h1>
                <div class="link">
                    <a href="application.php">Запросить звонок</a>
                </div>
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


        <section class="green advanteges">
            <div class="container">
                <h2>Почему выбирают нас?</h2>
                <div class="advant">
                    <article>
                        <div class="imgad">
                            <img src="image/icons/quality.png" alt="1">
                        </div>
                        <p>Высокое качество выполняемых работ</p>
                    </article>
                    <article>
                        <div class="imgad">
                            <img src="image/icons/Group 35.png" alt="2">
                        </div>
                        <p>Широкий спектр услуг: от проектирования до реализации строительного проекта</p>
                    </article>
                    <article>
                        <div class="imgad">
                            <img src="image/icons/Group 41.png" alt="3">
                        </div>
                        <p>Индивидуальный подход к каждому клиенту и учет всех его пожеланий</p>
                    </article>
                    <article>
                        <div class="imgad">
                            <img src="image/icons/Group 38.png" alt="4">
                        </div>
                        <p>Гарантия на все виды работ и используемые материалы</p>
                    </article>
                </div>
                <p class="down-text">Наша компания специализируется на проектировании, строительстве и ремонте жилых и коммерческих объектов. Мы предлагаем полный спектр услуг: от создания дизайн-проекта до завершения строительства.</p>
            </div>
        </section>
        
        <div class="container">

            <section class="servis">
                <h2>Перечень наших работ</h2>
                <div class="OurServices">
                    <div class="left-site">
                        <div class="main-left s1">
                            <h3>Электромотажные работы</h3>

                            <div class="aboutname">
                                <p>Комплекс работ, связанных с установкой, ремонтом, обслуживанием и модернизацией электрооборудования и электрических систем в зданиях, сооружениях, промышленных объектах и других местах</p>
                                <div class="price">
                                    <p>От 250 рублей</p>
                                </div>
                            </div>

                        </div>
                        <div class="small-services">
                            <div class="services s2">
                                <h3>Потолки</h3>

                                <div class="aboutname">
                                    <p>Отделка потолков (натяжные потолки, гипсокартонные потолки, покраска)</p>
                                    <div class="price">
                                        <p>От 2199 рублей</p>
                                    </div>
                                </div>

                            </div>
                            <div class="services s3">
                                <h3>Плитка</h3>

                                <div class="aboutname">
                                    <p>Укладка кафельной плитки на пол, облицовка, ремонт и реконструкция</p>
                                    <div class="price">
                                        <p>От 799 рублей</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="right-site">
                        <div class="small-services">
                            <div class="services s4">
                                <h3>Отделка</h3>

                                <div class="aboutname">
                                    <p>Штукатурные работы, покраска, обои, установка декоративных элементов</p>
                                    <div class="price">
                                        <p>От 1050 рублей</p>
                                    </div>
                                </div>

                            </div>
                            <div class="services s5">
                                <h3>Сантехника</h3>

                                <div class="aboutname">
                                    <p>Установка, ремонт и обслуживание водопровода, канализации, отопления</p>
                                    <div class="price">
                                        <p>От 199 рублей</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="main-right s6">
                            <h3>Запросить звонок</h3>

                            <div class="aboutname">

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

                                    <input class="form__input btn" type="submit" value="Отправить">
                                    <input type="hidden" name="act" value="order">
                                </form>

                                <!-- <div class="alert" id="message">
                                    <h3>Вы подали заявку</h3>
                                    <p>Наши операторы свяжуться с вами в ближайшее время!</p>
                                </div> -->

                                <script>
                                    setTimeout(function(){
                                        document.getElementById('message').style.display = 'none';
                                    }, 5000);
                                </script>

                                <?php

                                    if(isset($_POST['act']) &&
                                    isset($_POST["name"]) &&
                                    isset($_POST["phone"]))
                                    {
                                        $name = htmlentities(strip_tags($_POST['name']));
                                        $phone = $_POST['phone'];
                                        $now = date("d.m.Y H:i:s");

                                        require_once "config/connect.php";
                                        // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());

                                        $query = "SELECT * FROM `blacklist` WHERE phone = '$phone';";
                                        $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                                        if (mysqli_num_rows($result) > 0)
                                        {
                                            $query = "INSERT INTO `request`(`id`, `name`, `phone`, `time`, `problem`, `status`) VALUES (NULL,'$name','$phone','$now','Обратный звонок','Отклонено')";
                                            $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                                            mysqli_close($db_server);
                                        }
                                        else
                                        {
                                            $query = "INSERT INTO `request`(`id`, `name`, `phone`, `time`, `problem`, `status`) VALUES (NULL,'$name','$phone','$now','Обратный звонок','Новая')";
                                            $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                                            $token = "7476588927:AAHyxRbCUaFitN89a5-XTCFGp-Xs8AbMpV4";                                       
                                            $chat_id = "-4214359677";
                                            $txt = urlencode("<b>Новая заявка</b> (обратный звонок) \n\n<b>Имя:</b> $name \n<b>Телефон:</b>  $phone \n\n<b>Дата и время:</b> $now по МСК");                                       
                                            $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}";
                                            $sendToTelegram = fopen($url,"r");
                                            mysqli_close($db_server);
                                        }
                                    }

                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>

        <section class="green consultation">
            <h2>НУЖНА КОНСУЛЬТАЦИЯ?</h2>
            <p>Мы свяжемся с Вами и ответим на все вопросы!</p>
            <div class="link">
                <a href="application.php">ПОЛУЧИТЬ КОНСУЛЬТАЦИЮ</a>
            </div>
        </section>

        <div class="container">
            <section class="contact">
                <div class="contact-block">
                    <div class="leftsaid">
                        <h2>Контакты</h2>
                        <div class="block-contact">
                            <p class="name-contact">Телефон:</p>
                            <p class="contacts">+7 (967) 555-42-56</p>
                        </div>
                        <div class="block-contact">
                            <p class="name-contact">Почта:</p>
                            <p class="contacts">info@psb-stroi.ru</p>
                        </div>
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
                    <div class="rightsaid">
                        <h2>Остались вопросы?</h2>
                        <p>Если у Вас есть вопросы - запросите звонок, мы перезвоним в ближайшее время и ответим на них!</p>
                        <div class="link">
                            <a href="application.php">Запросить звонок</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    </main>

    <footer></footer>

   
</body>
</html>
