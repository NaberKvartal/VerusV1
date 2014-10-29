<?php
$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

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


echo '        <table style="border: 1px solid;">
            <thead>
            <tr>
                <th>Компанія</th>
                <th>Ім\'я</th>
                <th>E-mail</th>
            </tr>
            </thead>';

$db_table_to_show = 'preen_f';
$qr_result = mysql_query("select * from " . $db_table_to_show);
while($data = mysql_fetch_array($qr_result)){


            echo '<tr>';
            echo '<th>'.$data['company'].'</th>';
            echo '<th>'.$data['name'].'</th>';
            echo '<th>'.$data['email'].'</th>';
            echo '</tr>';
}
?>
</table><br><br>
<?php
echo '        <table style="border: 1px solid;">
    <thead>
    <tr>
        <th>E-mail</th>
    </tr>
    </thead>';
$db_table_to_show = 'preen_s';
$qr_result = mysql_query("select * from " . $db_table_to_show);
while($row = mysql_fetch_array($qr_result)){


            echo '<tr>';
            echo '<th>'.$row['email'].'</th>';
            echo '</tr>';
}


?>
</table>
</body>
</html>
