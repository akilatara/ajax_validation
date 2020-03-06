<!DOCTYPE html>
<html len="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>login register</title>
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>

 <div class="container">
  <div class="col-sm-4"></div>
  <div class="col-sm-5">
    <h3 align="center"> Login Form</h3>
    <div class="panel panel-default">
    <div class="panel-heading">Login</div>
    <div class=" panel body">

	<form action="<?php echo base_url(); ?>login/post_login" method="post">
         
         <div class="form-group">
           <input type="email" name="email" class="form-control" placeholder=" Enter your Email" value="<?php echo set_value('email'); ?>" autocomplete="off"/>
           <span class="text-danger"><?php echo form_error('email'); ?></span>
      </div>
          <div class="form-group">
           <input type="password" name="password" class="form-control" placeholder="Enter your Password" value="<?php echo set_value('password'); ?>"  autocomplete="off"/>
           <span class="text-danger"><?php echo form_error('password'); ?></span>
      </div>
  <div class="form-group">
        <input type="submit" name="login"value="Login" class="btn btn-primary" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?php echo base_url('Register/post_register'); ?>" class="btn btn-info"  >Register</a>
      </div>
        <?php
    echo $this->session->flashdata("error");
    ?>
            
           </div>
        </div>
      </div>
  </div>
  </form> 
</body>
</html>