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

<?php if(!$project['id']): ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Проекту не існує</h1>
    </div>
<?php else: ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"><?php echo $project['name'];?></h1>
    <?php if($_SESSION['admin'] == true) {?>
    <a href="/projects/?action=edit&id=<?php echo $project['id']; ?>" class="btn btn-warning">Редагувати проект</a>
    <div onclick="deleteProject(<?php echo $project['id']; ?>);" class="btn btn-danger">Видалити проект</div>
    <?php } ?>
        <h2 class="sub-header">Інформація про проект</h2>
<!--    <label>Статус проекту-->
<!--        <select class="form-control" id="statusEdit" style="width: 200px;" onchange="editStatus(--><?php //echo $project['id']; ?><!--);">-->
<!--            <option--><?php //if($project['status']=='Старт') echo' selected="selected"' ?><!-->
<!--                Старт-->
<!--            </option>-->
<!--            <option--><?php //if($project['status']=='В процесі') echo' selected="selected"' ?><!-->
<!--                В процесі-->
<!--            </option>-->
<!--            <option--><?php //if($project['status']=='Закінчений') echo' selected="selected"' ?><!-->
<!--                Закінчений-->
<!--            </option>-->
<!--        </select>-->
<!--    </label>-->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Назва</th>
                <th><?php echo $project['name'];?></th>
            </tr>
            </thead>
            <tr>
                <th>ID концепції</th>
                <th><a href="/concepts/?id=<?php echo $project['id_concept'];?>"><?php echo $project['id_concept'];?></a></th>
            </tr>
            <tr>
                <th>ЖБК</th>
                <th><?php echo $project['zhbk'];?></th>
            </tr>
            <tr>
                <th>Сайт</th>
                <th><a href="<?php echo $project['site'];?>" target="_blank"><?php echo $project['site'];?></a></th>
            </tr>
