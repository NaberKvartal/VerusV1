<?php
header('Access-Control-Allow-Origin: *');
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

switch($_GET['action']) {
    case 'first':

        $sql="INSERT INTO `preen_f`(`company`,`name`,`email`)
            VALUES ('".$_GET['company']."','".$_GET['name']."','".$_GET['email']."')";

        break;
    case 'second':

        $sql="INSERT INTO `preen_s`(`email`)
            VALUES ('".$_GET['email']."')";

        break;
}

mysqli_query($con, $sql);
mysqli_close($con);
