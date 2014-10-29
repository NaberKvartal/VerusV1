<?php

$table = 'people';
$qr_result = mysql_query("select * from " . $table);
$array_people = array();
while($row = mysql_fetch_array($qr_result)){
    $array_people[$row['id']] = $row['name'].' '.$row['surname'];
}

$table = 'projects';
$qr_result = mysql_query("select * from " . $table);
$array_projects = array();
while($row = mysql_fetch_array($qr_result)){
    $array_projects[$row['id']] = $row['name'];
}


/*
    Збереження інформації при наявності параметра GET.
    Якщо в посиланні вказується GET-параметр (id_project, id_person, ...),
 */
if($_GET['id_person']) {
    $table = 'people';
    $qr_result = mysql_query("select * from " . $table . " where `id_person`=" . $_GET['id_person']);
    $info_person = array();
    while($data_person = mysql_fetch_array($qr_result)){
            $info_person = $data_person;
    }

    $table = 'investment';
    $qr_result = mysql_query("select * from " . $table . " where `id_person`=" . $_GET['id_person']);
    $info_invest_of_person = array();
    while($data_invest_of_person = mysql_fetch_array($qr_result)){
        $info_invest_of_person = $data_invest_of_person;
    }
}

if($_GET['id_project']) {
    $table = 'projects';
    $qr_result_1 = mysql_query("select * from " . $table . " where `id_project`=" . $_GET['id_project']);
    $info_project = array();
    while($data_project = mysql_fetch_array($qr_result_1)){
        $info_project = $data_project;
    }

    $table = 'roles';
    $qr_result = mysql_query("select * from " . $table . " where `id_project`=" . $_GET['id_project']);
    $info_roles = array();
    while($data_roles = mysql_fetch_array($qr_result)){
        $info_roles = $data_roles;
    }
    $table = 'investment';
    $qr_result = mysql_query("select * from " . $table . " where `id_project`=" . $_GET['id_project']);
    $info_investment_of_project = array();
    while($data_invest_of_project = mysql_fetch_array($qr_result)){
        $info_investment_of_project[$data_invest_of_project['id_invest']] = $data_invest_of_project;
    }
    $table = 'sections';
    $qr_result = mysql_query("select * from " . $table . " where `id_project`=" . $_GET['id_project']);
    $info_sections = array();
    while($data_sections = mysql_fetch_array($qr_result)){
        $info_sections = $data_sections;
    }
}

if($_GET['id_invest']) {
    $table = 'investment';
    $qr_result = mysql_query("select * from " . $table . " where `id_invest`=" . $_GET['id_invest']);
    $info_invest = array();
    while($data_invest = mysql_fetch_array($qr_result)){
        $info_invest = $data_invest;
    }
}

if($_GET['id_trans']) {
    $table = 'trans';
    $qr_result = mysql_query("select * from " . $table . " where `id_trans`=" . $_GET['id_trans']);
    $info_trans = array();
    while($data_trans = mysql_fetch_array($qr_result)){
        $info_trans = $data_trans;
    }
}

if($_GET['id_idea']) {
    $table = 'ideas';
    $qr_result = mysql_query("select * from " . $table . " where `id_idea`=" . $_GET['id_idea']);
    $info_idea = array();
    while($data_idea = mysql_fetch_array($qr_result)){
        $info_idea = $data_idea;
    }
}

if($_GET['id_concept']) {
    $table = 'concepts';
    $qr_result = mysql_query("select * from " . $table . " where `id_concept`=" . $_GET['id_concept']);
    $info_concept = array();
    while($data_concept = mysql_fetch_array($qr_result)){
        $info_concept = $data_concept;
    }
}