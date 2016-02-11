<?php
// DB CONNECTION START
$dbhost							= "localhost";
$dbuser							= "root";
$dbpass							= "Victor1aserver";
$dbname							= "pms_db";

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Error connecting to mysql");
mysql_select_db($dbname);
// DB CONNECTION END


?>