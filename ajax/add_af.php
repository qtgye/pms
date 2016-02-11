<?php 
	include("../include/db.php");
	include("../include/functions.php"); 
	require("../include/auth.php");
	 
	
?>
<!--<link href="plugins\bootstrap_datetimepicker_master\build\css\bootstrap-datetimepicker.css" rel="stylesheet">
<link href="plugins\bootstrap_datetimepicker_master\build\css\bootstrap-datetimepicker.min.css" rel="stylesheet">-->

<style type="text/css">
.table-datatable *, .table-datatable *:after, .table-datatable *:before {
	padding-bottom: 7px;
}

</style>
<div class="row">
	<div id="breadcrumb" class="col-md-13">
		<ol class="breadcrumb">
			<li><a href="index.html">IQA</a></li>
			<li><a href="#">Add Assessment Findings</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-15 col-sm-15">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart-o"></i>
					<span>Add Assessment Findings</span>
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

		<div class="box-content padding">
			<form id="defaultForm" method="post" class="form-horizontal">
				<input type="hidden" name="action" value="add_findings" />
				<fieldset>
					<!--<legend>Add Findings</legend>-->
					<div class="form-group">
						<label class="col-sm-3 control-label">Locale</label>
						<div class="col-sm-4">
							<select class="populate placeholder s_list" name="locale" id="f_locale">
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Sources of CPAR</label>
						<div class="col-sm-4">
							<select class="populate placeholder s_list" name="toa" id="f_toa">
							</select>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-3 control-label">Date Reported</label>
						<div class="col-sm-4">
							<input type="text" id="input_date" class="form-control" name="input_date" placeholder="Date of Assessment">
							<span class="fa fa-calendar form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group has-feedback not_gc">
						<label class="col-sm-3 control-label">Scopes of Assessment</label>
						<div class="col-sm-4">
							<input type="text" id="start_date" class="form-control start_date" name="start_date" placeholder="Start Date">
							<span class="fa fa-calendar form-control-feedback"></span>
						</div>
						<div class="col-sm-4">
							<input type="text" id="end_date" class="form-control" name="end_date" placeholder="End Date">
							<span class="fa fa-calendar form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group not_gc">
						<label class="col-sm-3 control-label ">NC Classification</label>
						<div class="col-sm-4">
							<select class="populate placeholder s_list" name="nc_class" id="f_ncc">
								
							</select>
						</div>
					</div>

					<!--<div class="form-group" >
						<label class="col-sm-3 control-label" for="form-styles"></label>
						<label class="col-sm-8"  style="text-align: center" id="dev_def" for="form-styles"></label>
					</div>-->

					<div class="form-group" >
						<label class="col-sm-3 control-label" for="form-styles">Deviation Filter</label>
						<div class="col-sm-8">
							<?php $list = dev_dept_filter(); echo $list;?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="form-styles">Deviation</label>
						<div class="col-sm-8">
							<select class="populate placeholder s_list" name="text_dev" id="text_dev">
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="form-styles">Clause(s)</label>
						<div class="col-sm-5">
							<select class="populate placeholder s_list" name="text_cls" id="f_cls">
							</select>
						</div>
						</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="form-styles">Deviation/Complaint Statement</label>
						<div class="col-sm-8 control-label">
								<textarea class="form-control" rows="5" name="text_rem" id="text_rem"></textarea>
						</div>
					</div>
					<div class="form-group">
				        <div class="col-xs-12">
				        	<center>
				            <button id="btn_addfindings" type="submit" class="btn btn-primary btn-lg">Add Findings</button>
				        	</center>
				        </div>
    				</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">	
