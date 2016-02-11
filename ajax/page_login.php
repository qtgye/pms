<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>PMS</title>
		<meta name="description" content="description">
		<meta name="author" content="Evgeniya">
		<meta name="keyword" content="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="../plugins/font-awesome-4.1.0/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="../css/style.css" rel="stylesheet">
	</head>
<body>
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

			<div class="box">
				<div class="box-content">
					<div class="text-center">
						<h3 class="page-header">Performance Monitoring System</h3>
					</div>
					<div class="form-group">
						<label class="control-label">Employee ID</label>
						<input type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="6" class="form-control" name="username" id="user"/>
					</div>
					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" class="form-control" name="password" id="pass"/>
					</div>
					<div class="text-center">
						<a href="#" id="login" class="btn btn-primary">Sign in</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script src="../plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript">

$(function(){
	$('#pass').val('')
	$('#login').click(function(){
		console.log("click")
		var eid = $('#user').val();
		var pass = $('#pass').val();
		// console.log("click",eid,pass)
		eid = sanitize(eid)
		pass = sanitize(pass)
		var action = "login";
		if (eid!="") {
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: { user: eid, pass: pass, action: "login" },
				success: function(id) {
					// alert(id)
					id = sanitize(id)
					if (id==1) {
						window.location.replace("../index.php")
					}else{
						alert("username/password not Found.")
						$('#user').val('')
						$('#pass').val('')
					}
				}
			})
		}else{
			alert("Please enter username and password");
		}
		return false;
	})
	function sanitize(id){
      id = id.replace("\r\n", "");
      id = id.replace(/[^\\]\\|\n/g, " ").trim();
      return id;
    }
})

</script>
