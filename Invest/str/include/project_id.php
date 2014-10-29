<?php if(!$project['id']): ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Проекту не існує</h1>
</div>
<?php else: ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header"><?php echo $project['name'];?></h1>
        <a href="/projects/edit.php?id=<?php echo $project_id; ?>" class="btn btn-lg btn-warning">Редагувати проект</a>
        <h2 class="sub-header">Інформація про проект</h2>
        <label>Статус проекту
        <select class="form-control" id="statusEdit" style="width: 200px;" onchange="editStatus(<?php echo $project['id']; ?>);">
            <option<?php if($project['status']=='Старт') echo' selected="selected"' ?>>Старт</option>
            <option<?php if($project['status']=='В процесі') echo' selected="selected"' ?>>В процесі</option>
            <option<?php if($project['status']=='Закінчений') echo' selected="selected"' ?>>Закінчений</option>
        </select>
        </label>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Назва</th>
                    <th><?php echo $project['name'];?></th>
                </tr>
                </thead>
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
        <h2 class="sub-header">Учасники проекту</h2>
<?php if($roles == 'null'): ?>
        <a href="/projects/add_role.php?id=<?php echo $project_id; ?>" class="btn btn-lg btn-primary">Додати</a>
<?php else: ?>
        <a href="/projects/add_role.php?id=<?php echo $project_id; ?>" class="btn btn-lg btn-primary">Редагувати</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Учасник</th>
                    <th>Посада</th>
                </tr>
                </thead>
                <tr>
                    <th>
                        <a href="http://invest.yuma.lviv.ua/people/?id=<?php echo $roles['start_man']; ?>">
                        <?php echo $array_people[$roles['start_man']]['0']; ?>
                    </a>
                    </th>
                    <th>Старт-Менеджер</th>
                </tr>
                <tr>
                    <th>
                        <a href="http://invest.yuma.lviv.ua/people/?id=<?php echo $roles['rek']; ?>">
                        <?php echo $array_people[$roles['rek']]['0']; ?>
                        </a>
                    </th>
                    <th>Реклама-Продаж</th>
                </tr>
                <tr>
                    <th>
                        <a href="http://invest.yuma.lviv.ua/people/?id=<?php echo $roles['kur']; ?>">
                        <?php echo $array_people[$roles['kur']]['0']; ?>
                    </a>
                    </th>
                    <th>Куратор</th>
                </tr>
                <tr>
                    <th>
                        <a href="http://invest.yuma.lviv.ua/people/?id=<?php echo $roles['of_gen']; ?>">
                        <?php echo $array_people[$roles['of_gen']]['0']; ?>
                    </a>
                    </th>
                    <th>Оф. Ген. Підрядник</th>
                </tr>
                <tr>
                    <th>
                        <a href="http://invest.yuma.lviv.ua/people/?id=<?php echo $roles['project']; ?>">
                        <?php echo $array_people[$roles['project']]['0']; ?>
                    </a>
                    </th>
                    <th>Проектувальник</th>
                </tr>
                <tr>
                    <th>
                        <a href="http://invest.yuma.lviv.ua/people/?id=<?php echo $roles['tech']; ?>">
                        <?php echo $array_people[$roles['tech']]['0']; ?>
                        </a>
                    </th>
                    <th>Технагляд</th>
                </tr>
                <tr>
                    <th>
                        <a href="http://invest.yuma.lviv.ua/people/?id=<?php echo $roles['auditor']; ?>">
                        <?php echo $array_people[$roles['auditor']]['0']; ?>
                        </a>
                    </th>
                    <th>Аудитор</th>
                </tr>
                <tr>
                    <th>
                        <a href="http://invest.yuma.lviv.ua/people/?id=<?php echo $roles['nets']; ?>">
                        <?php echo $array_people[$roles['nets']]['0']; ?>
                        </a>
                    </th>
                    <th>Зовнішні мережі</th>
                </tr>
                <tr>
                    <th>
                        <a href="http://invest.yuma.lviv.ua/people/?id=<?php echo $roles['infra']; ?>">
                        <?php echo $array_people[$roles['infra']]['0']; ?>
                        </a>
                    </th>
                    <th>Інфраструктура</th>
                </tr>
                <tr>
                    <th>
                        <a href="http://invest.yuma.lviv.ua/people/?id=<?php echo $roles['earth']; ?>">
                        <?php echo $array_people[$roles['earth']]['0']; ?>
                        </a>
                    </th>
                    <th>Земля</th>
                </tr>
                </tbody>
            </table>
        </div>

<?php endif; ?>
        <?php
        $db_table_to_show = 'investment';
        $qr_result = mysql_query("select * from " . $db_table_to_show);
        ?>
        <h2 class="sub-header">Інвестиції</h2>
<!--        <div class="btn btn-lg btn-primary" id='openModalInvestment' data-toggle="modal" data-target="#investModal">Додати інформацію про інвестування</div>-->
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
              <th><a href="/people/?id='.$data['id_person'].'">'.$array_people[$data['id_person']]['0'].'</a></th>
              <th>'.number_format($data['sum'], 0, '', ',').'</th>
              </tr>';
                    }
                }
                ?>
                </tbody>
            </table>
        </div>


    </div>
<?php endif; ?>