<?php
require("../include/db.php");

/* END EMPLOYEE */

function emp_query(){
	$query = "	SELECT trans.eid, trans.last, trans.first, trans.middle, p.position, l.locale_id, j.Job_level, e.emp_stat, eg.group_name,trans.is_resigned, trans.email
				FROM emp trans
				LEFT JOIN position p ON p.id = trans.position
				LEFT JOIN locale l ON l.id = trans.locale
				LEFT JOIN job_level j ON j.id = trans.Job_level
				LEFT JOIN emp_status e ON e.id = trans.emp_status
				LEFT JOIN emp_group eg ON eg.id = trans.emp_group";
	return $query;
}
function emp_querys($id, $loc_id){

	$query = "	SELECT trans.eid, trans.last, trans.first, trans.middle, p.position, l.id, l.locale_id, j.Job_level, e.emp_stat, eg.id as grp_id, eg.group_name
				FROM emp trans
				LEFT JOIN position p ON p.id = trans.position
				LEFT JOIN locale l ON l.id = trans.locale
				LEFT JOIN job_level j ON j.id = trans.Job_level
				LEFT JOIN emp_status e ON e.id = trans.emp_status
				LEFT JOIN emp_group eg ON eg.id = trans.emp_group ";
	if (isset($loc_id)) {
		$query .= " WHERE l.id=$loc_id";
		if (isset($id)) {
		 	$query .= " AND trans.eid=$id";
		 }
	}
	if (isset($id)) {
		$query .= " WHERE trans.eid=$id";
		if (isset($loc_id)) {
		 	$query .= " AND l.id=$loc_id ";
		 }
	}


	return $query;
}
function user_query($id){

	$query = 'SELECT trans.p_id, trans.id, trans.pass, trans.nickname, trans.emp_group, trans.userroles, e.last,e.first,e.middle, l.id as locale, l.locale_id, g.id as grp_id, g.group_id, g.group_name, u.id as userroles_id, u.userroles_name
				FROM user trans
				LEFT JOIN emp e ON e.eid=trans.id
				LEFT JOIN  locale l on l.id=e.locale
				LEFT JOIN  emp_group g on g.id=trans.emp_group
				LEFT JOIN  user_roles u on u.id=trans.userroles WHERE trans.is_deleted=0
				';
	return $query;
}
function s_loc($id){
	$query = "SELECT * FROM locale";
	$result = mysql_query($query);
		if (!isset($id)) {
			$list = '<option value="" selected="selected" >-Select Locale-</option>';
		}
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['id']){
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['locale_id'] . '</option>';
		}else{
			$list .= '<option value="' . $row['id'] . '">' . $row['locale_id'] . '</option>';
		}

	}
	return $list;
}
function s_pos($id){
	$query = "SELECT * FROM position";
	$result = mysql_query($query);
		if (!isset($id)) {
			$list = '<option value="" selected="selected" >-Select Position-</option>';
		}
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['id']){
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['position'] . '</option>';
		}else{
			$list .= '<option value="' . $row['id'] . '">' . $row['position'] . '</option>';
		}
	}
	return $list;
}
function s_grp($id){
	$query = "SELECT * FROM emp_group";
	$result = mysql_query($query);
		if (!isset($id)) {
			$list = '<optionsn value="" selected="selected" >-Select Group-</option>';
		}
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['id']){
			$list .= '<option value="' . $row['id'] . '" selected="selected" >' . $row['group_name'] . '</option>';
		}else{
			$list .= '<option value="' . $row['id'] . '">' . $row['group_name'] . '</option>';
		}
	}
	return $list;
}
function s_stat($id){
	$query = "SELECT * FROM emp_status";
	$result = mysql_query($query);
		if (!isset($id)) {
			$list = '<option value="" selected="selected" >-Select Employee Status-</option>';
		}
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['id']){
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['emp_stat'] . '</option>';
		}else{
			$list .= '<option value="' . $row['id'] . '">' . $row['emp_stat'] . '</option>';
		}
	}
	return $list;
}
function s_res($id){
	$query = "SELECT * FROM is_resigned";
	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['id']){
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['is_resigned'] . '</option>';
		}else{
			$list .= '<option value="' . $row['id'] . '">' . $row['is_resigned'] . '</option>';
		}
	}
	return $list;
}
function s_user_r($id){
	$query = "SELECT * FROM user_roles";
	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['id']){
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['userroles_name'] . '</option>';
		}else{
			$list .= '<option value="' . $row['id'] . '">' . $row['userroles_name'] . '</option>';
		}
	}
	return $list;
}
function getemp($id){
	$query = "SELECT * FROM emp WHERE eid=$id";
	$result = mysql_query($query);
	$outputdata = array();
	while($row = mysql_fetch_assoc($result)) {
	    $outputdata = $row;
	}
	return $outputdata;
}

