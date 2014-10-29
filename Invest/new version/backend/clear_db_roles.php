<?php

$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());


$db_table_to_show = 'people';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_people = array();
while($row = mysql_fetch_array($qr_result)){
    $array_people[] = $row['id'];
}

$array_roles = array(
    'start_man',
    'rek',
    'kur',
    'of_gen',
    'project',
    'tech',
    'auditor',
    'nets',
    'infra',
    'earth',
    'pred'
);

$db_table_to_show = 'roles';
$qr_result = mysql_query("select * from " . $db_table_to_show);
while($row = mysql_fetch_array($qr_result)){
    $search = 'false';
    for($i=1; $i<500; ++$i) {
        echo 'Start '.$i.' | ';
        foreach($array_roles as $value) {
            echo 'People '.$array_people[$i].' | ';
            echo 'Inside '.$row[$value].'<br>';
            if($array_people[$i]==$row[$value]) {
                $search = 'true';
            }
        }
    }

    if($search=='false') {
//        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $sql="DELETE FROM `roles` WHERE `id_person`=".$row['id_person'];
        echo $sql;
//        mysqli_query($con, $sql);
//        mysqli_close($con);
    }

//    echo $search;

}