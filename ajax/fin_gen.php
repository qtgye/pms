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
				<li><a href="#">Financial Perspective</a></li>
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
						<span>Financial Perspective(Data Generation)</span>
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
					<form id="datagen_form" method="post" class="form-horizontal">
						<input type="hidden" name="action" value="fin_gen" />
						<div class="filter-box"><br>

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
								<label class="col-sm-2 control-label" for="form-styles"></label>
								<div class="col-sm-3">
									<button id="fin_gen" type="submit" class="btn btn-primary btn-lg"><span><i class="fa txt-Primary"></i></span>GENERATE DATA</button>
								</div>
							</div>
						</div>
				</form>

				</div>
			</div>
		</div>
	</div>
	<script src="plugins/jquery-number-master/jquery.number.js"></script>

	<script type="text/javascript">
	$(function(){
		$('.preloader').show();
		var_yr  = null;
		var_mos = null;
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
				var_yr = 1
				s_reload()
			}
		})

		function s_reload(){
			if (var_yr==1 && var_mos==1) {
				$('.preloader').hide();
				reloadsel()
			};
		}

		function reloadsel(){
			function DemoSelect2(){
				$('.s_list').select2();
			}
			LoadSelect2Script(DemoSelect2);
			LoadBootstrapValidatorScript(DemoFormValidatorAdd);
		}
/*validator*/
		function DemoFormValidatorAdd(){
			$('#datagen_form').bootstrapValidator({
				message: 'This value is not valid',
				fields: {
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

				},
				submitHandler: function(form) {
					   $.ajax({
			            type: 'POST',
			            url: 'ajax/ajax.php',
			            data: $('#datagen_form').serialize(),
			            success: function(msg) {
			                alert(msg);
			            }
		            });
				}
			});
		}
/*validator*/

	})
	</script>