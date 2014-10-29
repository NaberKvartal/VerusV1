<?php

$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

$db_table_to_show = 'roles';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_roles = array('start_man', 'rek','kur','of_gen','project','tech',
    'auditor','nets','infra','earth','pred');

while($row = mysql_fetch_array($qr_result)){

    $count = count($array_roles);
    for($i=0; $i<$count; ++$i) {
        if(!$row[$array_roles[$i]]) {
            $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

            $sql="INSERT INTO `vacancy`(`id_project`, `type`, `id_person`, `status`)
            VALUES ('".$row['id_project']."','".$array_roles[$i]."','','active')";

            mysqli_query($con, $sql);
            mysqli_close($con);
        }
    }

}


