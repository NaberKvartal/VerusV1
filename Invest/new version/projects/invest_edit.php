<?php
$db_table_to_show = 'investment';
$qr_result = mysql_query("select * from " . $db_table_to_show);

while($data = mysql_fetch_array($qr_result)){
    if($data['id'] == $_GET['id_invest']){
        $investment = $data;
    }
}

if($_POST) {
    $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

    $sql = "UPDATE `investment`
    SET `id_person`='".$_POST['user']."',`id_broker`='".$_POST['broker']."',`sum`='".$_POST['sum']."',`realsum`='".$_POST['realsum']."'
    WHERE `id`=".$_POST['id_invest']."";

    mysqli_query($con, $sql);
    mysqli_close($con);
    header( 'Location: /projects/?id='.$_POST['id_project'] );
} else {?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h4 class="sub-header"><a href="/projects/?id=<?php echo $project_id;?>"><?php echo $array_projects[$project_id][0]?></a> => Редагування інвестування</h4>
        <form method="post">
            <input class="form-control" placeholder="Інвестор" id="name_user" value="<?php echo $array_people[$investment['id_person']][0]; ?>">
            <input class="form-control" style="display: none;" id="user_id" name="user" value="<?php echo $investment['id_person']; ?>">
            <div id="con_user"></div>
            <br/>
            <input class="form-control" placeholder="Брокер (необов'язково)" id="name_broker" value="<?php echo $array_people[$investment['id_broker']][0]; ?>">
            <input class="form-control" style="display: none;" id="broker_id" name="broker" value="<?php echo $investment['id_broker']; ?>">
            <div id="con_broker"></div>
            <br/>
            <input class="form-control" placeholder="Сума інвестицій" name="sum" value="<?php echo $investment['sum']; ?>"><br/>
            <input class="form-control" placeholder="На даний момент" name="realsum" value="<?php echo $investment['realsum']; ?>"><br/>
            <input class="form-control" name="id_project" style="display: none;" value="<?php echo $investment['id_project']; ?>"><br/>
            <input class="form-control" name="id_invest" style="display: none;" value="<?php echo $investment['id']; ?>"><br/>
            <button class="btn btn-lg btn-primary" type="submit">Редагувати</button>
        </form>
    </div>
<?php } ?>