/* END EMPLOYEE */

function assessment_findings_compilation($loc, $grp, $cred){
	$cred = mysql_real_escape_string($cred);
	// echo $nn . ' ' . $loc . ' ' . $grp . ' ' . $cred;
	// $query = "SELECT trans.id, trans.locale, trans.remarks,trans.is_deleted, l.locale_id, l.locale_name, trans.f_type_of_a, toa.toa_def, toa.toa_name, trans.date_of_assessment, trans.start_scope, trans.end_scope, trans.f_nc_class, ncc.nc_def, ncc.nc_name, trans.deviation, trans.root_cause_analysis, trans.is_deleted
	//     FROM assessment_findings trans
	// 	LEFT JOIN locale l ON l.id = trans.locale
 //        LEFT JOIN type_of_assessment toa ON toa.toa_id = trans.f_type_of_a
 //        LEFT JOIN nc_classification ncc ON ncc.nc_id = trans.f_nc_class WHERE trans.is_deleted=0";

	$query = "SELECT trans.id, trans.locale, trans.remarks, trans.cp_act, trans.im_date, cls.clauses, stt.cpar_status, l.locale_id, l.locale_name, trans.f_type_of_a, toa.toa_def,
			toa.toa_name, trans.date_of_assessment, trans.start_scope, trans.end_scope, trans.f_nc_class, ncc.nc_def,
			ncc.nc_name, trans.deviation, dt.dev, dl.dev_label, trans.root_cause_analysis, trans.is_deleted
			FROM assessment_findings trans
				LEFT JOIN cpar_clauses cls ON cls.id = trans.cpar_cls
        		LEFT JOIN cpar_stat stt ON stt.id = trans.cpar_stat
				LEFT JOIN locale l ON l.id = trans.locale
				LEFT JOIN type_of_assessment toa ON toa.toa_id = trans.f_type_of_a
				LEFT JOIN nc_classification ncc ON ncc.nc_id = trans.f_nc_class
				LEFT JOIN dev_table dt ON dt.id= trans.deviation
				LEFT JOIN dev_label dl ON dl.id= dt.lbl_id WHERE trans.is_deleted=0";

    if ($cred!=1 AND $cred!=5) {
    	$query .= " AND locale=$loc";
    }

     return $query;
}
function view_findings(){
	$query = "SELECT trans.id, trans.locale, trans.remarks, trans.cp_act, trans.im_date, cls.clauses, l.locale_id, l.locale_name, trans.f_type_of_a, toa.toa_def,
			toa.toa_name, trans.date_of_assessment, trans.start_scope, trans.end_scope, trans.f_nc_class, ncc.nc_def,
			ncc.nc_name, trans.deviation, dt.dev, dl.dev_label, trans.root_cause_analysis, trans.is_deleted
				FROM assessment_findings trans
				LEFT JOIN cpar_clauses cls ON cls.id = trans.cpar_cls
				LEFT JOIN locale l ON l.id = trans.locale
		        LEFT JOIN type_of_assessment toa ON toa.toa_id = trans.f_type_of_a
		        LEFT JOIN nc_classification ncc ON ncc.nc_id = trans.f_nc_class
		       	LEFT JOIN dev_table dt ON dt.id= trans.deviation
		        LEFT JOIN dev_label dl ON dl.id= dt.lbl_id";
	return $query;
}
function view_findings_emp(){
	$query = "SELECT trans.ases_id, trans.emp_emp, emp_o.last, emp_o.first, emp_o.middle, emp_o.position, p.position
		FROM assessment_findings_emp trans
		LEFT JOIN emp emp_o ON emp_o.eid = trans.emp_emp
        LEFT JOIN position p ON p.id=emp_o.position";
    return $query;
}
function view_findings_dept(){
	$query = "SELECT trans.ases_id, trans.dept_id, dept.group_id, dept.group_name
		FROM assessment_findings_dept trans
		LEFT JOIN emp_group dept ON dept.id = trans.dept_id";
	return $query;
}
function view_findings_cpar($id){

	// $query = "SELECT trans.id, trans.locale, trans.remarks, l.locale_id, l.locale_name, trans.f_type_of_a, toa.toa_def,
	// 		toa.toa_name, trans.date_of_assessment, trans.start_scope, trans.end_scope, trans.f_nc_class, ncc.nc_def,
	// 		ncc.nc_name, trans.deviation, dt.dev, dl.dev_label, trans.root_cause_analysis, trans.is_deleted
	// 			FROM assessment_findings trans
	// 			LEFT JOIN locale l ON l.id = trans.locale
	// 	        LEFT JOIN type_of_assessment toa ON toa.toa_id = trans.f_type_of_a
	// 	        LEFT JOIN nc_classification ncc ON ncc.nc_id = trans.f_nc_class
	// 	       	LEFT JOIN dev_table dt ON dt.id= trans.deviation
	// 	        LEFT JOIN dev_label dl ON dl.id= dt.lbl_id WHERE trans.id=$id";
	$query = view_findings();
	$query .= " WHERE trans.id=$id";
	$result = mysql_query($query);
		$outputdata = array();
	while($row = mysql_fetch_assoc($result)) {
	    $outputdata = $row;
	}
	return $outputdata;
}
function view_findings_dept_cpar($id){

	$query = "SELECT trans.ases_id, trans.dept_id, dept.group_id, dept.group_name
		FROM assessment_findings_dept trans
		LEFT JOIN emp_group dept ON dept.id = trans.dept_id WHERE trans.ases_id=$id AND trans.is_deleted=0";

	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result)) {
	    $outputdata[] = $row;
	}
	return $outputdata;
}
function view_findings_emp_cpar($id){

	$query = "SELECT trans.ases_id, trans.emp_emp, emp_o.last, emp_o.first, emp_o.middle, emp_o.position, p.position
		FROM assessment_findings_emp trans
		LEFT JOIN emp emp_o ON emp_o.eid = trans.emp_emp
        LEFT JOIN position p ON p.id=emp_o.position WHERE trans.ases_id=$id AND trans.is_deleted=0";

    $result = mysql_query($query);
	while($row = mysql_fetch_assoc($result)) {
	    $outputdata[] = $row;
	}
	return $outputdata;
}
function loc_ts($id){
	$query = "SELECT * FROM assessment_findings WHERE id=$id";
	$result = mysql_query($query);
	while($row 	= mysql_fetch_array($result, MYSQL_ASSOC)){
		$loc_ts	=	$row['loc_ts'];
	}
	return $loc_ts;
}
//Financial Perspective//
function fp_pck($uroles, $locale){

	// $query = "SELECT distinct trans.id, trans.loc, l.locale_id, trans.dept, eg.group_id, trans.budget, trans.actual_budget, trans.mos, fpm.mos_def, trans.yr, fpyr.yr as fp_yr
	// 		FROM fp_pck_tbl trans
	// 		left join locale l ON l.id = trans.loc
	// 		left join emp_group eg ON eg.id = trans.dept
	// 		left join fp_mos fpm ON fpm.id=trans.mos
	// 		left join fp_year fpyr ON fpyr.id=trans.yr";

	$query = "SELECT trans.eid, trans.last, trans.first, trans.middle, trans.grp_ldr, p.position, l.id, l.locale_id, j.Job_level, e.emp_stat, eg.group_name, eg.group_id
					FROM emp trans
					LEFT JOIN position p ON p.id = trans.position
					LEFT JOIN locale l ON l.id = trans.locale
					LEFT JOIN job_level j ON j.id = trans.Job_level
					LEFT JOIN emp_status e ON e.id = trans.emp_status
					LEFT JOIN emp_group eg ON eg.id = trans.emp_group";

					if (isset($uroles)) {
						$query .= " WHERE trans.is_deleted=0 AND trans.is_resigned=0 ";
						if ($uroles==1 OR $uroles==5) {
							$query .= " AND eg.group_id='HK' AND trans.grp_ldr!=1 ";
						}elseif ($uroles==2) {

						}elseif ($uroles==3) {

						}else{
							$query .=" AND eg.group_id='HK' AND trans.grp_ldr!=1 AND l.id=$locale";
						}
					}
	$query .= " ORDER BY l.locale_id, trans.last";
     return $query;
}
function fp_pck_hk($uroles, $locale){

	$query = "SELECT trans.id, trans.loc, l.locale_id, trans.dept, eg.group_id, trans.budget, trans.actual_budget, trans.mos, fpm.mos_def, trans.yr, fpyr.yr as fp_yr
		FROM fp_hks_tbl trans
		left join locale l ON l.id = trans.loc
		left join emp_group eg ON eg.id = trans.dept
		left join fp_mos fpm ON fpm.id=trans.mos
		left join fp_year fpyr ON fpyr.id=trans.yr";

	if (isset($uroles)) {
		$query .= " WHERE trans.is_deleted=0";
		if ($uroles==1) {
			$query .= " AND eg.group_id='HK'";
		}elseif ($uroles==2) {

		}elseif ($uroles==3) {

		}else{
			$query .=" AND eg.group_id='HK' AND l.id=$locale";
		}
	}
     return $query;
}
function fp_pck_id($id){
	$query = "SELECT * FROM fp_pck_tbl WHERE id=$id";
	return $query;
}
function fp_hk_id($id){
	$query = "SELECT * FROM fp_hks_tbl WHERE id=$id";
	return $query;
}
//DATA GENERATION DB FINAL //
function fin_gen(){
	$query = "SELECT trans.eid, trans.last, trans.first, trans.middle, trans.grp_ldr, trans.is_resigned,
				l.id, l.locale_id, j.Job_level, e.emp_stat, eg.group_name, eg.group_id
				FROM emp trans
				LEFT JOIN locale l ON l.id = trans.locale
				LEFT JOIN job_level j ON j.id = trans.Job_level
				LEFT JOIN emp_status e ON e.id = trans.emp_status
				LEFT JOIN emp_group eg ON eg.id = trans.emp_group
				WHERE trans.is_deleted=0 AND trans.is_resigned=0
				AND eg.group_id='HK' AND trans.grp_ldr!=1 AND l.id!=6 AND l.id!=7 AND l.id!=1";
	return $query;
}
function qua_gen(){
	$query = "SELECT trans.eid, trans.last, trans.first, trans.middle, trans.grp_ldr, l.id, l.locale_id, j.Job_level, e.emp_stat, eg.group_name, eg.group_id
				FROM emp trans
				LEFT JOIN locale l ON l.id = trans.locale
				LEFT JOIN job_level j ON j.id = trans.Job_level
				LEFT JOIN emp_status e ON e.id = trans.emp_status
				LEFT JOIN emp_group eg ON eg.id = trans.emp_group
				WHERE trans.is_deleted=0 AND eg.group_id='HK' AND trans.grp_ldr!=1 AND l.id=4";
	return $query;
}
//query
function mg_gen(){
	$query = "SELECT trans.eid, trans.last, trans.first, trans.middle, trans.grp_ldr, p.position, l.id, l.locale_id, j.Job_level, e.emp_stat, eg.group_name, eg.group_id
		FROM emp trans
		LEFT JOIN position p ON p.id = trans.position
		LEFT JOIN locale l ON l.id = trans.locale
		LEFT JOIN job_level j ON j.id = trans.Job_level
		LEFT JOIN emp_status e ON e.id = trans.emp_status
		LEFT JOIN emp_group eg ON eg.id = trans.emp_group";

	$query .= " WHERE trans.is_deleted=0 AND trans.is_resigned=0 AND eg.group_id='HK' AND trans.grp_ldr!=1 AND l.id!=6 AND l.id!=7 AND l.id!=1";

	return $query;
}

