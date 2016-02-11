<?php
require("../include/db.php");
require("../include/functions.php");
$query = user_query(null);
// echo $query;
$result = mysql_query($query)or die('query failed ' . mysql_error()  );
// echo $query;
// echo 'panget';
?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#">Employee</a></li>
			<li><a href="#">Users</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-users"></i>
					<span>Users</span>
				</div>
				<div class="box-icons">
					<a class="add-user ttips" data-placement="left" title="Add User">
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
							<th>Locale</th>
							<th>Group</th>
							<th>Roles</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
						<?php
						while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
							// var_dump($row);
						$eid 		= $row['id'];
						$loc 		= $row['locale_id'];
						$nname 		= $row['nickname'];
						$last 		= $row['last'];
						$first 		= $row['first'];
						$middle 	= $row['middle'];
						$grp 		= $row['group_name'];
						$userroles 	= $row['userroles_name'];

						$tab = '<tr>
									<td>
										'. $eid .'
									</td>
									<td class="username">
										' . $first .' ' . $last . ' ('. $nname .')'. '
									</td>
									<td>
										' . $loc . '
									</td>
									<td>
										' . $grp . '
									</td>
									<td>
										' . $userroles . '
									</td>
									<td>
										<button value="' . $eid . '"placeholder="Another info" data-toggle="tooltip" data-placement="top" title="Update Employee!" class="user_edit ttips btn btn-sm btn-primary" type="button" data-toggle="tooltip">
						                <i class="fa fa-edit"></i>
						                </button>
						                <button value="' . $eid . '"placeholder="Another info" data-toggle="tooltip" data-placement="top" title="Reset Password" class="user_resetpw ttips btn btn-sm btn-warning" type="button" data-toggle="tooltip">
						                <i class="fa fa-refresh"></i>
						                </button>
						                <button value="' . $eid . '"placeholder="Another info" data-toggle="tooltip" data-placement="top" title="Delete User" class="user_delete ttips btn btn-sm btn-danger" type="button" data-toggle="tooltip">
						                <i class="fa fa-times"></i>
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
	$('.add-user').on('click', function(e){
		// alert('click')
		$('.preloader').show();
		add_user();
	})
	function add_user(){
		// console.log(x)
		var buttons = $('<button type="cancel" class="event_cancel btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-times txt-danger"></i></span>'+
							'Cancel'+
							'</button>');
		$.ajax({
            type: 'POST',
            url: 'ajax/ajax.php',
            data: {action: "add_user"},
            success: function(msg) {
            	$('.preloader').hide();
               	OpenModalBox('<div>Add User</div>', msg, buttons)
               	$('.add_user_btn').on('click', function(){

					$.ajax({
			            type: 'POST',
			            url: 'ajax/ajax.php',
			            data: $('.add_user').serialize(),
			            success: function(msg) {
			            	if (msg=="success") {
			            		alert('User Added Successfully')
			            		// LoadAjaxContent('ajax/users.php')
			            		CloseModalBox();
			            	}else{
			            		alert('failed');
			            	};
			            }
			    	});
					return false;
				});
               	$('.event_cancel').on('click', function(){
					CloseModalBox();
				});

            }
	    })
	}

	$('.user_edit').on('click', function(e){
		$('.preloader').show();
		// console.log("click edit")
		var x = $(this).val()
		// alert('click ')
		edit_user(x);

	})
	function edit_user(x){
		// console.log(x)
		var buttons = $('<button type="cancel" class="event_cancel btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-times txt-danger"></i></span>'+
							'Cancel'+
							'</button>');
		$.ajax({
            type: 'POST',
            url: 'ajax/ajax.php',
            data: {id:x,action: "edit_user"},
            success: function(msg) {
            	$('.preloader').hide();
               	OpenModalBox('<div>Update User</div>', msg, buttons)
               	$('.event_cancel').on('click', function(){
					CloseModalBox();
				});
				reloadmodal()
				/* edit_user1 */
				$('.update_user_btn1').on('click', function(){
					$.ajax({
			            type: 'POST',
			            url: 'ajax/ajax.php',
			            data: $('.edit_user1').serialize(),
			            success: function(msg) {
			            	if (msg=="Success") {
			            		alert('User Updated Successfully')
			            		// LoadAjaxContent('ajax/users.php')
			            		CloseModalBox();
			            	}else{
			            		alert(msg);
			            	};
			            }
			    	});
					return false;
				});
				/* edit_user2 */
				$('.update_user_btn2').on('click', function(){
					$.ajax({
			            type: 'POST',
			            url: 'ajax/ajax.php',
			            data: $('.edit_user2').serialize(),
			            success: function(msg) {
			            	if (msg=="Success") {
			            		alert('User Updated Successfully')
			            		// LoadAjaxContent('ajax/users.php')
			            		CloseModalBox();
			            	}else{
			            		alert(msg);
			            	};
			            }
			    	});
					return false;
				});
            }
	    })

	}

	$('.user_delete').on('click', function(e){

		// console.log("click edit")
		var x = $(this).val()
		// alert('click ')
		table_row = $(this).parent().parent()
		var name = table_row.find('.username').text()
		name = sanitize(name)

		// alert(name)
		var buttons = $('<button type="cancel" class="event_cancel btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-times txt-danger"></i></span>'+
							'Cancel'+
							'</button>'+
						'<button type="cancel" class="event_delete btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-trash-o txt-danger"></i></span>'+
							'Delete'+
							'</button>');


		OpenModalBox('<div>Delete User</div>', '<div>Delete User '+name+'?</div>', buttons)

		$('.event_cancel').click(function(){
			CloseModalBox();
		})

		$('.event_delete').on('click', function(){
			table_row.hide();
			$.ajax({
	            type: 'POST',
	            url: 'ajax/ajax.php',
	            data: {id:x, action: "DeleteUser"},
	            success: function(msg) {
	            	alert(msg)
	            	CloseModalBox();
	            }
	    	});
			return false;
		});
	})

	function sanitize(id){
		// console.log('sanitize')
		id = id.replace("\r\n", "");
		id = id.replace(/[^\\]\\|\n/g, " ").trim();
		return id;
	}

	function reloadmodal(){
		$('.s_list').select2();
		// LoadBootstrapValidatorScript(DemoFormValidatorUpdate);
		// LoadBootstrapValidatorScript(DemoFormValidatorUpdate2);
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
