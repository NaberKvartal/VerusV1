<?php

if(!$_GET['id']) {
    require_once('include/dbconnect_pr.php');
    $active = 'project';
    require_once('include/header.php');
    require_once('include/projects.php');
    require_once('include/jslib_pr.php');
} else {

$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$db_table_to_show = 'project_full';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());
$qr_result = mysql_query("select * from " . $db_table_to_show)
or die(mysql_error());

$project_id = $_GET['id'];

while($data = mysql_fetch_array($qr_result)){
    if($data['id'] == $project_id) {
        $project = $data;
    };}
$active = 'project';
require_once('include/header.php');

    $db_table_to_show = 'people';
    $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
    or die("Could not connect: " . mysql_error());
    mysql_select_db($db_name, $connect_to_db)
    or die("Could not select DB: " . mysql_error());
    $qr_result = mysql_query("select * from " . $db_table_to_show)
    or die(mysql_error());
    $array_people = array();
    while($row = mysql_fetch_array($qr_result)){
        $full = $row['surname'].' '.$row['name'];
        $array_people[$row['id']] = array($full);
    }

    $db_table_to_show = 'project_full';
    $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
    or die("Could not connect: " . mysql_error());
    mysql_select_db($db_name, $connect_to_db)
    or die("Could not select DB: " . mysql_error());
    $qr_result = mysql_query("select * from " . $db_table_to_show)
    or die(mysql_error());
    $array_projects = array();
    while($row = mysql_fetch_array($qr_result)){
        $array_projects[$row['id']] = array($row['name']);
    }
?>



