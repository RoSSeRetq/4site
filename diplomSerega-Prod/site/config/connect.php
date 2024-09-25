<?php 

    $db_hostname = "94.228.113.240:9537";
    $db_username = "FluxRoSSeRProJ";
    $db_password = "QiMaTGTx63xRH67YE2a6";
    $db_database = "Diplom";

    $db_server = mysqli_connect($db_hostname , $db_username , $db_password, $db_database) or die (mysqli_connect_error());

?>

<?php
    // $mysql_bd = 'Diplom';
    // $mysql_user = 'FluxRoSSeRProJ';
    // $mysql_pass = 'QiMaTGTx63xRH67YE2a6';
    // $mysql_server = 'dbpmad.fluxproject.ru';
    // $mysql_port = '9537';

    // $db_server = mysqli_connect($mysql_server, $mysql_user,$mysql_pass,$mysql_bd, $mysql_port);
?>

