<?php
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: /login?redirect_url="."$_SERVER[REQUEST_URI]");
    exit;
}
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

$db_table_to_show = 'people';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_people = array();
$array_of_person = array();
while($row = mysql_fetch_array($qr_result)){
    $array_people[$row['id']] = array($row['name'].' '.$row['surname']);
    if($_SESSION['id_user']==$row['id']) {
        $array_of_person = array(
            'name' => $row['name'],
            'surname' => $row['surname'],
            'status' => $row['status']
        );
    }
}
//$array_people[$some_number]['0'];
$db_table_to_show = 'projects';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_projects = array();
while($row = mysql_fetch_array($qr_result)){
    $array_projects[$row['id']] = array($row['name']);
}
//$array_projects[$some_number]['0'];


$db_table_to_show = 'ideas';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_ideas_of_user = array();
while($row = mysql_fetch_array($qr_result)){
    if($_SESSION['id_user']==$row['id_author']){
        $array_ideas_of_user[] = $row['id'];
    }
}
$db_table_to_show = 'concepts';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_concepts_of_user = array();
while($row = mysql_fetch_array($qr_result)){
    if($_SESSION['id_user']==$row['id_author']){
        $array_concepts_of_user[] = $row['id'];
    }
}
$db_table_to_show = 'roles';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_part_of_project = array();
while($row = mysql_fetch_array($qr_result)){
    if($_SESSION['id_user']==$row['start_man']
        || $_SESSION['id_user']==$row['rek']
        || $_SESSION['id_user']==$row['kur']
        || $_SESSION['id_user']==$row['of_gen']
        || $_SESSION['id_user']==$row['project']
        || $_SESSION['id_user']==$row['tech']
        || $_SESSION['id_user']==$row['auditor']
        || $_SESSION['id_user']==$row['nets']
        || $_SESSION['id_user']==$row['infra']
        || $_SESSION['id_user']==$row['earth']
        || $_SESSION['id_user']==$row['pred']){
        $array_part_of_project[] = $row['id'];
    }
}
$db_table_to_show = 'investment';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_invest_of_project = array();
while($row = mysql_fetch_array($qr_result)){
    if($_SESSION['id_user']==$row['id_person']){
        $array_invest_of_project[] = $row['id_project'];
    }
}

$array_for_projects = array(
    'name' => 'Назва',
    'city' => 'Місто',
    'zhbk' => 'ЖБК',
    'site' => 'Веб-сайт',
    'type' => 'Тип будівлі',
    'pay' => 'Прихідний рахунок',
    'time_start' => 'Дата старту проекту',
    'time_realize' => 'Термін реалізації',
    'cost_one_sec' => 'Вартість 1 секції',
    'sec_count' => 'Кількість секцій',
    'full_cost_sec' => 'Загальна вартість будівництва',
    'middle_cost_life' => 'Середня ціна житлового м.кв.',
    'square_life' => 'Житлова площа',
    'sum_cost_life' => 'Дохід житлової площі',
    'middle_cost_bus' => 'Середня вартість комерційного м.кв.',
    'square_bus' => 'Комерційна площа',
    'sum_cost_bus' => 'Дохід комерційної площі',
    'full_cost' => 'Загальний дохід'
);


$array_name_roles = array(
    'start_man' => 'Старт-Менеджер',
    'rek' => 'Реклама-Продаж',
    'kur' => 'Куратор',
    'of_gen' => 'Оф. Ген. Підрядник',
    'project' => 'Проектувальник',
    'tech' => 'Технагляд',
    'auditor' => 'Аудитор',
    'nets' => 'Зовнішні мережі',
    'infra' => 'Інфраструктура',
    'earth' => 'Земля',
    'pred' => 'Представницькі витрати'
);