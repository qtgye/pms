<?php
include("../include/db.php");
// include("../include/db1.php");
include("../include/functions.php");

//id //
if(isset($_POST['id'])){
	$id	= mysql_real_escape_string($_POST['id']);
}
//end id//
//user//
if(isset($_POST['user'])){
	$user	= mysql_real_escape_string($_POST['user']);

	$userquery = user_query(null);
	$userquery .= " AND trans.id=$user";
	// echo $userquery;
	$userresult = mysql_query($userquery);
	while($userrow = mysql_fetch_array($userresult, MYSQL_ASSOC)){
		$nn		= $userrow['nickname'];
		$loc	= $userrow['locale'];
		$grp	= $userrow['emp_group'];
		$cred	= $userrow['userroles'];
	}
}
// end user //

// login page //
if (isset($_POST['pass'])) {
	$pass	= mysql_real_escape_string($_POST['pass']);
}
if (isset($_POST['user'])) {
	$user	= mysql_real_escape_string($_POST['user']);
}else{
	session_name('pms');
	session_start();
}
# END login page #

# Financial Perspective #
if(isset($_POST['bud'])){
	$bud 	= mysql_real_escape_string($_POST['bud']);
}
if(isset($_POST['pck_id'])){
	$pck_id 	= mysql_real_escape_string($_POST['pck_id']);
}
if(isset($_POST['hk_id'])){
	$hk_id 	= mysql_real_escape_string($_POST['hk_id']);
}
if(isset($_POST['year'])){
	$year 	= mysql_real_escape_string($_POST['year']);
}
# END Financial Perspective #

# deviation admin #
if(isset($_POST['value'])){
	$value 		= mysql_real_escape_string($_POST['value']);
}
if(isset($_POST['dev_val'])){
	$dev_val 	= mysql_real_escape_string($_POST['dev_val']);
}
if(isset($_POST['dept_id'])){
	$dept_id 	= mysql_real_escape_string($_POST['dept_id']);
}
if(isset($_POST['sec_id'])){
	$sec_id 	= mysql_real_escape_string($_POST['sec_id']);
}
if(isset($_POST['cat_id'])){
	$cat_id 	= mysql_real_escape_string($_POST['cat_id']);
}
if(isset($_POST['lbl_id'])){
	$lbl_id 	= mysql_real_escape_string($_POST['lbl_id']);
}
//dept EDIT/DELETE ID
if(isset($_POST['ed_id'])){
	$ed_id 	= mysql_real_escape_string($_POST['ed_id']);
}
if(isset($_POST['txt'])){
	$txt 	= mysql_real_escape_string($_POST['txt']);
}
//button from
if(isset($_POST['val'])){
	$val 	= mysql_real_escape_string($_POST['val']);
}
//btn text
if(isset($_POST['btn'])){
	$btn 	= mysql_real_escape_string($_POST['btn']);
}

// print "<pre>";
// 	print_r($_POST);
// 	print "</pre>";
# End deviation admin #

if(isset($_POST['locale'])){
	// print "<pre>";
	// print_r($_POST);
	// print "</pre>";
	$locale 	= mysql_real_escape_string($_POST['locale']);
}
if(isset($_POST['toa'])){
	$toa    	= mysql_real_escape_string($_POST['toa']);
}
if(isset($_POST['input_date'])){
	$input_date = dateletterformatDB(mysql_real_escape_string($_POST['input_date']));
}
if(isset($_POST['start_date'])){
	$start_date = dateletterformatDB(mysql_real_escape_string($_POST['start_date']));
}
if(isset($_POST['end_date'])){
	$end_date   = dateletterformatDB(mysql_real_escape_string($_POST['end_date']));
}
if(isset($_POST['im_date'])){
	$im_date   = dateletterformatDB(mysql_real_escape_string($_POST['im_date']));
}
if(isset($_POST['nc_class'])){
	$nc_class   = mysql_real_escape_string($_POST['nc_class']);
}
if(isset($_POST['text_dev'])){
	$text_dev   = mysql_real_escape_string($_POST['text_dev']);
}
if(isset($_POST['text_cls'])){
	$text_cls   = mysql_real_escape_string($_POST['text_cls']);
}
if(isset($_POST['text_root'])){
	$text_root  = mysql_real_escape_string($_POST['text_root']);
}
if(isset($_POST['text_rem'])){
	$text_rem  = mysql_real_escape_string($_POST['text_rem']);
}
if(isset($_POST['text_cp'])){
	$text_cp  = mysql_real_escape_string($_POST['text_cp']);
}
if(isset($_POST['action'])){
	$action		= mysql_real_escape_string($_POST['action']);
}

if(isset($_POST['id'])){
	$id	= mysql_real_escape_string($_POST['id']);
}
if(isset($_POST['chk_depts'])){
	$chk_depts	= $_POST['chk_depts'];
}
if(isset($_POST['chk_emp'])){
	$chk_emp	= $_POST['chk_emp'];
}
if(isset($_POST['locale'])){
	$loc	= mysql_real_escape_string($_POST['locale']);
}
if(isset($_POST['dept'])){
	$dept	= mysql_real_escape_string($_POST['dept']);
}
if(isset($_POST['input_budget_add'])){
	$budget	= mysql_real_escape_string($_POST['input_budget_add']);
}
if(isset($_POST['mos'])){
	$mos	= mysql_real_escape_string($_POST['mos']);
}
//form filter
if(isset($_POST['nc_class'])){
	$nc_class  = mysql_real_escape_string($_POST['nc_class']);
}
if(isset($_POST['f_start'])){
	$f_start  = dateletterformatDB(mysql_real_escape_string($_POST['f_start']));
}
if(isset($_POST['f_end'])){
	$f_end  = dateletterformatDB(mysql_real_escape_string($_POST['f_end']));
}

/* spotcheck */

if(isset($_POST['hk_list'])){
	$hk_list  = mysql_real_escape_string($_POST['hk_list']);
}
if(isset($_POST['room_list'])){
	$room_list  = mysql_real_escape_string($_POST['room_list']);
}
if(isset($_POST['cnt'])){
	$cnt  = mysql_real_escape_string($_POST['cnt']);
}
if(isset($_POST['toc'])){
	$toc  = mysql_real_escape_string($_POST['toc']);
}
if(isset($_POST['chk_tools'])){
	$chk_tools	= $_POST['chk_tools'];
}

/* end spotcheck */

/* Add employee */
if(isset($_POST['stat'])){
	/* Get the array with value */
	$stat	= $_POST['stat'];
	 for ( $i=0; $i < count( $stat ); $i++ ){
    	if ($stat[$i]!="") {
    		$stat_f = $stat[$i];
    	}
    }
    /* escape string for the array with value */
    $stat_f = mysql_real_escape_string($stat_f);
    /* Update Employee getting the value depends on emp */
   	if ($action=="update_emp1") {
   		$stat_upd = $stat[0];
   	}else{
   		$stat_upd = $stat[1];
   	}
    // echo $stat_f;
}
if(isset($_POST['grp'])){
	$grp	= $_POST['grp'];
	 for ( $i=0; $i < count( $grp ); $i++ ){
    	if ($grp[$i]!="") {
    		$grp_f = $grp[$i];
    	}
    }
    $grp_f = mysql_real_escape_string($grp_f);
    /* Update Employee getting the value depends on emp */
   	if ($action=="update_emp1" OR $action=="update_user_db1") {
   		$grp_upd = $grp[0];
   	}else{
   		$grp_upd = $grp[1];
   	}
    // echo $grp_f;
}
if(isset($_POST['empid'])){
	$empid	= $_POST['empid'];
	 for ( $i=0; $i < count( $empid ); $i++ ){
    	if ($empid[$i]!="") {
    		$empid_f = $empid[$i];
    	}
    }
    $empid_f = mysql_real_escape_string($empid_f);
    /* Update Employee getting the value depends on emp */
   	if ($action=="update_emp1") {
   		$empid_upd = $empid[0];
   	}else{
   		$empid_upd = $empid[1];
   	}
    // echo $empid_f;
}
if(isset($_POST['first'])){
	$first	= $_POST['first'];
	 for ( $i=0; $i < count( $first ); $i++ ){
    	if ($first[$i]!="") {
    		$first_f = $first[$i];
    	}
    }
    $first_f = mysql_real_escape_string($first_f);
    /* Update Employee getting the value depends on emp */
   	if ($action=="update_emp1") {
   		$first_upd = $first[0];
   	}else{
   		$first_upd = $first[1];
   	}
    // echo $first_f;
}

if(isset($_POST['last'])){
	$last = $_POST['last'];
	 for ( $i=0; $i < count( $last ); $i++ ){
    	if ($last[$i]!="") {
    		$last_f = $last[$i];
    	}
    }
    $last_f= mysql_real_escape_string($last_f);
    /* Update Employee getting the value depends on emp */
   	if ($action=="update_emp1" OR $action=="update_user_db1") {
   		$last_upd = $last[0];
   	}else{
   		$last_upd = $last[1];
   	}
    // echo $last_f;
}

if(isset($_POST['middle'])){
	$middle	= $_POST['middle'];
	 for ( $i=0; $i < count( $middle ); $i++ ){
    	if ($middle[$i]!="") {
    		$middle_f = $middle[$i];
    	}
    }
    $middle_f = mysql_real_escape_string($middle_f);
    /* Update Employee getting the value depends on emp */
   	if ($action=="update_emp1") {
   		$middle_upd = $middle[0];
   	}else{
   		$middle_upd = $middle[1];
   	}
    // echo $middle_f;
}
if(isset($_POST['loc'])){
	$loc	= $_POST['loc'];
	 for ( $i=0; $i < count( $loc ); $i++ ){
    	if ($loc[$i]!="") {
    		$loc_f = $loc[$i];
    	}
    }
    $loc_f = mysql_real_escape_string($loc_f);
    /* Update Employee getting the value depends on emp */
   	if ($action=="update_emp1") {
   		$loc_upd = $loc[0];
   	}else{
   		$loc_upd = $loc[1];
   	}
    // echo $loc_f;
}
if(isset($_POST['pos'])){
	$pos	= $_POST['pos'];
	 for ( $i=0; $i < count( $pos ); $i++ ){
    	if ($pos[$i]!="") {
    		$pos_f = $pos[$i];
    	}
    }
    $pos_f = mysql_real_escape_string($pos_f);
    /* Update Employee getting the value depends on emp */
   	if ($action=="update_emp1") {
   		$pos_upd = $pos[0];
   	}else{
   		$pos_upd = $pos[1];
   	}
    // echo $last_f;
}
if(isset($_POST['resigned'])){
	$resigned	= $_POST['resigned'];
	 for ( $i=0; $i < count( $resigned ); $i++ ){
    	if ($resigned[$i]!="") {
    		$resigned_f = $resigned[$i];
    	}
    }
    $resigned_f = mysql_real_escape_string($resigned_f);
    /* Update Employee getting the value depends on emp */
   	if ($action=="update_emp1") {
   		$resigned_upd = $resigned[0];
   	}else{
   		$resigned_upd = $resigned[1];
   	}
    // echo $resigned_f;
}
if(isset($_POST['email'])){
	$email	= $_POST['email'];
	 for ( $i=0; $i < count( $email ); $i++ ){
    	if ($email[$i]!="") {
    		$email_f = $email[$i];
    	}
    }
    $email_f = mysql_real_escape_string($email_f);
    /* Update Employee getting the value depends on emp */
   	if ($action=="update_emp1") {
   		$email_upd = $email[0];
   	}else{
   		$email_upd = $email[1];
   	}
    // echo $resigned_f;
}
if(isset($_POST['user_r'])){
	$user_r	= $_POST['user_r'];
	 for ( $i=0; $i < count( $user_r ); $i++ ){
    	if ($user_r[$i]!="") {
    		$user_f = $user_r[$i];
    	}
    }
    $user_f = mysql_real_escape_string($user_f);

    if ($action=="update_user_db1") {
   		$user_upd = $user_r[0];
   	}else{
   		$user_upd = $user_r[1];
   	}
}
if(isset($_POST['array_id'])){
	$array_id	= $_POST['array_id'];
	 for ( $i=0; $i < count( $array_id ); $i++ ){
    	if ($array_id[$i]!="") {
    		$id_f = $array_id[$i];
    	}
    }
    $id_f = mysql_real_escape_string($id_f);
}
/* End add Employee */

//end form filter

// login page //
if ($action=="login") {

	$query = "SELECT * FROM user";
	$query .= " WHERE id='$user' AND is_deleted=0 AND userroles!=0";

	echo $query;
	$query = mysql_query($query)or die('query failed');
	$x = mysql_num_rows($query);
	if ($x==0) {
		return "0";
	}
	while($row = mysql_fetch_array($query)){
		$user_db = $row['id'];
		$pass_db = $row['pass'];

		if ($user_db==$user AND $pass_db==$pass) {
			session_name('pms');
			session_start();
			// $_SESSION['timeout'] = time();
			$_SESSION['pmsuser']=$user;
			echo 1;
		}
	}
}
// end login page//

