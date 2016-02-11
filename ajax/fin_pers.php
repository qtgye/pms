	<?php
		include("../include/db.php");
		include("../include/functions.php");
		include("../include/auth.php");

		// 		$num = 1999999.45;
		// // $formattedNum = number_format($num)."<br>";
		// // echo $formattedNum;
		// $formattedNum = number_format($num, 2);
		// echo $formattedNum;
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
				<li><a href="#">Unused PCK</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-table"></i>
						<span>Unused PCK</span>
					</div>
					<div class="box-icons">
						<a class="add-savings">
							<i class="fa fa-plus"></i>
						</a>
						<?php
						if ($cred==1) {
							echo 	'<a class="filter-link">
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
				<form id="filter_form" method="post" class="form-horizontal">
					<input type="hidden" name="action" value="form_filter" />
					<div class="filter-box"><br>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles">Locale</label>
							<div class="col-sm-3" id="fp_locale_f">

							</div>
							<label class="col-sm-2 control-label" for="form-styles">Year</label>
							<div class="col-sm-3" id="fp_year_f">

							</div>
							<!--
							<label class="col-sm-2 control-label" for="form-styles">Department</label>
							<div class="col-sm-3" id="fp_dept_f">

							</div>
							-->
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles"></label>
							<div class="col-sm-3">
								<button id="fp_filter" type="submit" class="btn btn-primary btn-lg"><span><i class="fa fa-filter txt-Primary"></i></span> Filter</button>
							</div>
						</div>
					</div>
				</form>
				<form id="add_pck_form" method="post" class="form-horizontal">
					<input type="hidden" id="fp_user" name="user" value="<?php echo $user; ?>" />
					<div class="add_pck_box"><br>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles">Month</label>
							<div class="col-sm-3" id="fp_pck_mos_add">
							</div>
							<label class="col-sm-2 control-label" for="form-styles">Year</label>
							<div class="col-sm-3" id="fp_pck_year_add">

							</div>
							<!--<label class="col-sm-2 control-label" for="form-styles">Year</label>
							<div class="col-sm-3" id="fp_">
							</div>
							-->
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="form-styles"></label>
							<div class="col-sm-2	">
								<button id="fp_pck_show" type="submit" class="btn btn-primary btn-lg"><span><i class="fa fa-filter txt-Primary"></i></span> Show Table</button>
							</div>
						</div>
					</div>
				</form>
				<div id="fp_pck_table" class="box-content no-padding table-responsive ">
					<table class="table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;">
						<thead>
							<tr>
								<th>Locale</th>
								<th>Department</th>
								<th>Employee</th>
								<th>Action</th>
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

									$tab = '<tr class="vert-align">
												<td class="tdloc">
													' . $loc . '
												</td>
												<td>
													' . $g_name . '
												</td>
												<td>
													' . $name . '
												</td>
												<td>
													<button value="' . $eid . '"placeholder="Another info" data-placement="top" title="View Savings!" class="fin_view ttips btn btn-sm btn-primary" type="button" data-toggle="tooltip"
					                                    data-original-title="Edit this user">
					                                    <i class="fa fa-search"></i></button>
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
	$('.ttips').tooltip();
	$('.preloader').show();
	var_loc = 0;
	var_dept = 0;
	var_mos = 0;
	function sanitize(id){
		// console.log('sanitize')
		id = id.replace("\r\n", "");
		id = id.replace(/[^\\]\\|\n/g, " ").trim();
		return id;
	}
	$(".filter-box, .add_pck_box, .add-box").hide()

	$('.filter-link').click(function() {
		$( ".filter-box" ).slideToggle( "fast", function() {
		// Animation complete.
			});
		if(!$( ".add_pck_box" ).is(':hidden')){
			$( ".add_pck_box" ).hide()
		}
	});

	$('.add-savings').click(function() {
		$( ".add_pck_box" ).slideToggle( "fast", function() {
		// Animation complete.
		});
		if(!$( ".filter-box" ).is(':hidden')){
			$( ".filter-box" ).hide()
		}
	})

//filter//
$('#fp_filter').click(function(){
	$( ".filter-box" ).hide()
	$('.table .tdloc').parent().show()
	var loc = $('#s2id_s_locale').text()
	loc = sanitize(loc)
	$('.table .tdloc:not(:contains('+loc+'))').parent().hide()

	return false
})
//end filter//

//-------------------call list item------------------------------//
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {action: "f_locale"},
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
        data: {action: "f_year"},
        success: function(id){
			// alert(id)
			$('#fp_year_f').html(id)
			$('#fp_pck_year_add').html(id)
			var_year = 1
			s_reload()
		}
	})
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {action: "f_mos"},
        success: function(id){
			// alert(id)
			$('#fp_pck_mos_add').html(id)
			// $('#fp_mos_f').html(id)
			var_mos = 1
			s_reload()
		}
	})
	function s_reload(){
		if (var_loc==1 && var_mos==1 && var_year==1) {
			$('.preloader').hide();
			reloadsel()
		};
	}
