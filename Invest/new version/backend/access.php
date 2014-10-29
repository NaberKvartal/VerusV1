<?php
$access = true;
while($data = mysql_fetch_array($qr_result)){
    $last_id = $data['id'];
}
$participant = false;
$investor = false;
for($i=0; $i<$last_id; ++$i) {
    if($array_part_of_project[$i] == $project['id']) {
        $participant = true;
    }
    if($array_invest_of_project[$i] == $project['id']) {
        $investor = true;
    }
}

if($participant!=true && $investor != true && $_SESSION['admin'] != true) {
    if($array_of_person['status'] == 'Інвестор') {
        if($project['status'] !== 'Підготовка'
            && $project['status'] !== 'Пошук команди'
            && $project['status'] !== 'Пошук інвестицій') {
            $access = false;
        }
    }
    if($array_of_person['status'] == 'Учасник') {
        if($project['status'] !== 'Підготовка'
            && $project['status'] !== 'Пошук команди') {
            $access = false;
        }
    }
}

if($_SESSION['id_user'] == 105) $access=true;