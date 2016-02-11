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
	
	</style>
	<div class="row">
		<div id="breadcrumb" class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="index.php">PMS</a></li>
				<li><a href="#">Internal System</a></li>
				<li><a href="#">HK Tools(General Cleaning Procedure)</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-table"></i>
						<span>HK Tools</span>
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
					<form id="defaultForm" method="post" class="form-horizontal">
					<input type="hidden" name="action" value="add_spot_check" />
					<input type="hidden" name="user" value="<?php echo $user; ?>" />
					<input type="hidden" name="cnt" id="cnt_input" value="0"/>
					<div class="box-content" >
						<div class="form-group">
							<label class="col-sm-2 control-label">Room Attendant: </label>
							<div class="col-sm-4">	
								<select class="populate placeholder s_list" name="hk_list" id="hk_list">
								</select>
							</div>
							<label class="col-sm-3 text-right control-label">Total Number Of Findings: </label>
							<label id="cnt_lbl" class="col-sm-1 text-left control-label" style="text-align: left;"> </label>
							<label id="stat_lbl" class="col-sm-1 text-left control-label" style="text-align: left;"> </label>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Type Of Cleaning: </label>
							<div class="col-sm-4">	
								<select class="populate placeholder s_list" name="toc" id="toc">
								</select>
							</div>
							<label class="col-sm-3 control-label">Room Number: </label>
							<div class="col-sm-2">	
								<select class="populate placeholder s_list" name="room_list" id="room_list">
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-4">	
								<div class="checkbox" >
									<label>
										<b>
											<input type="checkbox" id="no_findings" name="no_findings">No Findings.
											<i class="fa fa-square-o small"></i>
										</b>
									</label>
								</div>
							</div>
						</div>

						<div class="form-group"  style="margin-left: 25px;">
							<h4 class="page-header"></h4>
				 			<?php
				 				$query = "SELECT * FROM `cleaningdiv`";
				 				$result = mysql_query($query) or die (mysql_error());
				 				$chk .='<div class="box-content accordion" id="accordion" style="padding:0px;">';
				 				while($row 	= mysql_fetch_array($result, MYSQL_ASSOC)){
				 					$id		=	$row['id'];
									$div	=	$row['partofcleaning'];
									$content = spotlist($id);
									$chk .= '<h3>' . $div . '</h3>
												
												<div>
													
														' . $content . '
													
												</div>
												
											';

				 				}
								$chk .='</div>';
								echo $chk;

								$chk="";
							?>
							<div class="form-group">
						        <div class="col-xs-12">
						        	<center>
						            <button id="btn_addfindings" type="submit" class="btn btn-primary btn-lg">Add Spot Check Findings</button>
						        	</center>
						        </div>
		    				</div>
						</div>
					</div>
					</form>

				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
	$(function(){
		$('.preloader').show();
		var_hk = 0;
		var_toc = 0;
		var_rm = 0;
		$('#cnt_lbl').text(0);
		$('.accordion').hide()
		$('#toc').change(function(){
			// alert('panget');
			$('.accordion').show()
			var x = $(this).val(); 
			if (x=="2") {
				/* uncheck all the checkboxes */
				$('.chk_hkt').prop('checked', false);
				/* reset the findings counter and label fields */
				$('#cnt_input').val(0)
				$('#cnt_lbl').text(0);
				/* hide gc show coc findings */
				$('.GC').hide();
				$('.COC').show();
			}else if(x=="1"){
				/* uncheck all the checkboxes */
				$('.chk_hkt').prop('checked', false);
				/* reset the findings counter and label fields */
				$('#cnt_input').val(0)
				$('#cnt_lbl').text(0);
				/* hide coc show gc findings */
				$('.COC').hide();
				$('.GC').show();
			}else{
				/* hide the whole accordion */
				$('.accordion').hide()
				/* reset the findings counter and label fields */
				$('#cnt_input').val(0)
				$('#cnt_lbl').text(0);
			};
		});

		
		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {user:'<?php echo $user;?>', action: "hk_list"},
	        success: function(id){
				// alert(id)
				$('#hk_list').html(id)
				var_hk = 1
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
			}  
		})

		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {user:'<?php echo $user;?>', action: "room_list"},
	        success: function(id){
				// alert(id)
				$('#room_list').html(id)
				var_rm = 1
				s_reload()
			}  
		})
		function s_reload(){
			if (var_hk==1 && var_toc==1 && var_rm==1) {
				// alert(1)
				reloadsel()

			};
		}

		function reloadsel(){
			function DemoSelect2(){
				$('.s_list').select2();
				$('.preloader').hide();
			}
			LoadSelect2Script(DemoSelect2);
			// LoadBootstrapValidatorScript(DemoFormValidatorAdd);
		}
	$('#btn_addfindings').click(function(){
		// alert('click')
		var hk = $('#hk_list').val();
		var rm = $('#room_list').val();
		var toc = $('#toc').val();
		
		if (hk=="") {
			alert('Please Select Housekeeper!');
			return false
		} else if (rm=="") {
			alert('Please Select Room!');
			return false
	    } else if (toc=="") {
	    	alert('Please Select Type of Cleaning!');
	    	return false
	    }else{
	    	$.ajax({
	            type: 'POST',
	            url: 'ajax/ajax.php',
	            data: $('#defaultForm').serialize(),
	            success: function(msg) {
	               	if (msg=="success") {
	               		alert('Findings Encoded Successfully.')
			            LoadAjaxContent('ajax/hk_tools.php')
	               	}else{
	               		alert(msg)
	               	};
	            }
	        });
	   	}

		return false
	})

   $('.chk_hkt').change(function() {
   		// alert('click')
   		cnt_b = '';
        if($(this).is(":checked")) {
           	// alert('chk')
           	var cnt = $('#cnt_lbl').text();
           	cnt++
           	if (cnt>5) { cnt_b = ' (Failed) ' } else{ cnt_b =  ' (Passed) '}
           	$('#cnt_lbl').text(cnt);
       		$('#stat_lbl').text(cnt_b);
           	$('#cnt_input').val(cnt)

        }else{
        	var cnt = $('#cnt_lbl').text();
        	cnt--
         if (cnt>5) { cnt_b = ' (Failed) ' } else { cnt_b =  ' (Passed) '}
           	$('#cnt_lbl').text(cnt);
       		$('#stat_lbl').text(cnt_b);
           	$('#cnt_input').val(cnt)
        }
               
    });
   	$('#no_findings').change(function() {
   		if($(this).is(":checked")) {
	   		$('#cnt_lbl').text(0);
	   		$('#cnt_input').val(0)
	   		$('.chk_hkt').prop('checked', false);
	   		$('.accordion').hide();
	   	}else{
	   		$('.accordion').show();
	   	}
   	})

   		var icons = {
		header: "ui-icon-circle-arrow-e",
		activeHeader: "ui-icon-circle-arrow-s"
	};
	// Make accordion feature of jQuery-UI
	$("#accordion").accordion({
			icons: icons,
			collapsible: true,
			heightStyle: "content",
			active: false });
	})	
	</script>
