<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!--    <h1 class="page-header">Dashboard</h1>-->
    <label>Основна інформація
        <input class="form-control" style="width: 200px;" placeholder="ID Автора" id="id_author">
        <input class="form-control" style="width: 200px;" placeholder="Місто" id="city">
    <input class="form-control" style="width: 200px;" placeholder="Адреса" id="address">
    <input class="form-control" style="width: 200px;" placeholder="Площа земельної ділянки" id="square"></label><br><br/>
    <label>Тип забудови<select class="form-control" style="width: 200px;" id="type">
        <option class="form-control">Житло</option>
        <option class="form-control">Житло + Коммерція</option>
        <option class="form-control">Коммерція</option>
    </select></label><br/><br/>
    <label>Цільове призначення землі
    <input class="form-control" style="width: 200px;" placeholder="по кадастру" id="to_kad">
    <input class="form-control" style="width: 200px;" placeholder="по ген.плану" id="to_plan">
    <input class="form-control" style="width: 200px;" placeholder="по ДПТ" id="to_dpt"></label><br><br/>
    <label>Характеристика від автора
        <input class="form-control" style="width: 200px;" id="who" placeholder="Інформація про автора"><br/>
        <input class="form-control" type="textarea" style="width: 200px; height: 300px;" id="desc">
    </label><br>
    <div class="btn btn-lg btn-primary" onclick="createIdea();">Додати ідею</div>
    <button class="btn btn-primary btn-lg" style="display: none" id='openModal' data-toggle="modal" data-target="#myModal">
        Launch demo modal
    </button>
    <h2 class="sub-header">Ідеї</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>ID Автора</th>
                <th>Місто</th>
                <th>Адреса</th>
                <th>Площа земельної ділянки</th>
                <th>Тип забудови</th>
                <th>По кадастру</th>
                <th>По ген.плану</th>
                <th>По ДПТ</th>
                <th>Автор</th>
                <th>Додати концепцію</th>
<!--                <th>Видалити</th>-->
            </tr>
            </thead>
            <?php
            $db_table_to_show = 'ideas';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
                echo '<tr id="th' . $data['id'] . '">';
                echo '<th><a href="/ideas/?id='.$data['id'].'">' . $data['id'] . '</a></th>';
                echo '<th><a href="/people/?id='.$data['id_author'].'">' . $array_people[$data['id_author']]['0'] . '</a></th>';
                echo '<th>' . $data['city'] . '</th>';
                echo '<th>' . $data['address'] . '</th>';
                echo '<th>' . $data['square'] . '</th>';
                echo '<th>' . $data['type'] . '</th>';
                echo '<th>' . $data['to_kad'] . '</th>';
                echo '<th>' . $data['to_plan'] . '</th>';
                echo '<th>' . $data['to_dpt'] . '</th>';
                echo '<th>' . $data['who'] . '</th>';
                echo '<th><a href="http://invest.yuma.lviv.ua/concept/add.php?id_idea='.$data['id'].'"><div class="btn btn-primary">Додати</div></a></th>';
//                echo '<th><div onclick="deletePerson(' . $data['id'] . ')" class="btn btn-danger"">Видалити</div></th>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