// DATA GENERATION DB FINAL //

// END Financial Perspective //

##QUALITY##
function q_emp($id, $loc_id){

	$query = emp_querys(null, $loc_id);
	$query .= " AND eg.dept_id=1 ORDER BY p.position";
	$query2 = "SELECT * FROM assessment_findings_emp WHERE ases_id=$id AND is_deleted=0";
	$result = mysql_query($query);
	// echo $query;
   	$x=0;
   	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
   		$last 			= $row['last'];
		$first 			= $row['first'];
		$middle 		= $row['middle'];
		$pos 			= $row['position'];
		$name = $last . ", " . $first . " " . $middle;

		$row_id = $row['eid'];
		$result2 = mysql_query($query2);
		while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)){
			$emp_id = $row2['emp_emp'];

			// echo 'dept id ' . $dept_id . ' rowid ' . $row2['dept_id'];

			if ($emp_id==$row_id) {
				$x=1;
				// echo $x;
			}
		}

		if ($x==1)
			$list .= '<option value="' . $row['eid'] . '" selected="selected">' . $name . '</option>';
		else
			$list .= '<option value="' . $row['eid'] . '">' . $name . '</option>';

		$x=0;
	}
	return $list;
}
function q_dept($id){

	$id = mysql_real_escape_string($id);
	// echo $id;
	$query = "SELECT * FROM emp_group WHERE dept_id=1";
	$query2 = "SELECT * FROM assessment_findings_dept WHERE ases_id=$id AND is_deleted=0";
	// $query = "";

	$result = mysql_query($query);

	$x=0;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$row_id = $row['id'];
		$result2 = mysql_query($query2);
		while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)){
			$dept_id = $row2['dept_id'];

			// echo 'dept id ' . $dept_id . ' rowid ' . $row2['dept_id'];

			if ($dept_id==$row_id) {
				$x=1;
				// echo $x;
			}
		}
		if ($x==1)
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['group_name'] . '</option>';
		else
			$list .= '<option value="' . $row['id'] . '">' . $row['group_name'] . '</option>';
		$x=0;
	}
	return $list;
}
function qua_query(){

	$query = "SELECT trans.id, trans.date_filed, trans.inspected_by, trans.loss_points, trans.grade, trans.rating, e.last AS emp_last, e.first AS emp_first, e.middle AS emp_middle, e2.last, e2.first, e2.middle
		FROM `trans_findings_master` trans
		LEFT JOIN emp e on e.eid=trans.responsible_id
		LEFT JOIN emp e2 on e2.eid=trans.inspected_by";
	return $query;
}
function qua_query_cnt($eid, $mos){

	$query = "SELECT  COUNT(trans.grade) AS cnt_grade, AVG(trans.grade) AS avg_grade
		FROM `trans_findings_master` trans
		LEFT JOIN emp e on e.eid=trans.responsible_id
		LEFT JOIN emp e2 on e2.eid=trans.inspected_by  WHERE trans.responsible_id=$eid
		AND MONTH(trans.date_filed)=$mos AND YEAR(trans.date_filed)=2014";

	$query = mysql_query($query);
	while($row = mysql_fetch_assoc($query)){
		$getcntavg = $row;
	}
	return $getcntavg;
}
function get_hk_grade($grd){

	$query = "SELECT * FROM hk_grade WHERE hk_grd=$grd";
	$query = mysql_query($query);
	while($row = mysql_fetch_assoc($query)){
		$getcntavg = $row;
	}
	return $getcntavg;
	// return $query;
}

