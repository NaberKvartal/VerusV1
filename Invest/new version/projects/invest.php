<?php
if($_POST) {
    $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

    $sql = "INSERT INTO `investment`(`id_project`, `id_person`, `id_broker`, `sum`, `realsum`)
    VALUES ('".$project_id."', '".$_POST['user']."', '".$_POST['broker']."', '".$_POST['sum']."', '".$_POST['realsum']."')";

    mysqli_query($con, $sql);
    mysqli_close($con);
    header( 'Location: /projects/?id='.$project_id );
} else {?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4 class="sub-header"><a href="/projects/?id=<?php echo $project_id;?>"><?php echo $array_projects[$project_id][0]?></a> => Додавання інвестування</h4>
            <form method="post">
                <input class="form-control" placeholder="Інвестор" id="name_user">
                <input class="form-control" style="display: none;" placeholder="Інвестор" id="user_id" name="user">
                <div id="con_user"></div>
                <br/>
                <input class="form-control" placeholder="Брокер (необов'язково)" id="name_broker">
                <input class="form-control" style="display: none;" id="broker_id" name="broker">
                <div id="con_broker"></div>
                <br/>
                <input class="form-control" placeholder="Сума інвестицій" name="sum"><br/>
                <input class="form-control" placeholder="На даний момент" name="realsum"><br/>
                <button class="btn btn-lg btn-primary" type="submit">Додати інвестора</button>
            </form>
        </div>
<?php } ?>