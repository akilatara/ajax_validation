<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"> </script>
</head>
<body>

	<div class="container">
		<input type="text" name="username" class="form-control"/>
		<span id="username_result"></span>
		<br>
		<input type="text" name="arnnumber" class="form-control"/>
		
	</div>

</body>
</html>

<script>
	$(document).ready(function(){
		$('#username').change(function(){
			var username=$('#username').val();
			if (username != ''){
				$.ajax({
					url:"<?php echo base_url(); ?>Sample/username_availability";
					method:"POST",
					data:{username:username},
					success:function(data){
						$('#username_result').html(data);
					}
				});
			}
		});
	});

</script>