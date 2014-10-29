<?php
/*
 *
 * Back-end частина для створення, видалення, оновлення та виведення проектів
 *
 */
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$db_table_to_show = 'project_full';

$action = $_GET['action'];
switch ($action) {
    case 'create':
        $name = $_GET['name'];
        $pay = $_GET['pay'];
        $time_realize = $_GET['time_realize'];
        $cost_one_sec = $_GET['cost_one_sec'];
        $sec_count = $_GET['sec_count'];
        $cost_all_sec = $_GET['$cost_all_sec'];
        $full_cost_sec = $_GET['full_cost_sec'];
        $middle_cost_life = $_GET['middle_cost_life'];
        $square_life = $_GET['square_life'];
        $sum_cost_life = $_GET['sum_cost_life'];
        $middle_cost_bus = $_GET['middle_cost_bus'];
        $square_bus = $_GET['square_bus'];
        $sum_cost_bus = $_GET['sum_cost_bus'];
        $full_cost = $_GET['full_cost'];


        $sql="INSERT INTO `project_full`(`name`, `pay`, `time_realize`, `cost_one_sec`, `sec_count`, `cost_all_sec`, `full_cost_sec`, `middle_cost_life`, `square_life`, `sum_cost_life`, `middle_cost_bus`, `square_bus`, `sum_cost_bus`, `full_cost`)
        VALUES ('".$name."','".$pay."','".$time_realize."', '".$cost_one_sec."','".$sec_count."','".$cost_all_sec."','".$full_cost_sec."', '".$middle_cost_life."','".$square_life."','".$sum_cost_life."','".$middle_cost_bus."','".$square_bus."','".$sum_cost_bus."','".$full_cost."');";

        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
    case 'delete':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $id = $_GET['id'];
        $sql="DELETE FROM `project_full` WHERE `id`=".$id;

        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
    case 'get':
        $connect_to_db = mysql_connect($db_host, $db_username, $db_password);
        mysql_select_db($db_name, $connect_to_db);


        $qr_result = mysql_query("select * from " . $db_table_to_show . " where id=".$_GET['id'])
        or die(mysql_error());
        while($data = mysql_fetch_array($qr_result)){
            echo $data['name'].'|'.$data['pay'].'|'.$data['time_realize'];
        }
        break;
    case 'update':
        // соединяемся с сервером базы данных
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $id = $_GET['id'];
        $name = $_GET['name'];
        $pay = $_GET['pay'];
        $time_realize = $_GET['time_realize'];
        $sql="UPDATE  `yumalviv_invest`.`project_full` SET  `name` =  '".$name."',
`pay` =  '".$pay."',
`time_realize` =  '".$time_realize."' WHERE  `project_full`.`id` =".$id.";";

        mysqli_query($con, $sql);
        mysqli_close($con);

        echo $id.'|'.$name.'|'.$pay.'|'.$time_realize;
        break;
}