# Spot Check 		#
function get_spot_chk(){
	$query = "SELECT trans.id, trans.date_filed, trans.toc, toc.id, toc.toc_abv,
	trans.cnt, trans.insp_id, l.id, r.room_no, e.last AS emp_last,
	e.first AS emp_first, e.middle AS emp_middle, l.locale_id, e2.last, e2.first,
	e2.middle
		FROM `spot_chk_master` trans
		JOIN emp e on e.eid=trans.emp
		JOIN locale l ON l.id = e.locale
		JOIN emp e2 on e2.eid=trans.insp_id
        JOIN types_of_cleaning toc ON toc.id=trans.toc
        JOIN rooms r ON r.id=trans.room";
	return $query;
}
function get_spot_chk_cnt($eid, $mos){

	$query = "SELECT trans.id, sum(trans.cnt) AS TOTALFINDINGS, e.last AS emp_last,  e.first AS emp_first, e.middle AS emp_middle
		FROM `spot_chk_master` trans
		LEFT JOIN emp e on e.eid=trans.emp WHERE trans.emp='$eid' AND MONTH(trans.date_filed)='$mos'";

	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result)){
		$getcntspot = $row;
	}
	return $getcntspot;
}
function spotlist($id){
	$query = "SELECT * FROM hk_tools_lists WHERE cat_id=$id";
	$result = mysql_query($query);
	$cnt2=0;
	$cnt=0;
	while($row = mysql_fetch_assoc($result)){
		$id		=	$row['id'];
		$t_name	=	$row['tools_desc'];
		$lbl	=	$row['wt_lbl'];
		$toc	=	$row['typeofcleaning'];
		if ($lbl==0) {
			$chk .=	'<div class="checkbox ' . $toc . ' " >
						<label>
							<input class="chk_hkt" type="checkbox" value=' . $id .' name="chk_tools[]"> ' . $t_name . '
							<i class="fa fa-square-o small"></i>
						</label>
					</div>';
				$cnt2=0;
				$cnt=0;
		} else {

			if ($cnt==0 AND $cnt2==0) {
				$query2 = "SELECT * FROM `hk_tools_lbl` WHERE id=$lbl";
				$result2 = mysql_query($query2);
				while($row2 	= mysql_fetch_array($result2, MYSQL_ASSOC)){
					$t_list	=	$row2['tools_list'];
					$chk .=	'<div class="' . $toc . '"><br></div><label class="' . $toc . '">
			 		 			' . $t_list . '
			 				<br></label>';
					$cnt = 1;
				}
			}

			$chk .='<div style="padding-left:50px;" class=" ' . $toc . ' ">';
			$chk .=	'<div class="checkbox ' . $toc . ' ">
						<label>
							<input class="chk_hkt" type="checkbox" value=' . $id2 .' name="chk_tools[]"> ' . $t_name . '
							<i class="fa fa-square-o small"></i>
						</label>
					</div>';
			 $chk .='<br></div>';

		}
	}

	return $chk;

}
# End Spot Check 	#

