<div class="well">
	<h3 align="center"><?php echo $post['title']; ?></h3>
	<br>
	<i class="fa fa-tags"></i>Tags
	<?php 	

	$categories = explode(",", $post['tags']);

	foreach ($categories as $category) {
		echo "<span class='label label-success'>". $category ."</span> ";
	}

	 ?>
	<div class="pull-right">
		<?php 
		$format = "%d-%M-%Y, %h:%i";
		echo mdate($format, $post['timestamp']);
		 ?>
	</div>
</div>
<div class="well">
	<?php echo $post['content']; ?>
</div>
<a href="<?php echo base_url('user/post') ?>" class="btn btn-primary"><i class="fa fa-chevron-left"></i>Back</a>
<br>
