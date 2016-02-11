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
				<li><a href="#">Customer Perspective</a></li>
				<li><a href="#">Quality ( IQMS ) </a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-table"></i>
						<span>iQMS Reports</span>
					</div>
					<div class="box-icons">
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
							<div class="col-sm-3" id="locale_f">
								
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
				
				<div id="fp_pck_table" class="box-content no-padding table-responsive ">
					<table class="table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;">
						<thead>
							<tr>
								<th>Locale</th>
								<th>Position</th>
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
									$pos 		= $row['position'];
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
													' . $pos . '
												</td>
												<td>
													' . $name . '
												</td>
												<td>
													<button value="' . $eid . '"placeholder="Another info" data-placement="top" title="View iQMS inspection!" class="fin_view ttips btn btn-sm btn-primary" type="button" data-toggle="tooltip"
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
//filter//
$('#fp_filter').click(function(){
$( ".filter-box" ).hide()
$('.table .tdloc').parent().show()
$('#s2id_s_locale').wru();
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
			$('#locale_f').html(id)
			var_loc = 1
			s_reload()
		}  
	})
	function s_reload(){
		if (var_loc==1) {
			$('.preloader').hide();
			reloadsel()

		};
	}
//------------------- list-----------------------------------------//

//view add function//
$('.fin_view').on('click',function(e){
	$('.preloader').show();
	// console.log('tri')
	var x = $(this).val()
	view_function(x);
	
})
function view_function(x){
	var buttons = $('<button id="event_cancel" type="cancel" class="event_cancel btn btn-default btn-label-left pull-right">'+
						'<span><i class="fa fa-times txt-danger"></i></span>'+
						'Close'+
						'</button>');
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {id:x,action: "view_quality"},
        success: function(msg) {
        	$('.preloader').hide();
           // alert(msg)
           // alert(x)
           	OpenModalBox('Quality( iQMS )</div>', msg, buttons)
           	$('.event_cancel').on('click', function(){
				CloseModalBox();
				// console.log("click close")
			});		
			reloadsel()
			
        }  
    })   
}
// end view add function//
function reloadsel(){
		var icons = {
			header: "ui-icon-circle-arrow-e",
			activeHeader: "ui-icon-circle-arrow-s"
		};
		
		$(".accordion").accordion({
			icons: icons,
			collapsible: true,
			heightStyle: "content",
			active: false
		});
		
		
		function DemoSelect2(){
			$('.s_list').select2();

		}
		LoadSelect2Script(DemoSelect2);
		$('.preloader').hide();
	}
	
})	
</script>