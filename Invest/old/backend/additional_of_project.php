<?php


/* Additional params for projects

 * finance_way - розподілення прибутку по проекту
 * roles - ролі в проекті (аудит, реклама)
 * investment - інвестиції
 * finance_in - вартість будівництва

 */



$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$action = $_GET['action'];

switch ($action) {
    case 'way':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
        $id = $_GET['id'];
        $item = $_GET['item'];
        $sum = $_GET['sum'];
        echo $id.'<br>'.$item.'<br>'.$sum;
        $sql = "INSERT INTO `finance_way`(`id_project`, `item`, `sum`) VALUES ('".$id."', '".$item."', '".$sum."')";

        mysqli_query($con, $sql);
        mysqli_close($con);

        break;
    case 'role':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
        $id = $_GET['id'];
        $role = $_GET['role'];
        $id_person = $_GET['id_person'];
        echo $id.'<br>'.$role.'<br>'.$id_person;

        $sql = "INSERT INTO `roles`(`id_project`, `role`, `id_person`) VALUES ('".$id."', '".$role."', '".$id_person."')";

        mysqli_query($con, $sql);
        mysqli_close($con);

        break;
    case 'invest':
        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
        $id = $_GET['id'];
        $id_person = $_GET['id_person'];
        $sum = $_GET['sum'];
        echo $id.'<br>'.$id_person.'<br>'.$sum;

        $sql = "INSERT INTO `investment`(`id_project`, `id_person`, `sum`) VALUES ('".$id."', '".$id_person."', '".$sum."')";

        mysqli_query($con, $sql);
        mysqli_close($con);

        break;
}