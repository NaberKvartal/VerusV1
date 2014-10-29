<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <a href="/concepts/?action=create" class="btn btn-lg btn-primary">Додати концепцію</a>


    <h2 class="sub-header">Концепції</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ідея</th>
                <th>Автор</th>
<!--                <th>Посадка будинків</th>-->
                <th>Площа будівництва</th>
                <!--                <th>Кількісні показники по будинку</th>-->
                <th>Орієнтовна собівартість</th>
                <th>Орієнтовна ціна за метр</th>
                <th>Орієнтовний прибуток</th>
                <th>Додати проект</th>
                <th>Оновити</th>
                <!--                <th>Видалити</th>-->
            </tr>
            </thead>
            <?php
            $db_table_to_show = 'concepts';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
                echo '<tr id="th' . $data['id'] . '">';
                echo '<th><a href="/concepts/?id='.$data['id'].'">' . $data['id'] . '</a></th>';
                echo '<th><a href="/ideas/?id='.$data['id_idea'].'">' . $data['id_idea'] . '</a></th>';
                echo '<th><a href="/people/?id='.$data['id_author'].'">' . $array_people[$data['id_author']]['0'] . '</a></th>';
//                echo '<th>' . $data['build'] . '</th>';
                echo '<th>' . $data['square'] . '</th>';
//                echo '<th>' . $data['count_1'] . '</th>';
                echo '<th>' . $data['main_cost'] . '</th>';
                echo '<th>' . $data['cost_per_m'] . '</th>';
                echo '<th>' . $data['income'] . '</th>';
                echo '<th><a href="/projects/?action=create&id_concept='.$data['id'].'" class="btn btn-primary">Додати</a></th>';
                echo '<th><a href="/concepts/?action=edit&id=' . $data['id'] . ')" class="btn btn-warning">Оновити</a></th>';
//                echo '<th><div onclick="deletePerson(' . $data['id'] . ')" class="btn btn-danger"">Видалити</div></th>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