##QUALITY END##
function list_locale($id){
	$query = "SELECT * FROM locale";

	if ($id==null) {
		$list = '<select  class="s_list populate placeholder" name="locale" id="s_locale">';
		$list .= '<option value="">-- Select a Locale --</option>';
	}else{
		$list = '<option value="">-- Select a Locale --</option>';
	}
	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['id'])
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['locale_id'] . '</option>';
		else
			$list .= '<option value="' . $row['id'] . '">' . $row['locale_id'] . '</option>';
	}
	if ($id==null) {
		$list .= "</select>";
	}
	return $list;
}

function list_year($id){

		$list = '<select  class="s_list populate placeholder" name="year" id="s_year">';
		$list .= '<option value="">-- Select a Year --</option>';
		$list .= '<option value="1" >2014</option>';
		$list .= '<option value="2" selected=selected>2015</option>';
		$list .= '<option value="3" selected=selected>2016</option>';
		$list .= "</select>";

	return $list;
}



function list_dept($id){
	$query = "SELECT * FROM emp_group";

	if ($id==null) {
		$list = '<select  class="s_list" name="dept" id="s_locale">';
		$list .= '<option value="">-- Select a Department --</option>';
	}else{
		$list = '<option value="">-- Select a Department --</option>';
	}

	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['id'])
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['group_name'] . '</option>';
		else
			$list .= '<option value="' . $row['id'] . '">' . $row['group_name'] . '</option>';
	}
	if ($id==null) {
		$list .= "</select>";
	}

	return $list;
}
function list_mos($id){
	$query = "SELECT * FROM fp_mos";

	if ($id==null) {
		$list = '<select  class="s_list fp_mos" name="mos" id="s_mos">';
		$list .= '<option value="">-- Select Month --</option>';
	}else{
		$list = '<option value="">-- Select Month--</option>';
	}

	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['id'])
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['mos_def'] . '</option>';
		else
			$list .= '<option value="' . $row['id'] . '">' . $row['mos_def'] . '</option>';
	}
	if ($id==null) {
		$list .= "</select>";
	}

	return $list;
}
function list_hk($id, $uroles, $locale){
	// echo 'id: ' . $id . 'cred: ' . $uroles . 'loc' . $loc;
	$query = "SELECT trans.eid, trans.last, trans.first, trans.grp_ldr, trans.middle, p.position, l.locale_id, j.Job_level, e.emp_stat, eg.group_name
				FROM emp trans
				LEFT JOIN position p ON p.id = trans.position
				LEFT JOIN locale l ON l.id = trans.locale
				LEFT JOIN job_level j ON j.id = trans.Job_level
				LEFT JOIN emp_status e ON e.id = trans.emp_status
				LEFT JOIN emp_group eg ON eg.id = trans.emp_group";
	echo $uroles;
	echo $locale;
	if (isset($uroles)) {
		$query .= " WHERE trans.is_deleted=0";
		if ($uroles==1) {
			$query .= " AND trans.emp_group=4";
		}elseif ($uroles==2) {

		}elseif ($uroles==3) {

		}else{
			$query .=" AND eg.group_id='HK' AND trans.grp_ldr!=1 AND l.id=$locale";
		}
	}

	// echo $query;

	$result = mysql_query($query);
	$list .= '<option value="" selected="selected"> -Select Housekeeper- </option>';
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$last 			= $row['last'];
		$first 			= $row['first'];
		$middle 		= $row['middle'];
		$pos 			= $row['position'];

		$name = $last . ", " . $first . " " . $middle;

		$list .= '<option value="' . $row['eid'] . '">' . $name . '</option>';

	}

	return $list;
}
function list_room($id, $uroles, $locale){
	// echo 'id: ' . $id . 'cred: ' . $uroles . 'loc' . $locale;
	$query = "SELECT trans.id, trans.room_no, trans.locale_id, r.room_type FROM rooms trans
				JOIN locale l 		ON l.locale_id=trans.locale_id
				JOIN room_types r 	ON r.id=trans.room_type_id";

	// echo $query;
	if (isset($uroles)) {
		$query .= " WHERE trans.is_deleted=0";
		if ($uroles==1) {

		}elseif ($uroles==2) {
			$query .= " AND l.id=$locale";
		}elseif ($uroles==3) {
			$query .= " AND l.id=$locale";
		}else{
			$query .=" AND l.id=$locale";
		}
	}

	$result = mysql_query($query);
	$list .= '<option value="" selected="selected"> -Room #- </option>';
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id 			=$row['id'];
		$room_no 		=$row['room_no'];
		$room_type 		=$row['room_type'];
		$loc 		=$row['locale_id'];

		$name = $room_no . " - " . $room_type;

		$list .= '<option value="' . $id . '">' . $name .  '</option>';

	}

	return $list;
}

