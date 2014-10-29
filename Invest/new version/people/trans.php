<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h4 class="sub-header"><a href="/people/?id=<?php echo $person_id;?>"><?php echo $array_people[$person_id][0];?></a> => Транші користувача</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Проект</th>
                <th>Дата</th>
                <th>Сума</th>
            </tr>
            </thead>
            <?php
            $db_table_to_show = 'investment';
            $qr_result = mysql_query("select * from " . $db_table_to_show . " where `id_person`=" . $person_id);
            while($data = mysql_fetch_array($qr_result)){

                $db_table_to_show1 = 'invest_trans';
                $qr_result1 = mysql_query("select * from " . $db_table_to_show1 . " where `id_invest`=" . $data['id']);
                while($data1 = mysql_fetch_array($qr_result1)){
                    if($data1['type']=='invest'):
                        echo '<tr class="success">';
                    else:
                        echo '<tr class="danger">';
                    endif;
                    echo '<th><a href="/projects/?id='.$data['id_project'].'">' . $array_projects[$data['id_project']][0] . '</a></th>';
                    echo '<th>' . $data1['date'] . '</th>';
                    echo '<th>' . $data1['sum'] . '</th>';
                    echo '</tr>';
                    }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
