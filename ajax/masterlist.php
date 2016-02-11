<?php 
require("../include/db.php");
require("../include/functions.php");
$query = emp_query();
// echo $query;

$result = mysql_query($query)or die('query failed ' . mysql_error()  );
$query .= " WHERE trans.is_deleted=0 OR trans.is_resigned=0";
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
					<a class="add-employee ttips" data-placement="left" title="Add Employee">
							<i class="fa fa-plus"></i>
						</a>
					<a class="collapse-link">
						<i class="fa fa-chevron-up ttips" data-placement="left" title="Collapse"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand ttips" data-placement="left" title="Expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times ttips" data-placement="left" title="Close"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding table-responsive">
				
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th>Employee ID</th>
							<th>Name</th>
							<th>Position</th>
							<th>Locale</th>
							<th>Action</th>
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
										<button value="' . $eid . '"placeholder="Another info" data-toggle="tooltip" data-placement="top" title="Update Employee!" class="emp_edit ttips btn btn-sm btn-primary" type="button" data-toggle="tooltip">
						                <i class="fa fa-edit"></i>
						                </button>
									</td>
									
								</tr>';
						
						echo $tab;
						}
						?>
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php
		$query = emp_query();
		$query .= " WHERE trans.is_deleted=1 OR trans.is_resigned=1";
		// echo $query;

		$result = mysql_query($query)or die('query failed ' . mysql_error()  );
	?>
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-users"></i>
					<span>Resigned</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up ttips" data-placement="left" title="Collapse"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand ttips" data-placement="left" title="Expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times ttips" data-placement="left" title="Close"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding table-responsive">
				
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
					<thead>
						<tr>
							<th>Employee ID</th>
							<th>Name</th>
							<th>Position</th>
							<th>Locale</th>
							<th>Action</th>
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
										<button value="' . $eid . '"placeholder="Another info" data-toggle="tooltip" data-placement="top" title="Update Employee!" class="emp_edit ttips btn btn-sm btn-primary" type="button" data-toggle="tooltip">
						                <i class="fa fa-edit"></i>
						                </button>
									</td>
									
								</tr>';
						
						echo $tab;
						}
						?>
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
	$('.ttips').tooltip();
// Run Datables plugin and create 3 variants of settings
	$('.add-employee').on('click', function(e){
		// alert('click')
		$('.preloader').show();
		add_emp();
	})
	function add_emp(){
		// console.log(x)
		var buttons = $('<button type="cancel" class="event_cancel btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-times txt-danger"></i></span>'+
							'Cancel'+
							'</button>');
		$.ajax({
            type: 'POST',
            url: 'ajax/ajax.php',
            data: {action: "add_emp"},
            success: function(msg) {
            	$('.preloader').hide();
               	OpenModalBox('<div>Add Employee</div>', msg, buttons)
               	$('.event_cancel').on('click', function(){
					CloseModalBox();
				});
				reloadmodal()
            }  
	    })
	}

	$('.emp_edit').on('click', function(e){
		$('.preloader').show();
		// console.log("click edit")
		var x = $(this).val()
		// alert('click '+x)
		edit_emp(x);
			
	})
	function edit_emp(x){
		// console.log(x)
		var buttons = $('<button type="cancel" class="event_cancel btn btn-default btn-label-left pull-right">'+
						'<span><i class="fa fa-times txt-danger"></i></span>'+
						'Cancel'+
						'</button>');
		$.ajax({
            type: 'POST',
            url: 'ajax/ajax.php',
            data: {id:x,action: "edit_emp"},
            success: function(msg) {
            	$('.preloader').hide();
               	OpenModalBox('<div>Update Employee</div>', msg, buttons)
               	$('.event_cancel').on('click', function(){
					CloseModalBox();
				});
				reloadmodal()
				
            }  
	    })
	}
	function reloadmodal(){
		$('.s_list').select2();
		LoadBootstrapValidatorScript(DemoFormValidatorUpdate);
		LoadBootstrapValidatorScript(DemoFormValidatorUpdate2);
	}
	function DemoFormValidatorUpdate(){
		$('.add_form1').bootstrapValidator({
			message: 'This value is not valid',
			fields: {
				'empid[]': {
					validators: {
						notEmpty: {
							message: 'Employee ID is required and can\'t be empty'
						},
						stringLength: {
							min: 6,
							max: 6,
							message: 'Employee ID must be 6 characters long'	
						}
					}
				},
				'last[]': {
					validators: {
						notEmpty: {
							message: 'Please Enter Last Name'
						}
					}
				},
				'first[]': {
					validators: {
						notEmpty: {
							message: 'Please Enter First Name'
						}
					}
				},
				'middle[]': {
					validators: {
						notEmpty: {
							message: 'Please Enter Middle Name'
						}
					}
				},

				'loc[]':{
					validators: {
						notEmpty: {
							message: 'Please Select Locale'
						}
					}
				},
				'pos[]':{
					validators: {
						notEmpty: {
							message: 'Please Select Position'
						}
					}
				},
				'grp[]':{
					validators: {
						notEmpty: {
							message: 'Please Select Group'
						}
					}
				},
				'stat[]':{
					validators: {
						notEmpty: {
							message: 'Please Select Status'
						}
					}
				}
			},
			submitHandler: function(form) {
				$.ajax({
		            type: 'POST',
		            url: 'ajax/ajax.php',
		            data: $('.add_form1').serialize(),
		            success: function(msg) {
		                alert(msg)
		            }
	            });            
			}
		});
	}
	function DemoFormValidatorUpdate2(){
		$('.add_form2').bootstrapValidator({
			message: 'This value is not valid',
			fields: {
				'empid[]': {
					validators: {
						notEmpty: {
							message: 'Employee ID is required and can\'t be empty'
						},
						stringLength: {
							min: 6,
							max: 6,
							message: 'Employee ID must be 6 characters long'	
						}
					}
				},
				'last[]': {
					validators: {
						notEmpty: {
							message: 'Please Enter Last Name'
						}
					}
				},
				'first[]': {
					validators: {
						notEmpty: {
							message: 'Please Enter First Name'
						}
					}
				},
				'middle[]': {
					validators: {
						notEmpty: {
							message: 'Please Enter Middle Name'
						}
					}
				},

				'loc[]':{
					validators: {
						notEmpty: {
							message: 'Please Select Locale'
						}
					}
				},
				'pos[]':{
					validators: {
						notEmpty: {
							message: 'Please Select Position'
						}
					}
				},
				'grp[]':{
					validators: {
						notEmpty: {
							message: 'Please Select Group'
						}
					}
				},
				'stat[]':{
					validators: {
						notEmpty: {
							message: 'Please Select Status'
						}
					}
				}
			},
			submitHandler: function(form) {
				$.ajax({
		            type: 'POST',
		            url: 'ajax/ajax.php',
		            data: $('.add_form2').serialize(),
		            success: function(msg) {
		                alert(msg)
		            }
	            });            
			}
		});
	}
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
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();

})
</script>
