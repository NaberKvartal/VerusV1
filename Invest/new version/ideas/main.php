<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <a href="/ideas/?action=create" class="btn btn-lg btn-primary">Додати ідею</a>

    <h2 class="sub-header">Ідеї</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Автор</th>
                <th>Місто</th>
                <th>Адреса</th>
                <th>Площа земельної ділянки</th>
                <th>Тип забудови</th>
                <th>По кадастру</th>
                <th>По ген.плану</th>
                <th>По ДПТ</th>
                <th>Додати концепцію</th>
                <th>Оновити</th>
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
                echo '<th><a href="/concepts/?action=create&idea_id='.$data['id'].'"><div class="btn btn-primary">Додати</div></a></th>';
                echo '<th><a href="/ideas/?action=edit&id=' . $data['id'] . '" class="btn btn-warning"">Оновити</a></th>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