//------------------- list-----------------------------------------//
//show table//
$('#fp_pck_show').on('click',function(e){
	var user = $('#fp_user').val()
	var mos = $('#s_mos').val()
	var yr = $('#fp_pck_year_add select').val()
	// console.log(mos)
	// $('.table-responsive').hide()
	if (mos=='' || mos==null) {
		alert('Please Select Month')
		return false;
	}else{
		$('.preloader').show();
		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {user:user, mos:mos, year:yr, action: "fp_pck_showtable"},
	        success: function(id){
	        	$('#fp_pck_table').html(id)
	        	$( ".add_pck_box" ).hide()
	        	$('.add_pck_mos, .edit_pck_mos, .edit_pck_mos_f').tooltip()
	        	$('.edit_pck_mos').hide()
				$('.preloader').hide();
				$('.add_pck_mos').on('click',function(e){
					// console.log('add savings')
					var mos = $(this).parent().parent().find('.pck_mos').text()
					var yr = $(this).parent().parent().find('.pck_yr').text()
					var id = $(this).val()
					mos = sanitize(mos)
					id = sanitize(id)
					// console.log(mos,id);
					add_function(id,mos, yr);
				})
				$('.edit_pck_mos').on('click',function(e){
					var x = $(this).val()
					// console.log('edit savings ', x)
					edit_function(x);
				})
				$('.edit_pck_mos_f').on('click',function(e){
					var x = $(this).val()
					// console.log('edit savings ', x)
					edit_function(x);
				})
			}
		})
		// add pck mos //
		return false;
	};
})
//end show table//
//view add function//
$('.fin_view').on('click',function(e){
	// console.log('tri')
	var x = $(this).val()
	view_function(x);
})
function view_function(x){
	var buttons = $('<button id="event_cancel" type="cancel" class="btn btn-default btn-label-left pull-right">'+
						'<span><i class="fa fa-times txt-danger"></i></span>'+
						'Close'+
						'</button>');
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {id:x,action: "view_savings"},
        success: function(msg) {
           // alert(msg)
           	OpenModalBox('Unused PCK Savings</div>', msg, buttons)
           	$('#event_cancel').on('click', function(){
				CloseModalBox();
				// console.log("click close")
			});
        }
    })
}
// end view add function//

function add_function(id,mos, yr){
	var buttons = $('<button class="event_cancel btn btn-danger btn-label-left pull-right">'+
					'<span><i class="fa fa-times"></i></span>'+
					'Close'+
					'</button>'+
					'<button id="pck_save"   class="f_edit_tri btn btn-primary btn-label-left pull-right">'+
					'<span><i class="fa fa-edit "></i></span>'+
					'Save'+
					'</button>');
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {id:id, mos:mos, yr:yr, action: "add_savings"},
        success: function(msg) {
           // alert(msg)
           	OpenModalBox('<div>Add PCK Savings</div>', msg, buttons)
           	$('.pck_bud').number( true, 2 );
           	$('.event_cancel').on('click', function(){
				CloseModalBox();
				// console.log("click close")
			});
			$('#pck_save').on('click', function(){
				$(this).prop('disabled', true);
				var par = $(this).parent().parent()
				var bud  = par.find('.pck_bud').val()
				bud = sanitize(bud)
				// console.log(bud)
				if (bud=="") {
					par.find('.pck_bud').tooltip('show')
					$(this).prop('disabled', false);
				}else{
					// console.log(bud,id,mos)
					$.ajax({
				        type: 'POST',
				        url: 'ajax/ajax.php',
				        data: {id:id, mos:mos,bud:bud, year:yr, action: "save_savings"},
				        success: function(msg) {
				        	// console.log(msg,id,mos,bud);
				        	update_pck_table(msg,id,mos,bud);
				        	CloseModalBox();
				        }
				    });
				};
			});
        }
    })
}
function edit_function(x){
	var buttons = $('<button class="event_cancel btn btn-danger btn-label-left pull-right">'+
					'<span><i class="fa fa-times"></i></span>'+
					'Close'+
					'</button>'+
					'<button class="update_pck_saving btn btn-warning btn-label-left pull-right">'+
					'<span><i class="fa fa-edit "></i></span>'+
					'Update'+
					'</button>');
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {pck_id:x, action: "edit_savings"},
        success: function(msg) {
        	OpenModalBox('Add PCK Savings</div>', msg, buttons)
        	$('.pck_bud').number( true, 2 );
        	$('.event_cancel').on('click', function(){
				CloseModalBox();
				// console.log("click close")
			});
			$('.update_pck_saving').on('click', function(){
				$(this).prop('disabled', true);
				var par = $(this).parent().parent()
				var bud  = par.find('.pck_bud').val()
				bud = sanitize(bud)
				// console.log(bud)
				if (bud=="") {
					par.find('.pck_bud').tooltip('show')
					$(this).prop('disabled', false);
				}else{
					// alert('ajax')
					$.ajax({
				        type: 'POST',
				        url: 'ajax/ajax.php',
				        data: {pck_id:x, bud:bud, action: "update_savings"},
				        success: function(msg) {
				        	update_pck_table_e(msg,bud);
				        	CloseModalBox();
				        }
				    });
				};
			});
        }
    })
}
function update_pck_table(msg,id,mos,bud){
	bud = $.number( bud, 2 );
	// console.log(bud);
	var x = $('.add_pck_mos[value='+id+']')
	x.parent().find('.edit_pck_mos').prop('value', msg).show()
	x.parent().parent().find('.pck_saving_td').text(bud)
	x.hide()
}
function update_pck_table_e(x,bud){
	bud = $.number( bud, 2 );
	// console.log(bud);
	var x = $('.edit_pck[value='+x+']')
	x.parent().parent().find('.pck_saving_td').text(bud)
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