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
    <link href="../css/datepicker.css" rel="stylesheet">
    <link href="../css/datepicker3.css" rel="stylesheet">
    <style>
        input {
            width: 300px !important;
        }
        select {
            width: 300px !important;
        }
        .drop {
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <!--    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>-->
    <script src="/js/jquery.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/docs.min.js"></script>
    <script src="http://eternicode.github.io/bootstrap-datepicker/google-code-prettify/prettify.min.js"></script>
    <script src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/locales/bootstrap-datepicker.ua.js" charset="UTF-8"></script>
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
                <li><a href="/people/?id=<?php echo $_SESSION['id_user']; ?>">Привіт, <?php echo $array_of_person['name']; ?>!</a></li>
                <li><a href="/ideas">Ідеї</a></li>
                <li><a href="/concepts">Концепції</a></li>
                <li><a href="/projects">Проекти</a></li>
                <li><a href="/people">Користувачі</a></li>
                <li><a href="/login/?log_out=true">Вихід</a></li>
            </ul>
        </div>
    </div>
</div>
<?php if($active_page==''): ?> class="active"<?php endif; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li<?php if($active_page=='ideas'): ?> class="active"<?php endif; ?>><a href="/ideas">Ідеї</a></li>
                <li<?php if($active_page=='concepts'): ?> class="active"<?php endif; ?>><a href="/concepts">Концепції</a></li>
                <li<?php if($active_page=='projects'): ?> class="active"<?php endif; ?>><a href="/projects">Проекти</a></li>
                <li<?php if($active_page=='vacancy'): ?> class="active"<?php endif; ?>><a href="/vacancy">Вакансії</a></li>
                <?php if($_SESSION['admin']==true): ?>
                    <li><a href="/vacancy/?action=view_prop">- заявки на вакансії</a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav nav-sidebar">
                <li<?php if($active_page=='people'): ?> class="active"<?php endif; ?>><a href="/people">Користувачі</a></li>
                <!--                <li><a href="">- Add item</a></li>-->
            </ul>
        </div>