function list_toc($id, $uroles, $locale){
	// echo 'id: ' . $id . 'cred: ' . $uroles . 'loc' . $locale;
	$query = "SELECT * FROM types_of_cleaning";

	$result = mysql_query($query);
	$list .= '<option value="" selected="selected"> -Select Cleaning Type- </option>';
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id 			=$row['id'];
		$toc 			=$row['toc'];

		$list .= '<option value="' . $id . '">' . $toc . '</option>';

	}

	return $list;
}


function list_toa($id){
	$query = "SELECT * FROM type_of_assessment";

	if ($id==null) {
		$list = '<select  class="s_list" name="toa" id="s_toa" >';
		$list .= '<option value="">-- Select a Type Of Assessment --</option>';
	}else{
		$list = '<option value="">-- Select a Type Of Assessment --</option>';
	}

	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['toa_id'])
			$list .= '<option value="' . $row['toa_id'] . '" selected="selected">' . $row['toa_name'] . '</option>';
		else
			$list .= '<option value="' . $row['toa_id'] . '">' . $row['toa_name'] . '</option>';
	}

	if ($id==null) {
		$list .= "</select>";
	}
	return $list;
}
function list_nc_class($id){

	$query = "SELECT * FROM nc_classification";
	if ($id==null) {
		$list = '<select  class="s_list" name="nc_class" id="s_ncc">';
		$list .= '<option value="">-- Select a NC Classification --</option>';
	}else{
		$list = '<option value="">-- Select a NC Classification --</option>';
	}

	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['nc_id']){
			$list .= '<option value="' . $row['nc_id'] . '" selected="selected">' . $row['nc_name'] . '</option>';

		}else
			$list .= '<option value="' . $row['nc_id'] . '">' . $row['nc_name'] . '</option>';
	}

	if ($id==null) {
		$list .= "</select>";
	}
	return $list;
}
function list_cls($id){

	$query = "SELECT * FROM cpar_clauses";
	if ($id==null) {
		$list = '<select  class="s_list" name="f_cls" id="f_cls">';
		$list .= '<option value="">-- Select a Clause--</option>';
	}else{
		$list = '<option value="">-- Select a Clause --</option>';
	}

	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($id==$row['id']){
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['clauses'] . '</option>';

		}else
			$list .= '<option value="' . $row['id'] . '">' . $row['clauses'] . '</option>';
	}

	if ($id==null) {
		$list .= "</select>";
	}
	return $list;
}
function check_dept($id){
	//query for DEPARTMENT CHECKBOX
	$query4 = "SELECT * FROM `emp_group`";
	$result4 = mysql_query($query4) or die (mysql_error());
		$chk = '<label class="col-sm-3 control-label" for="form-styles">Department</label>
	 			<div class="col-sm-8">';
	while($row 	= mysql_fetch_array($result4, MYSQL_ASSOC)){
		$grp_id		=	$row['id'];
		$g_name	=	$row['group_name'];
		$chk .=	'	<div class="checkbox">
					<label>
						<input class="c_chk_depts" type="checkbox" value=' . $grp_id .' name="chk_depts[]" > ' . $g_name . '
						<i class="fa fa-square-o small"></i>
					</label>
					</div>';
	}
		$chk .= '</div>';
		return $chk;
	//END department checkbox
}
function dateletterformatDB($letterf){
	$timestamp = strtotime($letterf);
	$letterf = date("Y/m/d", $timestamp);
	return $letterf;
}
function dateletterformatdbf($letterf){
	$timestamp = strtotime($letterf);
	$letterf = date('Y-m-d', $timestamp);
	return $letterf;
}
function dateletterformatmdy($letterf){
	$timestamp = strtotime($letterf);
	$letterf = date("m/d/Y", $timestamp);
	return $letterf;
}
function dateletterformatmodtyr($letterf){
	$timestamp = strtotime($letterf);
	$letterf = date("F d, Y", $timestamp);
	return $letterf;
}
function MySQL_NOW(){ return date('Y-m-d'); }
function downloadcpar($id){
	//call the function getdata to get the query from sent id
	$getcpardata = getcpardata($id);
	// print"<pre>";
	// print_r($getcpardata);
	// print"</pre>";
	foreach($getcpardata as $getcpardatas){
		ob_start();
		$rtf = file_get_contents('../docs/iqa_findings/cparword.rtf');
		// $rtf = "asdfsdfsdfsdfsdfsdfsdfdf";
		header ('Content-type: application/msword');
		// header ('Content-Disposition: inline; filename:jobapp.rtf');
		header( "Content-disposition: filename=form2.doc");
		echo $rtf;
		die ();
		ob_flush();
	}
}
function getcpardata($id){
	$getcpardata = array();
	$query="select * from emp_group where id=$id";
 	// echo $query;
	$query = mysql_query($query);
	while($row = mysql_fetch_assoc($query)){
		$getcpardata[] = $row;
		}
	return $getcpardata;
}
function getemp_complete($id){
	$emp = array();
	$query=emp_querys($id,null);
 	// echo $query;
	$query = mysql_query($query);
	while($row = mysql_fetch_assoc($query)){
		$emp = $row;
		}
	return $emp;
}
function getuser($id){
	$user = array();
	$query=user_query(null);
 	$query .= " AND trans.id=$id";
 	// echo $query;
	$query = mysql_query($query);
	while($row = mysql_fetch_assoc($query)){
		$user = $row;
		}
	return $user;
}
function getmonth($mos){
	// echo $mos;
	$query = "SELECT * FROM fp_mos WHERE id=$mos";
	$result = mysql_query($query);
	while($row 	= mysql_fetch_array($result, MYSQL_ASSOC)){
		$mos	=	$row['mos_def'];
	}
	return $mos;
}
function getloc($loc){
	// echo $loc;
	$query = "SELECT * FROM locale WHERE id=$loc";
	$result = mysql_query($query);
	while($row 	= mysql_fetch_array($result, MYSQL_ASSOC)){
		$loc	=	$row['locale_id'];
	}
	return $loc;
}
function getdept($dept){
	// echo $dept;
	$query = "SELECT * FROM emp_group WHERE id=$dept";
	$result = mysql_query($query);
	while($row 	= mysql_fetch_array($result, MYSQL_ASSOC)){
		$dept	=	$row['group_id'];
	}
	return $dept;
}
function get_year_id($yr){
	$query = "SELECT * FROM fp_year WHERE yr=$yr";
	$result = mysql_query($query);
	while($row 	= mysql_fetch_array($result, MYSQL_ASSOC)){
		$yr	=	$row['id'];
	}
	return $yr;
}

