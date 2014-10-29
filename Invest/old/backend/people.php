<?php
/*
 *
 * Back-end частина для створення, видалення, оновлення та отримання користувачів
 *
 */
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$db_table_to_show = 'people';

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
    case 'get':
        $connect_to_db = mysql_connect($db_host, $db_username, $db_password);
        mysql_select_db($db_name, $connect_to_db);


        $qr_result = mysql_query("select * from " . $db_table_to_show . " where id=".$_GET['id'])
        or die(mysql_error());
        while($data = mysql_fetch_array($qr_result)){
            echo $data['name'].'|'.$data['surname'];
        }
        break;
    case 'update':
        // соединяемся с сервером базы данных
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $id = $_GET['id'];
        $name = $_GET['name'];
        $surname = $_GET['surname'];
        $sql="UPDATE  `yumalviv_invest`.`people` SET  `name` =  '".$name."',
`surname` =  '".$surname."' WHERE  `people`.`id` =".$id.";";

        mysqli_query($con, $sql);
        mysqli_close($con);

        echo $id.'|'.$name.'|'.$surname;
        break;
}