<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Photo</title>
	<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>favicon.png" >
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/photo_grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/welcome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/menu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/photo_manage.css">

</head>
<body>
<h1><a href="<?php echo base_url();?>">Photo Booth</a></h1>

<h1>
		<?php 
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
			$user_name = $this->session->userdata('logged_user');
		?>
		
		<nav id="main-menu">
     	<ul class="nav-bar">
     		<li><img width="100px" class="photo" src="<?php echo base_url();?>uploads/user_images/<?php echo $user_name;?>.png" /></li>
          	<li><a>Welcome <?php echo ucwords($user_name);?></a></li>
          	<li><a href="<?php echo base_url();?>index.php/auth/my_booth">My Booth</a></li>
          	<li><a href="<?php echo base_url();?>index.php/photo/new_photo">Add New Photo</a></li>
          	<li><a href="<?php echo base_url();?>index.php/auth/logout">Logout</a></li>
     	</ul>
		</nav>
		<?php }else{?>
		
		<a href="<?php echo base_url();?>index.php/auth">Login</a>
		<?php }?>
		</h1>
		
		
<div class="wrapper">
	<div class="container">
		<div id="body">			
			<div id="add_photo_div">	
			<h1>Edit Photo</h1>
				<form enctype="multipart/form-data" id="form1" name="form1" method="post" action="<?php echo base_url(); ?>index.php/photo/save_edit_photo">
					<div>
						<input required type="text" name="txtPhotoname" id="txtPhotoname" value="<?php echo $photo->photo_name;?>" placeholder="Add a Photo Title"/>
					</div>
					<div>
						<textarea rows="10" name="txtDescription" id="txtDescription" placeholder="Add a Description"><?php echo $photo->photo_description;?></textarea>
					</div>
					<!-- <div>
						<input type="file" name="fPhoto" id="fPhoto" placeholder="Photo File"/>
					</div> -->	
					<div id="imagePreviewDiv">
						<ul class="rig columns-2 left-margin-0">
							<li style="margin-left:-15px">
								<img id="imagePreview" src="<?php echo base_url()."uploads/images/".$photo->photo_file;?>" />
							</li>
						</ul>
					</div>
					
					<div>
					<input type="hidden" name="photo_id" value="<?php echo $photo->photo_id;?>"/>
						<input type="submit" name="submit" value="Edit Photo">
					</div>	
				</form>
			</div>		
		<hr />		
		<p class="centered">Footer</p>
		</div>
	</div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/validation.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/photo.js" type="text/javascript"></script>
</body>
</html>