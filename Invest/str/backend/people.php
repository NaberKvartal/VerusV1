<?php
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$action = $_GET['action'];

switch ($action) {
    case 'create':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $name = $_GET['name'];
        $surname = $_GET['surname'];
        $sql="INSERT INTO `people`(`name`, `surname`) VALUES ('".$name."','".$surname."')";

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
    case 'edit':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);


        $sql="UPDATE `people` SET `name`='".$_GET['name']."',`surname`='".$_GET['surname']."' WHERE `id`=".$_GET['idPer'];

        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
}