/* Employee */
if ($action=="add_emp") {

	//query for assessment findings trans MASTERDATA
   	// echo $query;
   	//end for assesment masterdata
   	$grp = s_grp(null);
   	$pos = s_pos(null);
   	$stat = s_stat(null);
   	$loc = s_loc(null);
   	// echo $grp;

	$body = '	<form id="add_form1" method="post" style="font-size:12px;" class="add_form1 form-horizontal hidden-xs">
					<input type="hidden" name="action" value="add_emp_db" />
						<div class="form-group">
							<label class="col-sm-4 control-label">Employee ID</label>
							<div class="col-sm-6">
								<input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,\'\')" maxlength="6"  type="text" id="empid" class="form-control" name="empid[]" placeholder="Peoplecore ID" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Last Name</label>
							<div class="col-sm-6">
								<input type="text" id="last" class="form-control" name="last[]" placeholder="Last Name" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">First Name</label>
							<div class="col-sm-6">
								<input type="text" id="first" class="form-control" name="first[]" placeholder="First Name" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Middle Name</label>
							<div class="col-sm-6">
								<input type="text" id="middle" class="form-control" name="middle[]" placeholder="Middle Name" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Locale</label>
							<div class="col-sm-6">
								<select class="populate placeholder s_list" name="loc[]" id="loc">
									' . $loc . '
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Position</label>
							<div class="col-sm-6">
								<select class="populate placeholder s_list" name="pos[]" id="pos">
									' . $pos . '
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Group</label>
							<div class="col-sm-6">
								<select class="populate placeholder s_list" name="grp[]" id="grp">
									' . $grp . '
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Status</label>
							<div class="col-sm-6">
								<select class="populate placeholder s_list" name="stat[]" id="stat">
									' . $stat . '
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Email</label>
							<div class="col-sm-6">
								<input type="text" id="email" class="form-control" name="email[]" placeholder="Email" value="">
							</div>
						</div>
						<div class="form-group">
					        <div class="col-xs-12">
					        	<center>
					            <button id="btn_form1" type="submit" class="btn btn-primary btn-lg">Add Employee</button>
					        	</center>
					        </div>
	    				</div>
				</form>

				<form id="add_form2" method="post" style="font-size:12px;" class="add_form2 form-horizontal visible-xs">
					<input type="hidden" name="action" value="add_emp_db" />
						<div class="form-group">
							<label class="col-sm-4 control-label">Employee ID</label>
							<div class="col-sm-6">
								<input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,\'\')" maxlength="6"  type="text" id="empid" class="form-control" name="empid[]" placeholder="Peoplecore ID" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Last Name</label>
							<div class="col-sm-6">
								<input type="text" id="last" class="form-control" name="last[]" placeholder="Last Name" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">First Name</label>
							<div class="col-sm-6">
								<input type="text" id="first" class="form-control" name="first[]" placeholder="First Name" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Middle Name</label>
							<div class="col-sm-6">
								<input type="text" id="middle" class="form-control" name="middle[]" placeholder="Middle Name" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Locale</label>
							<div class="col-sm-6">
								<select class="populate placeholder s_list" name="loc[]" id="loc">
									' . $loc . '
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Position</label>
							<div class="col-sm-6">
								<select class="populate placeholder s_list" name="pos[]" id="pos">
									' . $pos . '
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Group</label>
							<div class="col-sm-6">
								<select class="populate placeholder s_list" name="grp[]" id="grp">
									' . $grp . '
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Status</label>
							<div class="col-sm-6">
								<select class="populate placeholder s_list" name="stat[]" id="stat">
									' . $stat . '
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Email</label>
							<div class="col-sm-6">
								<input type="text" id="email" class="form-control" name="email[]" placeholder="Email" value="">
							</div>
						</div>
						<div class="form-group">
					        <div class="col-xs-12">
					        	<center>
					            <button id="btn_form2" type="submit" class="btn btn-primary btn-lg">Add Employee</button>
					        	</center>
					        </div>
	    				</div>
				</form>
		';
		echo $body;
}
if ($action=="add_emp_db") {

	$body = '';
	$body .= ' empid ' 	. $empid_f	 . '<br>';
	$body .= ' last ' 	. $last_f	 . '<br>';
	$body .= ' first ' 	. $first_f	 . '<br>';
	$body .= ' middle ' . $middle_f	 . '<br>';
	$body .= ' pos ' 	. $pos_f	 . '<br>';
	$body .= ' loc ' 	. $loc_f	 . '<br>';
	$body .= ' grp ' 	. $grp_f	 . '<br>';
	$body .= ' stat ' 	. $stat_f	 . '<br>';
	$body .= ' email ' 	. $email_f	 . '<br>';

	echo $body;
	$first_f = strtoupper($first_f);
	$last_f = strtoupper($last_f);
	$middle_f = strtoupper($middle_f);

	$query ="INSERT INTO emp
			(eid, last, first, middle, position, locale, emp_group, emp_status, grp_ldr, email, date_added, is_deleted, is_resigned)
			VALUES
			('{$empid_f}','$last_f','$first_f','$middle_f','$pos_f','$loc_f','$grp_f','$stat_f', 0, '$email_f', now() , 0, 0)";

	$result = mysql_query($query) or die($query . "<br/><br/>" . mysql_error());
	if($result){
		echo "true";
	}else{
		echo "failed";
	}
}
if ($action=="edit_emp") {

	//query for assessment findings trans MASTERDATA
	$emp = getemp($id);
 	// 	print "<pre>";
	// print_r($emp);
	// print "</pre>";

   	$grp 	= s_grp($emp['emp_group']);
   	$pos 	= s_pos($emp['position']);
   	$stat 	= s_stat($emp['emp_status']);
   	$loc 	= s_loc($emp['locale']);
   	$res 	= s_res($emp['is_resigned']);
   	// echo $grp;

	$body = '	<form id="add_form1" method="post" style="font-size:12px;" class="add_form1 hidden-xs form-horizontal">
				<input type="hidden" name="action" value="update_emp1" />
				<input type="hidden" name="id" value="' . $emp['id'] . '" />

					<div class="form-group">
						<label class="col-sm-4 control-label">Employee ID</label>
						<div class="col-sm-6">
							<input type="text" id="eid" class="form-control" name="empid[]" placeholder="Peoplecore ID" value="' . $emp['eid'] . '">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Last Name</label>
						<div class="col-sm-6">
							<input type="text" id="last" class="form-control" name="last[]" placeholder="Last Name" value="' . $emp['last'] . '">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">First Name</label>
						<div class="col-sm-6">
							<input type="text" id="first" class="form-control" name="first[]" placeholder="First Name" value="' . $emp['first'] . '">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Middle Name</label>
						<div class="col-sm-6">
							<input type="text" id="middle" class="form-control" name="middle[]" placeholder="Middle Name" value="' . $emp['middle'] . '">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Locale</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="loc[]" id="loc">
								' . $loc . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Position</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="pos[]" id="pos">
								' . $pos . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Group</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="grp[]" id="grp">
								' . $grp . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Status</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="stat[]" id="stat">
								' . $stat . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Resigned</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="resigned[]" id="resigned">
								' . $res . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Email</label>
						<div class="col-sm-6">
							<input type="text" id="email" class="form-control" name="email[]" placeholder="Email" value="' . $emp['email'] . '">
						</div>
					</div>
					<div class="form-group">
				        <div class="col-xs-12">
				        	<center>
				            <button id="btn_updatefindings" type="submit" class="btn btn-primary btn-lg">Update Employee</button>
				        	</center>
				        </div>
    				</div>
			</form>

			<form id="add_form2" method="post" style="font-size:12px;" class="add_form2 visible-xs form-horizontal">
				<input type="hidden" name="action" value="update_emp2" />
				<input type="hidden" name="id" value="' . $id . '" />

					<div class="form-group">
						<label class="col-sm-4 control-label">Employee ID</label>
						<div class="col-sm-6">
							<input type="text" id="eid" class="form-control" name="empid[]" placeholder="Peoplecore ID" value="' . $emp['eid'] . '">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Last Name</label>
						<div class="col-sm-6">
							<input type="text" id="last" class="form-control" name="last[]" placeholder="Last Name" value="' . $emp['last'] . '">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">First Name</label>
						<div class="col-sm-6">
							<input type="text" id="first" class="form-control" name="first[]" placeholder="First Name" value="' . $emp['first'] . '">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Middle Name</label>
						<div class="col-sm-6">
							<input type="text" id="middle" class="form-control" name="middle[]" placeholder="Middle Name" value="' . $emp['middle'] . '">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Locale</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="loc[]" id="loc">
								' . $loc . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Position</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="pos[]" id="pos">
								' . $pos . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Group</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="grp[]" id="grp">
								' . $grp . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Status</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="stat[]" id="stat">
								' . $stat . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Resigned</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="resigned[]" id="resigned">
								' . $res . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Email</label>
						<div class="col-sm-6">
							<input type="text" id="email" class="form-control" name="email[]" placeholder="Email" value="' . $emp['email'] . '">
						</div>
					</div>
					<div class="form-group">
				        <div class="col-xs-12">
				        	<center>
				            <button id="btn_updatefindings" type="submit" class="btn btn-primary btn-lg">Update Employee</button>
				        	</center>
				        </div>
    				</div>
			</form>
	';
	echo $body;
}
if ($action=="update_emp1" OR $action=="update_emp2") {

	$body = '';
	$body .= ' empid ' 	. $empid_upd	 	. '<br>';
	$body .= ' last ' 	. $last_upd	 		. '<br>';
	$body .= ' first ' 	. $first_upd	 	. '<br>';
	$body .= ' middle ' . $middle_upd	 	. '<br>';
	$body .= ' pos ' 	. $pos_upd	 		. '<br>';
	$body .= ' loc ' 	. $loc_upd	 		. '<br>';
	$body .= ' grp ' 	. $grp_upd	 		. '<br>';
	$body .= ' stat ' 	. $stat_upd	 		. '<br>';
	$body .= ' email ' 	. $email_upd	 	. '<br>';
	$body .= ' resigned ' 	. $resigned_upd	 	. '<br>';
	$body .= ' id ' 	. $id	 	. '<br>';

	// echo $body;
	$first_upd 	= strtoupper($first_upd);
	$last_upd 	= strtoupper($last_upd);
	$middle_upd = strtoupper($middle_upd);

	// $query ="INSERT INTO emp
	// 		(eid, last, first, middle, position, locale, emp_group, emp_status, grp_ldr, email, date_added, is_deleted, is_resigned)
	// 		VALUES
	// 		('{$empid_f}','$last_f','$first_f','$middle_f','$pos_f','$loc_f','$grp_f','$stat_f', 0, '$email_f', now() , 0, 0)";

	$query = "UPDATE `emp` SET `eid`='{$empid_upd}',`last`='$last_upd',`first`='$first_upd',`middle`='$middle_upd',`position`='$pos_upd',
	`locale`='$loc_upd',`emp_group`='$grp_upd',`emp_status`='$stat_upd',`email`='$email_upd',`is_resigned`='$resigned_upd' WHERE id=$id";

	$result = mysql_query($query) or die($query . "<br/><br/>" . mysql_error());
	if($result){
		echo "Success";
	}else{
		echo "failed";
	}
}
if ($action=="add_user") {

	$body = '<form id="add_user1" method="post" style="font-size:12px;" class="add_user form-horizontal hidden-xs">
				<input type="hidden" name="action" value="add_user_db" />
				<div class="form-group">
					<label class="col-sm-4 control-label">Enter Employee ID</label>
					<div class="col-sm-6">
						<input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,\'\')" maxlength="6"  type="text" id="empid" class="form-control" name="empid[]" placeholder="Peoplecore ID" value="">
					</div>
				</div>
				<div class="form-group">
			        <div class="col-xs-12">
			        	<center>
			            <button id="btn_form2" type="submit" class="add_user_btn btn btn-primary btn-lg">hidden Add User</button>
			        	</center>
			        </div>
				</div>
			</form>

			<form id="add_user2" method="post" style="font-size:12px;" class="add_user form-horizontal visible-xs">
				<input type="hidden" name="action" value="add_user_db" />
				<div class="form-group">
					<label class="col-sm-4 control-label">Enter Employee ID</label>
					<div class="col-sm-6">
						<input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,\'\')" maxlength="6"  type="text" id="empid" class="form-control" name="empid[]" placeholder="Peoplecore ID" value="">
					</div>
				</div>
				<div class="form-group">
			        <div class="col-xs-12">
			        	<center>
			            <button id="add_user_btn" type="submit" class="add_user_btn btn btn-primary btn-lg">Add User</button>
			        	</center>
			        </div>
				</div>
			</form>';

	echo $body;
}
if ($action=="add_user_db") {
	$query = emp_querys($empid_f, null);
	$result = mysql_query($query);
	if ($result) {
		$emp 	= getemp_complete($empid_f);
		$grp_id = $emp['grp_id'];
		$nn 	= $emp['first'];
	// 	print "<pre>";
	// 	print_r($emp);
	// 	print "</pre>";
	// 	[eid] => 000042
   	//  [last] => TABLEZA
   	//  [first] => MARK ANTHONY
   	//  [middle] => APAS
   	//  [position] => BUSINESS PROCESS SPECIALIST
   	//  [id] => 7
   	//  [locale_id] => SSG
   	//  [Job_level] => 4A
   	//  [emp_stat] => REGULAR
   	//  [grp_id] => 10
   	//  [group_name] => IT Department
		mysql_query("UPDATE `user` SET `is_deleted`=1 WHERE id='{$empid_f}'");
		$query ="INSERT INTO user
		(id, pass, nickname, emp_group, userroles, is_deleted)
		VALUES
		('{$empid_f}','{$empid_f}','{$nn}','$grp_id',0, 0)";

		$result = mysql_query($query) or die($query . "<br/><br/>" . mysql_error());
		if($result){
			echo "success";
		}else{
			echo "failed";
		}

	}else{
		echo "employee ID not found";
	}
	// echo $empid_f;
}
if ($action=="edit_user") {

	//query for assessment findings trans MASTERDATA
	$emp = getuser($id);
 	// 	print "<pre>";
		// print_r($emp);
		// print "</pre>";

   	$grp 		= s_grp($emp['grp_id']);
   	$user_r 	= s_user_r($emp['userroles_id']);


	$body = '	<form method="post" style="font-size:12px;" class="edit_user1 hidden-xs form-horizontal">
					<input type="hidden" name="action" value="update_user_db1" />
					<input type="hidden" name="array_id[]" value="' . $emp['p_id'] . '" />
					<div class="form-group">
						<label class="col-sm-4 control-label">Name</label>
						<div class="col-sm-6">
							<input type="text" id="last" class="form-control" name="last[]"  value="' . $emp['nickname'] . '">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Group</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="grp[]" id="grp">
								' . $grp . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">User Roles</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="user_r[]" id="user_r">
								' . $user_r . '
							</select>
						</div>
					</div>
					<div class="form-group">
				        <div class="col-xs-12">
				        	<center>
				            <button type="submit" class="update_user_btn1 btn btn-primary btn-lg">Update User</button>
				        	</center>
				        </div>
    				</div>
				</form>

				<form method="post" style="font-size:12px;" class="edit_user2 visible-xs form-horizontal">
					<input type="hidden" name="action" value="update_user_db2" />
					<input type="hidden" name="array_id[]" value="' . $emp['p_id'] . '" />
					<div class="form-group">
						<label class="col-sm-4 control-label">Name</label>
						<div class="col-sm-6">
							<input type="text" id="last" class="form-control" name="last[]" placeholder="Last Name" value="' . $emp['first'] . ' ' . $emp['last'] .'">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Group</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="grp[]" id="grp">
								' . $grp . '
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">User Roles</label>
						<div class="col-sm-6">
							<select class="populate placeholder s_list" name="user_r[]" id="user_r">
								' . $user_r . '
							</select>
						</div>
					</div>
					<div class="form-group">
				        <div class="col-xs-12">
				        	<center>
				            <button type="submit" class="update_user_btn2 btn btn-primary btn-lg">Update User</button>
				        	</center>
				        </div>
    				</div>
				</form>
				';
	echo $body;
}
if ($action=="update_user_db1" OR $action=="update_user_db2") {
	// $body = '';

	// $body .= ' action ' . $action	 . '<br>';
	// $body .= ' user_r ' 	. $user_upd	 . '<br>';
	// $body .= ' id ' 	. $id_f	 . '<br>';fa
	// $body .= ' grp ' 	. $grp_upd	 . '<br>';

	// $last;

	// echo $last_upd;

	$query = "UPDATE `user` SET `emp_group`='$grp_upd', `nickname`='$last_upd',  `userroles`=$user_upd WHERE p_id=$id_f";
	$result = mysql_query($query) or die($query . "<br/><br/>" . mysql_error());
	if($result){
		echo "Success";
	}else{
		echo "failed";
	}
	// echo $query;
	// echo $body;

}

