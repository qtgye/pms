	<?php 
		include("../include/db.php");
		include("../include/functions.php");
		include("../include/auth.php");
	// echo 	$nn		.	$loc.		$grp	.$cred	. $user;
	?>

	<style type="text/css">
		.table-datatable *, .table-datatable *:after, .table-datatable *:before {
			padding-bottom: 7px;
		}
		.table-vcenter td {
		   vertical-align: middle !important;
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
		.form-horizontal .form-group{
			margin-right: 15px;
		}
		.ui-tabs .ui-tabs-panel  {
			border-left: 1px solid #d8d8d8;
			border-right: 1px solid #d8d8d8;
			border-bottom: 1px solid #d8d8d8;
		}
	
	</style>
	<div class="row">
		<div id="breadcrumb" class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="index.php">iQMS</a></li>
				<li><a href="#">iQMS Reports</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-table"></i>
						<span>Reports</span>
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
				<div class="box-content">
					
					<div id="tabs">
						<ul>
							<li><a href="#tabs-1">Top Findings</a></li>
							<li><a href="#tabs-2">Number of Inspection</a></li>
							<li><a href="#tabs-3">Average Rating</a></li>
						</ul>
						<div id="tabs-1"  >
							<form id="topfindings" method="post" class="form-horizontal">
								<input type="hidden" name="action" value="topfindings" />
								<input type="hidden" name="user" value="<?php echo $user; ?>" />
								<div class="filter-box">
									<div class="form-group">
										<label class="col-sm-2 control-label" for="form-styles">Locale</label>
										<div class="col-sm-3 f_locale">
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="form-styles">Date Range</label>
										<div class="col-sm-3">
											<input type="text" class="f_start form-control d_range" name="f_start" placeholder="Start Date">
										</div>
										<div class="col-sm-3">
											<input type="text" class="f_end form-control d_range" name="f_end" placeholder="End Date">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="form-styles"></label>
										<div class="col-sm-3">
											<button id="topfindings_btn" type="submit" class="btn btn-primary btn-lg"><span><i class="fa fa-filter txt-Primary"></i></span>  Filter</button>
										</div>
									</div>
								</div>
							</form>
							<div class="box">
								<center>
								<table class="table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;width:80%;">
									<thead>
										<tr>
											<th width="120px">Locale</th>
											<th width="320px">Findings</th>
											<th width="120px">Frequency</th>
										</tr>
									</thead>
									<tbody id="top_table">

									</tbody>
								</table>
								</center>	
							</div>
						</div>
						<div id="tabs-2">
							<form id="numberofinspection" method="post" class="form-horizontal">
								<input type="hidden" name="action" value="numberofinspection" />
								<input type="hidden" name="user" value="<?php echo $user; ?>" />
								<div class="filter-box">
									<div class="form-group">
										<label class="col-sm-2 control-label" for="form-styles">Locale</label>
										<div class="col-sm-3 f_locale">
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="form-styles">Date Range</label>
										<div class="col-sm-3">
											<input type="text" class="f_start form-control d_range" name="f_start" placeholder="Start Date">
										</div>
										<div class="col-sm-3">
											<input type="text"  class="f_end form-control d_range" name="f_end" placeholder="End Date">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="form-styles"></label>
										<div class="col-sm-3">
											<button id="numberofinspection_btn" type="submit" class="btn btn-primary btn-lg"><span><i class="fa fa-filter txt-Primary"></i></span>  Filter</button>
										</div>
									</div>
								</div>
							</form>
							<div class="box">
								<center>
								<table class="table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;width:80%;">
									<thead>
										<tr>
											<th width="200px">Inspector</th>
											<th width="150px">Locale</th>
											<th width="120px">Number Of Inspection</th>
										</tr>
									</thead>
									<tbody id="num_table">

									</tbody>
								</table>
								</center>	
							</div>
						</div>
						<div id="tabs-3">
							<form id="averagerating" method="post" class="form-horizontal">
								<input type="hidden" name="action" value="averagerating" />
								<input type="hidden" name="user" value="<?php echo $user; ?>" />
								<div class="filter-box">
									<div class="form-group">
										<label class="col-sm-2 control-label" for="form-styles">Locale</label>
										<div class="col-sm-3 f_locale">
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="form-styles">Date Range</label>
										<div class="col-sm-3">
											<input type="text" class="f_start form-control d_range" name="f_start" placeholder="Start Date">
										</div>
										<div class="col-sm-3">
											<input type="text" class="f_end form-control d_range" name="f_end" placeholder="End Date">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="form-styles"></label>
										<div class="col-sm-3">
											<button id="averagerating_btn" type="submit" class="btn btn-primary btn-lg"><span><i class="fa fa-filter txt-Primary"></i></span>  Filter</button>
										</div>
									</div>
								</div>
							</form>
							<div class="box">
								<center>
								<table class="table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter" style="font-size: 12px;width:80%;">
									<thead>
										<tr>
											<th width="120px">Locale</th>
											<th width="120px">Average Rating</th>
											<th width="120px">Room Type</th>
										</tr>
									</thead>
									<tbody id="avg_rating">

									</tbody>
								</table>
								</center>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
	$(function(){
		// $('.preloader').show();
		$("#tabs").tabs();
		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {action: "f_locale"},
	        success: function(id){
				// alert(id)
				$('.f_locale').html(id)
				var_loc = 1
				reloadsel()
			}  
		})

		$(".f_start").datepicker();
	    $('.f_end').datepicker();

	    $('#topfindings_btn').on('click', function(e){
			
			$.ajax({
	            type: 'POST',
	            url: 'ajax/ajax.php',
	            data: $('#topfindings').serialize(),
	            success: function(id) {
	            	$('#top_table').html(id)
	            
	            }
            });        
			
			return false;  
		})
		$('#numberofinspection_btn').on('click', function(e){
			$.ajax({
	            type: 'POST',
	            url: 'ajax/ajax.php',
	            data: $('#numberofinspection').serialize(),
	            success: function(id) {
	            	$('#num_table').html(id)
	            }
            });        
			return false;  
		})
		$('#averagerating_btn').on('click', function(e){
			$.ajax({
	            type: 'POST',
	            url: 'ajax/ajax.php',
	            data: $('#averagerating').serialize(),
	            success: function(id) {
	            	$('#avg_rating').html(id)
	            }
            });        
			return false;  
		})

		function reloadsel(){
			function DemoSelect2(){
				$('.s_list').select2();

			}
			LoadSelect2Script(DemoSelect2);
		}
	})	
	</script>
