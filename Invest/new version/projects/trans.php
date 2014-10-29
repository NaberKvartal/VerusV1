<?php
if($_POST) {
    $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    $_POST['type']=='Інвестування' ? $type='invest' : $type='back';

    $sql = "INSERT INTO `invest_trans`(`id_invest`, `date`, `sum`, `type`)
    VALUES ('".$_POST['id_invest']."', '".$_POST['date']."', '".$_POST['sum']."', '".$type."')";

    mysqli_query($con, $sql);
    mysqli_close($con);
    header( 'Location: /projects?action=invest_view&id_invest='.$_POST['id_invest'].'&id_project='.$_POST['id_project'] );
    echo '<script>window.location.replace("/projects?action=invest_view&id_invest='.$_POST['id_invest'].'&id_project='.$_POST['id_project'].'");</script>';

} else {?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h4 class="sub-header"><a href="/projects/?id=<?php echo $_GET['id_project'];?>"><?php echo $array_projects[$_GET['id_project']][0]?></a> =>
            <a href="/projects/?action=invest_view&id_invest=<?php echo $_GET['id_invest']?>&id_project=<?php echo $_GET['id_project']?>">Транші інвестування</a> =>
             Додавання траншу</h4>
        <form method="post">
            <label>Дата у форматі yyyy/mm/dd</label>
            <div id="sandbox-container">
                <input class="form-control" type="text" name="date" placeholder="Виберіть дату"><br/>
            </div>
            <input class="form-control" placeholder="Сума" name="sum"><br/>
            <select class="form-control" name="type" style="width: 300px;">
                <option>Інвестування</option>
                <option>Повернення</option>
            </select>

            <input class="form-control" style="display: none;" name="id_invest" value="<?php echo $_GET['id_invest']; ?>"><br/>
            <input class="form-control" style="display: none;" name="id_project" value="<?php echo $_GET['id_project']; ?>"><br/>
            <button class="btn btn-lg btn-primary" type="submit">Додати транш</button>
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