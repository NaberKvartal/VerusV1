<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!--    <h1 class="page-header">Dashboard</h1>-->
    <label>Основна інформація
        <input class="form-control" style="width: 200px;" placeholder="ID Ідеї" id="id_idea">
        <input class="form-control" style="width: 200px;" placeholder="ID Автора" id="id_author">
        <input class="form-control" style="width: 200px; display: none;" id="build" value="null">
        <input class="form-control" style="width: 200px;" placeholder="Площа будівництва" id="square">
    </label><br><br/>
    <label>Кількісні показники по будинку
    <input class="form-control" style="width: 200px;" placeholder="Реклама" id="count_1">
    <input class="form-control" style="width: 200px;" placeholder="Генпідряд" id="count_2">
    <input class="form-control" style="width: 200px;" placeholder="Проект" id="count_3">
    <input class="form-control" style="width: 200px;" placeholder="Зовнішні мережі" id="count_4">
    <input class="form-control" style="width: 200px;" placeholder="Земля" id="count_5">
    <input class="form-control" style="width: 200px;" placeholder="Представницькі" id="count_6">
    <input class="form-control" style="width: 200px;" placeholder="Адмін. витрати" id="count_7">
    <input class="form-control" style="width: 200px;" placeholder="Оф. Генпідряд" id="count_8">
    <input class="form-control" style="width: 200px;" placeholder="Технагляд" id="count_9">
    <input class="form-control" style="width: 200px;" placeholder="Аудит" id="count_10">
    </label><br/><br/>
    <label>
    <input class="form-control" style="width: 200px;" placeholder="Орієнтовна собівартість" id="main_cost">
    <input class="form-control" style="width: 200px;" placeholder="Орієнтовна ціна за метр" id="cost_per_m">
    <input class="form-control" style="width: 200px;" placeholder="Орієнтовний прибуток" id="income"></label><br><br>
    <div class="btn btn-lg btn-primary" onclick="createConcept();">Додати концепцію</div>
    <button class="btn btn-primary btn-lg" style="display: none" id='openModal' data-toggle="modal" data-target="#myModal">
        Launch demo modal
    </button>
    <h2 class="sub-header">Концепції</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>ID Ідеї</th>
                <th>ID Автора</th>
                <th>Посадка будинків</th>
                <th>Площа будівництва</th>
<!--                <th>Кількісні показники по будинку</th>-->
                <th>Орієнтовна собівартість</th>
                <th>Орієнтовна ціна за метр</th>
                <th>Орієнтовний прибуток</th>
                <th>Посадка будинків</th>
                <!--                <th>Оновити</th>-->
                <!--                <th>Видалити</th>-->
            </tr>
            </thead>
            <?php
            $db_table_to_show = 'concepts';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
                echo '<tr id="th' . $data['id'] . '">';
                echo '<th><a href="/concept/?id='.$data['id'].'">' . $data['id'] . '</a></th>';
                echo '<th><a href="/ideas/?id='.$data['id_idea'].'">' . $data['id_idea'] . '</a></th>';
                echo '<th><a href="/people/?id='.$data['id_author'].'">' . $array_people[$data['id_author']]['0'] . '</a></th>';
                echo '<th>' . $data['build'] . '</th>';
                echo '<th>' . $data['square'] . '</th>';
//                echo '<th>' . $data['count_1'] . '</th>';
                echo '<th>' . $data['main_cost'] . '</th>';
                echo '<th>' . $data['cost_per_m'] . '</th>';
                echo '<th>' . $data['income'] . '</th>';
                echo '<th><a href="/concept/add_pdf.php" class="btn btn-warning">Завантажити файл</a></th>';
//                echo '<th><div onclick="update(' . $data['id'] . ')" class="btn btn-warning">Оновити</div></th>';
//                echo '<th><div onclick="deletePerson(' . $data['id'] . ')" class="btn btn-danger"">Видалити</div></th>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