function get_year_by_id($id){
	$query = "SELECT * FROM fp_year WHERE id=$id";
	$result = mysql_query($query);
	while($row 	= mysql_fetch_array($result, MYSQL_ASSOC)){
		$yr	=	$row['yr'];
	}
	return $yr;
}

function percent($number){
    $number = round($number,2);
    return $number * 100 . '%';
}
#HK tools
// function hk($cred, locale){
// }
#END HK tools
##Deviation##
function dev_list($id){
	$query = "SELECT trans.id, dd.dev_department, ds.dev_section, dc.dev_categories, dl.dev_label, trans.dev
	FROM dev_table trans
	LEFT JOIN dev_dept dd ON dd.id=trans.dept_id
	LEFT JOIN dev_sec ds ON ds.id=trans.sec_id
	LEFT JOIN dev_cat dc ON dc.id=trans.cat_id
	LEFT JOIN dev_label dl ON dl.id=trans.lbl_id WHERE trans.is_deleted=0 AND trans.dept_id=$id ORDER BY dl.dev_label";
	return $query;
}
function dev_dept_filter(){
	$query = "SELECT * FROM dev_dept WHERE is_deleted=0";
	$result = mysql_query($query);
	$list = '<div class="btn-group" data-toggle="buttons">';
	while($row 	= mysql_fetch_array($result, MYSQL_ASSOC)){
		$id 	= 	$row['id'];
		$dept	=	$row['dev_department'];

		$list .= '<label class="btn btn-success">
					<input type="radio" name="options" value="'.$id.'" class="rad_filter" id="option1">'.$dept.'</label>';

	}
	$list .= '</div>';
	return $list;
}
##END Deviation##


/* Report Select Global Function  */

function locale_report_gen($id, $uroles, $loc){
	$query = "SELECT * FROM locale";

	if (isset($uroles)) {
		if ($uroles==2 OR $uroles==3 OR $uroles==4 OR $uroles==6) {
			$query .=" WHERE id=$loc";
			$numrow = 1;
		}else{
			$list .= '<option value="" selected="selected"> -Select Locale- </option>';
		}
	}
	// echo $uroles;
	// echo $query;
	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		if ($numrow==1) {
			$list .= '<option value="' . $row['id'] . '" selected="selected">' . $row['locale_id'] . '</option>';
		}else{
			$list .= '<option value="' . $row['id'] . '">' . $row['locale_id'] . '</option>';
		}
	}

	return $list;
}

/* Report Select Global Function  */


?>