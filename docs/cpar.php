<?php
$id = $_GET['id'];
// Include classes
include_once('../include/tbs_class.php'); // Load the TinyButStrong template engine
include_once('../include/tbs_plugin_opentbs.php'); // Load the OpenTBS plugin
include("../include/functions.php");

// prevent from a PHP configuration problem when using mktime() and date()
if (version_compare(PHP_VERSION,'5.1.0')>=0) {
	if (ini_get('date.timezone')=='') {
		date_default_timezone_set('UTC');
	}
}
$row 	=  view_findings_cpar($id);
$row2 	=  view_findings_dept_cpar($id);
$row3 	=  view_findings_emp_cpar($id);

// assessment findings //	
$remarks           		=$row['remarks']; 
$locale_id          	=$row['locale_id'];
$locale_name           	=$row['locale_name'];
$toa_def           		=$row['toa_def'];
$toa_name          		=$row['toa_name']; 
$date_of_assessment     =dateletterformatmdy($row['date_of_assessment']); 
$start_scope          	=dateletterformatmdy($row['start_scope']); 
$end_scope           	=dateletterformatmdy($row['end_scope']);
$im_date           		=$row['im_date']; 
$nc_def       			=$row['nc_def']; 
$nc_name          		=$row['nc_name']; 
$dev         			=$row['dev']; 
$dev_label         		=$row['dev_label']; 
$cls   					=$row['clauses']; 
$rca    				=$row['root_cause_analysis']; 
$cp    					=$row['cp_act']; 
// end assessment findings //

// emp //
$dept = $row2[0]['group_name'];
$last = $row3[0]['last'];
$first = $row3[0]['first'];
$middle = $row3[0]['middle'];
$emp = $last . ' ' . $first . ' ' . $middle;
//end emp //
// dept //

// end dept//
if ($im_date=="0000-00-00") {
	$im_date = '';
	$dept = '';
}else{
	$im_date =dateletterformatmdy($row['im_date']);
}


// print "<pre>";
// print_r($row);
// print "</pre>";
// Initalize the TBS instance
$TBS = new clsTinyButStrong; // new instance of TBS
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin
$TBS->VarRef['dept'] = $dept . ' Department';
$TBS->VarRef['emp'] = $emp;
$TBS->VarRef['doa'] = $date_of_assessment;
$TBS->VarRef['lbl'] = $dev_label .': ';
$TBS->VarRef['pnp'] = $dev_label;
$TBS->VarRef['dev'] = $dev;
$TBS->VarRef['cp'] = $cp;
$TBS->VarRef['cpdate'] = $im_date;
$TBS->VarRef['rca'] = $rca;
$TBS->VarRef['cls'] = $cls;


// ------------------------------
// Prepare some data for the demo
// ------------------------------
// $TBS->ResetVarRef(true);
// $TBS->VarRef['name'] = $x;
 
// Retrieve the user name to display
	
// A recordset for merging tables

// -----------------

$template = 'cpar.docx';
$TBS->LoadTemplate($template); // Also merge some [onload] automatic fields (depends of the type of document).

// ----------------------
// -----------------
// Output the result
// -----------------

// Define the name of the output file

$save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';
$output_file_name = str_replace('.', '_'.date('Y-m-d').$save_as.'.', $template);
if ($save_as==='') {
	// Output the result as a downloadable file (only streaming, no data saved in the server)
	$TBS->Show(OPENTBS_DOWNLOAD, $output_file_name ); // Also merges all [onshow] automatic fields.
	// Be sure that no more output is done, otherwise the download file is corrupted with extra data.
	exit();
} else {
	// Output the result as a file on the server.
	$TBS->Show(OPENTBS_FILE, $output_file_name); // Also merges all [onshow] automatic fields.
	// The script can continue.
	exit("File [$output_file_name] has been created.");
}