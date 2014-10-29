<?php
$payment = 'nul';
$db_table_to_show = 'payment';
$qr_result1 = mysql_query("select * from " . $db_table_to_show);
while($row = mysql_fetch_array($qr_result1)){
    if($row['id_person'] == $_GET['id_person']) {
        $payment = $row;
    }
}
if($_POST) {
    $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if($payment=='nul'){
        $sql="INSERT INTO `payment`(`id_person`, `number`, `status`, `percent`)
        VALUES ('".$_POST['id_person']."','".$_POST['number']."',
        '".$_POST['status']."','".$_POST['percent']."')";
    } else {
        $sql = "UPDATE `payment` SET `number`='".$_POST['number']."',`status`='".$_POST['status']."',
        `percent`='".$_POST['percent']."'
        WHERE `id_person`=".$_POST['id_person'];
    }

    mysqli_query($con, $sql);
    mysqli_close($con);
    header( 'Location: /people/?id='.$_POST['id_person'] );
} else {
    if($payment=='nul'){ ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4 class="sub-header">
                <a href="/people/?id=<?php echo $_GET['id_person'];?>"><?php echo $array_people[$_GET['id_person']][0];?></a>
                => Додавання фінансової інформації</h4>
            <form method="post">
                <input type="text" class="form-control" style="display: none;" name="id_person" value="<?php echo $_GET['id_person']?>"><br/>
                <input type="text" class="form-control" name="number" placeholder="Номер"><br/>

                <input type="text" class="form-control" name="status" placeholder="Стан рахунку"><br/>

                <input type="text" class="form-control" name="percent" placeholder="Відсоткова ставка"><br/>

                <button class="btn btn-lg btn-primary" type="submit">Додати</button>
            </form>
        </div>
    <?php }else{ ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h4 class="sub-header">
                <a href="/people/?id=<?php echo $_GET['id_person'];?>"><?php echo $array_people[$_GET['id_person']][0];?></a>
                => Редагування фінансової інформації</h4>
            <form method="post">
                <input type="text" class="form-control" style="display: none;" name="id_person" value="<?php echo $payment['id_person']?>"><br/>
                <input type="text" class="form-control" name="number" placeholder="Номер" value="<?php echo $payment['number'];?>"><br/>

                <input type="text" class="form-control" name="status" placeholder="Стан рахунку" value="<?php echo $payment['status'];?>"><br/>

                <input type="text" class="form-control" name="percent" placeholder="Відсоткова ставка" value="<?php echo $payment['percent'];?>"><br/>

                <button class="btn btn-lg btn-primary" type="submit">Редагувати</button>
            </form>
        </div>

    <?php } ?>
<?php } ?>