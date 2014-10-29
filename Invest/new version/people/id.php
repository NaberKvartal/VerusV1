<?php if(!$person['id']): ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Користувача не існує</h1>
    </div>
<?php else: ?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header"><?php echo $person['name'].' '.$person['surname']; ?></h1><br>
        <?php if($_SESSION['admin']==true || $_SESSION['id_user']==$person_id){ ?>
        <a href="/people/?action=edit&id=<?php echo $person['id']; ?>" class="btn btn-warning">Редагувати користувача</a>
        <?php } ?>
        <?php if($_SESSION['admin']==true){ ?>
        <div onclick="deletePerson('<?php echo $person['id'];?>');" class="btn btn-danger">Видалити користувача</div>
        <?php } ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Ім'я</th>
                    <th>Прізвище</th>
                    <th>E-mail</th>
                    <th>Контактний телефон</th>
                    <?php if(file_exists('icon/'.$person_id.'.jpg')):?><th>Icon</th><?php endif; ?>
                </tr>
                </thead>
                <?php
                    echo '<tr>
              <th>'.$person['name'].'</a></th>
              <th>'.$person['surname'].'</th>
              <th>'.$person['email'].'</th>
              <th>'.$person['phone'].'</th>';
        if(file_exists('icon/'.$person_id.'.jpg')):
            echo '<th><img style="width: 50px;" src="icon/'.$person_id.'.jpg"/></th>';
            endif;
              echo '</tr>';
                ?>
                </tbody>
            </table>
        </div>
<br><br>
        <h4>Фінансова інформація</h4>
        <?php if($payment == 'null'){?>
            <a class="btn btn-default" href="/people/?action=trans&id_person=<?php echo $_GET['id']?>">Перегляд трашнів</a>
            <a class="btn btn-default" href="/people/?action=invest&id_person=<?php echo $_GET['id']?>">Операції</a>
            <a class="btn btn-default" href="/people/?action=finance&id_person=<?php echo $_GET['id']?>">Ввід/вивід коштів</a>
            <a class="btn btn-primary" href="/people/?action=payment&id_person=<?php echo $person['id']?>">Додати</a>
        <?php } else {?>
            <a class="btn btn-default" href="/people/?action=trans&id_person=<?php echo $_GET['id']?>">Перегляд трашнів</a>
            <a class="btn btn-default" href="/people/?action=invest&id_person=<?php echo $_GET['id']?>">Операції</a>
            <a class="btn btn-default" href="/people/?action=finance&id_person=<?php echo $_GET['id']?>">Ввід/вивід коштів</a>
            <a class="btn btn-warning" href="/people/?action=payment&id_person=<?php echo $person['id']?>">Редагувати</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Номер</th>
                    <th>Стан</th>
                    <th>Відсоткова ставка</th>
                </tr>
                </thead>
                <?php
                    echo '<tr>
              <th>'.$payment['number'].'</a></th>
              <th>'.$payment['status'].'</th>
              <th>'.$payment['percent'].'</th>
              </tr>';
                ?>
                </tbody>
            </table>
        </div>
<br><br>
        <?php }?>
        <?php
        $db_table_to_show = 'roles';
        $query = mysql_query("select * from " . $db_table_to_show);
        ?>

        <h4 class="sub-header">Задіяний у проектах</h4>
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

        <br><br>

        <?php
        $db_table_to_show = 'investment';
        $query = mysql_query("select * from " . $db_table_to_show . " where `id_person`=".$person_id);
        ?>
        <h4 class="sub-header">Участь в інвестуванні</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Проект</th>
                    <th>Сумма</th>
                    <th>Акції</th>
                </tr>
                </thead>
                <?php
                $sum = 0;
                $papers = 0;
                while($data = mysql_fetch_array($query)){
                    $packages = $data['sum']/1000;

                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a>';
                    if($data['id_broker']!='') echo ' (через брокера)';
                    echo '</th>
              <th>'.number_format($data['sum'], 0, '', ',').'</th>
              <th>'.number_format($packages, 0, '', ',').'</th>
              </tr>';
                    $sum = $sum + $data['sum'];
                    $papers = $papers + $packages;
                }
                ?>
                </tbody>
            </table>
            <h5>Сума інвестицій: <?php echo number_format($sum, 0, '', ','); ?></h5>
            <h5>Сума акцій: <?php echo number_format($papers, 0, '', ','); ?></h5>
        </div>
        <br><br>
        <?php
        $db_table_to_show = 'investment';
        $query = mysql_query("select * from " . $db_table_to_show . " where `id_broker`=".$person_id);
        ?>
        <h4 class="sub-header">Участь в інвестуванні (брокер)</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Проект</th>
                    <th>Сумма</th>
                    <th>Акції</th>
                </tr>
                </thead>
                <?php
                $sum = 0;
                $papers = 0;
                while($data = mysql_fetch_array($query)){
                    $packages = $data['sum']/1000;

                    echo '<tr>
              <th><a href="/projects/?id='.$data['id_project'].'">'.$array_projects[$data['id_project']]['0'].'</a> (як брокер)</th>
              <th>'.number_format($data['sum'], 0, '', ',').'</th>
              <th>'.number_format($packages, 0, '', ',').'</th>
              </tr>';
                    $sum = $sum + $data['sum'];
                    $papers = $papers + $packages;
                }
                ?>
                </tbody>
            </table>
            <h5>Сума інвестицій: <?php echo number_format($sum, 0, '', ','); ?></h5>
            <h5>Сума акцій: <?php echo number_format($papers, 0, '', ','); ?></h5>
        </div>
        <br><br>

        <?php
        $db_table_to_show = 'ideas';
        $query = mysql_query("select * from " . $db_table_to_show . " where `id_author`=".$person_id);
        ?>
        <h4 class="sub-header">Ідеї</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID Ідеї</th>
                    <th>Місто</th>
                </tr>
                </thead>
                <?php
                while($data = mysql_fetch_array($query)){
                    echo '<tr>
              <th><a href="/ideas/?id='.$data['id'].'">'.$data['id'].'</a></th>
              <th>'.$data['city'].'</th>
              </tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
        <br><br>
        <?php
        $db_table_to_show = 'concepts';
        $query = mysql_query("select * from " . $db_table_to_show . " where `id_author`=".$person_id);
        ?>
        <h4 class="sub-header">Концепції</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID Концепції</th>
                    <th>Площа</th>
                </tr>
                </thead>
                <?php
                while($data = mysql_fetch_array($query)){
                    echo '<tr>
              <th><a href="/concepts/?id='.$data['id'].'">'.$data['id'].'</a></th>
              <th>'.$data['square'].'</th>
              </tr>';
                }
                ?>
                </tbody>
            </table>
        </div>


    </div>
<?php endif; ?>