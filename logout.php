<?php
$action = $_GET['action'];
session_name('pms');
session_start();
session_unset('pms');
session_destroy('pms');


//echo $action

if ($action=="reports") {
	header('location: reports.php');
}else{
	header('location: ajax/page_login.php');	
}

?>