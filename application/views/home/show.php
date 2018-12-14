<div class="col-sm-9">
	<div align="center">
		<h2><?php echo $post['title'] ?></h2>
	</div>
	<br>
	<div class="well">
		<i class="fa fa-tags"></i>Tags
		<?php 

		$category = explode("|", $post['category']);
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
</div>
<div class="col-sm-3">
	<h4>Lates Posts</h4>
	<ul class="list-group">
	<?php 
	foreach ($last_post as $last) {
		echo "<li class='list-group-item'>
			<a href=''>
				<img src='./assets/img/posts/default.png' alt='Thumb'>
				<p>". $last->title ."</p>
			</a>
		</li>";
	}
	 ?>		
	</ul>
</div>