/* End Employee */

if ($action=="f_loc_id") {

	if ($locale_id<=6) {
		$query = "SELECT * FROM `emp_group` WHERE (dept_id=1 OR dept_id=3)";
	}else{
		$query = "SELECT * FROM `emp_group` WHERE (dept_id=2 OR dept_id=3)";
	}
	// echo $query;
	$result = mysql_query($query);
	$chk = array();
	while($row 	= mysql_fetch_array($result, MYSQL_ASSOC)){
		$id		=	$row['id'];
		$g_name	=	$row['group_name'];
		$chk[]  = $id;
	}
	echo json_encode($chk);
}
if ($action=="add_budget") {

	$query  = " INSERT INTO `fp_pck_tbl` (`id`, `loc`, `dept`, `budget`, `actual_budget`, `mos`, `yr`, `date_encoded`, `is_deleted` )
   			  	VALUES ('', '$loc' , '$dept', '$budget' , 0 , '$mos' , 1 , NOW() , 0)";
  	$result = mysql_query($query);

  	if (!$result){
    	// echo "failed";
    	echo mysql_error();
	}else{
		echo "success";
	}
}
if ($action=="hk_add_budget") {

	$r_query = "SELECT * from fp_hks_tbl WHERE loc=$loc AND mos=$mos AND yr=$year";
	$result = mysql_query($r_query);
	$row = mysql_num_rows($result);

	$dept = 4;

	if ($row>0) {
		echo "Duplicate Error";
	}else{
		$query  = " INSERT INTO `fp_hks_tbl` (`loc`, `dept`, `budget`, `actual_budget`, `mos`, `yr`, `date_encoded`, `is_deleted` )
   			  	VALUES ('$loc' , '$dept', '$budget' , 0 , '$mos' , $year , NOW() , 0)";
	  	$result = mysql_query($query);

	  	if (!$result){
	    	// echo "failed";
	    	echo mysql_error();
		}else{
			echo "success";
		}
	}


}
if ($action=="employee_table") {

	$query = emp_querys(null, $id);
	// echo $query;

	$result = mysql_query($query)or die('query failed ' . mysql_error()  );

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$eid 	= $row['eid'];
		$first	= $row['first'];
		$last 	= $row['last'];
		$middle = $row['middle'];
		$pos 	= $row['position'];
		$loc 	= $row['locale_id'];
		$grp 	= $row['group_name'];

		$tab .= '<tr>
					<td style="padding-bottom: 7px;"><center>
						<div class="checkbox">
							<label>
								<input class="required" type="checkbox" value="'. $eid .'" name="chk_emp[]"><i class="fa fa-square-o small"></i>
							</label>
						</div></center>
					</td>

					<td>
						' . $last . ', ' . $first . '
					</td>

					<td>
						' . $pos . '
					</td>
					<td>
						' . $loc . '
					</td>

				</tr>';

		}
		echo $tab;
}
#  Financial perspective #
#  pck   #
if ($action=="view_savings") {

	$emp_querys = emp_querys($id, null);
	// echo $emp_querys;
	$emp_result = mysql_query($emp_querys);
	while($emp_row = mysql_fetch_array($emp_result, MYSQL_ASSOC)){
		$last 			= $emp_row['last'];
		$first 			= $emp_row['first'];
		$middle 		= $emp_row['middle'];
		$pos 			= $emp_row['position'];


		$name = $last . ", " . $first . " " . $middle;
	}
	$body = '<div class="box-content responsive" style="font-size: 12px;">
					<center><h3>' . $name .  '</h3>
					<h5>' . $pos . '</h5></center>
			</div>';
	$body .= '	<div class="box-content responsive" style="font-size: 12px;">
					<table class="table">
						<thead>
							<tr>
								<th>Month</th>
								<th>Savings</th>
								<th>Grade</th>
							</tr>
						</thead>
					<tbody>';
	for ($x=1; $x <=12 ; $x++) {
		$query = "SELECT * FROM fp_mos WHERE id=$x";
		$result = mysql_query($query);
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$m_id	= $row['id'];
			$m_def 	= $row['mos_def'];
		}
		$query2 = "SELECT * FROM fp_pck_tbl WHERE empid=$id AND mos=$m_id";
		$result2 = mysql_query($query2);
		$c = mysql_num_rows($result2);
		if ($c>0) {
			while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)){
				$pck_s	= number_format($row2['pck_savings'],2);
				// $bud =  number_format($bud, 2);
				// $m_def 	= $row2['mos_def'];
				if ($row2['pck_savings']>=3000) {
					$pck_g = "O";
				}elseif ($row2['pck_savings']>=1500) {
					$pck_g = "VS";# code...
				}elseif ($row2['pck_savings']>=500) {
					$pck_g = "S";# code...
				}else{
					$pck_g = "P";
				}
			}
		}else{
			$pck_s = "-";
			$pck_g = "-";
		}
		$body .= '<tr>
					<td>' . $m_def . '</td>
					<td>' . $pck_s . '</td>
					<td>' . $pck_g . '</td>
				</tr>';
		;
	}
	$body .="	</tbody>
			</table>
		</div>";
	echo $body;
}
if ($action=="fp_pck_showtable"){
	$yr = get_year_by_id($year);
	$year = get_year_id($yr);

	$tab = '<table class="pck_table_add table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;">
		<thead>
			<tr>
				<th>Locale</th>
				<th>Department</th>
				<th>Employee</th>
				<th>Month(Year)</th>
				<th>Savings</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="f_pck_table">';
				$query = fp_pck($cred,$loc);
				// echo $query;
				$result = mysql_query($query)or die('query failed ' . mysql_error() );
				while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
					$eid 		= $row['eid'];
					$loc 		= $row['locale_id'];
					$g_id 		= $row['group_id'];
					$g_name 	= $row['group_name'];
					$last 		= $row['last'];
					$first 		= $row['first'];
					$middle 	= $row['middle'];
					$name 		= $last . ", " . $first . " " . $middle;
					$mos_def 	= getmonth($mos);

					$pck_query = "SELECT * FROM fp_pck_tbl WHERE empid=$eid AND mos=$mos AND yr=$year";
					// echo $pck_query;
					$pck_result = mysql_query($pck_query);
					$c = mysql_num_rows($pck_result);

					if($c>0){
						while($pck_row = mysql_fetch_array($pck_result, MYSQL_ASSOC)){
							$pck_id 		= $pck_row['id'];
							$pck_savings	= number_format($pck_row['pck_savings'], 2);
							$button =  '<button value="' . $pck_id  . '"placeholder="Another info" data-toggle="tooltip" data-placement="top" title="Edit Savings!" class="edit_pck_mos_f edit_pck ttips btn btn-sm btn-warning" type="button" data-toggle="tooltip">
						                <i class="fa fa-edit"></i></button>';
						}
					}else{
						$pck_savings = 0;
						$button =   '<button value="' . $eid . '"placeholder="Another info" data-toggle="tooltip" data-placement="top" title="Add Savings!" class="add_pck_mos ttips btn btn-sm btn-primary" type="button" data-toggle="tooltip">
						                <i class="fa fa-plus"></i></button>
						        	<button value="' . $eid . '"placeholder="Another info" data-toggle="tooltip" data-placement="top" title="Edit Savings!" class="edit_pck_mos edit_pck ttips btn btn-sm btn-warning" type="button" data-toggle="tooltip">
						                <i class="fa fa-edit"></i></button>';
					}

					$tab .= '<tr class="vert-align">
								<td class="pck_mos" style="display:none;">' . $mos . '</td>
								<td class="pck_yr" style="display:none;">' . $year . '</td>
								<td >
									' . $loc . '
								</td>
								<td>
									' . $g_name . '
								</td>
								<td>
									' . $name . '
								</td>
								<td>
									' . $mos_def . ' (' . $yr . ')
								</td>
								<td class="pck_saving_td">
									' . $pck_savings . '
								</td>
								<td>
									' . $button . '
								</td>

							</tr>';
				}

	$tab .=	'</tbody>
	</table>';
	echo $tab;
}
if ($action=="add_savings"){

	$mos_def = getmonth($mos);
	$emp_querys = emp_querys($id, null);
	// echo $emp_querys;
	$emp_result = mysql_query($emp_querys);
	while($emp_row = mysql_fetch_array($emp_result, MYSQL_ASSOC)){
		$last 			= $emp_row['last'];
		$first 			= $emp_row['first'];
		$middle 		= $emp_row['middle'];
		$pos 			= $emp_row['position'];


		$name = $last . ", " . $first . " " . $middle;
	}



	$body  =   '<div class="box-content responsive" style="font-size: 12px;">
					<center><h3>' . $name .  '</h3>
					<h5>' . $pos . '</h5></center><br>
							<form id="defaultForm" method="post" class="form-horizontal">
								<input type="hidden" name="action" value="update_findings" />
								<input type="hidden" name="id" value="' . $id . '" />
								<div class="form-group has-feedback">
									<label class="col-sm-5 control-label">' . $mos_def . ' Savings</label>
									<div class="col-sm-5">
										<input data-toggle="tooltip" title="Enter Savings!" type="text" class="pck_bud form-control" name="input_date" placeholder="Savings">
										<span class="fa fa-money form-control-feedback"></span>
									</div>
								</div>
							</form>

				<div>';
	echo $body;
}
if ($action=="edit_savings"){

	$pck_id_query =  fp_pck_id($pck_id);
	$pck_result = mysql_query($pck_id_query);

	while($pck_row = mysql_fetch_array($pck_result, MYSQL_ASSOC)){
		$eid 			= $pck_row['empid'];
		$pck_savings 	= number_format($pck_row['pck_savings'],2);
		$mos			= $pck_row['mos'];
	}

	$mos_def = getmonth($mos);
	$emp_querys = emp_querys($eid, null);
	// echo $emp_querys;
	$emp_result = mysql_query($emp_querys);


	while($emp_row = mysql_fetch_array($emp_result, MYSQL_ASSOC)){
		$last 			= $emp_row['last'];
		$first 			= $emp_row['first'];
		$middle 		= $emp_row['middle'];
		$pos 			= $emp_row['position'];

		$name = $last . ", " . $first . " " . $middle;
	}

	$body  =   '<div class="box-content responsive" style="font-size: 12px;">
					<center><h3>' . $name .  '</h3>
					<h5>' . $pos . '</h5></center><br>
							<form id="defaultForm" method="post" class="form-horizontal">
								<input type="hidden" name="action" value="update_findings" />
								<input type="hidden" name="id" value="' . $id . '" />
								<div class="form-group has-feedback">
									<label class="col-sm-5 control-label">' . $mos_def . ' Savings</label>
									<div class="col-sm-5">
										<input data-toggle="tooltip" title="Enter Savings!" value="' . $pck_savings .'"type="text" class="pck_bud form-control" name="input_date" placeholder="Savings">
										<span class="fa fa-money form-control-feedback"></span>
									</div>
								</div>
							</form>

				<div>';
	echo $body;
}
if ($action=="save_savings"){
	// $yr = date("Y");
	// $yr = get_year_id($yr);

	$query  = " INSERT INTO `fp_pck_tbl` (`id`, `empid`, `pck_savings`, `mos`, `yr`, `date_encoded`, `is_deleted` )
   			  	VALUES ('', '$id' , '$bud', '$mos' , '$year' , NOW() , 0)";

  	$result = mysql_query($query);

  	if (!$result){
    	echo $query . '<br>';
    	echo mysql_error();
	}else{

		echo mysql_insert_id();
	}
	// echo 'year: ' . $yr . ' id: ' . $id . $mos .'bud: ' . $bud . 'date: ' . date("Y");
}


