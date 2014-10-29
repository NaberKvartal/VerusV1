<?php
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$db_table_to_show = 'project_full';
//if($_GET['page']) $db_table_to_show = 'projects';
// соединяемся с сервером базы данных
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());

// подключаемся к базе данных
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

// выбираем все значения из таблицы "student"
$qr_result = mysql_query("select * from " . $db_table_to_show)
or die(mysql_error());