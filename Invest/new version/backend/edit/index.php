<?php

if($_POST) {

    switch($active_page) {
        case 'people':
            $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $status = $_POST['status'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $sql="UPDATE `people` SET `user`='".$user."',`pass`='".$pass."',`status`='".$status."',`name`='".$name."',`surname`='".$surname."',`email`='".$email."',`phone`='".$phone."' WHERE `id`=".$person['id'];

            mysqli_query($con, $sql);
            mysqli_close($con);

            $uploadfile = 'icon/'.$person_id.'.jpg';

            move_uploaded_file($_FILES['icon']['tmp_name'], $uploadfile);

            header( 'Location: /people/?id='.$person_id );
            break;
        case 'projects':
            $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

            if(!$_POST['cost_all_sec']) {
                $cost_all_sec = $_POST['cost_one_sec']*$_POST['sec_count'];
            } else {
                $cost_all_sec = $_POST['cost_all_sec'];
            }

            $sql = "UPDATE `projects` SET `id_concept`='".$_POST['id_concept']."',`status`='".$_POST['status']."',`name`='".$_POST['name']."',`zhbk`='".$_POST['zhbk']."',
            `site`='".$_POST['site']."',`city`='".$_POST['city']."',`type`='".$_POST['type']."',
        `pay`='".$_POST['pay']."',`time_start`='".$_POST['time_start']."',`time_realize`='".$_POST['time_realize']."',
        `cost_one_sec`='".$_POST['cost_one_sec']."',`sec_count`='".$_POST['sec_count']."',
        `cost_all_sec`='".$cost_all_sec."',`full_cost_sec`='".$_POST['full_cost_sec']."',
        `middle_cost_life`='".$_POST['middle_cost_life']."',`square_life`='".$_POST['square_life']."',
        `sum_cost_life`='".$_POST['sum_cost_life']."',`middle_cost_bus`='".$_POST['middle_cost_bus']."',
        `square_bus`='".$_POST['square_bus']."',`sum_cost_bus`='".$_POST['sum_cost_bus']."',`full_cost`='".$_POST['full_cost']."'
        WHERE `id`=".$project['id'];

            mysqli_query($con, $sql);
            mysqli_close($con);
            $uploadfile = 'icon/'.$project_id.'.jpg';

            move_uploaded_file($_FILES['icon']['tmp_name'], $uploadfile);


            $db_table_to_show = 'sections';
            $qr_result = mysql_query("select * from " . $db_table_to_show);
            $sections_exist = false;
            while($row = mysql_fetch_array($qr_result)){
                if($row['id_project'] == $project_id) $sections_exist = true;
            }

            $conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
            $count = $_POST['sec_count'];
            if($sections_exist) {
                $sqls = "UPDATE `sections` SET ";
                for($i=1; $i<$count; ++$i) {
                    $sqls .= "`zbk_".$i."`='".$_POST['zbk_'.$i]."',`acc_".$i."`='".$_POST['acc_'.$i]."',`cost_".$i."`='".$_POST['cost_'.$i]."',";
                }
                $sqls .= "`zbk_".$count."`='".$_POST['zbk_'.$count]."',`acc_".$count."`='".$_POST['acc_'.$count]."',`cost_".$count."`='".$_POST['cost_'.$count]."'";
                $sqls .= "WHERE `id_project`=".$project['id'];
            } else {
                $sqls = "INSERT INTO `sections`(`id_project`,";
                for($i=1; $i<$count; ++$i) {
                    $sqls .= "`zbk_".$i."`, `acc_".$i."`, `cost_".$i."`,";
                }
                $sqls .= "`zbk_".$count."`, `acc_".$count."`, `cost_".$count."`) VALUES ('".$project['id']."',";
                for($i=1; $i<$count; ++$i) {
                    $sqls .= "'".$_POST['zbk_'.$i]."', '".$_POST['acc_'.$i]."', '".$_POST['cost_'.$i]."',";
                }
                $sqls .= "'".$_POST['zbk_'.$count]."','".$_POST['acc_'.$count]."','".$_POST['cost_'.$count]."')";
            }
            mysqli_query($conn, $sqls);
            mysqli_close($conn);
            echo '<script>window.location.replace("/projects?id='.$project_id.'");</script>';
            break;
        case 'ideas':
            $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

            $sql="UPDATE `ideas` SET `id_author`='".$_POST['id_author']."',`city`='".$_POST['city']."',
            `address`='".$_POST['address']."',`square`='".$_POST['square']."',`type`='".$_POST['type']."',
            `to_kad`='".$_POST['to_kad']."',`to_plan`='".$_POST['to_plan']."',`to_dpt`='".$_POST['to_dpt']."',
            `desc`='".$_POST['desc']."' WHERE `id`=".$idea['id'];

            mysqli_query($con, $sql);
            mysqli_close($con);

            header( 'Location: /ideas' );
            break;
        case 'concepts':
            $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

            $sql="UPDATE `concepts`
            SET `id_idea`='".$_POST['id_idea']."',
            `id_author`='".$_POST['id_author']."',
            `square`='".$_POST['square']."',`count_1`='".$_POST['count_1']."',
            `count_2`='".$_POST['count_2']."',`count_3`='".$_POST['count_3']."',
            `count_4`='".$_POST['count_4']."',`count_5`='".$_POST['count_5']."',
            `count_6`='".$_POST['count_6']."',`count_7`='".$_POST['count_7']."',
            `count_8`='".$_POST['count_8']."',`count_9`='".$_POST['count_9']."',
            `count_10`='".$_POST['count_10']."',`main_cost`='".$_POST['main_cost']."',
            `cost_per_m`='".$_POST['cost_per_m']."',`income`='".$_POST['income']."'

            WHERE `id`=".$concept['id'];

            mysqli_query($con, $sql);
            mysqli_close($con);

            header( 'Location: /concepts' );
            break;
    }
} else {

    echo '<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';
    switch($active_page) {
        case 'people':
            if(!$_SESSION['admin'] && $_SESSION['id_user']!=$person_id)
                exit;
                switch($person['status']) {
                case 'Учасник':
                    $op_1 = ' selected="selected"';
                    break;
                case 'Інвестор':
                    $op_2 = ' selected="selected"';
                    break;
            }
                    echo '<form role="form" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="text" class="form-control" name="user" placeholder="Логін" value="'.$person['user'].'">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="pass" placeholder="Пароль" value="'.$person['pass'].'">
  </div>';
            if($_SESSION['admin']){
                echo '    <div class="form-group">
    <select class="form-control" style="width: 300px;" name="status">
        <option'.$op_1.'>Учасник</option>
        <option'.$op_2.'>Інвестор</option>
    </select>
  </div>';
            } else {
                echo '    <div class="form-group" style="display: none;">
    <select class="form-control" style="width: 300px;" name="status">
        <option'.$op_1.'>Учасник</option>
        <option'.$op_2.'>Інвестор</option>
    </select>
  </div>';

            }
            echo '

  <div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Введіть ім\'я" value="'.$person['name'].'">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="surname" placeholder="Введіть прізвище" value="'.$person['surname'].'">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="email" placeholder="Введіть e-mail" value="'.$person['email'].'">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="phone" placeholder="Введіть контактний телефон" value="'.$person['phone'].'">
  </div>
  <div class="form-group">
    <input type="file" class="form-control" name="icon">
  </div>
  <button type="submit" class="btn btn-default">Редагувати користувача</button>
</form>';
            break;
        case 'projects':
            switch($project['status']) {
                case 'Підготовка':
                    $op_1 = ' selected="selected"';
                    break;
                case 'Пошук команди':
                    $op_2 = ' selected="selected"';
                    break;
                case 'Пошук інвестицій':
                    $op_3 = ' selected="selected"';
                    break;
                case 'Старт':
                    $op_4 = ' selected="selected"';
                    break;
                case 'Будується':
                    $op_5 = ' selected="selected"';
                    break;
                case 'Завершений':
                    $op_6 = ' selected="selected"';
                    break;
                default:
                    $op_7 = ' selected="selected"';
            }

            echo '<form role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
    <select class="form-control" style="width: 300px;" name="status">
        <option'.$op_1.'>Підготовка</option>
        <option'.$op_2.'>Пошук команди</option>
        <option'.$op_3.'>Пошук інвестицій</option>
        <option'.$op_4.'>Старт</option>
        <option'.$op_5.'>Будується</option>
        <option'.$op_6.'>Завершений</option>
    </select>
  </div>
    <div class="form-group">
    <input type="file" class="form-control" name="icon">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="id_concept" placeholder="ID концепції">
  </div>

            ';

            foreach ($array_for_projects as $key => $value){
                echo '  <div class="form-group">
            <input type="text" class="form-control" name="'.$key.'" placeholder="'.$value.'" value="'.$project[$key].'">
              </div>
            ';
            }

            $db_table_to_show = 'sections';
            $qr_result = mysql_query("select * from " . $db_table_to_show);
            $array_sections = array();
            $sections = $project['sec_count'];
            ++$sections;
            while($row = mysql_fetch_array($qr_result)){
                if($row['id_project']==$project['id']){
                    for($i=1; $i<$sections; ++$i){
                        $array_sections['zbk_'.$i] = $row['zbk_'.$i];
                        $array_sections['acc_'.$i] = $row['acc_'.$i];
                        $array_sections['cost_'.$i] = $row['cost_'.$i];
                    }
                }
                $array_projects[$row['id']] = array($row['name']);
            }

            $section_count = $project['sec_count'];
            ++$section_count;
            for($i=1; $i<$section_count; ++$i) {
                echo '  <div class="form-group">
            <input type="text" class="form-control" name="zbk_'.$i.'" placeholder="Секція '.$i.'. ЖБК" value="'.$array_sections['zbk_'.$i].'">
            <input type="text" class="form-control" name="acc_'.$i.'" placeholder="Секція '.$i.'. Прихідний рахунок" value="'.$array_sections['acc_'.$i].'">
            <input type="text" class="form-control" name="cost_'.$i.'" placeholder="Секція '.$i.'. Вартість секції" value="'.$array_sections['cost_'.$i].'">
              </div>';
            }
            echo '<button type="submit" class="btn btn-default">Редагувати проект</button>
</form>';
            break;
        case 'ideas':
            switch($idea['type']) {
                case 'Житло':
                    $f_op = ' selected="selected"';
                    break;
                case 'Житло + Коммерція':
                    $s_op = ' selected="selected"';
                    break;
                case 'Коммерція':
                    $t_op = ' selected="selected"';
                    break;
            }
            echo '<form role="form" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name="city" placeholder="Місто" value="'.$idea['city'].'">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="address" placeholder="Адреса" value="'.$idea['address'].'">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="square" placeholder="Площа" value="'.$idea['square'].'">
  </div>
  <div class="form-group">
    <select class="form-control" style="width: 300px;" name="type">
        <option'.$f_op.'>Житло</option>
        <option'.$s_op.'>Житло + Коммерція</option>
        <option'.$t_op.'>Коммерція</option>
    </select>
  </div>
  <div class="form-group"><label>Кількісні показники</label>
    <input type="text" class="form-control" name="to_kad" placeholder="По кадастру" value="'.$idea['to_kad'].'">
    <input type="text" class="form-control" name="to_plan" placeholder="По плану" value="'.$idea['to_plan'].'">
    <input type="text" class="form-control" name="to_dpt" placeholder="По ДПТ" value="'.$idea['to_dpt'].'">

  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="name_author" placeholder="Автор" value="'.$array_people[$idea['id_author']]['0'].'">
    <input type="text" style="display: none" class="form-control" name="id_author" id="id_author" value="'.$idea['id_author'].'">
    <div id="author"></div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="desc" placeholder="Опис" value="'.$idea['desc'].'">
  </div>
  <button type="submit" class="btn btn-default">Редагувати ідею</button>
</form>';
            break;
        case 'concepts':
            echo '<form role="form" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name="id_idea" placeholder="ID Ідеї" value="'.$concept['id_idea'].'">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="name_author" placeholder="Автор" value="'.$array_people[$concept['id_author']]['0'].'">
    <input type="text" style="display: none" class="form-control" name="id_author" id="id_author" value="'.$concept['id_author'].'">
    <div id="author"></div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="square" placeholder="Площа будівництва" value="'.$concept['square'].'">
  </div>
  <div class="form-group"><label>Кількісні показники</label>
    <input type="text" class="form-control" name="count_1" placeholder="Реклама" value="'.$concept['count_1'].'">
    <input type="text" class="form-control" name="count_2" placeholder="Генпідряд" value="'.$concept['count_2'].'">
    <input type="text" class="form-control" name="count_3" placeholder="Проект" value="'.$concept['count_3'].'">
    <input type="text" class="form-control" name="count_4" placeholder="Зовнішні мережі" value="'.$concept['count_4'].'">
    <input type="text" class="form-control" name="count_5" placeholder="Земля" value="'.$concept['count_5'].'">
    <input type="text" class="form-control" name="count_6" placeholder="Представницькі" value="'.$concept['count_6'].'">
    <input type="text" class="form-control" name="count_7" placeholder="Адмін. витрати" value="'.$concept['count_7'].'">
    <input type="text" class="form-control" name="count_8" placeholder="Оф. Генпідряд" value="'.$concept['count_8'].'">
    <input type="text" class="form-control" name="count_9" placeholder="Технагляд" value="'.$concept['count_9'].'">
    <input type="text" class="form-control" name="count_10" placeholder="Аудит" value="'.$concept['count_10'].'">

  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="main_cost" placeholder="Орієнтована собівартість" value="'.$concept['main_cost'].'">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="cost_per_m" placeholder="Орієнтовна ціна за метр" value="'.$concept['cost_per_m'].'">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="income" placeholder="Орієнтовний прибуток" value="'.$concept['income'].'">
  </div>
  <button type="submit" class="btn btn-default">Редагувати концепцію</button>
</form>';
            break;

    }

    echo '</div>';
}