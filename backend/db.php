<?php
session_start();

//if ($_SESSION['authorized']<>1) {
//    header("Location: /login");
//    exit;
//}
$db_host = 'localhost';
$db_name = 'yumalviv_kvar';
$db_username = 'yumalviv_kvar';
$db_password = '28Qna6Ay';

$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());
