	<?php 
		include("../include/db.php");
		include("../include/functions.php");
		include("../include/auth.php");
	// echo 	$nn		.	$loc.		$grp	.$cred	;
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
				<li><a href="#">Internal System</a></li>
				<li><a href="#">Spot Check</a></li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-table"></i>
						<span>Spot Check Reports</span>
					</div>
					<div class="box-icons">
						<a class="filter-link">
							<i class="fa fa-filter"></i>
						</a>
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
					<input type="hidden" name="action" value="spot_check_reports" />
					<input type="hidden" name="user" value="<?php echo $user; ?>" />
				<div class="filter-box"><br>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="form-styles">Locale</label>
						<div class="col-sm-3" >
							<select class="populate placeholder s_list" name="locale" id="f_locale">
							</select>
						</div>
						<label class="col-sm-2 control-label" for="form-styles">Type of Cleaning</label>
						<div class="col-sm-3" id="f_locale">
							<select class="populate placeholder s_list" name="toc" id="toc">
							</select>
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="form-styles">Date Range</label>
						<div class="col-sm-3">
							<input type="text" id="f_start" class="form-control d_range f_start" name="f_start" placeholder="Start Date">
						</div>
						<div class="col-sm-3">
							<input type="text" id="f_end" class="form-control d_range f_end" name="f_end" placeholder="End Date">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="form-styles"></label>
						<div class="col-sm-3">
							<button id="filter_reports" type="submit" class="btn btn-primary btn-lg"><span><i class="fa fa-filter txt-Primary"></i></span>  Filter</button>
						</div>
					</div>
				</div>
				</form>
			
				<div class="box-content no-padding table-responsive ">
					<table class="table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;">
						<thead>
							<tr>
								<th>Locale</th>
								<th>Date of Inspection</th>
								<th>Type Of Cleaning</th>
								<th>Room</th>
								<th>Housekeeper</th>
								<th>Inspected by</th>
								<th>Number of Findings</th>
							</tr>
						</thead>
						<tbody id="spot_table">
							<?php
							
							// echo $query;
							// $query = mg_gen();
							// $result = mysql_query($query);
							// $mos = 9;

							// while($row = mysql_fetch_array($result, MYSQL_ASSOC)){

							// 	$id 		= $row['id'];
							// 	$eid 		= $row['eid'];
							// 	$loc 		= $row['locale_id'];
							// 	$g_id 		= $row['group_id'];
							// 	$g_name 	= $row['group_name'];
							// 	$last 		= $row['last'];
							// 	$first 		= $row['first'];
							// 	$middle 	= $row['middle'];
							// 	$name = $last . ", " . $first . " " . $middle;

							// 	$spot = get_spot_chk_cnt($eid, $mos);
							// 	$cnt = $spot['TOTALFINDINGS'];
							// 	$spot_rmks = '# of findings ' . $cnt;
							// 	if ($cnt>=5) {
							// 		$spot_pts = 0;
							// 		$spot_rat = "P";
							// 	}elseif ($cnt>=1) {
							// 		$spot_pts = 5;
							// 		$spot_rat = "S";
							// 	}else{
							// 		$spot_pts = 10;
							// 		$spot_rat = "O";
							// 	}

							// 	$spot_query  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
							// 						VALUES ('$eid', 2014 , '$mos', 3 , 8 ,'$spot_pts' ,' $spot_rat', '$spot_rmks')";
								
							// 	// echo $spot_query . "<br>";

							// 	$spot_result = mysql_query($spot_query);
								
							// 	if (!$spot_result){
							// 		$ret .= 'spot check query failed';
							// 		$f = 1;
							// 	}

								// echo $eid;
								// print '<pre>';
								// print_r ($spot);
								// print '</pre>';
							
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
		var_loc=0
		var_toc=0
		$('.preloader').show();
		$('.ttips').tooltip();
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
		});

		
//-------------------call list item------------------------------//
		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {user:'<?php echo $user;?>', action: "locale_report_gen"},
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
	        data: {user:'<?php echo $user;?>', action: "toc"},
	        success: function(id){
				// alert(id)
				$('#toc').html(id)
				var_toc = 1
				s_reload()
			}  
		})
		
		function s_reload(){
			if (var_loc==1 && var_toc==1) {
				$('.preloader').hide();
				reloadsel()
			};
		}

	/* Reports Generation */

		$('#filter_reports').click(function(){
			// alert('click')
			var loc		= $('#f_locale').val();			
			var toc 	= $('#toc').val();
			var start 	= $('#f_start').val();
			var end 	= $('#f_end').val();

			    if (start=="" || end=="" ) {
			    	alert('Please Select Date!');
			    	return false;
			    }else{
			    	$.ajax({
			            type: 'POST',
			            url: 'ajax/ajax.php',
			            data: $('#filter_form').serialize(),
			            success: function(id) {
			               	$('#spot_table').html(id)
			               	$( ".filter-box" ).hide()
			               	// alert(id)
			            }
			        });
			   	}
				return false
		})

		$(".f_start").datepicker();
	    $('.f_end').datepicker();
		
		function reloadsel(){
			function DemoSelect2(){
			$('.s_list').select2();
			}
			LoadSelect2Script(DemoSelect2);
			
		}
		
	})	
	</script>
