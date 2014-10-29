
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <?php if($_GET['success_add']) {
        echo '<div class="alert alert-success" role="alert">Ви успішно подали заявку на вакансію!</div>';
    }?>
    <h2 class="sub-header">Вакансії</h2>
<!--    <label>Пошук по назві</label>-->
<!--    <input type="text" class="form-control" id="projectsSearch" placeholder="Введіть назву проекту"><br>-->
<!--    <label>Фільтри</label>-->
<!--    <input type="text" class="form-control" id="filterCity" placeholder="Введіть місто">-->
<!--    <select class="form-control" style="width: 300px;" id="filterStatus">-->
<!--        <option>Виберіть статус проекту</option>-->
<!--        <option>Підготовка</option>-->
<!--        <option>Пошук команди</option>-->
<!--        <option>Пошук інвестицій</option>-->
<!--        <option>Старт</option>-->
<!--        <option>Будується</option>-->
<!--        <option>Завершений</option>-->
<!--    </select>-->
<!--    <select class="form-control" style="width: 300px; display: none;" id="filterTime">-->
<!--        <option>Виберіть час тривалості проекту</option>-->
<!--        <option>До 1 року</option>-->
<!--        <option>Від 1 до 2 років</option>-->
<!--        <option>Від 2 до 3 років</option>-->
<!--    </select>-->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Назва проекту</th>
                <th>Вакансія</th>
                <th>Заявка на вакансію</th>
            </tr>
            </thead>
            <?php
            $db_table_to_show = 'vacancy';
            $qr_result = mysql_query("select * from " . $db_table_to_show);
            $array_name_roles = array(
                'start_man' => 'Старт-Менеджер',
                'rek' => 'Реклама-Продаж',
                'kur' => 'Куратор',
                'of_gen' => 'Оф. Ген. Підрядник',
                'project' => 'Проектувальник',
                'tech' => 'Технагляд',
                'auditor' => 'Аудитор',
                'nets' => 'Зовнішні мережі',
                'infra' => 'Інфраструктура',
                'earth' => 'Земля',
                'pred' => 'Представницькі витрати'
            );
            $last_project_id = 0;
            while($data = mysql_fetch_array($qr_result)){
                if($data['status']=='active') {
                    echo '<tr>';
                    echo '<th><a href="/projects/?id='.$data['id_project'].'">' . $array_projects[$data['id_project']][0] . '</a></th>';
                    echo '<th>'.$array_name_roles[$data['type']].'</th>';
                    echo '<th><a href="/vacancy/?action=add_prop&vacancy='.$data['id'].'" class="btn btn-primary">Подати</a></th>';
                    echo '</tr>';
                    }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
