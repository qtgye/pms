<?php 
	include("../include/db.php");
	include("../include/functions.php"); 
	require("../include/auth.php");
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
.form-group{padding:0px;}
</style>
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">IQA</a></li>
			<li><a href="#">Assessment Findings Compilation</a></li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-table"></i>
					<span>List of Findings</span>
				</div>
				<div class="box-icons">
					<a class="filter-link ttips" data-placement="left" title="Filter">
						<i class="fa fa-filter"></i>
					</a>
					<a class="collapse-link ttips"  data-placement="left" title="Hide">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link ttips"  data-placement="left" title="Expand">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link ttips"  data-placement="left" title="Close">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<form id="filter_form" method="post" class="form-horizontal">
				<input type="hidden" name="action" value="form_filter" />
				<input type="hidden" name="user" value="<?php echo $user; ?>" />
				<div class="filter-box"><br>
					
						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles">Locale</label>
							<div class="col-sm-3" id="f_locale">
								
							</div>
							<label class="col-sm-2 control-label" for="form-styles">Type of Assessment</label>
							<div class="col-sm-3" id="f_toa">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles">NC Classification</label>
							<div class="col-sm-3" id="f_nc_class">
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles">Date Range</label>
							<div class="col-sm-3">
								<input type="text" id="f_start" class="form-control d_range" name="f_start" placeholder="Start Date">
							</div>
							<div class="col-sm-3">
								<input type="text" id="f_end" class="form-control d_range" name="f_end" placeholder="End Date">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles"></label>
							<div class="col-sm-3">
								<button id="f_filter" type="submit" class="btn btn-primary btn-lg"><span><i class="fa fa-filter txt-Primary"></i></span>  Filter</button>
							</div>
						</div>
				</div>
			</form>

			<div class="box-content no-padding table-responsive ">
				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;">
					<thead>
						<tr>
							<th>Locale</th>
							<th>Type</th>
							<th>Date</th>
							<th>NC Class</th>
							<th width="320px">Deviation</th>
							<!-- <th>Status</th> -->
							<th>Action</th><!--
							<th>Department</th>
							<th>Employee</th>-->
						</tr>
					</thead>
					<tbody id="f_table">
					<?php
					// $output =  view_findings_cpar(179);
					// print "<pre>";
					// print_r($output);
					// print "</pre>";
						$query = assessment_findings_compilation($loc, $grp, $cred);
						// echo $query;

						$result = mysql_query($query)or die('query failed ' . mysql_error()  );
						// echo $query;
						// echo 'panget';
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

											
							$tab = '<tr class="vert-align">
										<td >
											' 	. $loc 		. 	'
										</td>
										<td>
											' 	. $toa 		. 	'
										</td>
										<td>
											' 	. $date 	. 	'
										</td>
										<td>
											' 	. $nc 		. 	'
										</td>
										<td>
											' 	. $dev_text . 	'
										</td>
										
										<td>
											<button value="' . $id . '" type="button" data-toggle="tooltip"	data-original-title="View Findings" class="ttips f_view btn btn-primary btn-sm"><i class="fa fa-cloud-upload"></i></button>
											<button value="' . $id . '" type="button" class="f_delete btn btn-danger btn-sm"><i class="fa  fa-times-circle"></i></button>
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
$(document).ready(function() {
	$('.preloader').show();
	$('.ttips').tooltip();

	$('.filter-link').click(function() {
		// $( ".filter-box" ).toggle();
		$( ".filter-box" ).slideToggle( "fast", function() {
			// Animation complete.
		});
			
	})
	//main javascript
	//filter_reports
	$( ".filter-box" ).hide()
	x=null;
	var_loc = 0;
	var_toa = 0;
	var_nc = 0;
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {action: "f_locale"},
        success: function(id){
			// alert(id)
			$('#f_locale').html(id)
			var_loc = 1
			s_reload()
		}  
	})
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {action: "f_toa"},
        success: function(id){
			// alert(id)
			$('#f_toa').html(id)
			var_toa = 1
			s_reload()	
		}  
	})
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {action: "f_nc_class"},
        success: function(id){
			// alert(id)
			$('#f_nc_class').html(id)
			var_nc = 1
			s_reload()
		}  
	}) 
	function s_reload(){
		if (var_loc==1 && var_toa==1 && var_nc==1) {
			$('.preloader').hide();
			reloadsel()
		};
	}

	$('#f_filter').on('click', function(e){
		// alert('form click')
		var f_start = $('#f_start').val()
		var f_end = $('#f_end').val()
		if(f_start!="" || f_end!=""){
			if(f_start!="" && f_end!=""){
				callajax()
			}else{
				alert('Date Range must have start date and end date.')
			}
		}else{
			callajax()
		}
		
		function callajax(){
			$('.preloader').show();
			$.ajax({
		        type: 'POST',
		        url: 'ajax/ajax.php',
		        data: $('#filter_form').serialize(),
		        success: function(msg) {
		        	$('.preloader').hide();
		        	$( ".filter-box" ).hide()
		        	$('#f_table').html(msg)
		        	$('.f_view2').on('click', function(e){
						var x = $(this).val()
						view_function(x)	     
					})
					$('.f_delete2').on('click', function(e){
						console.log("click delete")
						var x = $(this).val()
						delete_function(x)
					})
		        }
		    });         
		}
		return false;
	})

	$('.d_range').datepicker()
	//end filter_reports
	function DemoFormValidatorUpdate(){
		$('#defaultForm').bootstrapValidator({
			message: 'This value is not valid',
			fields: {
				locale: {
					validators: {
						notEmpty: {
							message: 'The locale is required and can\'t be empty'
						}
					}
				},
				toa: {
					validators: {
						notEmpty: {
							message: 'Please select type of assessment'
						}
					}
				},
				input_date: {
					validators: {
						notEmpty: {
							message: 'The date of assessment is required and can\'t be empty'
						},
						date: {
	                        format: 'MM/DD/YYYY',
	                        message: 'The value is not a valid date'
	                    }
					}
				},
				start_date: {
					validators: {
						notEmpty: {
							message: 'The start date is required and can\'t be empty'
						},
						date: {
	                        format: 'MM/DD/YYYY',
	                        message: 'The value is not a valid date'
	                    }
					}
				},
				end_date: {
					validators: {
						notEmpty: {
							message: 'The end date is required and can\'t be empty'
						},
						date: {
	                        format: 'MM/DD/YYYY',
	                        message: 'The value is not a valid date'
	                    }
					}
				},
				nc_class: {
					validators: {
						notEmpty: {
							message: 'Please select Non-conformance Classification'
						}
					}
				},
				text_dev:{
					validators: {
						notEmpty: {
							message: 'Please Select Deviation'
						}
					}
				},
				text_root:{
					validators:{
						notEmpty: {
							message: 'The Root Cause Analysis field is required and can\'t be empty'
						},
						stringLength: {
							min: 2,
							max: 3000,
							message: 'The deviation must be more than 20 characters long'	
						}
					}
				},
				text_cp:{
					validators:{
						notEmpty: {
							message: 'The Corrective/Preventive Action is required and can\'t be empty'
						},
						stringLength: {
							min: 2,
							max: 3000,
							message: 'The Corrective/Preventive Action must be more than 20 characters long'	
						}
					}
				},
				im_date: {
					validators: {
						notEmpty: {
							message: 'The implementation date is required and can\'t be empty'
						},
						date: {
	                        format: 'MM/DD/YYYY',
	                        message: 'The value is not a valid date'
	                    }
					}
				},
				'chk_depts[]': {
	                validators: {
	                    choice: {
	                        min: 1,
	                        message: 'Please Select Department'
	                    }
	                }
	            },
	            'chk_emp[]': {
	                validators: {
	                    choice: {
	                        min: 1,
	                        message: 'Please Select Employee'
	                    }
	                }
	            }
			},
			submitHandler: function(form) {
				$.ajax({
		            type: 'POST',
		            url: 'ajax/ajax.php',
		            data: $('#defaultForm').serialize(),
		            success: function(msg) {
		                view_function(msg)
		            }
	            });            
			}
		});
	}
	$('.f_view').on('click', function(e){
		var x = $(this).val()	
		view_function(x)
		$('.preloader').show();	     
	})
	function view_function(x){
		var buttons = $('<button id="event_cancel" type="cancel" class="btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-times txt-danger"></i></span>'+
							'Close'+
							'</button>'+
							'<button id="event_cancel"  type="cancel" class="f_edit_tri btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-edit txt-success"></i></span>'+
							'Edit'+
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
            	$('.preloader').hide();	  
               // alert(msg)
               console.log(x)
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
	$('.f_edit').on('click', function(e){
		// console.log("click edit")
		var x = $(this).val()
		edit_function(x);
	})
	function edit_function(x){
		// console.log(x)
		var buttons = $('<button id="event_cancel" type="cancel" class="btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-times txt-danger"></i></span>'+
							'Cancel'+
							'</button>');
		$.ajax({
            type: 'POST',
            url: 'ajax/ajax.php',
            data: {id:x,user:"<?php echo $user; ?>",action: "edit_findings"},
            success: function(msg) {
               	OpenModalBox('<div>Edit Findings</div>', msg, buttons)
               	$('#event_cancel').on('click', function(){
					CloseModalBox();
				});
				reloadmodal()
				
            }  
	    })
	}
	$('.f_delete').on('click', function(e){
		console.log("click delete")
		var x = $(this).val()
		delete_function(x)
	})
	function delete_function(){
		var buttons = $('<button id="event_cancel" type="cancel" class="btn btn-default btn-label-left pull-right">'+
							'<span><i class="fa fa-ban txt-danger"></i></span>'+
							'Cancel'+
							'</button>'+
							'<button id="event_cancel"  type="cancel" class="btn btn-default btn-label-left">'+
							'<span><i class="fa fa-times txt-danger"></i></span>'+
							'Delete'+
							'</button>');
		OpenModalBox('<div>Delete Findings</div>', '<div>Delete this findings?</div>', buttons)
			$('#event_cancel').on('click', function(){
					CloseModalBox();
					// console.log("click close")
				});
	}
	WinMove();
	function reloadmodal(){
		$('.rad_filter').change(function(){
			$('#text_dev').wru()
			// alert('click')
			var x = $(this).val()
			$.ajax({
		        type: 'POST',
		        url: 'ajax/ajax.php',
		        data: {id:x, action: "load_devlist"},
		        success: function(msg) {
		        	$('#text_dev').html(msg)
		        }
		    })
		})
		var icons = {
			header: "ui-icon-circle-arrow-e",
			activeHeader: "ui-icon-circle-arrow-s"
		};
		$("#tabs").tabs();
		$(".tabs").tabs();
		// $(".accordion").accordion({
		// 	icons: icons,
		// 	collapsible: true,
		// 	heightStyle: "content",
		// 	active: false
		// });

		$("#accordion").accordion({
			icons: icons,
			collapsible: true,
			heightStyle: "content",
		});
		$("#accordion2").accordion({
			icons: icons,
			collapsible: true,
			heightStyle: "content",
			active: false
		});
		$('#input_date').datepicker();
		$('#im_date').datepicker();
		$('#input_date')
	        .on('change', function(e) {
	        	// console.log('change')
	            // Validate the date when user change it
	            re_bootrap('input_date');
	     	});
	   
	    $("#start_date").datepicker({
	    	numberOfMonths: 2,
	        onSelect: function(date){            
	            var date1 = $('#start_date').datepicker('getDate');           
	            var date = new Date( Date.parse( date1 ) ); 
	            date.setDate( date.getDate() + 1 );        
	            var newDate = date.toDateString(); 
	            newDate = new Date( Date.parse( newDate ) );                      
	            $('#end_date').datepicker("option","minDate",newDate);            
	        }
	    });
	         
	    $('#end_date').datepicker({numberOfMonths: 2})
	        .on('change', function(e) {
	        	// console.log('change')
	            // Validate the date when user change it
	            re_bootrap('end_date')
	            re_bootrap('start_date')
	        });

	    
		function sanitize(id){
			id = id.replace("\r\n", "");
			id = id.replace(/[^\\]\\|\n/g, " ").trim();
			return id;
		}
			$('.s_list2').select2();
			if(<?php echo $cred ?>!=1 && <?php echo $cred ?>!=5)
			$('.s_cred').select2("readonly", true);			

			$('.s_dept').select2({
				placeholder: "Select a Department"
			});
			$('.s_emp').select2({
				placeholder: "Select a Employee"
			});
		LoadBootstrapValidatorScript(DemoFormValidatorUpdate);
	}

	function reloadsel(){
		function DemoSelect2(){
			$('.s_list').select2();

		}
		LoadSelect2Script(DemoSelect2);
	}

});
</script>
