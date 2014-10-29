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
            $sql="INSERT INTO `people`(`user`,`pass`,`status`,`name`, `surname`, `email`, `phone`)
            VALUES ('".$user."','".$pass."','".$status."','".$name."','".$surname."','".$email."','".$phone."')";

            mysqli_query($con, $sql);
            mysqli_close($con);

            $db_table_to_show = 'people';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
                $last_id=$data['id'];
            }
            $uploadfile = 'icon/'.$last_id.'.jpg';

            move_uploaded_file($_FILES['icon']['tmp_name'], $uploadfile);

            header( 'Location: /people/?id='.$last_id );
            break;
        case 'projects':
            $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

            $cost_all_sec = $_POST['cost_one_sec']*$_POST['sec_count'];

            $sql="INSERT INTO `projects`(`id_concept`, `status`, `name`, `zhbk`, `site`, `city`, `type`, `pay`,
            `time_realize`, `time_start`, `cost_one_sec`, `sec_count`,
            `cost_all_sec`, `full_cost_sec`, `middle_cost_life`, `square_life`,
            `sum_cost_life`, `middle_cost_bus`, `square_bus`, `sum_cost_bus`,
            `full_cost`)
        VALUES ('".$_POST['id_concept']."','Підготовка','".$_POST['name']."','".$_POST['zhbk']."','".$_POST['site']."','".$_POST['city']."','".$_POST['type']."','".$_POST['pay']."',
        '".$_POST['time_realize']."',
        '".$_POST['time_start']."', '".$_POST['cost_one_sec']."','".$_POST['sec_count']."','".$cost_all_sec."',
        '".$_POST['full_cost_sec']."', '".$_POST['middle_cost_life']."','".$_POST['square_life']."','".$_POST['sum_cost_life']."',
        '".$_POST['middle_cost_bus']."','".$_POST['square_bus']."','".$_POST['sum_cost_bus']."','".$_POST['full_cost']."');";

            mysqli_query($con, $sql);
            mysqli_close($con);

            $db_table_to_show = 'projects';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
                $last_id=$data['id'];
            }
            $uploadfile = 'icon/'.$last_id.'.jpg';

            move_uploaded_file($_FILES['icon']['tmp_name'], $uploadfile);


            header( 'Location: /projects/?id='.$last_id );
            break;
        case 'ideas':
            $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

            $id_author = $_POST['id_author'];

            $city = $_POST['city'];
            $address = $_POST['address'];
            $square = $_POST['square'];
            $type = $_POST['type'];

            $to_kad = $_POST['to_kad'];
            $to_plan = $_POST['to_plan'];
            $to_dpt = $_POST['to_dpt'];

            $desc = $_POST['desc'];
            $sql="INSERT INTO `ideas`(`id_author`, `city`, `address`, `square`, `type`, `to_kad`, `to_plan`, `to_dpt`, `desc`)
        VALUES ('".$id_author."','".$city."','".$address."','".$square."','".$type."','".$to_kad."','".$to_plan."','".$to_dpt."','".$desc."')";

            mysqli_query($con, $sql);
            mysqli_close($con);

            header( 'Location: /ideas' );
            break;
        case 'concepts':

            $sql="INSERT INTO `concepts`(`id_idea`, `id_author`, `square`, `count_1`, `count_2`,
            `count_3`, `count_4`, `count_5`, `count_6`, `count_7`, `count_8`, `count_9`,
            `count_10`, `main_cost`, `cost_per_m`, `income`)

            VALUES ('".$_POST['id_idea']."','".$_POST['id_author']."','".$_POST['square']."','".$_POST['count_1']."',
            '".$_POST['count_2']."','".$_POST['count_3']."','".$_POST['count_4']."','".$_POST['count_5']."','".$_POST['count_6']."','".$_POST['count_7']."',
            '".$_POST['count_8']."','".$_POST['count_9']."','".$_POST['count_10']."','".$_POST['main_cost']."','".$_POST['cost_per_m']."',
            '".$_POST['income']."')";
            $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

            mysqli_query($con, $sql);
            mysqli_close($con);

            $db_table_to_show = 'concepts';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
                $last_id=$data['id'];
            }
            $count = $_POST['file_count'];
                $count++;
            $i=1;
                while($i<$count){
                    $base = basename($_FILES['pdf_'.$i]['name']);
                    $index = strripos($base, '.');
                    $ext = substr($base, $index);
                    $uploadfile = 'file/'.$last_id.'_'.$i.$ext;

                    move_uploaded_file($_FILES['pdf_'.$i]['tmp_name'], $uploadfile);
                    ++$i;
                }


            header( 'Location: /concepts' );
            break;
    }
} else {

echo '<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';

switch($active_page) {
    case 'people':
        echo '<form role="form" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="text" class="form-control" name="user" placeholder="Логін">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="pass" placeholder="Пароль">
  </div>
    <div class="form-group">
    <select class="form-control" style="width: 300px;" name="status">
        <option class="form-control">Учасник</option>
        <option class="form-control">Інвестор</option>
    </select>
  </div>

  <div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Введіть ім\'я">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="surname" placeholder="Введіть прізвище">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="email" placeholder="Введіть e-mail">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="phone" placeholder="Введіть контактний телефон">
  </div>
  <div class="form-group">
    <input type="file" class="form-control" name="icon">
  </div>
  <button type="submit" class="btn btn-default">Створити користувача</button>
</form>';
        break;
    case 'projects':
        echo '<form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" class="form-control" name="icon">
        </div>';
        if($_GET['id_concept']):
echo '       <div class="form-group">
            <input type="text" class="form-control" style="display:none;" name="id_concept" placeholder="ID концепції" value="'.$_GET['id_concept'].'">
              </div>
              ';
            else:
echo '       <div class="form-group">
            <input type="text" class="form-control" name="id_concept" placeholder="ID концепції">
              </div>
              ';
            endif;
        foreach ($array_for_projects as $key => $value){
            echo '  <div class="form-group">
            <input type="text" class="form-control" name="'.$key.'" placeholder="'.$value.'">
              </div>
            ';
        }
        echo '<button type="submit" class="btn btn-default">Створити проект</button>
</form>';
        break;
    case 'ideas':
        echo '<form role="form" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name="city" placeholder="Місто">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="address" placeholder="Адреса">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="square" placeholder="Площа">
  </div>
  <div class="form-group">
    <select class="form-control" style="width: 300px;" name="type">
        <option class="form-control">Житло</option>
        <option class="form-control">Житло + Коммерція</option>
        <option class="form-control">Коммерція</option>
    </select>
  </div>
  <div class="form-group"><label>Цільове призначення</label>
    <input type="text" class="form-control" name="to_kad" placeholder="По кадастру">
    <input type="text" class="form-control" name="to_plan" placeholder="По плану">
    <input type="text" class="form-control" name="to_dpt" placeholder="По ДПТ">

  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="name_author" placeholder="Автор">
    <input type="text" style="display: none" class="form-control" name="id_author" id="id_author" placeholder="ID Автора">
    <div id="author"></div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="desc" placeholder="Опис">
  </div>
  <button type="submit" class="btn btn-default">Створити ідею</button>
</form>';
        break;
    case 'concepts':
        echo '<form role="form" method="post" enctype="multipart/form-data">';
if(!$_GET['idea_id']){
    echo '<div class="form-group">
    <input type="text" class="form-control" name="id_idea" placeholder="ID Ідеї">
  </div>';
} else {
    echo '<div class="form-group">
    <input type="hidden" class="form-control" name="id_idea" placeholder="ID Ідеї" value="'.$_GET['idea_id'].'">
  </div>';

}
echo '<div class="form-group">
    <input type="text" class="form-control" id="name_author" placeholder="Автор">
    <input type="text" style="display: none" class="form-control" name="id_author" id="id_author" placeholder="ID Автора">
    <div id="author"></div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="square" placeholder="Площа будівництва">
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" hidden="hidden" id="file_count" name="file_count" value="1">
  </div>
  <div class="form-group">
    <input type="file" class="form-control" name="pdf_1" id="pdf_1">
    <div onclick="addFile();" style="margin-top: 5px;" class="btn btn-primary">Додати ще</div>
  </div>
  <div class="form-group"><label>Кількісні показники</label>
    <input type="text" class="form-control" name="count_1" placeholder="Реклама">
    <input type="text" class="form-control" name="count_2" placeholder="Генпідряд">
    <input type="text" class="form-control" name="count_3" placeholder="Проект">
    <input type="text" class="form-control" name="count_4" placeholder="Зовнішні мережі">
    <input type="text" class="form-control" name="count_5" placeholder="Земля">
    <input type="text" class="form-control" name="count_6" placeholder="Представницькі">
    <input type="text" class="form-control" name="count_7" placeholder="Адмін. витрати">
    <input type="text" class="form-control" name="count_8" placeholder="Оф. Генпідряд">
    <input type="text" class="form-control" name="count_9" placeholder="Технагляд">
    <input type="text" class="form-control" name="count_10" placeholder="Аудит">

  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="main_cost" placeholder="Орієнтована собівартість">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="cost_per_m" placeholder="Орієнтовна ціна за метр">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="income" placeholder="Орієнтовний прибуток">
  </div>
  <button type="submit" class="btn btn-default">Створити концепцію</button>
</form>';
        break;
}

echo '</div>';
}