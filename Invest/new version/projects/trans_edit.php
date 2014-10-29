<?php
if($_POST) {
    $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    $_POST['type']=='Інвестування' ? $type='invest' : $type='back';
    $sql = "UPDATE `invest_trans`
    SET `date`='".$_POST['date']."',`sum`='".$_POST['sum']."',`type`='".$type."'
    WHERE `id`=".$_POST['id_trans'];

    mysqli_query($con, $sql);
    mysqli_close($con);
    header( 'Location: /projects?action=invest_view&id_invest='.$_POST['id_invest'].'&id_project='.$_POST['id_project'] );
    echo '<script>window.location.replace("/projects?action=invest_view&id_invest='.$_POST['id_invest'].'&id_project='.$_POST['id_project'].'");</script>';

} else {
    $db_table_to_show = 'invest_trans';
    $qr_result = mysql_query("select * from " . $db_table_to_show . " where `id`=".$_GET['id_trans']);
    $data = mysql_fetch_array($qr_result);

    switch($data['type']){
        case 'invest':
            $first_select = true;
            break;
        case 'back':
            $second_select = true;
            break;
    }
    ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h4 class="sub-header"><a href="/projects/?id=<?php echo $_GET['id_project'];?>"><?php echo $array_projects[$_GET['id_project']][0]?></a> =>
            <a href="/projects/?action=invest_view&id_invest=<?php echo $_GET['id_invest']?>&id_project=<?php echo $_GET['id_project']?>">Транші інвестування</a> =>
            Редагування траншу</h4>

        <form method="post">
            <label>Дата у форматі yyyy/mm/dd</label>
            <div id="sandbox-container">
                <input class="form-control" type="text" name="date" value="<?php echo $data['date']?>"><br/>
            </div>
            <input class="form-control" placeholder="Сума" name="sum" value="<?php echo $data['sum']?>"><br/>
            <select class="form-control" name="type" style="width: 300px;">
                <option<?php if($first_select) echo ' selected="selected"';?>>Інвестування</option>
                <option<?php if($second_select) echo ' selected="selected"';?>>Повернення</option>
            </select>
            <input class="form-control" style="display: none;" name="id_invest" value="<?php echo $_GET['id_invest']; ?>"><br/>
            <input class="form-control" style="display: none;" name="id_project" value="<?php echo $_GET['id_project']; ?>"><br/>
            <input class="form-control" style="display: none;" name="id_trans" value="<?php echo $_GET['id_trans']; ?>"><br/>

            <button class="btn btn-lg btn-primary" type="submit">Редагувати транш</button>
        </form>
    </div>
    <script>
        $('#sandbox-container input').datepicker({
            format: "yyyy/mm/dd",
//            todayBtn: "linked",
            autoclose: true
        });
    </script>
<?php } ?>