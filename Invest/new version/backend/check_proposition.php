<?php
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

$sql='UPDATE `vacancy`
    SET `status`=\'closed\', `id_person`=\''.$_GET['id_person'].'\'
    WHERE `id`='.$_GET['id_vacancy'];

mysqli_query($con, $sql);
mysqli_close($con);


$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

$sql = "UPDATE `roles` SET `".$_GET['type']."`='".$_GET['id_person']."'
        WHERE `id_project`=".$_GET['id_project'];

mysqli_query($con, $sql);
mysqli_close($con);
