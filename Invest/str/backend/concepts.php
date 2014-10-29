<?php
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$action = $_GET['action'];

switch ($action) {
    case 'create':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $id_idea = $_GET['id_idea'];
        $id_author = $_GET['id_author'];
        $build = $_GET['build'];
        $square = $_GET['square'];
        $count_1 = $_GET['count_1'];
        $count_2 = $_GET['count_2'];
        $count_3 = $_GET['count_3'];
        $count_4 = $_GET['count_4'];
        $count_5 = $_GET['count_5'];
        $count_6 = $_GET['count_6'];
        $count_7 = $_GET['count_7'];
        $count_8 = $_GET['count_8'];
        $count_9 = $_GET['count_9'];
        $count_10 = $_GET['count_10'];
        $main_cost = $_GET['main_cost'];
        $cost_per_m = $_GET['cost_per_m'];
        $income = $_GET['income'];
        $sql="INSERT INTO `concepts`(`id_idea`, `id_author`, `build`, `square`, `count_1`, `count_2`, `count_3`,
        `count_4`, `count_5`, `count_6`, `count_7`, `count_8`, `count_9`, `count_10`, `main_cost`, `cost_per_m`, `income`)
        VALUES ('".$id_idea."','".$id_author."','".$build."','".$square."','".$count_1."','".$count_2."','".$count_3."'
        ,'".$count_4."','".$count_5."','".$count_6."','".$count_7."'
        ,'".$count_8."','".$count_9."','".$count_10."','".$main_cost."','".$cost_per_m."','".$income."')";

        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
    case 'delete':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);


        $id = $_GET['id'];
        $sql="DELETE FROM `people` WHERE `id`=".$id;

        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
}