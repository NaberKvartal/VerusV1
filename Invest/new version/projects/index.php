<?php

require_once('../backend/db.php');
$project_id = $_GET['id'];
$db_table_to_show = 'projects';
$qr_result = mysql_query("select * from " . $db_table_to_show);
while($data = mysql_fetch_array($qr_result)){
    if($data['id'] == $project_id) {
        $project = $data;
    };
}
$roles = 'null';
$db_table_to_show = 'roles';
$qr_result = mysql_query("select * from " . $db_table_to_show)
or die(mysql_error());
while($data = mysql_fetch_array($qr_result)){
    if($data['id_project'] == $project_id) {
        $roles = $data;
    }
}

$active_page = "projects";
require_once('../backend/header.php');

if($_GET['action']) {
    $action=$_GET['action'];
    switch ($action) {
        case 'create':
            require_once('../backend/add/index.php');
            break;
        case 'edit':
            require_once('../backend/edit/index.php');
            break;
        case 'role':
            require_once('role.php');
            break;
        case 'invest':
            require_once('invest.php');
            break;
        case 'invest_edit':
            require_once('invest_edit.php');
            break;
        case 'invest_view':
            require_once('invest_id.php');
            break;
        case 'trans':
            require_once('trans.php');
            break;
        case 'trans_edit':
            require_once('trans_edit.php');
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
