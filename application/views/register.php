<!DOCTYPE html>
<html len="en">
<head>
  
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>login register</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"> </script>
</head>
<body>

    <div class="container">
    <div class="col-sm-4"></div>
    <div class="col-sm-5">
        <h3 align="center">Login & Registration</h3>
    <div class="panel panel-default">
        <div class="panel-heading">Register</div>
        <div class=" panel body">

	<form action="<?= base_url(); ?>register/post_register" method="post">
    <div class="form-group">
                <input type="text" name="fname" class="form-control" placeholder="FirstName" value="<?php echo set_value('fname'); ?>"autocomplete="off" />
                <span class="text-danger"><?php echo form_error('fname'); ?></span>
            </div>
    <div class="form-group">
                <input type="text" name="lname" class="form-control" placeholder="LastName"  value="<?php echo set_value('lname'); ?>"autocomplete="off" />
                <span class="text-danger"><?php echo form_error('lname'); ?></span>
            </div>
      <div class="form-group">
               <input type="number" name="mobile" class="form-control" placeholder="MobileNumber" value="<?php echo set_value('mobile'); ?>" autocomplete="off"/>
                <span class="text-danger"><?php echo form_error('mobile'); ?></span>
            </div>
     <div class="form-group">
                 <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" autocomplete="off"/>
                 <span class="text-danger" id="email_result"><?php echo form_error('email'); ?></span>
                 
            </div>
    </div>
    <div class="form-group">
                 <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>"  autocomplete="off"/>
                 <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
      <div class="form-group">
                  <input type="password" name="cpassword" class="form-control" placeholder="Confirm password"  value="<?php echo set_value('cpassword'); ?>" autocomplete="off"/>
                  <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
            </div>
    
     <div class="form-group">
    <input type="submit" name="register" value="Register" class="btn btn-primary" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('Login/post_login'); ?>" class="btn btn-info">Login</a>
    </div>
    <?php
      echo '<label class="text-danger">'.$this->session->flashdata("error");
      ?>
    
  
            </div>
        </div>
    </div>
</div>
 </form>
</body>
</html>

<script>
  $(document).ready(function(){
    $('#email').change(function(){
      var email = $('#email').val();
      if(email != '')
      {
        $.ajax({
          url:"<?php echo base_url(); ?>Register/check_email_availability",
          method:"POST",
          dtata:{email:email},
          success:function(data){
            $('#email_result').html(data);
          }


        });
      }

    });

    });
</script>

