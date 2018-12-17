
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
	<div class="panel panel-default">
		<div class="panel-heading">
			<p class="panel-title">Comment</p>
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url('s/'.$post['slug'].'/insert_comment') ?>" method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label for="comment">Comment</label>
					<textarea name="comment" id="comment" cols="10" rows="10" class="form-control"></textarea>
				</div>
				<div class="form-group pull-right">
					<button type="submit" class="btn btn-info">Submit Comment</button>
				</div>
				<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
			</form>
		</div>
		<div class="panel-footer">
			<?php 
				$format = "%d-%M-%Y, %h-%i";

				foreach ($comments as $comment) {
					echo "<div class='form-group'>
						<h4 style='font-weight: bold;'>". $comment->name ."</h4>
						<p>". $comment->comment ."</p>
						<small class='pull-right'>". mdate($format, $comment->timestamp) ."</small>
						<br>
						<hr>
					</div>";
				}
			 ?>
		</div>
	</div>