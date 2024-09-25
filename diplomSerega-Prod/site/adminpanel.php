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
    <title>ПСБ-Строй | Админ панель</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/adminstyle.css">
    <link rel="icon" href="favicon.ico">

</head>
<body>

    <main>
        <div class="container">
            <div class="stats-block">
                <div class="stats">
                    <p>Общее количество заявок</p>
                    <?php 

                        require_once "config/connect.php";
                        // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
                        $query = "SELECT COUNT(id) FROM request;";
                        $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                        if (mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                            {
                                echo "<p class='count'>" . $row['COUNT(id)'] . "</p> ";
                            }
                        }
                    
                    ?>
                </div>
                <div class="stats">
                    <p>Количество новых заявок</p>
                    <?php 
                        require_once "config/connect.php";
                        // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
                        $query = "SELECT COUNT(status) FROM request WHERE status = 'Новая';";
                        $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
                        if (mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                            {
                                echo "<p class='count'>" . $row['COUNT(status)'] . "</p> ";
                            }
                        }
                    ?>
                </div>
                <div class="stats">
                    <p>Количество приянтых заявок</p>
                    <?php 

                        require_once "config/connect.php";
                        // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
                        $query = "SELECT COUNT(status) FROM request WHERE status = 'Принята';";
                        $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                        if (mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                            {
                                echo "<p class='count'>" . $row['COUNT(status)'] . "</p> ";
                            }
                        }

                    ?>
                </div>
                <div class="stats">
                    <p>Количество заявок на повторный звонок</p>
                    <?php 

                        require_once "config/connect.php";
                        // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
                        $query = "SELECT COUNT(status) FROM request WHERE status = 'Повторный звонок';";
                        $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));

                        if (mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                            {
                                echo "<p class='count'>" . $row['COUNT(status)'] . "</p> ";
                            }
                        }

                    ?>
                </div>
            </div>
            <div class="requestBlock">
                <div class="navigation">
                    <p>Все доступные заявки ↓</p>

                    <form action="" method="post" class="exit">
                        <input type='submit' value='Выход' name='exit' class="rejected hov">
                    </form>

                    <?php
                        if(isset($_POST['exit']))
                        {
                            unset($_SESSION["login"]);
                            unset($_SESSION["user_id"]);

                            session_destroy();

                            exit("<meta http-equiv='refresh' content='0; url= admin.php'>");
                        }
                    ?>
                </div>
                <div class="requestMain">
                    <div class="nav">
                        <p class="navname">Фильтры</p>
                        <input type='submit' value='Все' id='viewAllBlock' class='addnewentity hovn'> <br>
                        <input type='submit' value='Новые' id='viewNewBlock' class='addnewentity hovn'> <br>
                        <input type='submit' value='Принятые' id='viewApproveBlock' class='addnewentity hovn'> <br>
                        <input type='submit' value='Повторный звонок' id='viewTphoneBlock' class='addnewentity hovn'>
                    </div>
                    <div class='request-all ' id='request-block'>
                        <div class="requset">
                            <?php
                                require_once 'config/connect.php';
                                // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
                                $query = 'SELECT * FROM `request` ORDER BY `request`.`id` DESC';
                                $result = mysqli_query($db_server, $query);
                                if(!$result) die ('Сбой при доступе к базе данных: ' . mysqli_error($db_server));
                                if(mysqli_num_rows($result)>0) {
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                    {
                                        echo 
                                            "<div class='ticket-block'>
                                                <p>Имя:" . $row['name'] . "</p>
                                                <p>Номер телефона:" . $row['phone']. "</p>
                                                <p>Время подачи заявки: " . $row['time'] . " по МСК</p>
                                                <p>Требования: " . $row['problem'] . "</p>
                                                <p>Статус: " . $row['status'] . "</p>
                                        
                                                <form action = '' method = 'post'> 
                                                    <p><a class='edit-image' href='editRequest.php?id=".$row['id']."&phone=".$row['phone']."'>О заявке</a></p>
                                                </form> 
                    
                                            </div>";
                                    }

                                    
                                }
                            

                            ?>
                        </div>
                    </div>
                    <div class='request-new requst' id='new-block'>
                        <div class="requset">
                            <?php
                                require_once 'config/connect.php';
                                // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
                                $query = "SELECT * FROM `request` WHERE `status` = 'Новая' ORDER BY `request`.`id` DESC;";
                                $result = mysqli_query($db_server, $query);
                                if(!$result) die ('Сбой при доступе к базе данных: ' . mysqli_error($db_server));
                                if(mysqli_num_rows($result)>0) {
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                    {
                                        echo 
                                            "<div class='ticket-block'>
                                                <p>Имя:" . $row['name'] . "</p>
                                                <p>Номер телефона:" . $row['phone']. "</p>
                                                <p>Время подачи заявки: " . $row['time'] . " по МСК</p>
                                                <p>Требования: " . $row['problem'] . "</p>
                                                <p>Статус: " . $row['status'] . "</p>
                                        
                                                <form action = '' method = 'post'> 
                                                    <p><a class='edit-image' href='editRequest.php?id=".$row['id']."&phone=".$row['phone']."'>О заявке</a></p>
                                                </form> 
                    
                                            </div>";
                                    }
                                    
                                }
                            ?>
                        </div>
                    </div>
                    <div class='request-approve requst' id='approve-block'>
                        <div class="requset">
                            <?php
                                require_once 'config/connect.php';
                                // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
                                $query = "SELECT * FROM `request` WHERE `status` = 'Принята' ORDER BY `request`.`id` DESC;";
                                $result = mysqli_query($db_server, $query);
                                if(!$result) die ('Сбой при доступе к базе данных: ' . mysqli_error($db_server));
                                if(mysqli_num_rows($result)>0) {
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                    {
                                        echo 
                                            "<div class='ticket-block'>
                                                <p>Имя:" . $row['name'] . "</p>
                                                <p>Номер телефона:" . $row['phone']. "</p>
                                                <p>Время подачи заявки: " . $row['time'] . " по МСК</p>
                                                <p>Требования: " . $row['problem'] . "</p>
                                                <p>Статус: " . $row['status'] . "</p>
                                        
                                                <form action = '' method = 'post'> 
                                                    <p><a class='edit-image' href='editRequest.php?id=".$row['id']."&phone=".$row['phone']."'>О заявке</a></p>
                                                </form> 
                    
                                            </div>";
                                    }
                                    
                                }
                            ?>
                        </div>
                    </div>
                    <div class='request-tphone requst' id='tphone-block'>
                        <div class="requset">
                            <?php
                                require_once 'config/connect.php';
                                // $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
                                $query = "SELECT * FROM `request` WHERE `status` = 'Повторный звонок' ORDER BY `request`.`id` DESC;";
                                $result = mysqli_query($db_server, $query);
                                if(!$result) die ('Сбой при доступе к базе данных: ' . mysqli_error($db_server));
                                if(mysqli_num_rows($result)>0) {
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                    {
                                        echo 
                                            "<div class='ticket-block'>
                                                <p>Имя:" . $row['name'] . "</p>
                                                <p>Номер телефона:" . $row['phone']. "</p>
                                                <p>Время подачи заявки: " . $row['time'] . " по МСК</p>
                                                <p>Требования: " . $row['problem'] . "</p>
                                                <p>Статус: " . $row['status'] . "</p>
                                        
                                                <form action = '' method = 'post'> 
                                                    <p><a class='edit-image' href='editRequest.php?id=".$row['id']."&phone=".$row['phone']."'>О заявке</a></p>
                                                </form> 
                    
                                            </div>";
                                    }
                                    
                                }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script src="main.js"></script>
</body>
</html>