if ($action=="update_savings"){
	$query = "UPDATE `fp_pck_tbl` SET `pck_savings`=$bud WHERE id=$pck_id";
	$result = mysql_query($query);
	if(!$result ){
		echo mysql_error();
	}else{
		echo $pck_id;
	}
}
#	end pck#
#	hk supplies#
if ($action=="fp_hk_showtable"){
}
if ($action=="edit_expenses"){

	$hk_id_query =  fp_hk_id($hk_id);
	$hk_result = mysql_query($hk_id_query);

	while($hk_row = mysql_fetch_array($hk_result, MYSQL_ASSOC)){
		$loc 			= $hk_row['loc'];
		$dept 			= $hk_row['dept'];
		$hk_expenses 	= number_format($hk_row['actual_budget'],2);
		$mos			= $hk_row['mos'];
	}

	$mos_def = getmonth($mos);
	$loc_def = getloc($loc);
	$dept_def = getdept($dept);
	$emp_querys = emp_querys($eid, null);
	// echo $emp_querys;
	$emp_result = mysql_query($emp_querys);

	while($emp_row = mysql_fetch_array($emp_result, MYSQL_ASSOC)){
		$last 			= $emp_row['last'];
		$first 			= $emp_row['first'];
		$middle 		= $emp_row['middle'];
		$pos 			= $emp_row['position'];

		$name = $last . ", " . $first . " " . $middle;
	}
	$body  =   '<div class="box-content responsive" style="font-size: 12px;">
					<center>
					<h3>' . $loc_def . '(' . $dept_def .  ')' . '</h3></center><br>
						<form id="defaultForm" method="post" class="form-horizontal">
							<input type="hidden" name="action" value="update_findings" />
							<input type="hidden" name="id" value="' . $id . '" />
							<div class="form-group has-feedback">
								<label class="col-sm-5 control-label">' . $mos_def . ' Expenses</label>
								<div class="col-sm-5">
									<input data-toggle="tooltip" title="Enter Expenses!" value="' . $hk_expenses . '"type="text" class="ttips hk_exp form-control" name="input_date" placeholder="Savings">
									<span class="fa fa-money form-control-feedback"></span>
								</div>
							</div>
						</form>
				<div>';
	echo $body;
}

if ($action=="edit_budget"){

	$hk_id_query =  fp_hk_id($hk_id);
	$hk_result = mysql_query($hk_id_query);

	while($hk_row = mysql_fetch_array($hk_result, MYSQL_ASSOC)){
		// var_dump($hk_row);
		$loc 			= $hk_row['loc'];
		$dept 			= $hk_row['dept'];
		$hk_budget 	= number_format($hk_row['budget'],2);
		$hk_expenses 	= number_format($hk_row['actual_budget'],2);
		$mos			= $hk_row['mos'];
		$yr			= $hk_row['yr'];
		$year = get_year_by_id($yr);

	}

	$mos_def = getmonth($mos);
	$loc_def = getloc($loc);
	$dept_def = getdept($dept);
	$emp_querys = emp_querys($eid, null);
	// echo $emp_querys;
	$emp_result = mysql_query($emp_querys);

	while($emp_row = mysql_fetch_array($emp_result, MYSQL_ASSOC)){
		$last 			= $emp_row['last'];
		$first 			= $emp_row['first'];
		$middle 		= $emp_row['middle'];
		$pos 			= $emp_row['position'];

		$name = $last . ", " . $first . " " . $middle;
	}
	$body  =   '<div class="box-content responsive" style="font-size: 12px;">
					<center>
					<h3>' . $loc_def . '(' . $dept_def .  ')' . '</h3></center><br>
						<form id="defaultForm" method="post" class="form-horizontal">
							<input type="hidden" name="id" value="' . $id . '" />
							<div class="form-group has-feedback">
								<label class="col-sm-5 control-label">' . $mos_def . '('.$year.') Budget</label>
								<div class="col-sm-5">
									<input data-toggle="tooltip" title="Enter Expenses!" value="' . $hk_budget . '"type="text" class="ttips hk_bud update_expenses form-control" name="input_date" placeholder="Savings">
									<span class="fa fa-money form-control-feedback"></span>
								</div>
							</div>
						</form>
				<div>';
	echo $body;
}


if ($action=="update_expenses"){
	$query = "UPDATE `fp_hks_tbl` SET `actual_budget`=$bud WHERE id=$hk_id";
	$result = mysql_query($query);
	if(!$result ){
		echo mysql_error();
	}else{
		echo $hk_id;
	}
}

if ($action=="update_budget"){
	$query = "UPDATE `fp_hks_tbl` SET `budget`=$bud WHERE id=$hk_id";
	$result = mysql_query($query);
	if(!$result ){
		echo mysql_error();
	}else{
		echo $hk_id;
	}
}
//end hk supplies//
# End financial perspetive #

# Customer Perspective #

if ($action=="view_quality") {

	$emp_querys = emp_querys($id, null);
	// echo $emp_querys;
	$emp_result = mysql_query($emp_querys);
	while($emp_row = mysql_fetch_array($emp_result, MYSQL_ASSOC)){
		$last 			= $emp_row['last'];
		$first 			= $emp_row['first'];
		$middle 		= $emp_row['middle'];
		$pos 			= $emp_row['position'];


		$name = $last . ", " . $first . " " . $middle;
	}
	$body = '<div class="box-content responsive" style="font-size: 12px;">
					<center><h3>' . $name .  '</h3>
					<h5>' . $pos . '</h5></center>
			</div>';

	$body .= 	'<div class="box-content accordion" id="accordion" style="padding:0px;">';

	for ($x=1; $x <=12 ; $x++) {
		$query = "SELECT * FROM fp_mos WHERE id=$x";
		$result = mysql_query($query);
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$m_id	= $row['id'];
			$m_def 	= $row['mos_def'];
		}

		$qms_body = '<div class="box-content responsive" style="font-size: 12px;">
					<table class="table">
						<thead>
							<tr>
								<th>Date Of Inspection</th>
								<th>Inspected By</th>

								<th>Grade</th>
								<th>Rating</th>
							</tr>
						</thead>
					<tbody>';

		$q_query 		= qua_query();

		$q_query 		.= " WHERE trans.responsible_id=$id AND MONTH(trans.date_filed)=$x";
		$q_query_cnt 	= qua_query_cnt($id, $x);

		$sm_g 		= $q_query_cnt['cnt_grade'];
		$avg  		= round($q_query_cnt['avg_grade'], 2);


		// print "<pre>";
		// print_r($q_query_cnt);
		// print "</pre>";
		// echo round($avg) . ' rat ' .  $hk_rat;

		// echo $q_query;

		$q_result = mysql_query($q_query);
		while($q_row = mysql_fetch_array($q_result, MYSQL_ASSOC)){
			$doi 			= dateletterformatmdy($q_row['date_filed']);
			$sup_first 		= $q_row['first'] . ' ' . $q_row['last'];
			$loss 			= $q_row['loss_points'];
			$grade 			= $q_row['grade'];
			$rating 		= $q_row['rating'];

			$qms_body .= '<tr>
							<td>
								' . $doi . '
							</td>
							<td>
								' . $sup_first . '
							</td>

							<td>
								' . $grade . '
							</td>
							<td>
								' . $rating . '
							</td>
						</tr>';
		}

		$qms_body .= '<tr>
							<td>

							</td>
							<td>

							</td>
							<td>

							</td>
							<td>

							</td>

						</tr>';
		$qms_body .= '<tr>
							<td>

							</td>
							<td>
								<b>Total # Of Inspection </b>
							</td>
							<td>
								<b>' . $sm_g . '</b>
							</td>
							<td>

							</td>

						</tr>';
		$qms_body .= '<tr>
							<td>

							</td>
							<td>
								<b>Average </b>
							</td>
							<td>
								<b>' . $avg . '</b>
							</td>
							<td>

							</td>

						</tr>';
		$qms_body .= '<tr>
						<td>

						</td>
						<td>
							<b>Rating </b>
						</td>
						<td>
							<b>' . $hk_rat['rat_m'] . '</b>
						</td>
						<td>

						</td>

						</tr>';



		$qms_body .= '</tbody></table></div>';

		$body .= '<h3>' . $m_def . '</h3>
					<div>
						' . $qms_body . '
					</div>';
	}
	$body .="</div>";
	echo $body;
}

# End Customer Perspetive #

# Internal System #

	# Spot Check #

if ($action=="add_spot_check") {

	$query  = " INSERT INTO `spot_chk_master`(`cnt`, `emp`, `toc`, `room`, `insp_id`, `date_filed`, `is_deleted`)
									VALUES ('$cnt','$hk_list','$toc', '$room_list','$user',CURRENT_TIMESTAMP,0)";

  	$result = mysql_query($query);

	for ( $i=0; $i < count( $chk_tools ); $i++ ){
	     $query2 = "	INSERT INTO `spot_check_findings` (`spt_id`, `spt_findings`,`is_deleted`)
						VALUES (LAST_INSERT_ID(), '{$chk_tools[$i]}',0)";
	 	$result2 = mysql_query($query2);
	 }




	if (!$result){
    	echo mysql_error();
	}else{
		echo "success";
	}
}
	/* Spot Check Admin */
if($action=="load_rooms"){


	$query = "SELECT trans.id, trans.room_no, l.id, trans.locale_id, r.room_type FROM rooms trans
				JOIN locale l 		ON l.locale_id=trans.locale_id
				JOIN room_types r 	ON r.id=trans.room_type_id ";

	if (isset($cred)) {
		if ($cred==2 OR $cred==3 OR $cred==4) {
			$query .=" WHERE l.id=$loc ORDER BY r.room_type ASC";
		}
	}else{
		$query .=" ORDER BY trans.locale_id, trans.room_no";
	}
	echo $query;
	$result = mysql_query($query);
	$body = "";
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id 		= $row['id'];
		$room_no 	= $row['room_no'];
		$loc 		= $row['locale_id'];
		$room_type 	= $row['room_type'];

		$button = ' <button class="edit-room btn btn-success btn-label-left " value=' . $id . '>Edit</button>
					<button class="delete-room btn btn-danger btn-label-left " value=' . $id . '>Delete</button>';
		$body .= '<tr>
					<td class="dev_td dev_Department_td">' . $room_no .' (' . $room_type . ')' . '</td>
					<td> ' . $loc . ' </td>
					<td>' . $button . '</td>
				</tr>';

	}
	echo $body;
}

