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
				<li><a href="#">Data Generation</a></li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-table"></i>
						<span>Internal System (Data Generation)</span>
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
				<div class="box-content no-padding table-responsive ">
					<table class="table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;">
						<thead>
							<tr>
								<th>Month</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody id="f_pck_table">
							<?php
								$query = "SELECT * FROM fp_mos";
								// echo $query;
								$result = mysql_query($query)or die('query failed ' . mysql_error() );
								// echo $query;
								// echo 'panget';
								while($row = mysql_fetch_array($result, MYSQL_ASSOC)){			
									$id 		= $row['id'];
									$desc 		= $row['mos_def'];
									$tab = '<tr class="vert-align">
												<td >
													<button value="' . $id . '"placeholder="Another info" data-placement="top"  class="qua_gen ttips btn btn-sm btn-primary" type="button" data-toggle="tooltip"
													data-original-title="Edit this user">' . $desc . ' <i class="fa fa-arrow-circle-o-right"></i></button>
												</td>
												<td>
													' . $mos . '
												</td>
											</tr>';
									echo $tab;
								}
							?>
						</tbody>
					</table>

					<?php
						// $query = mg_gen();
						// $result = mysql_query($query);
						// $mos=4;

						// while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
							
						// 	$id 		= $row['id'];
						// 	$eid 		= $row['eid'];
						// 	$loc 		= $row['locale_id'];
						// 	$g_id 		= $row['group_id'];
						// 	$g_name 	= $row['group_name'];
						// 	$last 		= $row['last'];
						// 	$first 		= $row['first'];
						// 	$middle 	= $row['middle'];
						// 	$name = $last . ", " . $first . " " . $middle; echo $name . '<br>';

						// 		$q_query_cnt 	= qua_query_cnt($eid, 4); //get the sum and avg based on eid and mos
						// 		$sm_g 		= $q_query_cnt['cnt_grade']; //summary grade
						// 		$avg  		= round($q_query_cnt['avg_grade'], 2); //round off avg
						// 		$hk_rat 	= get_hk_grade(round($avg)); //get the rating
								
						// 		$iqms_rmks = 'Total Number of Insp: ' . $sm_g . '|| avg: ' . $avg;

						// 		if ($hk_rat=='O') {

						// 			$hk_final_rat = "O";
						// 			$hk_pts = 30;
									
						// 		}elseif ($hk_rat=="VS") {
									
						// 			$hk_final_rat = "S";
						// 			$hk_pts = 15;

						// 		}else{

						// 			$hk_final_rat = "P";
						// 			$hk_pts = 0;
						// 		}


						// 		print "<pre>";
						// 		print_r($q_query_cnt);
						// 		print "</pre>";

						// 		$f_query_mg  = " INSERT INTO `pms_db_final` (`emp_id`, `yr`, `mos`, `pers_id`, `dim_id`, `pts`, `ratng`, `rmks`  )
					 //  							VALUES ('$eid', 2014 , '$mos', 2 , 4 ,'$hk_pts' ,' $hk_final_rat', '$iqms_rmks')";
									
						// 			$c1_result = mysql_query($f_query_mg);
									
						// 			if (!$c1_result){
						// 				$ret .= 'C1 failed';
						// 				$f = 1;
						// 			}

						// }

					?>



				</div>
			</div>
		</div>
	</div>
	<script src="plugins/jquery-number-master/jquery.number.js"></script>
	<script type="text/javascript">
	$(function(){
		$('.qua_gen').click(function(){
			var x = $(this).val()
			// alert(x)
	
			$.ajax({
			    type: 'POST',
			    url: 'ajax/ajax.php',
			    data: { mos:x , action:"iqms_gen"},
			    success: function(msg) {
					alert(msg)					
			    }  
		    })
	    })   

	})	
	</script>
