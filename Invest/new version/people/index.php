<?php

require_once('../backend/db.php');

$person_id = $_GET['id'];
if(!$_GET['id']) $person_id = $_GET['id_person'];
$db_table_to_show = 'people';
$qr_result = mysql_query("select * from " . $db_table_to_show);
while($data = mysql_fetch_array($qr_result)){
    if($data['id'] == $person_id) {
        $person = $data;
    };
}


$payment = 'null';
$db_table_to_show = 'payment';
$qr_result1 = mysql_query("select * from " . $db_table_to_show);
while($row = mysql_fetch_array($qr_result1)){
    if($row['id_person'] == $person_id) {
        $payment = $row;
    }
}
$active_page = "people";
require_once('../backend/header.php');

if($_GET['action']) {
    $action=$_GET['action'];
    switch ($action) {
        case 'add_user':
            require_once('add_user.php');
            break;
        case 'create':
            require_once('../backend/add/index.php');
            break;
        case 'edit':
            require_once('../backend/edit/index.php');
            break;
        case 'payment':
            require_once('payments.php');
            break;
        case 'trans':
            require_once('trans.php');
            break;
        case 'invest':
            require_once('invest.php');
            break;
        case 'finance':
            require_once('finance.php');
            break;
    }
} else {
    if($_GET['id']) {
        require_once('id.php');
    } else {
        require_once('main.php');
    }
}

require_once('../backend/footer.php');
