<?php
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$id = $_GET['id'];
$type = $_GET['type'];
switch($type) {
    case 'person':

            $table = 'people';

            $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
            $sql="DELETE FROM `investment` WHERE `id_person`=".$id;
            mysqli_query($con, $sql);
            mysqli_close($con);

        break;
    case 'project':
            $table = 'projects';
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
        $sql="DELETE FROM `investment` WHERE `id_project`=".$id;
        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
    case 'idea':
            $table = 'ideas';
        break;
    case 'concept':
            $table = 'concepts';
        break;
    case 'investment':
            $table = 'investment';
        break;
    case 'trans':
            $table = 'invest_trans';
        break;
    case 'finance_way':
            $table = 'finance_way';
        break;
}

$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);


$sql="DELETE FROM `".$table."` WHERE `id`=".$id;

mysqli_query($con, $sql);
mysqli_close($con);
