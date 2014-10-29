<?php
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
if($_GET['type']=='Ввід'):
    $type='in';
else:
    $type='out';
endif;
        $table = 'finance_way';

        $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
        $sql="INSERT
        INTO `finance_way`(`id_person`, `date`, `sum`, `type`)
        VALUES ('".$_GET['person']."','".$_GET['date']."','".$_GET['sum']."','".$type."')";
        mysqli_query($con, $sql);
        mysqli_close($con);