if ($action=="spot_check_reports") {
	$f_end		=dateletterformatdbf($f_end);
	$f_start	=dateletterformatdbf($f_start);
	$query = get_spot_chk();
	$query .= " WHERE trans.is_deleted=0 AND trans.date_filed BETWEEN '$f_start' AND '$f_end'";
	// echo $query;
	if ($locale!="") {
	 	$query .=" AND l.id=$locale";
	}
	if($toc!=""){
		$query .=" AND toc.id=$toc";
	}

	// echo $query;
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){

		$e_name 	= $row['emp_last'] . ', ' .  $row['emp_first'];
		$inps_name 	= $row['last'] . ', ' .  $row['first'];
		$loc 		= $row['locale_id'];
		$date 		= dateletterformatmodtyr($row['date_filed']);
		$cnt 		= $row['cnt'];
		$toc 		= $row['toc_abv'];
		$room 		= $row['room_no'];


		$tab .= '<tr class="vert-align">
						<td >
							' . $loc . '
						</td>
						<td>
							' . $date . '
						</td>
						<td>
							' . $toc . '
						</td>
						<td>
							' . $room . '
						</td>
						<td>
							' . $e_name . '
						</td>

						<td>
							' . $inps_name . '
						</td>
						<td>
							' . $cnt . '
						</td>

					</tr>';

	}
	echo $tab;
}
	/* Spot Check Admin */

	# End Spot Check #

# End Internal System #

// DATA GENERATION //

if ($action=="fin_gen"){

	$nyear = get_year_by_id($year);

	mysql_query("DELETE FROM `pms_db_final` WHERE `mos`=$mos AND pers_id=1 AND yr=$nyear");

	$query = fin_gen();

	// echo $query;

	$result = mysql_query($query);
	// echo $query;
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$eid 			= $row['eid'];
		$loc 			= $row['id'];

		$query2 	= "SELECT * FROM fp_pck_tbl WHERE empid=$eid AND mos=$mos AND yr=$year";
		// echo $query2;
		$result2 	= mysql_query($query2);
		$x 			= mysql_num_rows($result2);
		// echo $x;
		if ($x==1) {

			while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)){
				$pck_s 	= $row2['pck_savings'];
				$pck_rmk = 'Savings ' . $pck_s;
				$pers_id = 1;
				$dim_id  = 1;

				if ($loc!=5) {
					if ($pck_s>=3000) {
						$pck_g = "O";
						$pts = 15;
					}elseif ($pck_s>=1500) {
						$pck_g = "VS";
						$pts = 10;
					}elseif ($pck_s>=500) {
						$pck_g = "S";
						$pts = 5;
					}else{
						$pck_g = "P";
						$pts = 0;
					}
				}else{
					/* For Sohotel */
					if ($pck_s>=2607) {
						$pck_g = "O";
						$pts = 15;
					}elseif ($pck_s>=2085) {
						$pck_g = "VS";
						$pts = 10;
					}elseif ($pck_s>=1877) {
						$pck_g = "S";
						$pts = 5;
					}else{
						$pck_g = "P";
						$pts = 0;
					}
				}
				$f_query  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
	   			  			VALUES ('$eid', $nyear , '$mos', '$pers_id' , '$dim_id' , '$pts' , '$pck_g', '$pck_rmk')";
	   			// echo $f_query;
			  	$f_result = mysql_query($f_query);

			  	if (!$f_result){
			    	$tab="f1 failed";
				}
			}
		}

		$query3 = "SELECT * FROM fp_hks_tbl WHERE mos=$mos AND loc=$loc AND dept=4 AND yr=$year";

		$result3 = mysql_query($query3);
		$num_3 = mysql_num_rows($result3);

		// echo $query3 . '<br>' . $num_3 . '<br>';


		while($row3 = mysql_fetch_array($result3, MYSQL_ASSOC)){
			$pers_id = 1;
			$dim_id  = 2;
			$bud 		= $row3['budget'];
			$ac_bud 	= $row3['actual_budget'];
			$hks_rmk = $bud  -  $ac_bud;

			if($ac_bud<($bud-$bud*.1)) {
				$hk_rat = "O";
				$pts3 = 10;
			}elseif ($ac_bud<$bud) {
				$hk_rat = "S";
				$pts3 = 5;
			}else{
				$hk_rat = "P";
				$pts3 = 0;
			}

			$f2_query  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
   			  			VALUES ('$eid', $nyear , '$mos', '$pers_id' , '$dim_id' , '$pts3' , '$hk_rat', '$hks_rmk')";
		  	$f2_result = mysql_query($f2_query);

		  	if (!$f2_result){
		    	$tab="f2 failed";
			}
		}
	}
	echo 'success';
}

if($action=="mg_gen"){
	$f = 0;
	$query = mg_gen();
	mysql_query("DELETE FROM `pms_db_final` WHERE `mos`=$mos AND ( dim_id=6 OR dim_id=7 OR dim_id=4 OR dim_id=8)");

	$result = mysql_query($query);

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){

		$id 		= $row['id'];
		$eid 		= $row['eid'];
		$loc 		= $row['locale_id'];
		$g_id 		= $row['group_id'];
		$g_name 	= $row['group_name'];
		$last 		= $row['last'];
		$first 		= $row['first'];
		$middle 	= $row['middle'];
		$name = $last . ", " . $first . " " . $middle;

		$query2 = "SELECT trans.ases_id, ases.date_of_assessment FROM assessment_findings_emp trans
					LEFT JOIN assessment_findings ases ON ases.id=trans.ases_id
					WHERE trans.emp_emp=$eid AND MONTH(ases.date_of_assessment)=$mos AND trans.is_deleted=0";
		$result2 = mysql_query($query2);
		$cnt = mysql_num_rows($result2);
		// echo $eid . ' ';
		// echo $cnt . ' ';

		// IF QUERY TO HAS ROW
		if (!$cnt) {
			//no findings for MG/TM/FOO
			$f_query_mg  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
  							VALUES ('$eid', 2014 , '$mos', 2 , 6 , 10 , 'O', 'No Findings!')";

				$c1_result = mysql_query($f_query_mg);

				if (!$c1_result){
					$ret .= 'C1 failed';
					$f = 1;
				}
			//no findings for IQA
			$f_query_iqa  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
  									VALUES ('$eid', 2014 , '$mos', 3 , 7 , 10 , 'O', 'No Findings!')";

				$c2_result = mysql_query($f_query_iqa);

				if (!$c2_result){
					$ret .= 'C2 failed';
					$f = 1;
				}
			// echo 'no findings';
		}else{

			while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)){
				$a_id 		= $row2['ases_id'];

				$query_mg = "SELECT trans.f_nc_class, trans.deviation, dt.dev, dl.dev_label,  nc.nc_id, nc.nc_def FROM `assessment_findings` trans
					LEFT JOIN nc_classification nc on nc.nc_id=trans.f_nc_class
					LEFT JOIN dev_table dt ON dt.id= trans.deviation
					LEFT JOIN dev_label dl ON dl.id= dt.lbl_id
					WHERE trans.id=$a_id AND trans.f_type_of_a!=1";
				$result_mg = mysql_query($query_mg);
				$cnt_mg = mysql_num_rows($result_mg);

				if ($cnt_mg){
					while($row_mg = mysql_fetch_array($result_mg, MYSQL_ASSOC)){
						$mp_dev = $row_mg['dev_label'] . ' - ' . $row_mg['dev'];
						$mp_nc = $row_mg['nc_id'];
						// echo 'mg';
						$dev_mg_rmk .= ' ( ' . $mp_dev . ' ) ';
						if ($mp_nc==1) {
							$mg_cnt = $mg_cnt + 5;
						}
						$mg_cnt++;
					}
				}
				$query_iqa = "SELECT trans.f_nc_class, trans.deviation, dt.dev,  dl.dev_label, nc.nc_id, nc.nc_def FROM `assessment_findings` trans
					LEFT JOIN nc_classification nc on nc.nc_id=trans.f_nc_class
					LEFT JOIN dev_table dt ON dt.id= trans.deviation
						LEFT JOIN dev_label dl ON dl.id= dt.lbl_id
					WHERE trans.id=$a_id AND trans.f_type_of_a=1";
				$result_iqa = mysql_query($query_iqa);
				$cnt_iqa = mysql_num_rows($result_iqa);
				if ($cnt_iqa) {

					while($row_iqa = mysql_fetch_array($result_iqa, MYSQL_ASSOC)){
						$iqa_dev = $row_iqa['dev_label'] . ' - ' . $row_iqa['dev'];
						$iqa_nc = $row_iqa['nc_id'];
						if ($iqa_nc==1) {
							$iqa_cnt = $iqa_cnt + 5;
						}
						// echo 'iqa';
						$dev_iqa_rmk .= ' ( ' . $iqa_dev . ' ) ';
						$iqa_cnt++;
					}
				}
			}
			echo '<br><br>';
			echo 'dev_mg_rmk ' . $dev_mg_rmk . '<br>';
			echo 'mg_cnt ' . $mg_cnt . '<br>';
			echo 'dev_iqa_rmk ' . $dev_iqa_rmk . '<br>';
			echo 'iqa_cnt ' . $iqa_cnt . '<br><br>';

			$dev_mg_rmk  = $mg_cnt . ' NC.  Deviation -' . $dev_mg_rmk;
			$dev_iqa_rmk = $iqa_cnt . ' NC.  Deviation -' . $dev_iqa_rmk;

			//with NC MG
			if ($mg_cnt) {

				if ($mg_cnt>=2) {
					$mg_rat = "P";
					$mg_pts = 0;
				}elseif ($mg_cnt==1) {
					$mg_rat = "S";
					$mg_pts = 5;
				}else{
					$mg_rat = "O";
					$mg_pts = 10;
				}

				$f_query_mg_wnc  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
	  								VALUES ('$eid', 2014 , '$mos', 2 , 6 , '$mg_pts' , '$mg_rat', '$dev_mg_rmk')";

					$c1_result_wnc = mysql_query($f_query_mg_wnc);

					if (!$c1_result_wnc){
						$ret .= 'C1 MG failed with NC';
						$f = 1;
					}
				//if iqa count is empty insert db "no findings"
				if(!$iqa_cnt){

					$f_query_iqa  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
	  									VALUES ('$eid', 2014 , '$mos', 3 , 7 , 10 , 'O', 'No Findings!')";

  					$c2_result = mysql_query($f_query_iqa);

  					if (!$c2_result){
    					$ret .= 'C2 failed';
    					$f = 1;
    				}

				}

			}

			// with NC IQA
			if ($iqa_cnt) {
				// echo 'query iqa cnt';
				if ($iqa_cnt>=2) {
					$iqa_rat = "P";
					$iqa_pts = 0;
				}elseif ($iqa_cnt==1) {
					$iqa_rat = "S";
					$iqa_pts = 5;
				}else{
					$iqa_rat = "O";
					$iqa_pts = 10;
				}

				$f_query_iqa_wnc  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
	  									VALUES ('$eid', 2014 , '$mos', 3 , 7 , $iqa_pts , '$iqa_rat', '$dev_iqa_rmk')";

  					$c2_iqa_result_wnc = mysql_query($f_query_iqa_wnc);

  					if (!$c2_iqa_result_wnc){
    					$ret .= 'C2 iqa failed with NC';
    					$f = 1;
    				}

				//if mg count is empty insert db "no findings"
				if(!$mg_cnt) {

					$f_query_mg  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
	  									VALUES ('$eid', 2014 , '$mos', 2 , 6 , 10 , 'O', 'No Findings!')";

  					$c1_result = mysql_query($f_query_mg);

  					if (!$c1_result){
    					$ret .= 'C1 failed';
    					$f = 1;
    				}
				}
			}

		}//if cnt

		/* 		For iqms Quality 		*/

		$q_query_cnt 	= qua_query_cnt($eid, $mos); //get the sum and avg based on eid and mos
		$sm_g 		= $q_query_cnt['cnt_grade']; //summary grade
		$avg  		= round($q_query_cnt['avg_grade'], 2); //round off avg
		$hk_rat 	= get_hk_grade(round($avg)); //get the rating

		$iqms_rmks = 'Total Number of Insp: ' . $sm_g . '  ||  avg: ' . $avg;

		if ($hk_rat['rat']=="O") {

			$hk_final_rat = "O";
			$hk_pts = 30;

		}elseif ($hk_rat['rat']=="VS") {

			$hk_final_rat = "S";
			$hk_pts = 15;

		}else{

			$hk_final_rat = "P";
			$hk_pts = 0;
		}
		// echo 'Rating ' 		. $hk_rat['rat'];
		// echo 'final rating' . $hk_final_rat;
		// echo 'points ' 		. $hk_pts;

		// print "<pre>";
		// print_r($hk_rat);
		// print "</pre>";


		$f_query_quality  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
							VALUES ('$eid', 2014 , '$mos', 2 , 4 ,'$hk_pts' ,' $hk_final_rat', '$iqms_rmks')";

			$quality_result = mysql_query($f_query_quality);

			if (!$quality_result){
				$ret .= 'quality failed';
				$f = 1;
			}

		/*		END iQMS Quality 		*/

		/* Spot Check */

		$spot = get_spot_chk_cnt($eid, $mos);
		$cnt = $spot['TOTALFINDINGS'];
		$spot_rmks = '# of findings ' . $cnt;
		if ($cnt>=5) {
			$spot_pts = 0;
			$spot_rat = "P";
		}elseif ($cnt>=1) {
			$spot_pts = 5;
			$spot_rat = "S";
		}else{
			$spot_pts = 10;
			$spot_rat = "O";
		}

		//$spot_query  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
		//					VALUES ('$eid', 2014 , '$mos', 3 , 8 ,'$spot_pts' ,' $spot_rat', '$spot_rmks')";

		// echo $spot_query . "<br>";

		//$spot_result = mysql_query($spot_query);

		//if (!$spot_result){
		//	$ret .= 'spot check query failed';
		//	$f = 1;
		//}


		/* END Spot Check */

		$hk_pts			= 0;
		$hk_final_rat	= "";
		$iqms_rmks		= "";
		$dev_mg_rmk		= "";
		$mg_cnt			= 0;
		$dev_iqa_rmk	= "";
		$iqa_cnt		= 0;
		$iqa_rat		= "";
		$iqa_pts		= 0;
		$mg_rat 		= "";
		$mg_pts		 	= 0;
	}

	if ($f==1) {
		echo "failed";
	}else{
		echo "success";
	}
}
// DATA GENERATION //

