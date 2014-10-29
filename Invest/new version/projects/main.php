<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <?php if($_SESSION['admin'] == true) {?>
    <a href="/projects/?action=create" class="btn btn-lg btn-primary">Створити проект</a>
    <?php } ?>
    <h2 class="sub-header">Проекти</h2>
    <label>Пошук по назві</label>
    <input type="text" class="form-control" id="projectsSearch" placeholder="Введіть назву проекту"><br>
    <label>Фільтри</label>
    <input type="text" class="form-control" id="filterCity" placeholder="Введіть місто">
    <select class="form-control" style="width: 300px;" id="filterStatus">
        <option>Виберіть статус проекту</option>
        <option>Підготовка</option>
        <option>Пошук команди</option>
        <option>Пошук інвестицій</option>
        <option>Старт</option>
        <option>Будується</option>
        <option>Завершений</option>
    </select>
    <select class="form-control" style="width: 300px; display: none;" id="filterTime">
        <option>Виберіть час тривалості проекту</option>
        <option>До 1 року</option>
        <option>Від 1 до 2 років</option>
        <option>Від 2 до 3 років</option>
    </select>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
<!--                <th>ID</th>-->
<!--                <th>ID Концепції</th>-->
                <th>Назва</th>
                <th>Статус</th>
                <th>Прихідний рахунок</th>
                <th>Тривалість</th>
                <?php if($_SESSION['admin'] == true) {?>
                <th>Оновити</th>
                <?php } ?>
<!--                                <th>Видалити</th>-->
            </tr>
            </thead>
            <?php
            $db_table_to_show = 'projects';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
//                $data['name'] = mb_strtolower($data['name'], 'UTF-8');
                echo '<tr>';
//                echo '<th>' . $data['id'] . '</a></th>';
//                echo '<th>' . $data['id_concept'] . '</a></th>';
                echo '<th><a href="/projects/?id=' . $data['id'] . '">' . $data['name'] . '</a></th>';
                echo '<th>' . $data['status'] . '</th>';
                echo '<th>' . $data['pay'] . '</th>';
                echo '<th>' . $data['time_realize'] . '</th>';
if($_SESSION['admin'] == true) {
    echo '<th><a href="/projects/?action=edit&id='.$data['id'].'" class="btn btn-warning">Оновити</a></th>';
}
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
