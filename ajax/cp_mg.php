	<?php 
		include("../include/db.php");
		include("../include/functions.php");
		include("../include/auth.php");
	?>

	<style type="text/css">
	.table-datatable *, .table-datatable *:after, .table-datatable *:before {
		padding-bottom: 7px;
	}
	.table-vcenter td {
	   vertical-align: middle!important;
	}
	@media only screen and (max-width: 800px) {
	#unseen table td:nth-child(2),
	#unseen table th:nth-child(2) {display: none;}
	}
	@media only screen and (max-width: 640px) {
	#unseen table td:nth-child(4),
	#unseen table th:nth-child(4),
	#unseen table td:nth-child(7),
	#unseen table th:nth-child(7),
	#unseen table td:nth-child(8),
	#unseen table th:nth-child(8){display: none;}
	}

	}
	</style>
	<div class="row">
		<div id="breadcrumb" class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="index.php">PMS</a></li>
				<li><a href="#">Customer Perspective</a></li>
				<li><a href="#">MG/TM/FOO</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-table"></i>
						<span>MG/TM/FOO</span>
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
				
				<div id="fp_pck_table" class="box-content no-padding table-responsive ">
					<table class="table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;">
						<thead>
							<tr>
								<th>Locale</th>
								<th>Department</th>
								<th>Employee</th>
								<th>Findings</th>
								<th>Rating</th>
							</tr>
						</thead>
						<tbody id="f_pck_table">
							<?php
								$query = fp_pck($cred, $loc);
								// echo $cred;
								$result = mysql_query($query)or die('query failed ' . mysql_error()  );
								// echo $query;
								// echo 'panget';
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
									$c_fin=0;
									
									$query2 = "SELECT * FROM assessment_findings_emp WHERE emp_emp=$eid AND is_deleted=0";
									$result2 = mysql_query($query2)or die('query failed ' . mysql_error()  );
									while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)){
										$id_2 		= $row2['ases_id'];
										
										$query3 = "SELECT trans.f_nc_class, nc.nc_def FROM `assessment_findings` trans
													left join nc_classification nc on nc.nc_id=trans.f_nc_class
													WHERE trans.id=$id_2 AND trans.f_type_of_a!=1";
										// echo $query3;
										$result3 = mysql_query($query3)or die('query failed ' . mysql_error()  );
										while($row3 = mysql_fetch_array($result3, MYSQL_ASSOC)){
											$nc 		= $row3['nc_def'];	

											$button .= '<button value="' . $id_2 . '"placeholder="Another info" data-placement="top" title="View Findings!" 
															class="f_view ttips btn btn-sm btn-danger" type="button" data-toggle="tooltip"
						                                    data-original-title="Edit this user">
						                                    '. $nc .'
						                                </button>';
						                    $c_fin++;
										}

									}
									if ($c_fin>=2) {
										$ratings = "P";
									}elseif ($c_fin==1) {
										$ratings = "S";
									}else{
										$ratings = "O";
									}

									$tab = '<tr class="vert-align">
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
													' . $button .'
												</td>
												<td>
													' . $ratings .'
												</td>
												
													
											</tr>';
									
									echo $tab;
									$id_2 = "";
									$nc= "";
									$button = '';
									$c_fin=0;
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
	$('.f_view').on('click', function(e){
		var x = $(this).val()
		view_function(x)	     
	})

	function view_function(x){
		var buttons = $('<button id="event_cancel" type="cancel" class="btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-times txt-danger"></i></span>'+
							'Close'+
							'</button>'+
							'<button id="event_cancel"  type="cancel" class="f_dl_cpar btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-download txt-primary"></i></span>'+
							'Download CPAR'+
							'</button>');
		$.ajax({
            type: 'POST',
            url: 'ajax/ajax.php',
            data: {id:x,action: "view_findings"},
            success: function(msg) {
               // alert(msg)
               	OpenModalBox('<div>Assessment Findings</div>', msg, buttons)
               	$('#event_cancel').on('click', function(){
					CloseModalBox();
					// console.log("click close")
				});
               	$('.f_edit_tri').on('click',function(e){
               		// console.log('tri')
               		edit_function(x);
               	})
               	$('.f_dl_cpar').on('click',function(e){
               		window.location.replace("docs/cpar.php?id="+x+"")
               	})		
            }  
	    })   
	}
	function reloadsel(){
		function DemoSelect2(){
		$('.s_list').select2();
		}
		LoadSelect2Script(DemoSelect2);
		// LoadBootstrapValidatorScript(DemoFormValidatorAdd);
	}
})	
</script>