if ($action=="add_findings"){
	//(NULL, '{$user}'  , " . $id . " , '{$ans}' ,   '{$str}' )
   	$query  = " INSERT INTO `assessment_findings` (`id`, `locale`, `f_type_of_a`, `date_of_assessment`, `start_scope`, `end_scope`, `f_nc_class`, `deviation`, `cpar_cls`, `cpar_stat`, `remarks`,  `root_cause_analysis`, `qmd_ts`, `is_deleted` )
   			  	VALUES (NULL, '$locale' , '$toa', '$input_date' , '$start_date' , '$end_date' , '$nc_class' , '$text_dev' , '$text_cls', 1 , '$text_rem', '$text_root', CURRENT_TIMESTAMP , 0)";
  	$result = mysql_query($query);

  	// //insert concern dept in assessment_findings_dept
  	// for ( $i=0; $i < count( $chk_depts ); $i++ ){
   	//      $query2 = "	INSERT INTO `assessment_findings_dept` (`ases_id`, `dept_id`,`is_deleted`)
  	// 				VALUES (LAST_INSERT_ID(), {$chk_depts[$i]},0)";
   	//  	$result2 = mysql_query($query2);
   	//  }
   	//  //insert concern emp in assessment_findings_emp
   	//  for ( $i=0; $i < count( $chk_emp ); $i++ ){
   	//      $query3 = "	INSERT INTO `assessment_findings_emp` (`ases_id`, `emp_emp`,`is_deleted`)
  	// 				VALUES (LAST_INSERT_ID(), '{$chk_emp[$i]}',0)";
   	//  	$result3 = mysql_query($query3);
   	//  }
  	// echo 'last insert id is ' . $x

  	if (!$result){
    	echo mysql_error();
	}else{
		echo "success";
	}
}
if ($action=="update_findings"){
	// print "<pre>";
	// print_r($_POST);
	// print "</pre>";
	$loc_tsf = loc_ts($id);
	if ($loc_tsf=="0000-00-00")
		$loc_ts = "loc_ts";
	else
		$loc_ts = "loc_ts_edit";

	$query = "UPDATE `assessment_findings` SET
				`locale`				='$locale',
				`f_type_of_a`			='$toa',
				`date_of_assessment`	='$input_date',
				`start_scope`			='$start_date',
				`end_scope`				='$end_date',
				`f_nc_class`			='$nc_class',
				`deviation`				='$text_dev',
				`root_cause_analysis`	='$text_root',
				`cp_act`				='$text_cp',
				`im_date`				='$im_date',
				`$loc_ts`				=CURRENT_TIMESTAMP

				WHERE id=$id";
	$result = mysql_query($query);

	//delete old data
	$query2 = "UPDATE `assessment_findings_dept` SET `is_deleted`=1 WHERE ases_id=$id";
	$result2 = mysql_query($query2);
	$query3 = "UPDATE `assessment_findings_emp`  SET `is_deleted`=1 WHERE ases_id=$id";
	$result3 = mysql_query($query3);

	//update concern emp in assessment_findings_emp
	for ( $i=0; $i < count( $chk_depts ); $i++ ){
        $query4 = "	INSERT INTO `assessment_findings_dept` (`ases_id`, `dept_id`,`is_deleted`)
  					VALUES ($id, {$chk_depts[$i]},0)";
    	$result4 = mysql_query($query4);
    }

    //update concern emp in assessment_findings_emp
    for ( $i=0; $i < count( $chk_emp ); $i++ ){
        $query5 = "	INSERT INTO `assessment_findings_emp` (`ases_id`, `emp_emp`,`is_deleted`)
  					VALUES ($id, '{$chk_emp[$i]}',0)";
    	$result5 = mysql_query($query5);
    }

	if(!$result or !$result2 or !$result3 or !$result4 or !$result5){
		echo mysql_error();
	}else{
		echo $id;
	}
}
if ($action=="view_findings") {
	$query = view_findings();
    $query .= " WHERE trans.id=$id AND trans.is_deleted=0";

 	$query2 = view_findings_dept();
   	$query2 .= " WHERE trans.ases_id=$id AND trans.is_deleted=0";
   	// echo $query2;
   	$query3 = view_findings_emp();
   	$query3 .= " WHERE trans.ases_id=$id AND trans.is_deleted=0";

    $result 	= mysql_query($query);
    $result2 	= mysql_query($query2);
    $result3 	= mysql_query($query3);

	while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)){
		$dept_id 	= $row2['group_id'];
		$dept_name 	= $row2['group_name'];
		$dept 		.= $dept_name . PHP_EOL;
	}

	while($row3 = mysql_fetch_array($result3, MYSQL_ASSOC)){
		$emp 	= $row3['group_id'];
		$last 	= $row3['last'];
		$first	= $row3['first'];
		$name 	= $last . ", " . $first . " " . $middle;
		$middle	= $row3['middle'];
		$posi 	.= $name . PHP_EOL;
	}

    while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id 	= $row['id'];
		$loc 	= $row['locale_id'];
		$toa 	= $row['toa_name'];
		$date 	= dateletterformatmdy($row['date_of_assessment']);
		$start 	= dateletterformatmdy($row['start_scope']);
		$end 	= dateletterformatmdy($row['end_scope']);
		$im_date = $row['im_date'];
		$nc 	= $row['nc_name'];
		$dev 	= $row['dev_label'] . ' - ' . $row['dev'];
		$rca 	= $row['root_cause_analysis'];
		$rem 	= $row['remarks'];
		$cls 	= $row['clauses'];
		$cp 	= $row['cp_act'];

		if ($im_date=="0000-00-00")
			$im_date="";
		else
			$im_date = dateletterformatmdy($im_date);


	$body = '	<div class="box-content responsive" style="font-size: 12px;">
					<div class="form-group has-feedback ">
						<label class="col-sm-3 control-label">Locale</label>
						<div class="col-sm-9">
							<strong>
								<input type="text" value="' . $loc . '" id="input_date" class="form-control" name="input_date" readonly>
							</strong>
						</div
					</div>
					<div class="form-group has-feedback ">
						<label class="col-sm-3 control-label">Type of Assessment</label>
						<div class="col-sm-9">
							<strong>
								<input type="text" value="' . $toa . '" id="input_date" class="form-control" name="input_date" readonly>
							</strong>
						</div>
					</div>
					<div class="form-group has-feedback ">
						<label class="col-sm-3 control-label">Date of Assessment</label>
						<div class="col-sm-9">
							<strong>
								<input type="text" value="' . $date . '" id="input_date" class="form-control" name="input_date" readonly>
							</strong>
						</div>
					</div>
					<div class="form-group has-feedback ">
						<label class="col-sm-3 control-label">Scope of Assessment</label>
						<div class="col-sm-4">
							<strong>
								<input type="text" value="' . $start . '" id="input_date" class="form-control" name="input_date" readonly>
							</strong>
						</div>

						<div class="col-sm-4">
							<strong>
								<input type="text" value="' . $end . '" id="input_date" class="form-control" name="input_date" readonly>
							</strong>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-3 control-label">NC Classification</label>
						<div class="col-sm-9">
							<strong>
								<input type="text" value="' . $nc . '" id="input_date" class="form-control" name="input_date" readonly>
							</strong>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-3 control-label">Deviation</label>
						<div class="col-sm-9">
							<strong>
								<textarea class="form-control" rows="2" name="text_dev" id="text_dev" readonly>' . $dev . '</textarea>
							</strong>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-3 control-label">Clauses</label>
						<div class="col-sm-9">
							<strong>
								<input type="text" value="' . $cls . '" id="input_date" class="form-control" name="input_date" readonly>
							</strong>
						</div>
					</div>
					<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Root Cause Analysis</label>
							<div class="col-sm-9">
								<strong>
									<textarea class="form-control" rows="3" name="text_dev" id="text_dev" readonly>' . $rca . '</textarea>
								</strong>
							</div>
					</div>
					<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Responsible Department</label>
							<div class="col-sm-9">
								<strong>
									<textarea class="form-control" rows="3" name="text_dev" id="text_dev" readonly>' . $dept . '</textarea>
								</strong>
							</div>
					</div>
					<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Responsible Employee(s)</label>
							<div class="col-sm-9">
								<strong>
									<textarea class="form-control" rows="3" name="text_dev" id="text_dev" readonly>' . $posi . '</textarea>
								</strong>
							</div>
					</div>
					<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Corrective/Preventive Action</label>
							<div class="col-sm-9">
								<strong>
									<textarea class="form-control" rows="3" name="text_dev" id="text_dev" readonly>' . $cp . '</textarea>
								</strong>
							</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-3 control-label">Implementation Date</label>
						<div class="col-sm-9">
							<strong>
								<input type="text" value="' . $im_date . '" id="input_date" class="form-control" name="input_date" readonly>
							</strong>
						</div>
					</div>
					';

		$body .='</div>';
		echo $body;
	}
}
if ($action=="edit_findings") {
	//query for assessment findings trans MASTERDATA
	$query = view_findings();
    $query .= " WHERE trans.id=$id AND trans.is_deleted=0";
   	$result = mysql_query($query);
   	// echo $query;
   	//end for assesment masterdata

    while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id 		= $row['id'];
		$loc_id 	= $row['locale'];
		$loc 		= $row['locale_id'];
		$toa_id		= $row['f_type_of_a'];
		$toa 		= $row['toa_def'];
		$date 		= dateletterformatmdy($row['date_of_assessment']);
		$start 		= dateletterformatmdy($row['start_scope']);
		$end 		= dateletterformatmdy($row['end_scope']);
		$im_date 	= $row['im_date'];
		$nc_id 		= $row['f_nc_class'];
		$nc 		= $row['nc_def'];
		$dev_text 	= $row['dev_label'] . ' - ' . $row['dev'];
		$dev_val	= $row['deviation'];
		$rca 		= $row['root_cause_analysis'];
		$cp 		= $row['cp_act'];
		$l_list 	= list_locale($loc_id);
		$t_list 	= list_toa($toa_id);
		$nc_list 	= list_nc_class($nc_id);
		// echo $dev_val;
		$dept_list  = q_dept($id);
		// echo $dept_list;
		$emp_list  = q_emp($id, $loc_id);

		$r_only = NULL;
		// readonly for locale access
		$filter_list = dev_dept_filter();

		//
		// echo $im_date;
		if ($im_date=="0000-00-00")
			$im_date=dateletterformatmdy(MySQL_NOW());
		else
			$im_date = dateletterformatmdy($im_date);

		$result = mysql_query($query)or die('query failed ' . mysql_error()  );

		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$eid 	= $row['eid'];
			$first	= $row['first'];
			$last 	= $row['last'];
			$middle = $row['middle'];
			$pos 	= $row['position'];
			$loc 	= $row['locale_id'];
			$grp 	= $row['group_name'];
		}

	$dev = '<div class="form-group" >
				<label class="col-sm-3 control-label" for="form-styles">Deviation Filter</label>
				<div class="col-sm-8">
					'.$filter_list.'
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="form-styles">Deviation</label>
				<div class="col-sm-8">
					<select class="populate placeholder s_list2" name="text_dev" id="text_dev">
						 <option value="' . $dev_val . '" selected="selected">' . $dev_text . '</option>
					</select>
				</div>
			</div>';

	if ($cred!=1 AND $cred!=5) {
		$r_only = 'readonly';
		$dev = '
			<div class="form-group has-feedback">
					<input type="hidden" name="text_dev" value="' . $dev_val . '" />
					<label class="col-sm-3 control-label">Deviation</label>
					<div class="col-sm-8">
						<strong>
							<textarea readonly class="form-control" rows="2" name="text_dev_" id="text_dev_" readonly>' . $dev_text . '</textarea>
						</strong>
					</div>
				</div>';
	}

	$body = '	<form id="defaultForm" method="post" style="font-size:12px;" class="form-horizontal">
					<input type="hidden" name="action" value="update_findings" />
					<input type="hidden" name="id" value="' . $id . '" />
					<fieldset>
						<!--<legend>Add Findings</legend>-->
						<div class="box-content accordion" id="accordion" style="padding:0px;">
							<h3>Findings/CPAR Description</h3>
							<div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Locale</label>
									<div class="col-sm-4">
										<select class="populate placeholder s_list2 s_cred" name="locale" id="s_locale">
											' . $l_list . '
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Type of Assessment</label>
									<div class="col-sm-4">
										<select class="populate placeholder s_list2 s_cred" name="toa" id="s_toa">
											' . $t_list  . '
										</select>
									</div>
								</div>
								<div class="form-group has-feedback">
									<label class="col-sm-3 control-label">Date of Assessment</label>
									<div class="col-sm-4">
										<input  '.$r_only.' type="text" id="input_date'.$r_only.'" class="form-control" name="input_date" placeholder="Date of Assessment" value="' . $date . '">
										<span class="fa fa-calendar form-control-feedback"></span>
									</div>
								</div>
								<div class="form-group has-feedback">
									<label class="col-sm-3 control-label">Scopes of Assessment</label>
									<div class="col-sm-4">
										<input  '.$r_only.' type="text" id="start_date'.$r_only.'" class="form-control start_date" name="start_date" placeholder="Start Date" value="' . $start . '">
										<span class="fa fa-calendar form-control-feedback"></span>
									</div>
									<div class="col-sm-4">
										<input  '.$r_only.' type="text" id="end_date'.$r_only.'" class="form-control" name="end_date" placeholder="End Date" value="' . $end . '">
										<span class="fa fa-calendar form-control-feedback"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">NC Classification</label>
									<div class="col-sm-4">
										<select class="populate placeholder s_list2 s_cred" name="nc_class" id="s_ncc">
											' . $nc_list . '
										</select>
									</div>
								</div>
									' . $dev . '
							</div>
						</div>
						<div class="box-content accordion" id="accordion2" style="padding:0px;">
							<h3>Problem Analysis/Corrective/Preventive Action(to be filled up by the CPAR Recipient)</h3>
							<div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="form-styles">Root Cause Analysis</label>
									<div class="col-sm-8">
											<textarea class="form-control" rows="4" placeholder="Root Cause Analysis" name="text_root" id="text_root">' . $rca . '</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Department</label>
									<div class="col-sm-8">
										<select multiple="multiple" class="populate placeholder s_dept" name="chk_depts[]" id="s_dept">
											' . $dept_list . '
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Employee</label>
									<div class="col-sm-8">
										<select multiple="multiple" class="populate placeholder s_emp" name="chk_emp[]" id="s_emp">
											' . $emp_list . '
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Corrective /<br> Preventive Action</label>
									<div  class="col-sm-8 tabs" id="tabs" style="padding:5px 15px 5px 15px;">
										<ul>
											<li><a href="#tabs-1">Corrective</a></li>
											<li><a href="#tabs-2">Preventive</a></li>
										</ul>
										<div id="tabs-1">
											<p>
												<textarea class="form-control" placeholder="Corrective Action" rows="4" name="text_cp" id="text_root">' . $cp . '</textarea>
											</p>
										</div>
										<div id="tabs-2">
											<p>
												<textarea class="form-control" placeholder="Preventive Action" rows="4" name="text_pc" id="text_root"></textarea>

											</p>
										</div>
									</div>
								</div>
								<div class="form-group has-feedback" style="margin:-15px;">
									<label class="col-sm-3 control-label">Implementation Date</label>
									<div class="col-sm-4">
										<input  type="text" id="im_date" class="form-control" name="im_date" placeholder="Implementation Date" value="' . $im_date . '">
										<span class="fa fa-calendar form-control-feedback"></span>
									</div>
								</div>
							</div>
		    			</div>
						<div class="form-group">
					        <div class="col-xs-12">
					        	<center>
					            <button id="btn_updatefindings" type="submit" class="btn btn-primary btn-lg">Update Findings</button>
					        	</center>
					        </div>
	    				</div>

					</fieldset>
				</form>
		';
		echo $body;
	}
}
if($action=="json_array_dept"){


	$query2 = "SELECT * from assessment_findings_dept";
	$query2 .= " WHERE ases_id=$id AND is_deleted=0";

	// echo $query2;
    $result2 = mysql_query($query2);


	$outputdata = array();
	while($row = mysql_fetch_assoc($result2)) {
	    $outputdata[] = $row;
	}

	echo json_encode($outputdata);
}
if($action=="json_array_emp"){


	$query2 = "SELECT * from assessment_findings_emp";
	$query2 .= " WHERE ases_id=$id AND is_deleted=0";

	// echo $query2;
    $result2 = mysql_query($query2);


	$outputdata = array();
	while($row = mysql_fetch_assoc($result2)) {
	    $outputdata[] = $row;
	}

	echo json_encode($outputdata);
}
if($action=="deviation_label"){
	$query = "SELECT trans.id, trans.dev_part, dp.dev_def, trans.nc_class, nc.nc_name, trans.label, dl.dev_label, trans.option_def
			FROM dev_list trans
			LEFT JOIN dev_part dp ON dp.id=trans.dev_part
			LEFT JOIN nc_classification nc ON nc.nc_id=trans.nc_class
			LEFT JOIN dev_label dl ON dl.id=trans.label WHERE trans.id=$id";
		// echo $query;
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$d_def = $row['dev_def'];
		$n_name = $row['nc_name'];
		$d_lbl = $row['dev_label'];
		$o_def = $row['option_def'];

		$label = $d_def .'('. $n_name .') -->' . PHP_EOL;
		if ($d_lbl==null) {
			$label .=$o_def;
		}else{
			$label .= $d_lbl  .  PHP_EOL;
			$label .=$o_def;
		}
		echo $label;
	}
}
if($action=="f_locale"){
	$l_list 	= list_locale(null);
	echo $l_list;
}
if($action=="f_year"){
	$y_list 	= list_year(null);
	echo $y_list;
}

