	<?php
		include("../include/db.php");
		include("../include/functions.php");
		include("../include/auth.php");
	// echo 	$nn		.	$loc.		'grp ' . $grp	. 'cred ' .$cred	;
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
				<li><a href="#">Financial Perspective</a></li>
				<li><a href="#">HK Supplies</a></li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-table"></i>
						<span>HK Supplies</span>
					</div>
					<div class="box-icons">
						<?php
						if ($cred==1) {
							echo 	'<a class="add-link">
										<i class="fa fa-plus"></i>
									</a>';
							}

						if ($cred==1) {
							echo	'<a class="filter-link">
										<i class="fa fa-filter"></i>
									</a>';
							}
						?>
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
				<form id="add_form" method="post" class="form-horizontal">
					<input type="hidden" name="action" value="hk_add_budget" />
					<div class="add-box"><br>
						<div class="form-group">
							<label class="col-sm-5 control-label" for="form-styles"><center><h4>Budget Form</h4></center></label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles">Locale</label>
							<div class="col-sm-3" >
								<select class="populate placeholder s_list" name="locale" id="fp_locale_add">
								</select>
							</div>

						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles">Month</label>
							<div class="col-sm-3 fp_mos_add" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles">Year</label>
							<div class="col-sm-3 fp_yr_add" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles">Budget</label>
							<div class="col-sm-3"id="fp_budget_add">
								<input type="text" name="input_budget_add" id="input_budget_add" class="form-control" placeholder="Budget">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles"></label>
							<div class="col-sm-3" >
								<button id="f_addbudget" type="submit" class="btn btn-primary btn-lg"><span><i class="fa fa-plus txt-Primary"></i></span>  Add Budget</button>
							</div>
						</div>

					</div>
				</form>
				<form id="filter_form" method="post" class="form-horizontal">
					<input type="hidden" name="action" value="form_filter" />
					<div class="filter-box"><br>

							<div class="form-group">
								<label class="col-sm-2 control-label" for="form-styles">Locale</label>
								<div class="col-sm-3" >
									<select class="populate placeholder s_list" name="locale" id="fp_locale_f">
									</select>
								</div>
								<label class="col-sm-2 control-label" for="form-styles">Year</label>
								<div class="col-sm-3 fp_yr_add" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="form-styles"></label>
								<div class="col-sm-3">
									<button id="fp_filter" type="submit" class="btn btn-primary btn-lg"><span><i class="fa fa-filter txt-Primary"></i></span> Filter</button>
								</div>
							</div>
					</div>
				</form>

				<div class="box-content no-padding table-responsive ">
					<table class="table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;">
						<thead>
							<tr>
								<th>Locale</th>
								<th>Month</th>
								<th>Budget</th>
								<th>Actual Expenses</th>
								<th>Savings(%)</th>
								<th>Rating</th>
								<th>Year</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="f_pck_table">
							<?php
								$query = fp_pck_hk($cred, $loc);
								// echo $query;

								$result = mysql_query($query)or die('query failed ' . mysql_error()  );
								// echo $query;
								// echo 'panget';
								while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
									$id 		= $row['id'];
									$edit_budget = '';
									if ($cred==1 OR $grp==7 ){
										$edit_budget = '<button value="' . $id . '"placeholder="Another info" data-toggle="tooltip" data-placement="top" title="Edit Budget!" class="edit_hk_budget ttips btn btn-sm btn-primary" type="button" data-toggle="tooltip">
														<i class="fa fa-edit"></i></button>';
									}

									$id 		= $row['id'];
									$loc 		= $row['locale_id'];
									$g_id 		= $row['group_id'];
									$mos 		= $row['mos_def'];
									$bud 		= $row['budget'];
									$ac_bud 	= $row['actual_budget'];

									$diff 		= $bud - $ac_bud;
									$sav 		= $diff / $bud;
									$sav_f 		= $diff / $bud;

									$sav 		= percent($sav);

									$bud 		= number_format($bud, 2);
									$ac_bud 	= number_format($ac_bud, 2);
									$yr 		= $row['fp_yr'];

									if ($ac_bud==0) {
										$rating = "-";
										$sav = "-";
									}elseif($sav_f>.1) {
										$rating = "O";
									}elseif ($sav_f>0) {
										$rating = "S";
									}else{
										$rating = "P";
									}

									$tab = '<tr class="vert-align">
												<td class="tdloc">
													' . $loc . '
												</td>
												<td>
													' . $mos . '
												</td>
												<td class="hk_budget_td">
													' . $bud . '
												</td>
												<td class="hk_expenses_td">
													' . $ac_bud . '
												</td>
												<td>
													' . $sav . '
												</td>
												<td>
													' . $rating . '
												</td>
												<td class="tdyear">
													' . $yr . '
												</td>
												<td>
													<button value="' . $id . '"placeholder="Another info" data-toggle="tooltip" data-placement="top" title="Add/Edit Expenses!" class="edit_hk_fin ttips btn btn-sm btn-warning" type="button" data-toggle="tooltip">
						                			<i class="fa fa-edit"></i></button> '.$edit_budget.'
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
	<script src="plugins/jquery-number-master/jquery.number.js"></script>
	<script type="text/javascript">
	$(function(){
		$('.preloader').show();
		$('.ttips').tooltip();
		var_loc = 0;
		var_dept = 0;
		var_mos = 0;
		function sanitize(id){
			// console.log('sanitize')
			id = id.replace("\r\n", "");
			id = id.replace(/[^\\]\\|\n/g, " ").trim();
			return id;
		}
		$(".filter-box, .add-box").hide()

		$('.filter-link').click(function() {
			$( ".filter-box" ).slideToggle( "fast", function() {
			// Animation complete.
				});
			if(!$( ".add-box" ).is(':hidden')){
				$( ".add-box" ).hide()
			}
		});

		$('.add-link').click(function() {
			$( ".add-box" ).slideToggle( "fast", function() {
			// Animation complete.
			});
			if(!$( ".filter-box" ).is(':hidden')){
				$( ".filter-box" ).hide()
			}
		})

		$('#fp_filter').click(function(){
			$( ".filter-box" ).hide()
			$('.table .tdloc').parent().show()
			var yr = $('#filter_form #s2id_s_year').text()
			var loc = $('#s2id_fp_locale_f').text()
			// alert(loc);
			loc = sanitize(loc)
			yr = sanitize(yr)
			$('.table .tdloc:not(:contains('+loc+'))').parent().hide()

			$('.table .tdyear:not(:contains('+yr+'))').parent().hide()

			return false;
		})
//-------------------call list item------------------------------//
		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {user:'<?php echo $user;?>', action: "locale_report_gen"},
	        success: function(id){
				// alert(id)
				$('#fp_locale_f').html(id)
				$('#fp_locale_add').html(id)
				var_loc = 1
				s_reload()
			}
		})
		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {action: "f_dept"},
	        success: function(id){
				// alert(id)
				$('#fp_dept_add').html(id)
				$('#fp_dept_f').html(id)
				var_dept = 1
				s_reload()
			}
		})
		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {action: "f_mos"},
	        success: function(id){
				// alert(id)
				$('.fp_mos_add').html(id)
				$('.fp_mos_filter').html(id)
				var_mos = 1
				s_reload()
			}
		})
		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {action: "f_year"},
	        success: function(id){
				// alert(id)
				$('.fp_yr_add').html(id)
				// $('.fp_mos_filter').html(id)
				var_mos = 1
				s_reload()
			}
		})

		function s_reload(){
			if (var_loc==1 && var_dept==1 && var_mos==1) {
				$('.preloader').hide();
				reloadsel()
			};
		}
