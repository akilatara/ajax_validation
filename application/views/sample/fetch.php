<!DOCTYPE html>
<html>
<head>
	<title>sample</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"> </script>
	<script type="text/javascript"src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	
</head>
<body>
	<h3> Sample Test</h3>
	<form action="<?php echo base_url(); ?>Sample/post_submit"  method="post">
	<div class="container">
		 
			<input type="text" class="form-control" name="username" placeholder="UserName" id=username autocomplete="off">
			<div id="msg"></div>
		
		
		<br/> <br/>

		
			<input type="number" class="form-control" name="arnnumber" placeholder="ARN Number" id="arnnumber" autocomplete="off">
			
		<br/><br>
			<input type="submit" class="form-control" name="submit" value="submit">
		
	</div>
  </form>
</body>
</html>

<script>
	$(document).ready(function() {
		$("#username").on("input", function(e) {
			$('#msg').hide();
			if ($('#username').val() == null || $('#username').val() == "") {
				$('#msg').show();
				$("#msg").html("Username is required field.").css("color", "red");
			} else {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>Sample/get_username_availability",
					data: $('#username').serialize(),
					dataType: "html",
					cache: false,
					success: function(msg) {
						$('#msg').show();
						$("#msg").html(msg);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#msg').show();
						$("#msg").html(textStatus + " " + errorThrown);
					}
				});
			}
		});
	});
</script>