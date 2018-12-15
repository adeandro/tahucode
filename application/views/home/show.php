
	<div align="center">
		<h2><?php echo $post['title'] ?></h2>
	</div>
	<br>
	<div class="well">
		<i class="fa fa-tags"></i>Tags
		<?php 

		$category = explode(",", $post['tags']);
		foreach ($category as $tags) {
			echo "<div class='label label-success'>". $tags ."</div> ";
		}

		 ?>
		 <div class="pull-right">
		 	<small>
		 		<?php 
		 			$format = ("%d-%M-%Y, %h:%i");
		 			echo mdate($format, $post['timestamp']);
		 		 ?>
		 	</small>
		 </div>
	</div>

		<?php echo $post['content']; ?>
