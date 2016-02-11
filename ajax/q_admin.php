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
		.hover{
			background-color: #000;
		}

	</style>
	<div class="row">
		<div id="breadcrumb" class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="index.php">QUALITY</a></li>
				<lai><a href="#">ADMIN</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-table"></i>
						<span>Quality Admin Panel</span>
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
					<div class="box-content" >
						
						<button class="dev_add dev_Department_btn text-right btn btn-primary btn-s" value="Department"role="button">Add Department</button>
						<table  class="dev_table dev_Department_table table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter">
							<input id="dept_id" type="hidden" value="" />
							<thead>
								<tr>
									<th>Department</th>
									<th width="200px;">Action</th>
								</tr>
							</thead>
							<tbody class="dev_Department_tbody">

							</tbody>	
							
						</table>
						<button class="dev_add dev_sec_btn text-right btn btn-primary btn-s" value="Section"role="button">Add NC Classification</button>
						<table  class="dev_table dev_Section_table table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter">
							<input id="sec_id" type="hidden" value="" />
							<thead>
								<tr>
									<th>NC CLASSIFICATION</th>
									<th width="200px;">Action</th>
								</tr>
							</thead>
							<tbody class="dev_Section_tbody">

							</tbody>
							
						</table>
						<button class="dev_add dev_cat_btn text-right btn btn-primary btn-s" value="Categories"role="button">Add Categories</button>
						<table  class="dev_table dev_Categories_table table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter">
							<input id="cat_id" type="hidden" value="" />
							<thead>
								<tr>
									<th>Categories</th>
									<th width="200px;">Action</th>
								</tr>
							</thead>
							<tbody class="dev_Categories_tbody">

							</tbody>

							
						</table>
						<button class="dev_add dev_lbl_btn text-right btn btn-primary btn-s" value="Label"role="button">Add Policy/Procedure</button>
						<table  class="dev_table dev_Label_table table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter">
							<input id="lbl_id" type="hidden" value="" />
							<thead>
								<tr>
									<th>Policy/Procedure</th>
									<th width="200px;">Action</th>
								</tr>
							</thead>
							<tbody class="dev_Label_tbody">

							</tbody>
							
						</table>
						<button class="dev_add dev_dev_btn text-right btn btn-primary btn-s" value="Deviation"role="button">Add Deviation</button>
						<table  class="dev_table dev_Deviation_table table table-striped table-bordered table-hover table-heading no-border-bottom table-vcenter">
							<input id="dev_id" type="hidden" value="" />
							<thead>
								<tr>
									<th>Deviation</th>
									<th width="200px;">Action</th>
								</tr>
							</thead>
							<tbody class="dev_Deviation_tbody">

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
	$(function(){
		var dev 	=  $('.dev_add')
		$('.dev_add, .dev_table').hide()
		//ajax dept
		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {action: "load_dept_dev"},
	        success: function(id) {
	        	$('.dev_Department_tbody').html(id)
	        	reloadtd();
	        	$('.dev_Department_table, .dev_Department_btn').show()
	        	$('.edit_dept, .delete_dept').on('click', function(){
					//button value X
					var th = $(this).parent().parent()
					var x = $(this).val()
					//button Text Y
					var y = $(this).text()
					//TD text Z
					var z = $(this).parent().parent().find('.dev_Department_td').text()
					var val = 'Department';
					// alert(x+y)
					// ajax edit department
					$.ajax({
				        type: 'POST',
				        url: 'ajax/ajax.php',
				        data: {ed_id:x, val:val, btn:y, txt:z, action:"Edit_dev"},
				        success: function(edit_div) {
				        	edit_dev(th, val, y, edit_div)
				        }
				    })// END ajax edit department
				})
	        }
	    })
		function reloadtd(){
			$('.dev_Department_td').click(function() {
		 		var dept_id = $(this).parent().find('.edit_dept').val()
		 		$(this).parent().parent().parent().find('#dept_id').val(dept_id)
		 		$(this).parent().addClass('primary').siblings().removeClass('primary')
		 		$('.dev_Deviation_table, .dev_dev_btn, .dev_Categories_table, .dev_cat_btn, .dev_Label_table, .dev_lbl_btn').hide()
		    	
		 		//ajax section
		 		$.ajax({
			        type: 'POST',
			        url: 'ajax/ajax.php',
			        data: {dept_id:dept_id, action: "load_sec_dev"},
			        success: function(id) {
			 			$('.dev_Section_tbody').html(id)
			        	$('.dev_Section_table, .dev_sec_btn').show()
			        	$('.edit_sec, .delete_sec').on('click', function(){
							var th = $(this).parent().parent()
							//button value X
							var x = $(this).val()
							//button Text Y
							var y = $(this).text()
							//TD text Z
							var z = $(this).parent().parent().find('.dev_Section_td').text()
							var val = 'Section';
							// alert(x+y)
							// ajax edit department
							$.ajax({
						        type: 'POST',
						        url: 'ajax/ajax.php',
						        data: {ed_id:x, val:val, btn:y, txt:z, action:"Edit_dev"},
						        success: function(edit_div) {
						        	edit_dev(th, val, y, edit_div)
						        }
						    })// END ajax edit department
						})
			        	$('.dev_Section_td').click(function() {
				     		var sec_id = $(this).parent().find('.edit_sec').val()
				     		$(this).parent().parent().parent().find('#sec_id').val(sec_id)
				     		$(this).parent().addClass('primary').siblings().removeClass('primary')
				     		$('.dev_Deviation_table, .dev_dev_btn, .dev_Label_table, .dev_lbl_btn').hide()
				     		//ajax Categories
				     		$.ajax({
						        type: 'POST',
						        url: 'ajax/ajax.php',
						        data: {sec_id:sec_id, dept_id:dept_id, action: "load_cat_dev"},
						        success: function(id) {
						        	$('.dev_Categories_tbody').html(id)
			        				$('.dev_Categories_table, .dev_cat_btn').show()
			        				$('.edit_cat, .delete_cat').on('click', function(){
										var th = $(this).parent().parent()
										//button value X
										var x = $(this).val()
										//button Text Y
										var y = $(this).text()
										//TD text Z
										var z = $(this).parent().parent().find('.dev_Categories_td').text()
										var val = 'Categories';
										// alert(x+y)
										// ajax edit department
										$.ajax({
									        type: 'POST',
									        url: 'ajax/ajax.php',
									        data: {ed_id:x, val:val, btn:y, txt:z, action:"Edit_dev"},
									        success: function(edit_div) {
									        	edit_dev(th, val, y, edit_div)
									        }
									    })// END ajax edit department
									})
						        	$('.dev_Categories_td').click(function() {
							     		var cat_id = $(this).parent().find('.edit_cat').val()
							     		$(this).parent().parent().parent().find('#cat_id').val(cat_id)
							     		$(this).parent().addClass('primary').siblings().removeClass('primary')
							     		$('.dev_Deviation_table, .dev_dev_btn').hide()
							     		//ajax Label
							     		$.ajax({
									        type: 'POST',
									        url: 'ajax/ajax.php',
									        data: {cat_id:cat_id, sec_id:sec_id, dept_id:dept_id, action: "load_lbl_dev"},
									        success: function(id) {
									        	$('.dev_Label_tbody').html(id)
			        							$('.dev_Label_table, .dev_lbl_btn').show()
			        							$('.edit_lbl, .delete_lbl').on('click', function(){
													var th = $(this).parent().parent()
													//button value X
													var x = $(this).val()
													//button Text Y
													var y = $(this).text()
													//TD text Z
													var z = $(this).parent().parent().find('.dev_Label_td').text()
													var val = 'Label';
													// alert(x+y)
													// ajax edit department
													$.ajax({
												        type: 'POST',
												        url: 'ajax/ajax.php',
												        data: {ed_id:x, val:val, btn:y, txt:z, action:"Edit_dev"},
												        success: function(edit_div) {
												        	edit_dev(th, val, y, edit_div)
												        }
												    })// END ajax edit department
												})
						 			        	$('.dev_Label_td').click(function() {
										     		var lbl_id = $(this).parent().find('.edit_lbl').val()
										     		$(this).parent().parent().parent().find('#lbl_id').val(lbl_id)
							     					$(this).parent().addClass('primary').siblings().removeClass('primary')
										     		//ajax Deviation
										     		$.ajax({
												        type: 'POST',
												        url: 'ajax/ajax.php',
												        data: {lbl_id:lbl_id, cat_id:cat_id, sec_id:sec_id, dept_id:dept_id, action: "load_dev_dev"},
												        success: function(id) {
												        	$('.dev_Deviation_tbody').html(id)
			        										$('.dev_Deviation_table, .dev_dev_btn').show()
			        										$('.edit_dev, .delete_dev').on('click', function(){
																var th = $(this).parent().parent()
																//button value X
																var x = $(this).val()
																//button Text Y
																var y = $(this).text()
																//TD text Z
																var z = $(this).parent().parent().find('.dev_Deviation_td').text()
																var val = 'Deviation';
																// alert(x+y)
																// ajax edit department
																$.ajax({
															        type: 'POST',
															        url: 'ajax/ajax.php',
															        data: {ed_id:x, val:val, btn:y, txt:z, action:"Edit_dev"},
															        success: function(edit_div) {
															        	edit_dev(th, val, y, edit_div)
															        }
															    })// END ajax edit department
															})
												        }
												    })//End ajax Deviation
										     	})
									        }
									    })//End ajax Label
							     	})
						        }
						    })//End ajax Categories
				     	})
					}
			    })//end ajax section
			});
		 
		 	$('.dev_Deviation_td').click(function() {
		 		var dev_id = $(this).parent().find('.edit_dev').val()
		 	})
			
		dev.click(function(){
			var val = $(this).val()
			// alert(val)
			var buttons = $('<button class="event_cancel btn btn-danger btn-label-left pull-right">'+
					'<span><i class="fa fa-times"></i></span>'+
					'Close'+
					'</button>'+
					'<button value="'+val+'" class="save btn btn-primary btn-label-left pull-right">'+
					'<span><i class="fa fa-edit "></i></span>'+
					'Add'+
					'</button>');
			$.ajax({
		        type: 'POST',
		        url: 'ajax/ajax.php',
		        data: {value:val, action: "add_dev"},
		        success: function(msg) {
		    		OpenModalBox('<div>Add '+val+'</div>', msg, buttons)
		    		$('.event_cancel').on('click', function(){
						CloseModalBox()
						// console.log("click close")
					});
					$('.save').on('click', function(){
						$(this).prop('disabled', true);
						var par = $(this).parent().parent()
						var add_val  = par.find('.add_dev').val()
						add_val = sanitize(add_val)
						if (add_val=="") {
							alert(val +" Field cannot be empty")
							$(this).prop('disabled', false);
						}else{
							CloseModalBox();
							var dept_id = $('.dev_Department_table').find('#dept_id').val()
							var sec_id 	= $('.dev_Section_table').find('#sec_id').val()
							var cat_id 	= $('.dev_Categories_table').find('#cat_id').val()
							var lbl_id 	= $('.dev_Label_table').find('#lbl_id').val()
							dept_id = sanitize(dept_id)
							sec_id = sanitize(sec_id)
							cat_id = sanitize(cat_id)
							lbl_id = sanitize(lbl_id)
							$.ajax({
						        type: 'POST',
						        url: 'ajax/ajax.php',
						        data: {lbl_id:lbl_id, cat_id:cat_id, sec_id:sec_id, dept_id:dept_id, dev_val: add_val, action: 'add_'+val+''},
						        success: function(success) {
						        	if (success!="failed") {
						        		trappend(success, add_val, val)
						        	}else{
						        		alert(success, 'failed')
						        	};
								}
							})
						}
					})
		        }
		    })
		})

		}
		function trappend(id, dev_val, dev){
			// console.log('id ', id, 'val ', dev , dev_val)

			$('.dev_'+dev+'_table > tbody:last')
				.append('<tr>'+
							'<td class="dev_'+dev+'_td">'+
								''+dev_val+''+
							'</td>'+
							'<td>'+
								'<button class="edit_'+dev+' btn btn-success btn-label-left " value=' +id+'>Edit</button>'+
								'<button class="delete_'+dev+' btn btn-danger btn-label-left " value=' +id+ '>Delete</button>'+
							'</td>'+
						'</tr>');
			if (dev!="Deviation") {
				// LoadAjaxContent('ajax/q_admin.php')
			}; 
		}

		function edit_dev(th, val, btn, e_div){
			
			if (btn=="Edit") {
				var buttons = $('<button class="event_cancel btn btn-danger btn-label-left pull-right">'+
					'<span><i class="fa fa-times"></i></span>'+
					'Close'+
					'</button>'+
					'<button value="'+val+'" class="Save btn btn-primary btn-label-left pull-right">'+
					'<span><i class="fa fa-edit "></i></span>'+
					'Save'+
					'</button>');
			}else{
				var buttons = $('<button class="event_cancel btn btn-warning btn-label-left pull-right">'+
					'<span><i class="fa fa-times"></i></span>'+
					'Cancel'+
					'</button>'+
					'<button value="'+val+'" class="Delete btn btn-danger btn-label-left pull-right">'+
					'<span><i class="fa fa-times "></i></span>'+
					'Delete'+
					'</button>');
			}
			
			OpenModalBox('<div>'+btn+' '+val+'</div>', e_div, buttons)
				$('.event_cancel').on('click', function(){
					CloseModalBox()
					// console.log("click close")
				});
				$('.Save').on('click', function(){
					$.ajax({
				        type: 'POST',
				        url: 'ajax/ajax.php',
				        data: $('#defaultForm').serialize(),
				        success: function(success) {
				        	if (success!="failed") {
								th.find('.dev_td').text(success)	
								CloseModalBox()			        			
				        	};
				        }
				    })
				});

				$('.Delete').on('click', function(){
					$.ajax({
				        type: 'POST',
				        url: 'ajax/ajax.php',
				        data: $('#defaultForm').serialize(),
				        success: function(success){
				        	if (success=="success") {
				        		th.hide()
				        		CloseModalBox()	
				        	};
				        	
				        }
				    })
				});
		}

		function sanitize(id){
			// console.log('sanitize')
			id = id.replace("\r\n", "");
			id = id.replace(/[^\\]\\|\n/g, " ").trim();
			return id;
		}

	})

	</script>
