<?php

require_once('../backend/db.php');

$idea_id = $_GET['id'];
$db_table_to_show = 'ideas';
$qr_result = mysql_query("select * from " . $db_table_to_show);
while($data = mysql_fetch_array($qr_result)){
    if($data['id'] == $idea_id) {
        $idea = $data;
    };
}
$active_page = "ideas";
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
    }
} else {
    if($_GET['id']) {
        require_once('id.php');
    } else {
        require_once('main.php');
    }
}

require_once('../backend/footer.php');
