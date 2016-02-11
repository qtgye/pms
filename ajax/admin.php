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
				<li><a href="index.php">Administrator</a></li>
				<li><a href="#">Admin Modules</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-table"></i>
						<span>Admin Modules</span>
					</div>
					<div class="box-icons ttips" data-placement="left" title="Add Room">
						<a class="add-room">
							<i class="fa fa-plus"></i>
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
				<div class="box-content padding">
					<div id="tabs">
						<ul>
							<li><a href="#tabs-1">Rooms</a></li>
							<!--<li><a href="#tabs-2">Number of Inspection</a></li>
							<li><a href="#tabs-3">Average Rating</a></li>-->
						</ul>
						<div id="tabs-1" class="padding box-content no-padding table-responsive" >
							<table  style="width:94%;margin-left:28px;"class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
								<input id="dept_id" type="hidden" value="" />
								<thead>
									<tr>
										<th>Rooms</th>
										<th>Locale</th>
										<th width="200px;">Action</th>
									</tr>
								</thead>
								<tbody class="table_rooms">
								</tbody>	
							</table>
						</div>
						<!--<div id="tabs-2">
						</div>
						<div id="tabs-3">
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(function(){
		// $('.preloader').show();
		$('.ttips').tooltip();
		$("#tabs").tabs();
		$('.add-room').click(function() {
			alert('add')
		})
		
		// $.ajax({
	 	//     type: 'POST',
	 	//     url: 'ajax/ajax.php',
	 	//     data: {action: "f_locale"},
	 	//     success: function(id){
		// 			// alert(id)
		// 			$('.f_locale').html(id)
		// 			var_loc = 1
		// 			reloadsel()
		// 		}  
		// })

		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {user:'<?php echo $user;?>', action: "load_rooms"},
	        success: function(id) {
	        	$('.table_rooms').html(id)
	        	LoadDataTablesScripts(AllTables);
	        	$('.edit-room').on('click', function(){
					alert('edit')
				})
				$('.delete-room').on('click', function(){
					alert('delete')
				})
	        }
	    })

		// $(".f_start").datepicker();
	 //    $('.f_end').datepicker();

		function reloadsel(){
			function DemoSelect2(){
				$('.s_list').select2();
			}
			LoadSelect2Script(DemoSelect2);
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
		// Add Drag-n-Drop feature
		WinMove();
	})	
	</script>
