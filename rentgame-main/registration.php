<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>RentGame - Аренда игр по выгодным ценам | Регистрация</title>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="container">
        <?php include "back.php"; ?>

        <form action="" method="POST" class="login">
            <p>Регистрация</p>
            <input type="text" name="login" placeholder="Логин">
            <input type="text" name="email" placeholder="Почта">
            <input type="password" name="password" placeholder="Пароль">
            <input type="password" name="repitPassword" placeholder="Повторите пароль">
            <input type="submit" value="Войти" name="but" class="but">
            <p class="infotext">Если у вас есть аккаунт вам требуется <a href="authorization.php">авторизироваться</a></p>
        </form>

    </div>
</body>
</html>