<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"><?php echo $project['name'];?></h1>
    <h2 class="sub-header">Інформація про проект</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Назва</th>
                <th><?php echo $project['name'];?></th>
            </tr>
            </thead>
            <tr>
                <th>Прохідний рахунок</th>
                <th><?php echo $project['pay'];?></th>
            </tr>
            <tr>
                <th>Термін реалізації</th>
                <th><?php echo $project['time_realize'];?></th>
            </tr>
            <tr>
                <th>Вартість одної секції</th>
                <th><?php echo number_format($project['cost_one_sec'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Кількість секцій</th>
                <th><?php echo $project['sec_count'];?></th>
            </tr>
            <tr>
                <th>Вартість усіх секцій</th>
                <th><?php echo number_format($project['cost_all_sec'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Загальна вартість</th>
                <th><?php echo number_format($project['full_cost_sec'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Середня ціна житлової площі</th>
                <th><?php echo number_format($project['middle_cost_life'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Житлова площа</th>
                <th><?php echo $project['square_life'];?></th>
            </tr>
            <tr>
                <th>Вартість житлової площі</th>
                <th><?php echo number_format($project['sum_cost_life'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Середня ціна комерційної площі</th>
                <th><?php echo number_format($project['middle_cost_bus'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Комерційна площа</th>
                <th><?php echo $project['square_bus'];?></th>
            </tr>
            <tr>
                <th>Вартість комерційної площі</th>
                <th><?php echo number_format($project['sum_cost_bus'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Загальна вартість будівництва</th>
                <th><?php echo number_format($project['full_cost'], 0, '', ',');?></th>
            </tr>
            </tbody>
        </table>
    </div>
    <?php
    $db_table_to_show = 'roles';
    $qr_result = mysql_query("select * from " . $db_table_to_show);
    ?>
    <h2 class="sub-header">Учасники проекту</h2>
    <div class="btn btn-lg btn-primary" id='openModalRole' data-toggle="modal" data-target="#roleModal">Додати учасника</div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Посада</th>
                <th>Учасник</th>
            </tr>
            </thead>
            <?php
            while($data = mysql_fetch_array($qr_result)){
                if($data['id_project'] == $project_id){
                    echo '<tr>
              <th>'.$data['role'].'</th>
              <th><a href="/in/people.php?id='.$data['id_person'].'">'.$array_people[$data['id_person']]['0'].'</a></th>
              </tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>


    <?php
    $db_table_to_show = 'investment';
    $qr_result = mysql_query("select * from " . $db_table_to_show);
    ?>
    <h2 class="sub-header">Інвестиції</h2>
    <div class="btn btn-lg btn-primary" id='openModalInvestment' data-toggle="modal" data-target="#investModal">Додати інформацію про інвестування</div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Інвестор</th>
                <th>Сума інвестицій</th>
            </tr>
            </thead>
            <?php
            while($data = mysql_fetch_array($qr_result)){
                if($data['id_project'] == $project_id){
                    echo '<tr>
              <th><a href="/in/people.php?id='.$data['id_person'].'">'.$array_people[$data['id_person']]['0'].'</a></th>
              <th>'.number_format($data['sum'], 0, '', ',').'</th>
              </tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>


</div>
</div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="wayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add finance way</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="id_project" class="form-control" style="display: none;" value="<?php echo $project_id; ?>">
                <input type="text" id="addWay" class="form-control" style="width: 200px;">
                <input type="text" id="addSum" class="form-control" style="width: 200px;">
                <!--                <input type="text" id="updateTime" class="form-control" style="width: 200px;">-->
                <!--                <input type="text" id="updateIn" class="form-control" style="width: 200px;">-->
                <!--                <input type="text" id="updateOut" class="form-control" style="width: 200px;">-->
            </div>
            <div class="modal-footer">
                <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveUpdate('way')">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Додати учасника проекту</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="id_project" class="form-control" style="display: none;" value="<?php echo $project_id; ?>">
                <input type="text" id="addRole" placeholder="Посада" class="form-control" style="width: 200px;">
                <input type="text" id="addID" placeholder="ID учасника" class="form-control" style="width: 200px;">
                <!--                <input type="text" id="updateTime" class="form-control" style="width: 200px;">-->
                <!--                <input type="text" id="updateIn" class="form-control" style="width: 200px;">-->
                <!--                <input type="text" id="updateOut" class="form-control" style="width: 200px;">-->
            </div>
            <div class="modal-footer">
                <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary" onclick="saveUpdate('role')">Зберегти зміни</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="investModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add investment</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="id_project" class="form-control" style="display: none;" value="<?php echo $project_id; ?>">
                <input type="text" id="addIDIn" placeholder="ID інвестора" class="form-control" style="width: 200px;">
                <input type="text" id="addSumIn" placeholder="Сума інвестицій" class="form-control" style="width: 200px;">
                <!--                <input type="text" id="updateTime" class="form-control" style="width: 200px;">-->
                <!--                <input type="text" id="updateIn" class="form-control" style="width: 200px;">-->
                <!--                <input type="text" id="updateOut" class="form-control" style="width: 200px;">-->
            </div>
            <div class="modal-footer">
                <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary" onclick="saveUpdate('invest')">Зберегти зміни</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script>
    function saveUpdate(attr) {
        var id, f, s;
        id = <?php echo $project_id; ?>;
        switch (attr) {
            case 'way':
                f = jQuery('#addWay').val();
                s = jQuery('#addSum').val();
                jQuery.ajax ({
                    url: 'http://yuma.lviv.ua/in/backend/additional_of_project.php',
                    data: {action: 'way', id: id, item: f, sum:s}
                }).done(function(response) {
                    jQuery('input').val('');
                    console.log(response);
                    jQuery('#closeModal').click();
                });

                break;
            case 'role':
                f = jQuery('#addRole').val();
                s = jQuery('#addID').val();
                jQuery.ajax ({
                    url: 'http://yuma.lviv.ua/in/backend/additional_of_project.php',
                    data: {action: 'role', id: id, role: f, id_person:s}
                }).done(function(response) {
                    jQuery('input').val('');
                    console.log(response);
                    jQuery('#closeModal').click();
                });
                break;
            case 'invest':
                f = jQuery('#addIDIn').val();
                s = jQuery('#addSumIn').val();
                jQuery.ajax ({
                    url: 'http://yuma.lviv.ua/in/backend/additional_of_project.php',
                    data: {action: 'invest', id: id, id_person: f, sum:s}
                }).done(function(response) {
                    jQuery('input').val('');
                    console.log(response);
                    jQuery('#closeModal').click();
                });
                break;
        }
    }
</script>

</body>
</html><?php }?>