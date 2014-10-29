<?php
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
while($row = mysql_fetch_array($qr_result)){
    $array_people[$row['id']] = array($row['name'].' '.$row['surname']);
}

$db_table_to_show = 'projects';
$qr_result = mysql_query("select * from " . $db_table_to_show);
$array_projects = array();
while($row = mysql_fetch_array($qr_result)){
    $array_projects[$row['id']] = array($row['name']);
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<?php



$db_table_to_show = 'projects';
$qr_result = mysql_query("select * from " . $db_table_to_show);
while($data = mysql_fetch_array($qr_result)){

    echo $array_projects[$data['id']][0].'<br>';
    $project_id = $data['id'];

    $db_table_to_show1 = 'investment';
    $qr_result1 = mysql_query("select * from " . $db_table_to_show1);
    $sum=0;
    while($dat = mysql_fetch_array($qr_result1)){
        if($dat['id_project'] == $project_id){
            $sum = $sum + $dat['sum'];
        }
    }

echo '        <table style="border: 1px solid;">
            <thead>
            <tr>
                <th>Інвестор</th>
                <th>Сума інвестицій</th>
                <th>Відсоток</th>
                <th>Акції</th>
            </tr>
            </thead>';

    $db_table_to_show2 = 'investment';
    $qr_result2 = mysql_query("select * from " . $db_table_to_show2);


    while($row = mysql_fetch_array($qr_result2)){
        $percent = $row['sum']/$sum*100;
        $packages = $row['sum']/1000;
        $s = $row['sum']%1000;
        if($s>499) --$packages;
        if($row['id_project'] == $project_id){
            echo '<tr>';
            echo '<th>'.$array_people[$row['id_person']]['0'].'</th>';
            echo '<th>'.number_format($row['sum'], 0, '', ',').'</th>
            <th>'.number_format($percent, 4, ',', ',').'%</th>
            <th>'.number_format($packages, 0, '', ' ').'</th>
            </tr>';
        }
    }

    echo '</table>
Сума інвестицій - '.$sum.'
    <br><br><br>';

}
?>

</body>
</html>
