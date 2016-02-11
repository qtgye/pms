<?php
session_name('pms');
session_start();
// print $_SESSION[''];
if (!$_SESSION['pmsuser']){
	header('location: ajax/page_login.php');
	session_unset('pms');
	session_destroy('pms');
	exit();
}
$user = $_SESSION['pmsuser'];
// echo $user;
$query = "SELECT trans.p_id, trans.id, trans.pass, trans.nickname, trans.emp_group, trans.userroles, e.last,e.first,e.middle, l.id as locale, l.locale_id, g.id as grp_id, g.group_id, g.group_name, u.id as userroles_id, u.userroles_name 
				FROM user trans
				LEFT JOIN emp e ON e.eid=trans.id
				LEFT JOIN  locale l on l.id=e.locale
				LEFT JOIN  emp_group g on g.id=trans.emp_group
				LEFT JOIN  user_roles u on u.id=trans.userroles WHERE trans.is_deleted=0 AND trans.id=$user";
// echo $query;
$result = mysql_query($query);
while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
	$nn		= $row['nickname'];	
	$loc	= $row['locale'];	
	$grp	= $row['emp_group'];	
	$cred	= $row['userroles'];	
}

// echo $nn . ' loc: ' . $loc . ' grp: ' . $grp . ' ' . $cred; 
?>
