<?php

$db_host = 'localhost';
$db_name = 'yumalviv_invest';
$db_username = 'yumalviv_in';
$db_password = '111111';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());

$db_table_to_show = 'projects';
$connect_to_db = mysql_connect($db_host, $db_username, $db_password)
or die("Could not connect: " . mysql_error());
mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());
$qr_result = mysql_query("select * from " . $db_table_to_show)
or die(mysql_error());

$project_id = $_GET['id'];

while($data = mysql_fetch_array($qr_result)){
    if($data['id'] == $project_id) {
        $project = $data;
    };
}

/*  */

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Property Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Property</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/ideas">Ідеї</a></li>
                <li><a href="/concept">Концепції</a></li>
                <li><a href="/projects">Проекти</a></li>
                <li><a href="/people">Користувачі</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="/ideas">Ідеї</a></li>
                <li><a href="/concept">Концепції</a></li>
                <li class="active"><a href="/projects">Проекти</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="/people">Користувачі</a></li>
                <!--                <li><a href="">- Add item</a></li>-->
            </ul>
        </div>


            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <input class="form-control" style="width: 200px;" placeholder="Назва" id="a1" value="<?php echo $project['name']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Місто" id="b1" value="<?php echo $project['city']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Тип будівлі" id="c1" value="<?php echo $project['type']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Прихідний рахунок" id="d1" value="<?php echo $project['pay']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Дата старту проекту" id="e1" value="<?php echo $project['time_start']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Термін реалізації" id="f1" value="<?php echo $project['time_realize']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Вартість одної секції" id="g1" value="<?php echo $project['cost_one_sec']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Кількість секцій" id="h1" value="<?php echo $project['sec_count']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Вартість усіх секцій" id="i1" value="<?php echo $project['cost_all_sec']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Загальна вартість" id="j1" value="<?php echo $project['full_cost_sec']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Середня ціна житлової площі" id="k1" value="<?php echo $project['middle_cost_life']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Житлова площа" id="l1" value="<?php echo $project['square_life']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Вартість житлової площі" id="m1" value="<?php echo $project['sum_cost_life']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Середня ціна комерційної площі" id="n1" value="<?php echo $project['middle_cost_bus']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Комерційна площа" id="o1" value="<?php echo $project['square_bus']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Вартість комерційної площі" id="p1" value="<?php echo $project['sum_cost_bus']; ?>"><br/>
                <input class="form-control" style="width: 200px;" placeholder="Загальна вартість будівництва" id="r1" value="<?php echo $project['full_cost']; ?>"><br/>
                <div class="btn btn-lg btn-primary" onclick="editProject(<?php echo $project_id; ?>);">Редагувати проект</div>
            </div>


    </div>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/js/ie10-viewport-bug-workaround.js"></script>
<?php require_once('../include/projects_js.php'); ?>
</body>
</html>