if($action=="f_dept"){
	$dept_list 	= list_dept(null);
	echo $dept_list;
}
if($action=="f_mos"){
	$mos_list 	= list_mos(null);
	echo $mos_list;
}
if($action=="f_toa"){
	$t_list 	= list_toa(null);
	echo $t_list;
}
if($action=="f_nc_class"){
	$nc_list 	= list_nc_class(null);
	echo $nc_list;
}
if($action=="f_cls"){
	$cls_list 	= list_cls(null);
	echo $cls_list;
}
if($action=="form_filter"){

	$query = assessment_findings_compilation($loc, $grp, $cred);

	 if(isset($f_start) AND isset($f_end)){
	 	if($f_end=="1970/01/01"){
			$f_end=MySQL_NOW();
		}
	 	$query .= " AND date_of_assessment BETWEEN '{$f_start}' AND '{$f_end}'";
	 }
		if ($locale!="") {
			$query .= " AND locale=$locale";
		}
		if ($nc_class!="") {
			$query .= " AND f_nc_class=$nc_class";
		}
		if($toa!="") {
			$query .= " AND f_type_of_a=$toa";
		}

	 echo $query;
	 $x = mysql_num_rows(mysql_query($query));
	 $result = mysql_query($query)or die('query failed ' . mysql_error()  );
		// echo $query;
		// echo 'panget';
			$tab="";
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$id 			= $row['id'];
			$loc 			= $row['locale_id'];
			$toa 			= $row['toa_def'];
			$date 			= dateletterformatmdy($row['date_of_assessment']);
			$start 			= dateletterformatmdy($row['start_scope']);
			$end 			= dateletterformatmdy($row['end_scope']);
			$dev_text 		= $row['dev_label'] . ' - ' . $row['dev'];
			$nc 			= $row['nc_def'];
			$stt 			= $row['cpar_status'];
			$dev 			= $row['deviation'];
			$rca 			= $row['root_cause_analysis'];
			$rem 			= $row['remarks'];

			$tab .= '<tr class="vert-align">
						<td >
							' . $loc . '
						</td>
						<td>
							' . $toa . '
						</td>
						<td>
							' . $date . '
						</td>
						<td>
							' . $nc . '
						</td>
						<td>
							' . $dev_text . '
						</td>
						<td>
							' . $stt . '
						</td>
						<td>
							<button value="' . $id . '" type="button" class="f_view2 btn btn-primary btn-sm"><i class="fa fa-cloud-upload"></i></button>
							<button value="' . $id . '" type="button" class="f_delete2 btn btn-danger btn-sm"><i class="fa  fa-times-circle"></i></button>
						</td>
					</tr>';

			// echo $tab;
			}
			$tab .= '<tr>

				<td>			<label class="control-label" for="form-styles"><h5
				>Total Findings:<b> ' . $x . '</b></h4></label> </td>

					</tr>';
			echo $tab;
}
if($action=="downloadcpar"){
	include('../docs/cpar.php');
}
# HK tools
if($action=="hk_list"){
	$hk_list 	= list_hk(null, $cred, $loc);
	echo $hk_list;
}
if($action=="room_list"){
	$room_list 	= list_room(null, $cred, $loc);
	echo $room_list;
}
if($action=="toc"){
	$toc 	= list_toc(null, $cred, $loc);
	echo $toc;
}
# END HK Tools
# DEVIATION #
# Deviation Admin #
if($action=="load_dept_dev"){
	$query = "SELECT * FROM dev_dept WHERE is_deleted=0";
	$result = mysql_query($query);
	$body = "";
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id = $row['id'];
		$dev = $row['dev_department'];
		$button = ' <button class="edit_dept btn btn-success btn-label-left " value=' . $id . '>Edit</button>
					<button class="delete_dept btn btn-danger btn-label-left " value=' . $id . '>Delete</button>';
		$body .= '<tr>
					<td class="dev_td dev_Department_td">' . $dev . '</td>
					<td>' . $button . '</td>
				</tr>';

	}
	echo $body;
}

