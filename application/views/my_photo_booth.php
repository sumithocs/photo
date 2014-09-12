<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Photo Booth</title>
	<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>favicon.png" >
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/photo_grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/welcome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/menu.css">


</head>
<body>
<h1><a href="<?php echo base_url();?>">Photo Booth</a></h1>
<h3 style="text-align:center; font-family:sans-serif;color:#FF6600;font-size:14px">
<?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg');} ?>
</h3>
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
          	<li><a>My Booth</a></li>
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
		
		<h1>My Photos</h1>
		
		<?php //print_r($photos);?>
		<div id="four-columns" class="grid-container" style="display:block;">
			<ul class="rig columns-4">
			<?php 
			if(isset($photos) && !empty($photos)){
	  			foreach($photos as $photo){
	  		?>		
				<li>
					<img src="<?php echo base_url();?>uploads/images/<?php echo $photo['photo_file'];?>" />
					<h3><?php echo $photo['photo_name'];?></h3>
					<p><?php echo $photo['photo_description'];?></p>
					<?php 
					if($logged_in){
					?>
					<h3>
						<img class="linked-image ele-view-comment-box" status="closed" photo_id="<?php echo $photo['photo_id'];?>" title="Comments For This Photo" width="20px" src="<?php echo base_url();?>assets/icons/comment.png" />
						<img style="margin-left:10px" class="linked-image ele-view-photo-detail"  photo_id="<?php echo $photo['photo_id'];?>" title="View Photo Detail" width="20px" src="<?php echo base_url();?>assets/icons/view.png" />
						<a href="<?php echo base_url();?>index.php/photo/edit_photo/<?php echo $photo['photo_id'];?>"><img style="margin-left:10px" class="linked-image ele-edit-photo-detail" title="Edit Photo Detail" width="20px" src="<?php echo base_url();?>assets/icons/edit.png" /></a>
						<a><img style="margin-left:10px" class="linked-image ele-delete-photo"  photo_id="<?php echo $photo['photo_id'];?>" title="Delete This Photo" width="20px" src="<?php echo base_url();?>assets/icons/delete.png" /></a>
						</h3>
					
					<div id="ele-comment-div<?php echo $photo['photo_id'];?>" style="display:none;" class="submit">
						<textarea rows="4" id="txt-comment-id<?php echo $photo['photo_id'];?>" placeholder="Comment"></textarea>
						<img class="linked-image ele-submit-comment" photo_id="<?php echo $photo['photo_id'];?>" width="150" src="<?php echo base_url();?>assets/icons/submit_comment.png" />
					
					<div class="msg" id="ele-comment-msg<?php echo $photo['photo_id'];?>"></div>
					<div id="ele-comment-block<?php echo $photo['photo_id'];?>"></div>
					
					</div>
					<?php }?>
				</li>
				<?php }}?>
				
			</ul>
		</div>
		
		<div id="view_photo_detail" title="Photo Detail"></div>
		
		<hr />
		
		<p class="centered">Footer</p>
		</div>
	</div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="<?php echo base_url();?>assets/js/jquery/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/js/photo.js" type="text/javascript"></script>

</body>
</html>