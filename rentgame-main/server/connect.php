<?php 

    $db_hostname = "localhost";
    $db_database = "rentgame";
    $db_username = "root";
    $db_password = "";

    $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());
?>