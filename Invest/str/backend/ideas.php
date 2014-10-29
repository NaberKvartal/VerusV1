<?php
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$action = $_GET['action'];

switch ($action) {
    case 'create':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $id_author = $_GET['id_author'];

        $city = $_GET['city'];
        $address = $_GET['address'];
        $square = $_GET['square'];
        $type = $_GET['type'];

        $to_kad = $_GET['to_kad'];
        $to_plan = $_GET['to_plan'];
        $to_dpt = $_GET['to_dpt'];

        $desc = $_GET['desc'];
        $who = $_GET['who'];
        $sql="INSERT INTO `ideas`(`id_author`, `city`, `address`, `square`, `type`, `to_kad`, `to_plan`, `to_dpt`, `who`, `desc`)
        VALUES ('".$id_author."','".$city."','".$address."','".$square."','".$type."','".$to_kad."','".$to_plan."','".$to_dpt."','".$who."','".$desc."')";

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