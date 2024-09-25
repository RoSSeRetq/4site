<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>RentGame - Аренда игр по выгодным ценам | Авторизация</title>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="container">
        <?php include "back.php"; ?>

        <form action="" method="POST" class="login">
            <p>Авторизация</p>
            <input type="text" name="login" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль">
            <input type="submit" value="Войти" name="but" class="but">
            <p class="infotext">Если у вас нет аккаунта вам требуется пройти <a href="registration.php">регистрацию</a></p>
        </form>
    </div>
</body>
</html>