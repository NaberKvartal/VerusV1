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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

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
            <!--            <ul class="nav navbar-nav navbar-right">-->
            <!--                <li><a href="#">Dashboard</a></li>-->
            <!--                <li><a href="#">Settings</a></li>-->
            <!--                <li><a href="#">Profile</a></li>-->
            <!--                <li><a href="#">Help</a></li>-->
            <!--            </ul>-->
            <!--            <form class="navbar-form navbar-right">-->
            <!--                <input type="text" class="form-control" placeholder="Search...">-->
            <!--            </form>-->
        </div>
    </div>
</div>
<?php
if(!isset($active)) :
if($_GET['page']) :
$active = 'project';
else:
$active = 'people';
endif;
endif;

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li <?php if($active=='project'):?>class="active" <?php endif;?>><a href="project.php">Проекти</a></li>
                <!--                <li><a href="#">- Add item</a></li>-->
            </ul>
            <ul class="nav nav-sidebar">
                <li <?php if($active=='people'):?>class="active" <?php endif;?> ><a href="people.php">Користувачі</a></li>
                <!--                <li><a href="">- Add item</a></li>-->
            </ul>
        </div>