<?php

if(!$_GET['page']):
    require_once('include/dbconnect.php');
    require_once('include/header.php');
    require_once('include/people.php');
    require_once('include/jslib.php');
else:
    require_once('include/dbconnect_pr.php');
    require_once('include/header.php');
    require_once('include/projects.php');
    require_once('include/jslib_pr.php');
endif;

