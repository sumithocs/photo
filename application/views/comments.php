<?php 
//var_dump($comments);die;
	if(isset($comments) && !empty($comments)){
		foreach($comments as $comment){
			
?>	
<p class="comment_panel"><?php echo $comment['comment'];?> <b>by <?php echo $comment['username'];?></b> on <i><?php echo date("Y-m-d",$comment['added']);?></</i></p>

<?php } } else{

	?>
<p class="comment_panel">No comments added</p>
<?php }?>