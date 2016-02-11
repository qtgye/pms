<?php 
require("../include/db.php");
require("../include/functions.php");

$query = emp_query();
// echo $query;

$result = mysql_query($query)or die('query failed');
// echo $query;
// echo 'panget';

?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#">Employee</a></li>
			<li><a href="#">Masterlist</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-users"></i>
					<span>Employee Masterlist</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th>Employee ID</th>
							<th>Name</th>
							<th>Position</th>
							<th>Locale</th>
							<th>Department</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
						
						<?php
						while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
						$eid 	= $row['eid'];	
						$first	= $row['first'];
						$last 	= $row['last'];
						$middle 	= $row['middle'];
						$pos 	= $row['position'];
						
						$loc 	= $row['locale_id'];
						$grp 	= $row['group_name'];
						
						$tab = '<tr>
									<td>
										'. $eid .'
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
									
									<td>
										' . $grp . '
									</td>
									
								</tr>';
						
						echo $tab;
						}
						?>
						

					<!-- End: list_row -->
					</tbody>
					<!--<tfoot>
						<tr>
							<th>Rank</th>
							<th>Name</th>
							<th>Net Worth</th>
							<th>Age</th>
							<th>Source</th>
							<th>Country of Citizenship</th>
						</tr>-->
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>