<?php  if(file_exists('icon/'.$project_id.'.jpg')):?>          <tr>
                <th>Фото</th>
                <th><img style="width: 50px;" src="<?php echo 'icon/'.$project_id.'.jpg'; ?>"></th>
            </tr><?php endif; ?>
            <tr>
                <th>Місто</th>
                <th><?php echo $project['city'];?></th>
            </tr>
            <tr>
                <th>Тип будівлі</th>
                <th><?php echo $project['type'];?></th>
            </tr>
            <tr>
                <th>Прихідний рахунок</th>
                <th><?php echo $project['pay'];?></th>
            </tr>
            <tr>
                <th>Дата старту проекту</th>
                <th><?php echo $project['time_start'];?></th>
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


    <h2 class="sub-header">Секції</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <?php
            $db_table_to_show = 'sections';
            $qr_result = mysql_query("select * from " . $db_table_to_show);
            $array_sections = array();
            $sections = $project['sec_count'];
            ++$sections;
            while($row = mysql_fetch_array($qr_result)){
                if($row['id_project']==$project['id']){
                    for($i=1; $i<$sections; ++$i){
                        $array_sections['zbk_'.$i] = $row['zbk_'.$i];
                        $array_sections['acc_'.$i] = $row['acc_'.$i];
                        $array_sections['cost_'.$i] = $row['cost_'.$i];
                    }
                }
                $array_projects[$row['id']] = array($row['name']);
            }

            $section_count = $project['sec_count'];
            ++$section_count;
            if(count($array_sections)!=0) {
                echo '            <thead>
            <tr>
                <th>Секція</th>
                <th>ЖБК</th>
                <th>Прихідний рахунок</th>
                <th>Вартість секції</th>
            </tr>
            </thead>';

            for($i=1; $i<$section_count; ++$i) {
                echo '<tr>';
                echo '<th>Секція '.$i.'</th>
                <th>'.$array_sections['zbk_'.$i].'</th>
              <th>'.$array_sections['acc_'.$i].'</th>
              <th>'.$array_sections['cost_'.$i].'</th>
              </tr>';
            }
            } else {
                echo '<h3><i>Інформація недоступна</i></h3>';
            }
            ?>
            </tbody>
        </table>
    </div>



    <h2 class="sub-header">Учасники проекту</h2>
        <?php if($roles == 'null'){ ?>
        <?php if($_SESSION['admin'] == true) {?>
        <a href="/projects/?action=role&id=<?php echo $project_id; ?>" class="btn btn-lg btn-primary">Додати</a>
    <?php }
    }else{ ?>
        <?php if($_SESSION['admin'] == true) {?>

            <a href="/projects/?action=role&id=<?php echo $project_id; ?>" class="btn btn-lg btn-primary">Редагувати</a>
<?php } ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Учасник</th>
                    <th>Посада</th>
                    <th>Відсоток</th>
                </tr>
                </thead>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['start_man']; ?>">
                            <?php echo $array_people[$roles['start_man']]['0']; ?>
                        </a>
                    </th>
                    <th>Старт-Менеджер</th>
                    <th><?php echo $roles['start_man_pr']; ?> %</th>
                </tr>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['rek']; ?>">
                            <?php echo $array_people[$roles['rek']]['0']; ?>
                        </a>
                    </th>
                    <th>Реклама-Продаж</th>
                    <th><?php echo $roles['rek_pr']; ?> %</th>
                </tr>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['kur']; ?>">
                            <?php echo $array_people[$roles['kur']]['0']; ?>
                        </a>
                    </th>
                    <th>Куратор</th>
                    <th><?php echo $roles['kur_pr']; ?> %</th>
                </tr>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['of_gen']; ?>">
                            <?php echo $array_people[$roles['of_gen']]['0']; ?>
                        </a>
                    </th>
                    <th>Оф. Ген. Підрядник</th>
                    <th><?php echo $roles['of_gen_pr']; ?> %</th>
                </tr>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['project']; ?>">
                            <?php echo $array_people[$roles['project']]['0']; ?>
                        </a>
                    </th>
                    <th>Проектувальник</th>
                    <th><?php echo $roles['project_pr']; ?> %</th>
                </tr>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['tech']; ?>">
                            <?php echo $array_people[$roles['tech']]['0']; ?>
                        </a>
                    </th>
                    <th>Технагляд</th>
                    <th><?php echo $roles['tech_pr']; ?> %</th>
                </tr>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['auditor']; ?>">
                            <?php echo $array_people[$roles['auditor']]['0']; ?>
                        </a>
                    </th>
                    <th>Аудитор</th>
                    <th><?php echo $roles['auditor_pr']; ?> %</th>
                </tr>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['nets']; ?>">
                            <?php echo $array_people[$roles['nets']]['0']; ?>
                        </a>
                    </th>
                    <th>Зовнішні мережі</th>
                    <th><?php echo $roles['nets_pr']; ?> %</th>
                </tr>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['infra']; ?>">
                            <?php echo $array_people[$roles['infra']]['0']; ?>
                        </a>
                    </th>
                    <th>Інфраструктура</th>
                    <th><?php echo $roles['infra_pr']; ?> %</th>
                </tr>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['earth']; ?>">
                            <?php echo $array_people[$roles['earth']]['0']; ?>
                        </a>
                    </th>
                    <th>Земля</th>
                    <th><?php echo $roles['earth_pr']; ?> %</th>
                </tr>
                <tr>
                    <th>
                        <a href="/people/?id=<?php echo $roles['pred']; ?>">
                            <?php echo $array_people[$roles['pred']]['0']; ?>
                        </a>
                    </th>
                    <th>Представницькі витрати</th>
                    <th><?php echo $roles['pred_pr']; ?> %</th>
                </tr>
                </tbody>
            </table>
        </div>

    <?php } ?>
    <?php
    $db_table_to_show = 'investment';
    $qr_result = mysql_query("select * from " . $db_table_to_show);
    ?>
    <h2 class="sub-header">Інвестиції</h2>
    <?php             if($_SESSION['admin'] == true) {        ?>
            <a href="/projects/?action=invest&id=<?php echo $project_id; ?>" class="btn btn-lg btn-primary">Додати інформацію про інвестування</a>
    <?php } ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Інвестор</th>
                <th>Сума інвестицій</th>
                <th>Відсоток</th>
                <th>Акції</th>
                <th>На даний момент</th>
                <th>Транші</th>
                <?php if($_SESSION['admin'] == true) {?>
                <th>Редагування</th>
                <th>Видалення</th>
                <?php }?>
            </tr>
            </thead>
            <?php
            $sum=0;
            while($dat = mysql_fetch_array($qr_result)){
                if($dat['id_project'] == $project_id){
                    $sum = $sum + $dat['sum'];
                }
            }
            $db_table_to_show = 'investment';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
                $percent = $data['sum']/$sum*100;
                $packages = $data['sum']/1000;
//                $s = $data['sum']%1000;
//                if($s>499) --$packages;
                    if($data['id_project'] == $project_id){
                    echo '<tr>';
                        if(!$data['id_broker']) {
                            echo '<th><a href="/people/?id='.$data['id_person'].'">'.$array_people[$data['id_person']]['0'].'</a></th>';
                        } else {
                            echo '<th><a href="/people/?id='.$data['id_person'].'">'.$array_people[$data['id_person']]['0'].'</a>  (<a href="/people/?id='.$data['id_broker'].'">'.$array_people[$data['id_broker']]['0'].'</a>)</th>';
                        }
                    echo '<th>'.number_format($data['sum'], 0, '', ',').'</th>
              <th>'.number_format($percent, 4, ',', ',').'%</th>
              <th>'.number_format($packages, 0, '', ' ').'</th>
              <th>'.number_format($data['realsum'], 0, '', ',').'</th>
              <th><a href="/projects/?action=invest_view&id_invest='.$data['id'].'&id_project='.$project['id'].'" class="btn btn-primary">Переглянути</a></th>';
            if($_SESSION['admin'] == true) {
                echo '<th><a href="/projects/?action=invest_edit&id_invest='.$data['id'].'" class="btn btn-warning">Редагувати</a></th>
              <th><a onclick="deleteInvestment('.$data['id'].')" class="btn btn-danger">Видалити</a></th>';
                        }
                        echo '</tr>';
                }
            }
            ?>
            </tbody>
        </table>
        <h2>Сума інвестицій у проект: <?php echo number_format($sum, 0, '', ','); ?></h2>
        <h2>Сума акцій: <?php echo number_format($sum/1000, 0, '', ','); ?></h2>
    </div>


    </div>
<?php endif; ?>