//------------------- list-----------------------------------------//
//-------------------Form Validator------------------------------//
		function DemoFormValidatorAdd(){
			$('#add_form').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
					locale: {
						validators: {
							notEmpty: {
								message: 'The locale field is required and can\'t be empty'
							}
						}
					},
					mos: {
						validators: {
							notEmpty: {
								message: 'The Month field is required and can\'t be empty'
							}
						}
					},

					year: {
						validators: {
							notEmpty: {
								message: 'The Year field is required and can\'t be empty'
							}
						}
					},

					input_budget_add:{
						validators:{
							notEmpty: {
								message: 'Monthly Budget field is required and can\'t be empty'
							},
							numeric: {
								message: 'The value can contain only digits'
							}
						}
					}
				},
				submitHandler: function(form) {
					   $.ajax({
			            type: 'POST',
			            url: 'ajax/ajax.php',
			            data: $('#add_form').serialize(),
			            success: function(msg) {
			                // view_function(msg)
			                if (msg=="success") {
			                	LoadAjaxContent('ajax/fin_pershk.php')
			                }else{
			                	alert(msg);
			                };

			            }
		            });
				}
			});
		}
//-------------------Form Validator------------------------------//
// actions //

$('.edit_hk_fin').on('click',function(e){
	var x = $(this).val()
	console.log('edit expenses ', x)
	edit_function(x);
})
function edit_function(x){
	var buttons = $('<button class="event_cancel btn btn-danger btn-label-left pull-right">'+
					'<span><i class="fa fa-times"></i></span>'+
					'Close'+
					'</button>'+
					'<button class="update_hk_expenses btn btn-warning btn-label-left pull-right">'+
					'<span><i class="fa fa-edit "></i></span>'+
					'Update'+
					'</button>');
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {hk_id:x, action: "edit_expenses"},
        success: function(msg) {
        	OpenModalBox('Add/Edit HK Expenses</div>', msg, buttons)
        	$('.hk_exp').number( true, 2 );
        	$('.event_cancel').on('click', function(){
				CloseModalBox();
				console.log("click close")
			});
			$('.update_hk_expenses').on('click', function(){
				$(this).prop('disabled', true);
				var par = $(this).parent().parent()
				var bud  = par.find('.hk_exp').val()
				bud = sanitize(bud)
				console.log(bud)
				if (bud=="" || bud==0) {
					par.find('.hk_exp').tooltip('show')
					$(this).prop('disabled', false);
				}
				else{
					// alert('ajax')
					$.ajax({
				        type: 'POST',
				        url: 'ajax/ajax.php',
				        data: {hk_id:x, bud:bud, action: "update_expenses"},
				        success: function(msg) {
				        	update_hk_table(msg,bud);
				        	CloseModalBox();
				        }
				    });
				};
			});
        }
    })
}

