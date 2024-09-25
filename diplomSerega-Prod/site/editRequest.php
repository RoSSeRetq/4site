<?php 

    session_start();

    if(!isset($_SESSION['login']) && !isset($_SESSION['user_id']))
    {
        exit("<meta http-equiv='refresh' content='0; url= 404.php'>");
    }

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПСБ-Строй | Админ панель | Редактирование заявки</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/adminstyle.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.css">
    <link rel="icon" href="favicon.ico">
</head>
<body>

    <main>

    <?php 

        require_once "config/connect.php";
        // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
        $id = $_GET["id"];
        $query = "SELECT * FROM request WHERE id = '$id'";
        $result = mysqli_query($db_server, $query);
        $row = mysqli_fetch_assoc($result);

    ?>
        <div class="container">
            <div class='aelement'>
            <div class='navigate'>
                <form action="adminpanel.php" method="post" class="nav">
                    <input type='submit' value='Назад ←' class="addnewentity hov">
                </form>
            </div>
            <div class='goods-all'>
                <div class="infoabottable">
                    <p class='name-block'>Просмотр заявки №<?= $row['id']?></p>
                    <p>Стастус: <?= $row['status']?></p>
                </div>
                <div class="addnewitems">
                    <form action="" method="POST">
                        <p class="opisanierequest">Описание заявки:</p>
                        <?php 

                            $phone = $_GET["phone"];
                            $query = "SELECT * FROM `blacklist` WHERE phone = '$phone';";
                            $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                            if (mysqli_num_rows($result) > 0)
                            {
                                echo "<p class='blocklisttxt'>Данный номер телефона находится в чёрном списке!</p>";
                                $numberisblock = 'yes';
                            }

                        ?>
                        <p>Время обращения <?= $row['time']?> по МСК </p>
                        <div class="characteristics-goods">

                            <div class="characteristics">
                                <p>Имя:</p>
                                <input type="text" name="name_request" value="<?= $row['name']?>">
                            </div>

                            <div class="characteristics">
                                <p>Телефон:</p>
                                <input type="text" class="mask-phone" name="phone_request" value="<?= $row['phone']?>">
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

                            <div class="characteristics">
                                <p>Требуется:</p>
                                <input type="text" name="problem_request" value="<?= $row['problem']?>">
                            </div>

                        </div>
                        <p class="opisanierequest">Коментарий оператора:</p>
                        <textarea maxlength="700" class="opisanie" name="comment_request"><?= $row['comment']?></textarea>
                    

                        <div class="add">
                            <input type="submit" value="Изменить" class="addnewentity hov" name="editrequest">
                        

                            <input type = 'submit' value = 'Принята' class='addnewentity hov' name="confirm">

                            <input type = 'submit' value = 'Отклонено' class='addnewentity hov' name="rejected">
                    
                            <input type = 'submit' value = 'Повторный звонок' class='addnewentity hov' name="repiat">
                            <?php 
                            
                            if(isset($numberisblock))
                            {
                                echo "<input type = 'submit' value = 'Разблокировать' class='rejected hov' name='unblock'>";
                            }
                            else
                            {
                                echo "<input type = 'submit' value = 'Заблокировать' class='rejected hov' name='blocklist'>";
                            }
                            
                            ?>
                       
                        </div>
                

                        <?php


                        
                            if(isset($_POST["editrequest"])) 
                            {
                                $id = $_GET["id"];
                                $name_request = $_POST["name_request"];
                                $phone_request = $_POST["phone_request"];
                                $problem_request = $_POST['problem_request'];
                                $comment_request = $_POST["comment_request"];
                                

                                $query = "UPDATE `request` SET    
                                
                                `name` = '$name_request',
                                `phone` = '$phone_request',
                                `problem` = '$problem_request',
                                `comment` = '$comment_request'

                                WHERE `request`.`id` = '$id'";

                          

                                $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                                exit("<meta http-equiv='refresh' content='0; url= adminpanel.php'>");

                            }
                            if(isset($_POST["confirm"]))
                            {
                                $id = $_GET["id"];
                                $name_request = $_POST["name_request"];
                                $phone_request = $_POST["phone_request"];
                                $problem_request = $_POST['problem_request'];
                                $comment_request = $_POST["comment_request"];
                                

                                $query = "UPDATE `request` SET    
                                
                                `name` = '$name_request',
                                `phone` = '$phone_request',
                                `problem` = '$problem_request',
                                `comment` = '$comment_request'

                                WHERE `request`.`id` = '$id'";

                            

                                $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));


                                $query = "UPDATE `request` SET `status` = 'Принята' WHERE `request`.`id` = $id;";
                                $result = mysqli_query($db_server, $query)
                                or die ("Ошибкa в зanpoce: " . mysqli_error($db_server));

                                exit("<meta http-equiv='refresh' content='0; url= adminpanel.php'>");
                            }
                            if(isset($_POST["rejected"]))
                            {
                                $id = $_GET["id"];
                                $name_request = $_POST["name_request"];
                                $phone_request = $_POST["phone_request"];
                                $problem_request = $_POST['problem_request'];
                                $comment_request = $_POST["comment_request"];
                                

                                $query = "UPDATE `request` SET    
                                
                                `name` = '$name_request',
                                `phone` = '$phone_request',
                                `problem` = '$problem_request',
                                `comment` = '$comment_request'

                                WHERE `request`.`id` = '$id'";

                          
                                $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                                $query = "UPDATE `request` SET `status` = 'Отклонено' WHERE `request`.`id` = $id;";
                                $result = mysqli_query($db_server, $query)
                                or die ("Ошибкa в зanpoce: " . mysqli_error($db_server));
                                exit("<meta http-equiv='refresh' content='0; url= adminpanel.php'>");
                            }
                            
                            if(isset($_POST["repiat"]))
                            {
                                $id = $_GET["id"];
                                $name_request = $_POST["name_request"];
                                $phone_request = $_POST["phone_request"];
                                $problem_request = $_POST['problem_request'];
                                $comment_request = $_POST["comment_request"];                 
                                $query = "UPDATE `request` SET    
                                `name` = '$name_request',
                                `phone` = '$phone_request',
                                `problem` = '$problem_request',
                                `comment` = '$comment_request'
                                WHERE `request`.`id` = '$id'";
                                $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                                $query = "UPDATE `request` SET `status` = 'Повторный звонок' WHERE `id` = $id;";
                                


                                $result = mysqli_query($db_server, $query)
                                or die ("Ошибкa в зanpoce: " . mysqli_error($db_server));
                                exit("<meta http-equiv='refresh' content='0; url= adminpanel.php'>");
                            }

                            if(isset($_POST["blocklist"]))
                            {
                                $id = $_GET["id"];
                                $phone_request = $_POST["phone_request"];

                                $query = "INSERT INTO `blacklist` (`id`, `phone`) VALUES (NULL, '$phone_request');";

                                $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                                $query = "UPDATE `request` SET `status` = 'Отклонено' WHERE `id` = $id;";

                                $result = mysqli_query($db_server, $query)
                                or die ("Ошибкa в зanpoce: " . mysqli_error($db_server));
                                exit("<meta http-equiv='refresh' content='0; url= adminpanel.php'>");
                            }
                            if(isset($_POST["unblock"]))
                            {
                                $phone = $_GET["phone"];
                                $query = "DELETE FROM `blacklist` WHERE `blacklist`.`phone` = $phone";
                                
                                $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                                exit("<meta http-equiv='refresh' content='0; url= adminpanel.php'>");
                            }
                            mysqli_close($db_server);

                        ?>
                    </form>
                </div>
            </div>
        </div>

    </main>

</body>
</html>
