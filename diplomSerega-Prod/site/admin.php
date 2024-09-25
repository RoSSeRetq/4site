<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПСБ-Строй | Авторизация</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/adminstyle.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery.maskedinput.min.js"></script>
</head>
<body>

    <main>
        <form action="" method="POST" class="login">
            <p>LOGIN</p>
            <input type="text" name="login">
            <p>PASSWORD</p>
            <input type="password" id="password-input" name="password">
            <input type="submit" value="SING UP" name="but" class="but">
            <?php 
    
                if(isset($_POST['but']))
                {
                    require_once "config/coding.php";
                    $login = htmlentities(strip_tags($_POST['login']));
                    $password = htmlentities(strip_tags(OnCodingPass($_POST['password'])));
                    require_once "config/connect.php";
                    // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($db_server, $query);
                    if(!$result) die ("Сбой при доступе к базе данных: " . mysqli_error($db_server));
                    $query = "SELECT * FROM `users` WHERE login = '$login' and password = '$password';";
                    $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                    if (mysqli_num_rows($result) > 0)
                    {
                        $_SESSION['login'] = $login;
                        $_SESSION['user_id'] = "admin_in_site";
                        exit("<meta http-equiv='refresh' content='0; url= adminpanel.php'>");
                    }
                    else
                    {
                        echo "<p class='badinfo'>Неправильно введёные данные</p>";
                    }
                }

                
            ?>
        </form>
    </main>

</body>
</html>
