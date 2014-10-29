<?php
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

$sql = "ALTER TABLE `sections`";
for($i=7; $i<41; ++$i) {
    $sql .= "ADD `zbk_".$i."` TEXT NOT NULL,
ADD `acc_".$i."` TEXT NOT NULL,
ADD `cost_".$i."` TEXT NOT NULL,";
}

$sql .= "ADD `2312412` TEXT NOT NULL";

echo $sql;

mysqli_query($con, $sql);
mysqli_close($con);