if($action=="load_sec_dev"){
	$query = "SELECT * FROM dev_sec WHERE dept_id=$dept_id AND is_deleted=0";
	$result = mysql_query($query);
	$body = "";
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id = $row['id'];
		$sec = $row['dev_section'];
		$button = ' <button class="edit_sec btn btn-success btn-label-left " value=' . $id . '>Edit</button>
					<button class="delete_sec btn btn-danger btn-label-left " value=' . $id . '>Delete</button>';
		$body .= '<tr>
					<td class="dev_td dev_Section_td">' . $sec . '</td>
					<td>' . $button . '</td>
				</tr>';

	}
	echo $body;
}
if($action=="load_cat_dev"){
	$query = "SELECT * FROM dev_cat WHERE dept_id=$dept_id AND sec_id=$sec_id  AND is_deleted=0";
	$result = mysql_query($query);
	$body = "";
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id = $row['id'];
		$cat = $row['dev_categories'];
		$button = ' <button class="edit_cat btn btn-success btn-label-left" value=' . $id . '>Edit</button>
					<button class="delete_cat btn btn-danger btn-label-left" value=' . $id . '>Delete</button>';
		$body .= '<tr>
					<td class="dev_td dev_Categories_td">' . $cat . '</td>
					<td>' . $button . '</td>
				</tr>';
	}
	echo $body;
}
if($action=="load_lbl_dev"){
	$query = "SELECT * FROM dev_label WHERE dept_id=$dept_id AND sec_id=$sec_id AND cat_id=$cat_id AND is_deleted=0";
	$result = mysql_query($query);
	$body = "";
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id = $row['id'];
		$lbl = $row['dev_label'];
		$button = ' <button class="edit_lbl btn btn-success btn-label-left" value=' . $id . '>Edit</button>
					<button class="delete_lbl btn btn-danger btn-label-left" value=' . $id . '>Delete</button>';
		$body .= '<tr>
					<td class="dev_td dev_Label_td">' . $lbl . '</td>
					<td>' . $button . '</td>
				</tr>';
	}
	echo $body;
}
if($action=="load_dev_dev"){
	$query = "SELECT * FROM dev_table WHERE dept_id=$dept_id AND sec_id=$sec_id AND cat_id=$cat_id AND lbl_id=$lbl_id AND is_deleted=0";
	$result = mysql_query($query);
	$body = "";
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id = $row['id'];
		$dev = $row['dev'];
		$button = ' <button class="edit_dev btn btn-success btn-label-left" value=' . $id . '>Edit</button>
					<button class="delete_dev btn btn-danger btn-label-left" value=' . $id . '>Delete</button>';
		$body .= '<tr>
					<td class="dev_td dev_Deviation_td">' . $dev . '</td>
					<td>' . $button . '</td>
				</tr>';
	}
	echo $body;
}
if($action=="add_dev"){
	if ($value=="Deviation") {
		$input = '<textarea data-toggle="tooltip" title="Enter ' . $value . '!" type="text" class="add_dev form-control" name="input_date" placeholder="Add ' . $value . '"></textarea>';
	}else{
		$input = '<input data-toggle="tooltip" title="Enter ' . $value . '!" type="text" class="add_dev form-control" name="input_date" placeholder="Add ' . $value . '">';
	}

	$body  =   '<div class="box-content responsive" style="font-size: 12px;">
					<form id="defaultForm" method="post" class="form-horizontal">
						<input type="hidden" name="action" value="' . $value . '" />
						<input type="hidden" name="id" value="' . $id . '" />
						<div class="form-group has-feedback">
							<label class="col-sm-2 control-label"><b>' . $value . '</b></label>
							<div class="col-sm-9">
								' . $input . '
							</div>
						</div>
					</form>
				<div>';
	echo $body;
}
if($action=="add_Department"){

	$query  = " INSERT INTO `dev_dept` (`id`, `dev_department`, `is_deleted` )
   			  	VALUES ('', '$dev_val' , 0)";

   	$result = mysql_query($query);

   	if (!$result){
    	echo "failed";
    	// echo mysql_error();
	}else{
		echo mysql_insert_id();
	}
}
if($action=="add_Section"){

	$query  = " INSERT INTO `dev_sec` (`id`, `dept_id`, `dev_section`, `is_deleted` )
   			  	VALUES ('', '$dept_id',  '$dev_val' , 0)";

   	$result = mysql_query($query);

   	if (!$result){
    	// echo "failed";
    	echo mysql_error();
	}else{
		echo mysql_insert_id();
	}
}
if($action=="add_Categories"){

	$query  = " INSERT INTO `dev_cat` (`id`, `dept_id`, `sec_id`, `dev_categories`, `is_deleted` )
   			  	VALUES ('', '$dept_id', '$sec_id',  '$dev_val' , 0)";

   	$result = mysql_query($query);

   	if (!$result){
    	// echo "failed";
    	echo mysql_error();
	}else{
		echo mysql_insert_id();
	}
}
if($action=="add_Label"){

	$query  = " INSERT INTO `dev_label` (`id`, `dept_id`, `sec_id`, `cat_id`, `dev_label`, `is_deleted` )
   			  	VALUES ('', '$dept_id', '$sec_id', '$cat_id',  '$dev_val' , 0)";

   	$result = mysql_query($query);

   	if (!$result){
    	// echo "failed";
    	echo mysql_error();
	}else{
		echo mysql_insert_id();
	}
}
if($action=="add_Deviation"){
	$query  = " INSERT INTO `dev_table` (`id`, `dept_id`, `sec_id`, `cat_id`, `lbl_id`, `dev`, `is_deleted` )
   			  	VALUES ('', '$dept_id', '$sec_id', '$cat_id', '$lbl_id',  '$dev_val' , 0)";
   	$result = mysql_query($query);

   	if (!$result){
    	echo "failed";
    	// echo mysql_error();
	}else{
		echo mysql_insert_id();
	}
}
if($action=="Edit_dev"){
	if ($btn=="Edit") {
		$body  =   '<div class="box-content responsive" style="font-size: 12px;">
					<form id="defaultForm" method="post" class="form-horizontal">
						<input type="hidden" name="action" value="' . $btn . $val.'" />
						<input type="hidden" name="ed_id" value="' . $ed_id . '" />
							<label class="col-sm-3 control-label"><b>'. $val.'</b></label>
							<div class="col-sm-5">
								<input name="txt" data-toggle="tooltip" type="text" class="form-control" value="' . $txt . '">
							</div>
					</form>
				<div>';
		echo $body;
	}else{
		$body  =   '<div class="box-content responsive" style="font-size: 12px;">
					<form id="defaultForm" method="post" class="form-horizontal">
						<input type="hidden" name="action" value="' . $btn . $val.'" />
						<input type="hidden" name="ed_id" value="' . $ed_id . '" />
							<h4>Delete ' . $txt . '?</h4>
					</form>
				<div>';
		echo $body;
	}
//Deviation Edit Delete
}
if($action=="EditDepartment"){
	$query = "UPDATE dev_dept SET dev_department='$txt' WHERE id=$ed_id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
		// echo mysql_error();
	}else{
		echo $txt;
	}
	// echo "edit depar tment";
	// $query = "edit department";
}
if($action=="DeleteDepartment"){
	$query = "UPDATE dev_dept SET is_deleted=1 WHERE id=$ed_id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
	}else{
		echo "success";
	}
	// echo "delete department";
	// $query = "";
}
if($action=="EditSection"){
	$query = "UPDATE dev_sec SET dev_section='$txt' WHERE id=$ed_id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
		// echo mysql_error();
	}else{
		echo $txt;
	}
	// echo "edit depar tment";
	// $query = "edit department";
}
if($action=="DeleteSection"){
	$query = "UPDATE dev_sec SET is_deleted=1 WHERE id=$ed_id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
	}else{
		echo "success";
	}
	// echo "delete department";
	// $query = "";
}
if($action=="EditCategories"){
	$query = "UPDATE dev_cat SET dev_categories='$txt' WHERE id=$ed_id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
		// echo mysql_error();
	}else{
		echo $txt;
	}
	// echo "edit depar tment";
	// $query = "edit department";
}
if($action=="DeleteCategories"){
	$query = "UPDATE dev_cat SET is_deleted=1 WHERE id=$ed_id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
	}else{
		echo "success";
	}
	// echo "delete department";
	// $query = "";
}
if($action=="EditLabel"){
	$query = "UPDATE dev_label SET dev_label='$txt' WHERE id=$ed_id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
		// echo mysql_error();
	}else{
		echo $txt;
	}
	// echo "edit depar tment";
	// $query = "edit department";
}
if($action=="DeleteLabel"){
	$query = "UPDATE dev_label SET is_deleted=1 WHERE id=$ed_id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
	}else{
		echo "success";
	}
	// echo "delete department";
	// $query = "";
}
if($action=="EditDeviation"){
	$query = "UPDATE dev_table SET dev='$txt' WHERE id=$ed_id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
		// echo mysql_error();
	}else{
		echo $txt;
	}
	// echo "edit depar tment";
	// $query = "edit department";
}
if($action=="DeleteDeviation"){
	$query = "UPDATE dev_table SET is_deleted=1 WHERE id=$ed_id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
	}else{
		echo "success";
	}
	// echo "delete department";
	// $query = "";
}
# End deviation admin #
if($action=="load_devlist"){
	$query = dev_list($id);
	// echo $query;
	$result = mysql_query($query);

	$list = '<option selected="selected" value="">-- Select a Deviation --</option>';
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$lbl = 	$row['dev_label'];
			$cat = 	$row['dev_categories'];
			if ($lbl==".") {
				$lbl="";
			}

			if ($lbl2!=$row['dev_label']) {
				$list .='<optgroup label="' .  $cat . ' - ' . $lbl  . '">';

			}
			$lbl2 = $row['dev_label'];

		$list .='<option value="' . $row['id'] . '">' . $row['dev'] . '</option>';
	}

	echo $list;
}

/* iQMS Reports */
if($action=="topfindings"){

	$f_start = dateletterformatdbf($f_start);
	$f_end = dateletterformatdbf($f_end);
	if(isset($f_start) AND isset($f_end)){
	 	if($f_end=="1970-01-01"){
			$f_end=MySQL_NOW();
		}
		if($f_start=="1970-01-01"){
			$f_start=MySQL_NOW();
		}
	 }


	$query = 'SELECT trans.locale_id, CONCAT(p.particular," (", f.findings,")") AS c_findings,
	COUNT(*) AS "numoffindings" FROM trans_findings_master trans
	JOIN trans_findings fin ON fin.parent_id=trans.id
	JOIN findings f ON f.id=fin.findings_id
	JOIN particulars p ON p.id=f.particular_id
	JOIN locale l ON l.locale_id=trans.locale_id
	WHERE trans.date_filed BETWEEN \'' .$f_start. '\' AND \'' .$f_end. '\'';
	if ($locale) {
		$query .= 'AND l.id='.$locale.'';
	}
	$query .= ' AND fin.findings_id!=0
	GROUP BY fin.findings_id ORDER BY numoffindings DESC';

	// echo $query;
	$result = mysql_query($query)or die('query failed ' . mysql_error()  );

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$findings 			= $row['c_findings'];
		$loc 				= $row['locale_id'];
		$numoffindings 		= $row['numoffindings'];

		$tab .= '<tr class="vert-align">
					<td >
						' 	. $loc 		. 	'
					</td>
					<td>
						' 	. $findings 		. 	'
					</td>
					<td>
						' 	. $numoffindings 	. 	'
					</td>
				</tr>';
		}
		echo $tab;

}

if($action=="numberofinspection"){

	$f_start = dateletterformatdbf($f_start);
	$f_end = dateletterformatdbf($f_end);
	if(isset($f_start) AND isset($f_end)){
	 	if($f_end=="1970-01-01"){
			$f_end=MySQL_NOW();
		}
		if($f_start=="1970-01-01"){
			$f_start=MySQL_NOW();
		}
	 }

	$query = 'SELECT trans.date_filed, trans.inspected_by, CONCAT(e.last , " " ,  e.first) AS name, COUNT(*) AS numofinspection,
				l.locale_id
	 FROM trans_findings_master trans
			JOIN emp e ON e.eid=trans.inspected_by
			JOIN locale l ON l.locale_id=trans.locale_id
			WHERE trans.date_filed 	BETWEEN \''.$f_start.'\' AND \''.$f_end.'\'';
	if ($locale) {
		$query .= ' AND l.id='.$locale.'';
	}
	$query .= ' GROUP BY trans.inspected_by ORDER BY l.locale_id';

	// echo $query;
	$result = mysql_query($query)or die('query failed ' . mysql_error()  );

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		// $last 				= $row['last'];
		$name 				= $row['name'];
		$loc 				= $row['locale_id'];
		$numofinspection 	= $row['numofinspection'];

		$tab .= '<tr class="vert-align">
					<td>
						' 	. $name 		. 	'
					</td>
					<td>
						' 	. $loc 		. 	'
					</td>
					<td>
						' 	. $numofinspection 	. 	'
					</td>
				</tr>';
		}
		echo $tab;

}

if($action=="averagerating"){

	$f_start 	= dateletterformatdbf($f_start);
	$f_end 		= dateletterformatdbf($f_end);
	if(isset($f_start) AND isset($f_end)){
	 	if($f_end=="1970-01-01"){
			$f_end=MySQL_NOW();
		}
		if($f_start=="1970-01-01"){
			$f_start=MySQL_NOW();
		}
	 }

	$query = 'SELECT l.locale_id, ROUND(AVG(trans.grade),2) AS aveofinspection, rt.room_type FROM trans_findings_master trans
				JOIN locale l ON l.locale_id=trans.locale_id
				JOIN rooms r ON r.id=trans.room_id
				JOIN room_types rt ON rt.id=r.room_type_id
				WHERE trans.date_filed 	BETWEEN \''.$f_start.'\' AND \''.$f_end.'\'';
	if ($locale) {
		$query .= ' AND l.id='.$locale.'';
	}
	$query .= ' AND trans.room_status_id=1 GROUP BY rt.room_type, l.locale_id ORDER BY l.locale_id ';

	// echo $query;
	$result = mysql_query($query)or die('query failed ' . mysql_error()  );

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		// $last 				= $row['last'];
		$avg 				= $row['aveofinspection'];
		$loc 				= $row['locale_id'];
		$room_type 			= $row['room_type'];

		$tab .= '<tr class="vert-align">
					<td>
						' 	. $loc 		. 	'
					</td>
					<td>
						' 	. $avg 		. 	'
					</td>
					<td>
						' 	. $room_type 	. 	'
					</td>
				</tr>';
		}
		echo $tab;

}
/* End iQMS Reports	*/


/* Report Select Global */

if($action=="locale_report_gen"){
	$l_list 	= locale_report_gen(null, $cred, $loc);
	echo $l_list;
}

/* Report Select Global  */


if($action=="DeleteUser"){
	$query = "UPDATE user SET is_deleted=1 WHERE id=$id";
	$result = mysql_query($query);
	if (!$result) {
		echo "failed";
	}else{
		echo "success";
	}
	// echo "delete department";
	// $query = "";
}

?>