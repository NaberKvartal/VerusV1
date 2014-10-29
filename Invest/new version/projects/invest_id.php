<?php

$db_table_to_show = 'projects';
$qr_result = mysql_query("select * from " . $db_table_to_show);

/* Check access */
require_once('../backend/access.php');
if($access == false) {
    echo $access;
    ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">У вас немає доступу до проекту</h1>
    </div>
    <?php
    die;
}
?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h4 class="sub-header"><a href="/projects/?id=<?php echo $_GET['id_project'];?>"><?php echo $array_projects[$_GET['id_project']][0]?></a> => Транші інвестування</h4>
        <?php if($_SESSION['admin'] == true) {        ?>
        <a href="/projects/?action=trans&id_invest=<?php echo $_GET['id_invest']; ?>&id_project=<?php echo $_GET['id_project']; ?>" class="btn btn-primary">Додати</a>
        <?php } ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Дата</th>
                    <th>Сума</th>
                    <?php if($_SESSION['admin'] == true) {        ?>
                    <th>Редагувати</th>
                    <th>Видалити</th>
                    <?php } ?>
                </tr>
                </thead>
                <?php
                $db_table_to_show = 'invest_trans';
                $qr_result = mysql_query("select * from " . $db_table_to_show. " ORDER BY  `invest_trans`.`date` ASC ");
                $sum = 0;
                while($data = mysql_fetch_array($qr_result)){
                    if($data['id_invest'] == $_GET['id_invest']){
                        if($data['type']=='invest'):
                            echo '<tr class="success">';
                            else:
                                echo '<tr class="danger">';
                                endif;
                        echo '<th>'.$data['date'].'</th>
                        <th>'.$data['sum'].'</th>';
                if($_SESSION['admin'] == true) {
                echo '<th><a href="/projects/?action=trans_edit&id_invest='.$_GET['id_invest'].'&id_project='.$_GET['id_project'].'&id_trans='.$data['id'].'" class="btn btn-warning">Редагувати</a></th>
                        <th><button onclick="deleteTrans('.$data['id'].');" class="btn btn-danger">Видалити</button></th>';
                }
                        echo '</tr>';
                        $data['type'] == 'invest' ? $sum = $sum+$data['sum'] : $sum = $sum-$data['sum'];
                    }
                }
                ?>
            </table>
            <h3>Сума усіх траншів: <?php echo $sum; ?></h3>
        </div>