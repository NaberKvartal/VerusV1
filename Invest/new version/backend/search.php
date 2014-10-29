<?php

$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

$text = $_GET['text'];
$type = $_GET['type'];
$role = $_GET['role'];

switch($type) {
    case 'filter':
        $db_table_to_show = 'projects';
        $qr_result = mysql_query("select * from " . $db_table_to_show);
        $array = '';

        $filterCity = $_GET['filterCity'];
        $filterStatus = $_GET['filterStatus'];
        $filterTime = $_GET['filterTime'];


        while($row = mysql_fetch_array($qr_result)){
            // city check
            $check = 'false';
            $count = strlen($filterCity);
            $cityToCheck = substr($row['city'], 0, $count);
            $filterCity = mb_strtolower($filterCity, 'UTF-8');
            $cityToCheck = mb_strtolower($cityToCheck, 'UTF-8');
            $timeCheck = 'false';
            $timeToCheck = $row['time_realize'];
            switch($filterTime) {
                case 'До 1 року':
                    if($timeToCheck>1 &&$timeToCheck < 13) {
                        $timeCheck = 'true';
                    }
                    break;
                case 'Від 1 до 2 років':
                    if($timeToCheck>12 &&$timeToCheck < 25) {
                        $timeCheck = 'true';
                    }
                    break;
                case 'Від 2 до 3 років':
                    if($timeToCheck>24 &&$timeToCheck < 37) {
                        $timeCheck = 'true';
                    }
                    break;
            }

            if($timeCheck == 'false' && $filterTime == 'empty') {
                $timeCheck = 'empty';
            }

            if($filterCity == 'empty') {
                if($filterStatus != 'empty') {
                    if($row['status']==$filterStatus) {
                        $check = 'true';
                    }
                } else {
                    $check = 'true';
                }
            } else {
                if($filterStatus != 'empty') {
                    if($row['status']==$filterStatus && $filterCity==$cityToCheck) {
                        $check = 'true';
                    }
                } else {
                    if($filterCity==$cityToCheck) {
                        $check = 'true';
                    }
                }
            }
            if($check == 'true' && $timeCheck == 'false') {
                $check = 'false';
            }
            if($check == 'false' && $timeCheck == 'true') {
                $check = 'true';
            }
            if($check == 'true') {
                if($role=='admin') {
                    $array .= '<tr>'.
                        '<th>' . $row['id'] . '</a></th>'.
                        '<th>' . $row['id_concept'] . '</a></th>'.
                        '<th><a href="/projects/?id=' . $row['id'] . '">' . $row['name'] . '</a></th>'.
                        '<th>' . $row['status'] . '</th>'.
                        '<th>' . $row['pay'] . '</th>'.
                        '<th>' . $row['time_realize'] . '</th>'.
                        '<th><a href="/projects/?action=edit&id='.$row['id'].'" class="btn btn-warning">Оновити</a></th>'.
                        '</tr>';
                } else {
                    $array .= '<tr>'.
                        '<th>' . $row['id'] . '</a></th>'.
                        '<th>' . $row['id_concept'] . '</a></th>'.
                        '<th><a href="/projects/?id=' . $row['id'] . '">' . $row['name'] . '</a></th>'.
                        '<th>' . $row['status'] . '</th>'.
                        '<th>' . $row['pay'] . '</th>'.
                        '<th>' . $row['time_realize'] . '</th>'.
                        '</tr>';
                }
            }
        }
        echo $array;
        break;
    case 'people':
        $db_table_to_show = 'people';
        $qr_result = mysql_query("select * from " . $db_table_to_show);
        $array = '';
        while($row = mysql_fetch_array($qr_result)){
            $count = strlen($text);
            $name = substr($row['name'], 0, $count);
            $surname = substr($row['surname'], 0, $count);
            if($name==$text || $surname==$text) {
                $array .= '<div id="id-'.$row['id'].'" data-name="'.$row['name'].' '.$row['surname'].'" class="drop btn btn-default">'.$row['name'].' '.$row['surname'].'</div><br>';
            }
        }
        echo $array;
        break;
    case 'people_big':
        $db_table_to_show = 'people';
        $qr_result = mysql_query("select * from " . $db_table_to_show);
        $array = '';
        while($row = mysql_fetch_array($qr_result)){
            $count = strlen($text);
            $name = substr($row['name'], 0, $count);
            $surname = substr($row['surname'], 0, $count);
            if($name==$text || $surname==$text) {
                $array .= '<tr id="th' . $row['id'] . '">'.
                 '<th><a href="/people/?id='.$row['id'].'">' . $row['id'] . '</a></th>'.
                 '<th>' . $row['name'] . '</th>'.
                 '<th>' . $row['surname'] . '</th>'.
                 '<th><a href="/people/?action=edit&id='.$row['id'].'" class="btn btn-warning">Оновити</a></th>'.
                 '<th><div onclick="deletePerson(\'' . $row['id'] . '\')" class="btn btn-danger"">Видалити</div></th>'.
                 '</tr>';
            }
        }
        echo $array;
        break;
    case 'projects':
        $db_table_to_show = 'projects';
        $qr_result = mysql_query("select * from " . $db_table_to_show);
        $array = '';
        while($row = mysql_fetch_array($qr_result)){
            $count = strlen($text);
            $name = substr($row['name'], 0, $count);
            $textLow = mb_strtolower($text, 'UTF-8');
            $nameLow = $row['name'];
            $nameLow = mb_strtolower($nameLow, 'UTF-8');
            $s = strpos($nameLow, $textLow);
            if($name==$text || $s!==false) {
                $array .= '<tr>'.
                '<th>' . $row['id'] . '</a></th>'.
                '<th>' . $row['id_concept'] . '</a></th>'.
                '<th><a href="/projects/?id=' . $row['id'] . '">' . $row['name'] . '</a></th>'.
                '<th>' . $row['status'] . '</th>'.
                '<th>' . $row['pay'] . '</th>'.
                '<th>' . $row['time_realize'] . '</th>'.
                '<th><a href="/projects/?action=edit&id='.$row['id'].'" class="btn btn-warning">Оновити</a></th>'.
                '</tr>';
            }
        }
        echo $array;
        break;
}
