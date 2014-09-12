<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login to Photo Booth</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/login.css">
</head>

<body>
		
<div id="login_form"><h1>Photo Booth</h1>
	<form id="form1" name="form1" method="post" action="<?php echo base_url(); ?>index.php/auth/login">
	<div><input type="text" name="txtUsername" id="txtUsername" placeholder="User Name" required />
		
	</div>
	<div>
		<input type="text" name="txtPassword" id="txtPassword" placeholder="Password" required />
	</div>	
	<div>
		<input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
	</div>
	<div>
	<?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg');} ?>
	</div>
	</form>

</div>

<script src="<?php echo base_url();?>assets/js/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/validation.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/login.js" type="text/javascript"></script>


</body>
</html>