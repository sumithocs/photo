<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='Fri, 01 Jan 1990 00:00:00 GMT'>
	<meta http-equiv='pragma' content='no-cache'>
	<title>Photo Booth</title>
	<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>favicon.png" >
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/photo_grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/welcome.css">

</head>
<body>

<div class="wrapper">
	<div class="container">
	<div id="body">
		<h1>Photo Booth</h1>
		
		<h1>
		<?php 
		$logged_in = $this->session->userdata('logged_in');		
		if($logged_in){
		?>
		<a href="<?php echo base_url();?>index.php/auth/my_booth">My Photo Booth</a>
		<?php }else{?>
		<a href="<?php echo base_url();?>index.php/auth">Login</a>
		<?php }?>
		</h1>
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
					<h3><img class="linked-image ele-view-comment-box" status="closed" photo_id="<?php echo $photo['photo_id'];?>" title="Add your comment" width="20px" src="<?php echo base_url();?>assets/icons/comment.png" /></h3>
					
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
		
		<hr />
		
		<p class="centered">Footer</p>
		</div>
	</div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/photo.js" type="text/javascript"></script>
</body>
</html>