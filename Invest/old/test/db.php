<?php

$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

/* End block Connect to DB */

$array = array('pay', 'time', 'suck');

print_r($array);
$part = "INSERT INTO `project_full`(`".$array[0]."`";
foreach($array as $value) {
    if($value!=$array[0]){
        $part .= ",`".$value."`";
    }
}
$part .= ")";
echo $part;
$sql="INSERT INTO `project_full`(`name`, `pay`, `time_realize`, `cost_one_sec`, `sec_count`, `cost_all_sec`, `full_cost_sec`, `middle_cost_life`, `square_life`, `sum_cost_life`, `middle_cost_bus`, `square_bus`, `sum_cost_bus`, `full_cost`)
        VALUES ('".$name."','".$pay."','".$time_realize."', '".$cost_one_sec."','".$sec_count."','".$cost_all_sec."','".$full_cost_sec."', '".$middle_cost_life."','".$square_life."','".$sum_cost_life."','".$middle_cost_bus."','".$square_bus."','".$sum_cost_bus."','".$full_cost."');";
/*
$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
mysqli_query($con, $sql);
mysqli_close($con);
*/