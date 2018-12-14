	<h3>Edit post : <small><?php echo $post['title']; ?></small></h3>
<div class="panel panel-default">
	<div class="panel-body">
		<form action="<?php echo base_url('post/update/'.$post['slug']) ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<h4>Title</h4>
				<input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>">
			</div>
			<div class="form-group">
				<h4>Content</h4>
				<textarea name="content" id="content" cols="30" rows="10" class="form-control">
					<?php echo $post['content'] ?>
				</textarea>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-xs-6">
						<h4 for="category">Categories</h4>
						<select name="category" id="category" class="form-control">
							<?php 
								foreach ($categories as $category) {
									if ($category->category_name == $post['category']) {
										echo "<option value='". $category->category_name ."' selected>". $category->category_name ."</option>";
									}else{
										echo "<option value='". $category->category_name ."'>". $category->category_name ."</option>";
									}
								}
							 ?>
						</select>
					</div>
					<div class="col-xs-6">
						<h4>Tags</h4>
						<textarea name="tags" id="tags" class="form-control">
						<?php							
							echo $post['tags'];
						 ?>						
						</textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<h4>Header Image</h4>
				
				<?php
					if (file_exists('./assets/img/posts/'.$post['header_image'])) {
						echo "<img class='img-responsive' style='max-width: 500px;' src='". base_url('/assets/img/posts/'.$post['header_image']) ."' alt='header_image'>";
					}else{
						echo "<h5>Image Header not found</h5>";
					}
				 ?>
				<br>
				<input type="hidden" value="<?php echo $post['header_image'] ?>" name="hidden_header_image">
				<input type="file" class="form-control" name="header_image">
			</div>
			<div class="form-group">
				<a href="<?php echo base_url('user/post') ?>" class="btn btn-info "><i class="fa fa-chevron-left"></i> Back</a>
				<button class="btn btn-primary" type="submit">Update</button>
			</div>
		</form>
	</div>
</div>