$('.edit_hk_budget').on('click',function(e){
	var x = $(this).val()
	// console.log('edit expenses ', x)
	edit_budget_function(x);
})
function edit_budget_function(x){
	var buttons = $('<button class="event_cancel btn btn-danger btn-label-left pull-right">'+
					'<span><i class="fa fa-times"></i></span>'+
					'Close'+
					'</button>'+
					'<button class="update_hk_budget btn btn-warning btn-label-left pull-right">'+
					'<span><i class="fa fa-edit "></i></span>'+
					'Update'+
					'</button>');
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {hk_id:x, action: "edit_budget"},
        success: function(msg) {
        	OpenModalBox('Edit HK Budget</div>', msg, buttons)
        	$('.hk_bud').number( true, 2 );
        	$('.event_cancel').on('click', function(){
				CloseModalBox();
				// console.log("click close")
			});
			$('.update_hk_budget').on('click', function(){
				$(this).prop('disabled', true);
				var par = $(this).parent().parent()
				var bud  = par.find('.hk_bud').val()
				bud = sanitize(bud)
				// console.log(bud)
				if (bud=="" || bud==0) {
					par.find('.hk_bud').tooltip('show')
					$(this).prop('disabled', false);
				}
				else{
					// alert('ajax')
					$.ajax({
				        type: 'POST',
				        url: 'ajax/ajax.php',
				        data: {hk_id:x, bud:bud, action: "update_budget"},
				        success: function(msg) {
				        	update_hk_table_budget(msg,bud);
				        	CloseModalBox();
				        }
				    });
				};
			});
        }
    })
}


function update_hk_table(x,bud){
	bud = $.number( bud, 2 );
	// console.log(bud);
	var x = $('.edit_hk_fin[value='+x+']')
	x.parent().parent().find('.hk_expenses_td').text(bud)
}
function update_hk_table_budget(x,bud){
	bud = $.number( bud, 2 );
	// console.log(bud);
	var x = $('.edit_hk_fin[value='+x+']')
	x.parent().parent().find('.hk_budget_td').text(bud)
}
// end actions //

		function reloadsel(){
			function DemoSelect2(){
			$('.s_list').select2();
			}
			LoadSelect2Script(DemoSelect2);
			LoadBootstrapValidatorScript(DemoFormValidatorAdd);
		}

	})
	</script>
