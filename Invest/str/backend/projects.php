<?php
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$action = $_GET['action'];

switch ($action) {
    case 'create':
        $name = $_GET['name'];
        $city = $_GET['city'];
        $type = $_GET['type'];
        $pay = $_GET['pay'];
        $time_realize = $_GET['time_realize'];
        $time_start = $_GET['time_start'];
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


        $sql="INSERT INTO `projects`(`name`, `city`, `type`, `pay`, `time_realize`, `time_start`, `cost_one_sec`, `sec_count`, `cost_all_sec`, `full_cost_sec`, `middle_cost_life`, `square_life`, `sum_cost_life`, `middle_cost_bus`, `square_bus`, `sum_cost_bus`, `full_cost`)
        VALUES ('".$name."','".$city."','".$type."','".$pay."','".$time_realize."', '".$time_start."', '".$cost_one_sec."','".$sec_count."','".$cost_all_sec."','".$full_cost_sec."', '".$middle_cost_life."','".$square_life."','".$sum_cost_life."','".$middle_cost_bus."','".$square_bus."','".$sum_cost_bus."','".$full_cost."');";

        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
    case 'delete':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);


        $id = $_GET['id'];
        $sql="DELETE FROM `projects` WHERE `id`=".$id;

        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
    case 'status':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $id = $_GET['id'];
        $status = $_GET['status'];

        $sql="UPDATE  `yumalviv_invest`.`projects` SET  `status` =  '".$status."'
         WHERE  `projects`.`id` =".$id.";";

        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
    case 'role':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $sql="INSERT INTO `roles`(`id_project`, `start_man`, `rek`, `kur`, `of_gen`, `project`, `tech`, `auditor`, `nets`, `infra`, `earth`)
        VALUES ('".$_GET['id_project']."','".$_GET['a']."','".$_GET['b']."','".$_GET['c']."','".$_GET['d']."', '".$_GET['e']."',
         '".$_GET['f']."','".$_GET['g']."','".$_GET['h']."','".$_GET['i']."','".$_GET['j']."')";

        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
    case 'editrole':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $sql = "UPDATE `roles` SET `start_man`='".$_GET['a']."',`rek`='".$_GET['b']."',`kur`='".$_GET['c']."',`of_gen`='".$_GET['d']."',
        `project`='".$_GET['e']."',`tech`='".$_GET['f']."',`auditor`='".$_GET['g']."',`nets`='".$_GET['h']."',
        `infra`='".$_GET['i']."',`earth`='".$_GET['j']."' WHERE `id_project`=".$_GET['id_project'];

        mysqli_query($con, $sql);
        mysqli_close($con);
        break;
    case 'editproject':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

        $sql = "UPDATE `projects` SET `name`='".$_GET['a']."',`city`='".$_GET['b']."',`type`='".$_GET['c']."',
        `pay`='".$_GET['d']."',`time_start`='".$_GET['e']."',`time_realize`='".$_GET['f']."',
        `cost_one_sec`='".$_GET['g']."',`sec_count`='".$_GET['h']."',
        `cost_all_sec`='".$_GET['i']."',`full_cost_sec`='".$_GET['j']."',
        `middle_cost_life`='".$_GET['k']."',`square_life`='".$_GET['l']."',
        `sum_cost_life`='".$_GET['m']."',`middle_cost_bus`='".$_GET['n']."',
        `square_bus`='".$_GET['o']."',`sum_cost_bus`='".$_GET['p']."',`full_cost`='".$_GET['r']."'
        WHERE `id`=".$_GET['id_project'];

        mysqli_query($con, $sql);
        mysqli_close($con);
        break;

}