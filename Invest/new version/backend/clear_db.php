<?php

$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

$db_table_to_show = 'projects';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_projects = array();
$i=1;
while($row = mysql_fetch_array($qr_result)){
    $array_projects[$i] .= $row['id'];
    ++$i;
}
$db_table_to_show = 'people';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_people = array();
while($row = mysql_fetch_array($qr_result)){
    $array_people[$row['id']] = array($row['name'].' '.$row['surname']);
}

$count_pr = count($array_projects);
++$count_pr;
$count_pl = count($array_people);
++$count_pl;

$db_table_to_show = 'investment';
$qr_result = mysql_query("select * from " . $db_table_to_show);
while($row = mysql_fetch_array($qr_result)){
    $search = 'false';
    for($i=1; $i<$count_pr; ++$i) {
        if($array_projects[$i]==$row['id_project']) {
            $search = 'true';
        }
    }
    for($i=1; $i<$count_pl; ++$i) {
        if($array_people[$i]==$row['id_person']) {
            $search = 'true';
        }
    }


    if($search=='false') {
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $sql="DELETE FROM `investment` WHERE `id_project`=".$row['id_project'];

        mysqli_query($con, $sql);
        mysqli_close($con);
    }

}
print_r($array_projects);
$db_table_to_show = 'roles';
$qr_result = mysql_query("select * from " . $db_table_to_show);
while($row = mysql_fetch_array($qr_result)){
    $search = 'false';
    for($i=1; $i<$count_pr; ++$i) {
        if($array_projects[$i]==$row['id_project']) {
            $search = 'true';
        }
    }

    if($search=='false') {
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $sql="DELETE FROM `roles` WHERE `id_project`=".$row['id_project'];

        mysqli_query($con, $sql);
        mysqli_close($con);
    }

}
echo 'done!';