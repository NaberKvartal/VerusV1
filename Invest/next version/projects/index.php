<?php

require_once('../backend/db.php');
require_once('../backend/main_arrays.php');

// Інформація про проект -> $info_project

require_once('../backend/header.php');

if($_GET['id_project']) {
    require_once('one.php');
} else {
    switch($_GET['action']) {
        case 'create':
            break;
        case 'edit':
            break;
        default:
            require_once('all.php');
            break;
    }
}

require_once('../backend/footer.php');
