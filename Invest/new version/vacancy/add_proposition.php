<?php
if($_GET['vacancy']) {
    $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

    $sql = "INSERT INTO `proposition_to_vacancy`(`id_vacancy`, `id_person`)
     VALUES ('".$_GET['vacancy']."','".$_SESSION['id_user']."')";

//    echo $sql;
    mysqli_query($con, $sql);
    mysqli_close($con);
    header( 'Location: /vacancy/?success_add=true' );
} else {

    echo 'Дані не передались';

}