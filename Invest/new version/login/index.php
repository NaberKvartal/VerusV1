<?php
session_start();
if($_GET['log_out']) {
    $_SESSION['authorized']=0;
    header('Location: /login');
    exit;
}
if($_POST) {
    $db_host = 'localhost';
    $db_name = 'yumalviv_invest';
    $db_username = 'yumalviv_in';
    $db_password = '111111';
    $admin_id = array('21', '97', '104');
    $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
    or die("Could not connect: " . mysql_error());
    mysql_select_db($db_name, $connect_to_db)
    or die("Could not select DB: " . mysql_error());
    $auth = false;

    $db_table_to_show = 'people';
    $qr_result = mysql_query("select * from " . $db_table_to_show);
    $logged=array();
        while($row = mysql_fetch_array($qr_result)) {
            if($row['user']==$_POST['login'] && $row['pass']==$_POST['pass']){
                $auth = true;
                $logged = $row;
            }
        }
    if($auth==true) {
        $_SESSION['authorized']=1;
        $_SESSION['admin'] = false;

        $_SESSION['id_user'] = $logged['id'];

        if(in_array($logged['id'], $admin_id)) {
            $_SESSION['admin'] = true;
        }
        header( 'Location: '.$_POST['redirect_url'] );
        exit;
    } else {
        header( 'Location: /login/?has_error=true' );
        exit;
    }
}
if($_SESSION['authorized']==1) {
    header( 'Location: /people' );
    exit;
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
    <link rel="icon" href="../../favicon.ico">
    <link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <title>Log In</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php if(!$_GET['has_error']): ?>
<div class="container">
    <form class="form-signin" role="form" method="post">
        <h2 class="form-signin-heading">Авторизація</h2>
        <input name='login' type="text" class="form-control" placeholder="логін" required autofocus>
        <input name='pass' type="password" class="form-control" placeholder="пароль" required>
        <input name='redirect_url' type="password" class="form-control" style="display: none;" value="<?php echo $_GET['redirect_url'];?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Увійти</button>
    </form>
    <!-- Modal -->
</div> <!-- /container -->
<?php else: ?>
<div class="container">
    <form class="form-signin" role="form" method="post">
        <h2 class="form-signin-heading">Авторизація</h2>
        <div class="form-group has-error">
            <input name='login' type="text" class="form-control" placeholder="логін" required autofocus><br>
            <input name='pass' type="password" class="form-control" placeholder="пароль" required>
            <input name='redirect_url' type="password" class="form-control" style="display: none;" value="<?php echo $_GET['redirect_url'];?>">
        </div>
        <p class="help-block">Логін або пароль не дійсний</p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Увійти</button>
    </form>
    <!-- Modal -->
</div> <!-- /container -->
<?php endif; ?>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<script src="http://getbootstrap.com/assets/js/docs.min.js"></script>
</body>
</html>
