<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!--    <h1 class="page-header">Dashboard</h1>-->
    <div id="adder" style="display: none;">
        <input class="form-control" style="width: 200px;" placeholder="Назва" id="name">
        <input class="form-control" style="width: 200px;" placeholder="Місто" id="city">
        <input class="form-control" style="width: 200px;" placeholder="Тип будівлі" id="type">
        <input class="form-control" style="width: 200px;" placeholder="Прихідний рахунок" id="pay">
        <input class="form-control" style="width: 200px;" placeholder="Час початку проекту" id="time_start">
        <input class="form-control" style="width: 200px;" placeholder="Тривалість робіт (місяці)" id="time_realize"><br>
        <input class="form-control" style="width: 200px;" placeholder="Вартість будівництва одної секції" id="cost_one_sec">
        <input class="form-control" style="width: 200px;" placeholder="Кількість секцій" id="sec_count">
        <input class="form-control" style="width: 200px;" placeholder="Загальна вартість будівництва" id="full_cost_sec"><br>
        <input class="form-control" style="width: 200px;" placeholder="Середня ціна одного м.кв. житлової площі" id="middle_cost_life">
        <input class="form-control" style="width: 200px;" placeholder="Загальна площа житла" id="square_life">
        <input class="form-control" style="width: 200px;" placeholder="Дохід від житлової площі" id="sum_cost_life"><br>
        <input class="form-control" style="width: 200px;" placeholder="Середня ціна одного м.кв. комерційної площі" id="middle_cost_bus">
        <input class="form-control" style="width: 200px;" placeholder="Загальна комерційна площа" id="square_bus">
        <input class="form-control" style="width: 200px;" placeholder="Дохід від комерційної площі" id="sum_cost_bus"><br>
        <input class="form-control" style="width: 200px;" placeholder="Загальний дохід" id="full_cost"><br>
        <div class="btn btn-lg btn-primary" onclick="addProject();">Створити проект</div></div>
    <div class="btn btn-lg btn-primary" id="creatorBut" onclick="openCreator();">Створити проект</div>
    <button class="btn btn-primary btn-lg" style="display: none" id='openModal' data-toggle="modal" data-target="#myModal">
        Launch demo modal
    </button>
    <h2 class="sub-header">Проекти</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Назва</th>
                <th>Статус</th>
                <th>Прихідний рахунок</th>
                <th>Тривалість</th>
<!--                <th>Оновити</th>-->
                <!--                <th>Видалити</th>-->
            </tr>
            </thead>
            <?php
            $db_table_to_show = 'projects';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
                $id=$data['id'];
                echo '<tr id="th' . $id . '">';
                echo '<th>' . $id . '</a></th>';
                echo '<th><a href="/projects/?id=' . $id . '">' . $data['name'] . '</a></th>';
                echo '<th>' . $data['status'] . '</th>';
                echo '<th>' . $data['pay'] . '</th>';
                echo '<th>' . $data['time_realize'] . '</th>';
//                echo '<th><div onclick="update(' . $data['id'] . ')" class="btn btn-warning">Оновити</div></th>';
//                echo '<th><div onclick="deleteProject(' . $data['id'] . ')" class="btn btn-danger"">Видалити</div></th>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