$(function(){
	$('.preloader').show();

	$('#f_toa').change(function(){
	    var optionSelected = $(this).find("option:selected");
	    var valueSelected  = optionSelected.val();
	    // alert(valueSelected)
	    if (valueSelected==4) {
	    	// alert('guest');
	    	$('.not_gc').hide()
	    }else{
	    	$('.not_gc').show()
	    };
	 });


	$('.rad_filter').change(function(){
		// $('#text_dev').wru()
		// alert('click')
		var x = $(this).val()
		$.ajax({
	        type: 'POST',
	        url: 'ajax/ajax.php',
	        data: {id:x, action: "load_devlist"},
	        success: function(msg) {
	        	$('#text_dev').html(msg)
	        	$('#text_dev').select2({
					 matcher: function(term, optText, els) {
					    var allText = optText + els[0].parentNode.getAttribute('label')  || '';
					    return (''+allText).toUpperCase().indexOf((''+term).toUpperCase()) >= 0;
					}
				})
			}
	    })
	})
	//loading <select>
	var_loc = 0;
	var_toa = 0;
	var_nc = 0;
	var_cls = 0;
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {action: "f_locale"},
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
        data: {action: "f_toa"},
        success: function(id){
			// alert(id)
			$('#f_toa').html(id)
			var_toa = 1
			s_reload()	
		}  
	})
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {action: "f_nc_class"},
        success: function(id){
			// alert(id)
			$('#f_ncc').html(id)
			var_nc = 1
			s_reload()
		}  
	})
	$.ajax({
        type: 'POST',
        url: 'ajax/ajax.php',
        data: {action: "f_cls"},
        success: function(id){
			// alert(id)
			$('#f_cls').html(id)
			var_cls = 1
			s_reload()
		}  
	}) 
	function s_reload(){
		if (var_loc==1 && var_toa==1 && var_nc==1 && var_cls==1 ) {
			reloadsel()
			// alert('reload sel')
		};
	}
	//loading <select>



	function re_bootrap(str){
	    $('#defaultForm')
	        // // Get the bootstrapValidator instance
	        .data('bootstrapValidator')
	        // Mark the field as not validated, so it'll be re-validated when the user change date
	        .updateStatus(str, 'NOT_VALIDATED', null)
	        // Validate the field
	        .validateField(str);
		}
	// Run Select2 on element
	$('#input_date').datepicker();
	// $('#start_date').datepicker();
	$('#input_date')
        .on('change', function(e) {
        	// console.log('change')
            // Validate the date when user change it
            re_bootrap('input_date');
     	});
    $("#start_date").datepicker({
    	numberOfMonths: 2,
        onSelect: function(date){            
            var date1 = $('#start_date').datepicker('getDate');           
            var date = new Date( Date.parse( date1 ) ); 
            date.setDate( date.getDate() + 1 );        
            var newDate = date.toDateString(); 
            newDate = new Date( Date.parse( newDate ) );                      
            $('#end_date').datepicker("option","minDate",newDate);            
        }
    });  
    $('#end_date').datepicker({numberOfMonths: 2})
        .on('change', function(e) {
        	console.log('change')
            // Validate the date when user change it
            re_bootrap('end_date')
            re_bootrap('start_date')
         	
            });

	LoadBootstrapValidatorScript(DemoFormValidator);
	//sanitize input 
	function sanitize(id){
		id = id.replace("\r\n", "");
		id = id.replace(/[^\\]\\|\n/g, " ").trim();
		return id;
	}
	//for deviation label
	$('#text_dev').on('change', function(){
		console.log("change")
		var dev_id = $(this).val()
		console.log("change", dev_id)
		$.ajax({  
			type: "POST", 
			url: "ajax/ajax.php",  
			data: { id: dev_id, action: "deviation_label" },
			success: function(id) { 
				$('#dev_def').text(id);
				// $("#dev_def").replace( 'z ', '<br>' )							
			}  
		});  
	})
	
	function reloadsel(){
		function DemoSelect2(){
			$('.s_list').select2();
			
		}
		LoadSelect2Script(DemoSelect2);
		// LoadBootstrapValidatorScript(DemoFormValidatorAdd);
		$('.preloader').hide();
	}
})
</script>
