<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header"><?php echo $info_project['name'];?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Назва</th>
                <th><?php echo $info_project['name'];?></th>
            </tr>
            <tr>
                <th>ЖБК</th>
                <th><?php echo $info_project['zhbk'];?></th>
            </tr>
            <tr>
                <th>Сайт</th>
                <th><a href="<?php echo $info_project['site'];?>" target="_blank"><?php echo $info_project['site'];?></a></th>
            </tr>
            <?php  if(file_exists('icon/'.$info_project['id'].'.jpg')):?>
            <tr>
                <th>Фото</th>
                <th><img style="width: 50px;" src="<?php echo 'icon/'.$info_project['id'].'.jpg'; ?>"></th>
            </tr>
            <?php endif; ?>
            <tr>
                <th>Місто</th>
                <th><?php echo $info_project['city'];?></th>
            </tr>
            <tr>
                <th>Тип будівлі</th>
                <th><?php echo $info_project['type'];?></th>
            </tr>
            <tr>
                <th>Прихідний рахунок</th>
                <th><?php echo $info_project['pay'];?></th>
            </tr>
            <tr>
                <th>Дата старту проекту</th>
                <th><?php echo $info_project['time_start'];?></th>
            </tr>
            <tr>
                <th>Термін реалізації</th>
                <th><?php echo $info_project['time_realize'];?></th>
            </tr>
            <tr>
                <th>Вартість одної секції</th>
                <th><?php echo number_format($info_project['cost_one_sec'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Кількість секцій</th>
                <th><?php echo $info_project['sec_count'];?></th>
            </tr>
            <tr>
                <th>Вартість усіх секцій</th>
                <th><?php echo number_format($info_project['cost_all_sec'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Загальна вартість</th>
                <th><?php echo number_format($info_project['full_cost_sec'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Середня ціна житлової площі</th>
                <th><?php echo number_format($info_project['middle_cost_life'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Житлова площа</th>
                <th><?php echo $info_project['square_life'];?></th>
            </tr>
            <tr>
                <th>Вартість житлової площі</th>
                <th><?php echo number_format($info_project['sum_cost_life'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Середня ціна комерційної площі</th>
                <th><?php echo number_format($info_project['middle_cost_bus'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Комерційна площа</th>
                <th><?php echo $info_project['square_bus'];?></th>
            </tr>
            <tr>
                <th>Вартість комерційної площі</th>
                <th><?php echo number_format($info_project['sum_cost_bus'], 0, '', ',');?></th>
            </tr>
            <tr>
                <th>Загальна вартість будівництва</th>
                <th><?php echo number_format($info_project['full_cost'], 0, '', ',');?></th>
            </tr>
        </table>
    </div>
    <h4 class="page-header">Секції</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Номер секції</th>
                <th>ЖБК</th>
                <th>Прихідний рахунок</th>
                <th>Вартість секції</th>
            </tr>
            <?php
                for($i=1; $i<$info_project['sec_count']; ++$i){
                    echo '
                    <tr>
                    <th>Секція '.$i.'</th>
                    <th>'.$info_sections['zhbk_'.$i].'</th>
                    <th>'.$info_sections['acc_'.$i].'</th>
                    <th>'.$info_sections['cost_'.$i].'</th>
                    </tr>
                    ';
                }
            ?>
            </table>
        </div>
    <h4 class="page-header">Учасники проекту</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Учасник</th>
                <th>Посада</th>
                <th>Відсоток</th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['start_man']; ?>">
                        <?php echo $array_people[$info_roles['start_man']]; ?>
                    </a>
                </th>
                <th>Старт-Менеджер</th>
                <th><?php if($info_roles['start_man_pr']): echo $info_roles['start_man_pr'].' %'; endif; ?></th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['rek']; ?>">
                        <?php echo $array_people[$info_roles['rek']]; ?>
                    </a>
                </th>
                <th>Реклама-Продаж</th>
                <th><?php if($info_roles['rek_pr']): echo $info_roles['rek_pr'].' %'; endif; ?></th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['kur']; ?>">
                        <?php echo $array_people[$info_roles['kur']]; ?>
                    </a>
                </th>
                <th>Куратор</th>
                <th><?php if($info_roles['kur_pr']): echo $info_roles['kur_pr'].' %'; endif; ?></th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['of_gen']; ?>">
                        <?php echo $array_people[$info_roles['of_gen']]; ?>
                    </a>
                </th>
                <th>Оф. Ген. Підрядник</th>
                <th><?php if($info_roles['of_gen_pr']): echo $info_roles['of_gen_pr'].' %'; endif; ?></th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['project']; ?>">
                        <?php echo $array_people[$info_roles['project']]; ?>
                    </a>
                </th>
                <th>Проектувальник</th>
                <th><?php if($info_roles['project_pr']): echo $info_roles['project_pr'].' %'; endif; ?></th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['tech']; ?>">
                        <?php echo $array_people[$info_roles['tech']]; ?>
                    </a>
                </th>
                <th>Технагляд</th>
                <th><?php if($info_roles['tech_pr']): echo $info_roles['tech_pr'].' %'; endif; ?></th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['auditor']; ?>">
                        <?php echo $array_people[$info_roles['auditor']]; ?>
                    </a>
                </th>
                <th>Аудитор</th>
                <th><?php if($info_roles['auditor_pr']): echo $info_roles['auditor_pr'].' %'; endif; ?></th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['nets']; ?>">
                        <?php echo $array_people[$info_roles['nets']]; ?>
                    </a>
                </th>
                <th>Зовнішні мережі</th>
                <th><?php if($info_roles['nets_pr']): echo $info_roles['nets_pr'].' %'; endif; ?></th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['infra']; ?>">
                        <?php echo $array_people[$info_roles['infra']]; ?>
                    </a>
                </th>
                <th>Інфраструктура</th>
                <th><?php if($info_roles['infra_pr']): echo $info_roles['infra_pr'].' %'; endif; ?></th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['earth']; ?>">
                        <?php echo $array_people[$info_roles['earth']]; ?>
                    </a>
                </th>
                <th>Земля</th>
                <th><?php if($info_roles['earth_pr']): echo $info_roles['earth_pr'].' %'; endif; ?></th>
            </tr>
            <tr>
                <th>
                    <a href="/people/?id_person=<?php echo $info_roles['pred']; ?>">
                        <?php echo $array_people[$info_roles['pred']]; ?>
                    </a>
                </th>
                <th>Представницькі витрати</th>
                <th><?php if($info_roles['pred_pr']): echo $info_roles['pred_pr'].' %'; endif; ?></th>
            </tr>
        </table>
    </div>

    <h4 class="page-header">Інвестиції</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Інвестор (брокер)</th>
                <th>Сума</th>
                <th>Акції</th>
            </tr>
            <?php foreach($info_investment_of_project as $value) {
                echo '<tr>';
                echo '<th>'.$value['id_person'].'</th>';
                echo '<th>'.$value['sum'].'</th>
                <th>'.$value['sum'].'</th>
                </tr>';
            }?>



</div>
