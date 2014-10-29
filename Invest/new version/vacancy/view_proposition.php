<?php
$db_table_to_show = 'vacancy';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_vacancy = array();
while($row = mysql_fetch_array($qr_result)){
    $array_vacancy[$row['id']] = array(
        'id_project' => $row['id_project'],
        'name_project' => $array_projects[$row['id_project']][0],
        'type' => $array_name_roles[$row['type']],
        'type_name' => $row['type'],
        'id_person' => $row['id_person'],
        'name_person' => $array_people[$row['id_person']],
        'status' => $row['status']
    );
}
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Заявки на вакансії</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Назва проекту</th>
                <th>Вакансія</th>
                <th>Кандидати на вакансію</th>
                <th>Підтвердити</th>
            </tr>
            </thead>
            <?php
            $db_table_to_show = 'proposition_to_vacancy';
            $qr_result = mysql_query("select * from " . $db_table_to_show);
            $array_propositions = array();
            while($data = mysql_fetch_array($qr_result)){
                $ar_index = 0;
                $already_exist = false;
                foreach($array_propositions as $value) {
                    if($array_propositions[$ar_index]['id_vacancy'] == $data['id_vacancy']) {
                            array_push($array_propositions[$ar_index], $data['id_person']);
                            $already_exist = true;
                    }
                    ++$ar_index;
                }
                if(!$already_exist) {
                    $array_propositions[] = array(
                        'id_project' => $array_vacancy[$data['id_vacancy']]['id_project'],
                        'name_project' => $array_vacancy[$data['id_vacancy']]['name_project'],
                        'id_vacancy' => $data['id_vacancy'],
                        'type' => $array_vacancy[$data['id_vacancy']]['type'],
                        'type_name' => $array_vacancy[$data['id_vacancy']]['type_name'],
                        'status' => $array_vacancy[$data['id_vacancy']]['status'],
                        $data['id_person']
                    );
                }
            }
            $index=0;
            foreach($array_propositions as $value) {
                if($value['status']=='active') {
                $count = count($array_propositions[$index]);
                $count = $count-5;
                    echo '<tr>';
                    echo '<th><a href="/projects/?id='.$value['id_project'].'">' . $value['name_project'] . '</a></th>';
                    echo '<th>'.$value['type'].'</th>';
                    echo '<th><select class="form-control" id="vacancy-'.$value['id_vacancy'].'">';
                    for($i=0; $i<$count; ++$i) {
                        echo '<option data-id="'.$value[$i].'">'.$array_people[$value[$i]][0].'</option>';
                    }
                    echo '</select></th>';
                    echo '<th>
                    <a class="btn btn-primary" onclick="checkVacancy('.$value['id_vacancy'].',\''.$value['type_name'].'\',\''.$value['id_project'].'\');">
                    Підтвердити
                    </a>
                    </th>';
                    echo '</tr>';
                ++$index;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
