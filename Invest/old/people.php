<?php


if(!$_GET['id']) {
    require_once('include/dbconnect.php');
    $active = 'people';
    require_once('include/header.php');
    require_once('include/people.php');
    require_once('include/jslib.php');

} else {

$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';

$db_table_to_show = 'people';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());
$qr_result = mysql_query("select * from " . $db_table_to_show)
or die(mysql_error());

$person_id = $_GET['id'];

while($data = mysql_fetch_array($qr_result)){
    if($data['id'] == $person_id) {
        $person = $data;
    };}
$active = 'pesron';
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
        $array_people[$row['id']] = array($row['name'].' '.$row['surname']);
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
    <h1 class="page-header"><?php echo $person['name'].' '.$person['surname']; ?></h1>
    <!--    <input class="form-control" style="width: 200px;" placeholder="Name" name="name" id="name"><br>-->
    <!--    <input class="form-control" style="width: 200px;" placeholder="Address" name="address" id="address"><br>-->
    <!--    <input class="form-control" style="width: 200px;" placeholder="Time to realize" name="time_realize" id="time_realize"><br>-->
    <!--    <input class="form-control" style="width: 200px;" placeholder="Finance In" name="finance_in" id="finance_in"><br>-->
    <!--    <input class="form-control" style="width: 200px;" placeholder="Finance Out" name="finance_out" id="finance_out"><br>-->
<!--    <div class="btn btn-lg btn-primary" id='openModalWay' data-toggle="modal" data-target="#wayModal">Add finance way</div>-->
<!--    <div class="btn btn-lg btn-primary" id='openModalRole' data-toggle="modal" data-target="#roleModal">Add role</div>-->
<!--    <div class="btn btn-lg btn-primary" id='openModalInvestment' data-toggle="modal" data-target="#investModal">Add investment</div>-->
    <!--            <div class="row placeholders">-->
    <!--                <div class="col-xs-6 col-sm-3 placeholder">-->
    <!--                    <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">-->
    <!--                    <h4>Label</h4>-->
    <!--                    <span class="text-muted">Something else</span>-->
    <!--                </div>-->
    <!--                <div class="col-xs-6 col-sm-3 placeholder">-->
    <!--                    <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">-->
    <!--                    <h4>Label</h4>-->
    <!--                    <span class="text-muted">Something else</span>-->
    <!--                </div>-->
    <!--                <div class="col-xs-6 col-sm-3 placeholder">-->
    <!--                    <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">-->
    <!--                    <h4>Label</h4>-->
    <!--                    <span class="text-muted">Something else</span>-->
    <!--                </div>-->
    <!--                <div class="col-xs-6 col-sm-3 placeholder">-->
    <!--                    <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">-->
    <!--                    <h4>Label</h4>-->
    <!--                    <span class="text-muted">Something else</span>-->
    <!--                </div>-->
    <!--            </div>-->
    <?php
    $db_table_to_show = 'roles';
    $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
    or die("Could not connect: " . mysql_error());
    mysql_select_db($db_name, $connect_to_db)
    or die("Could not select DB: " . mysql_error());
    $qr_result = mysql_query("select * from " . $db_table_to_show)
    or die(mysql_error());


    ?>
    <h2 class="sub-header">Задіяний у проектах</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Проект</th>
                <th>Сфера діяльності</th>
            </tr>
            </thead>
            <?php
            while($data = mysql_fetch_array($qr_result)){
                if($data['id_person'] == $person_id){
                    echo '<tr>
              <th><a href="/in/project.php?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>'.$data['role'].'</th>
              </tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>


    <?php
    $db_table_to_show = 'investment';
    $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
    or die("Could not connect: " . mysql_error());
    mysql_select_db($db_name, $connect_to_db)
    or die("Could not select DB: " . mysql_error());
    $qr_result = mysql_query("select * from " . $db_table_to_show)
    or die(mysql_error());


    ?>
    <h2 class="sub-header">Участь в інвестуванні</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Проект</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <?php
            while($data = mysql_fetch_array($qr_result)){
                if($data['id_person'] == $person_id){
                    echo '<tr>
              <th><a href="/in/project.php?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
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
                <h4 class="modal-title" id="myModalLabel">Участь у проекті</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="id_project" class="form-control" style="display: none;" value="<?php echo $project_id; ?>">
                <input type="text" id="addWay" placeholder="" class="form-control" style="width: 200px;">
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
                <h4 class="modal-title" id="myModalLabel">Add role</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="id_project" class="form-control" style="display: none;" value="<?php echo $project_id; ?>">
                <input type="text" id="addRole" class="form-control" style="width: 200px;">
                <input type="text" id="addID" class="form-control" style="width: 200px;">
                <!--                <input type="text" id="updateTime" class="form-control" style="width: 200px;">-->
                <!--                <input type="text" id="updateIn" class="form-control" style="width: 200px;">-->
                <!--                <input type="text" id="updateOut" class="form-control" style="width: 200px;">-->
            </div>
            <div class="modal-footer">
                <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveUpdate('role')">Save changes</button>
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
                <input type="text" id="addIDIn" class="form-control" style="width: 200px;">
                <input type="text" id="addSumIn" class="form-control" style="width: 200px;">
                <!--                <input type="text" id="updateTime" class="form-control" style="width: 200px;">-->
                <!--                <input type="text" id="updateIn" class="form-control" style="width: 200px;">-->
                <!--                <input type="text" id="updateOut" class="form-control" style="width: 200px;">-->
            </div>
            <div class="modal-footer">
                <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveUpdate('invest')">Save changes</button>
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
                }).done(function() {
                    jQuery('input').val('');
                });

                break;
            case 'role':
                f = jQuery('#addRole').val();
                s = jQuery('#addID').val();
                jQuery.ajax ({
                    url: 'http://yuma.lviv.ua/in/backend/additional_of_project.php',
                    data: {action: 'role', id: id, role: f, id_person:s}
                }).done(function() {
                    jQuery('input').val('');
                });
                break;
            case 'invest':
                f = jQuery('#addIDIn').val();
                s = jQuery('#addSumIn').val();
                jQuery.ajax ({
                    url: 'http://yuma.lviv.ua/in/backend/additional_of_project.php',
                    data: {action: 'invest', id: id, id_person: f, sum:s}
                }).done(function() {
                    jQuery('input').val('');
                });
                break;
        }
    }
</script>

</body>
</html><?php } ?>