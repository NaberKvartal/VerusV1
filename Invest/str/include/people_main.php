<?php if(!$person['id']): ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Користувача не існує</h1>
    </div>
<?php else: ?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"><?php echo $person['name'].' '.$person['surname']; ?></h1>

    <?php
    $db_table_to_show = 'roles';
    $query = mysql_query("select * from " . $db_table_to_show);
    ?>

    <h2 class="sub-header">Задіяний у проектах</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Проект</th>
                <th>Сфера діяльності</th>
            </tr>
            </thead>
            <?php
            while($data = mysql_fetch_array($query)){
                if($data['start_man']==$person_id) {
                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>Старт-менеджер</th>
              </tr>';
                }
                if($data['rek']==$person_id) {
                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>Реклама-Продаж</th>
              </tr>';
                }
                if($data['kur']==$person_id) {
                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>Куратор</th>
              </tr>';
                }
                if($data['of_gen']==$person_id) {
                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>Оф. Ген. Підрядник</th>
              </tr>';
                }
                if($data['project']==$person_id) {
                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>Проектувальник</th>
              </tr>';
                }
                if($data['tech']==$person_id) {
                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>Технагляд</th>
              </tr>';
                }
                if($data['auditor']==$person_id) {
                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>Аудитор</th>
              </tr>';
                }
                if($data['nets']==$person_id) {
                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>Зовнішні мережі</th>
              </tr>';
                }
                if($data['infra']==$person_id) {
                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>Інфраструктура</th>
              </tr>';
                }
                if($data['earth']==$person_id) {
                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>Земля</th>
              </tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>


    <?php
    $db_table_to_show = 'investment';
    $query = mysql_query("select * from " . $db_table_to_show . " where `id_person`=".$person_id);
    ?>
    <h2 class="sub-header">Участь в інвестуванні</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Проект</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <?php
            while($data = mysql_fetch_array($query)){
                echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a></th>
              <th>'.number_format($data['sum'], 0, '', ',').'</th>
              </tr>';
            }
            ?>
            </tbody>
        </table>
    </div>


</div>
<?php endif; ?>