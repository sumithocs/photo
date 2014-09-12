<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Photo Booth</title>
	<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>favicon.png" >
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/photo_grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/welcome.css">

</head>
<body>

<div class="wrapper">
	<div class="container">
	<div id="body">
		<h1><?php echo $photo_detail->photo_name;?></h1>	
		
		<div id="four-columns" class="grid-container" style="display:block;">
			<ul class="rig columns-2">
				
				<li>
					<img src="<?php echo base_url();?>uploads/images/<?php echo $photo_detail->photo_file;?>" />
					<h3><?php echo $photo_detail->photo_name;?></h3>
					<p><?php echo $photo_detail->photo_description;?></p>
					<?php if(isset($photo_comments) && !empty($photo_comments)){
					foreach($photo_comments as $comment){
						?>
					<p class="comment_panel"><?php echo $comment['comment'];?> <b>by <?php echo $comment['username'];?></b></p>
					<?php }}?>
					
					
				</li>		
				
			</ul>
		</div>
		
		<hr />
		
		
		</div>
	</div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/photo.js" type="text/javascript"></script>
</body>
</html>