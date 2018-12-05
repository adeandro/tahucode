<?php if (validation_errors()): ?>
	<div class="alert alert-warning">
		<button class="close" data-dismiss='alert'>&times;</button>
		<?= validation_errors() ?>
	</div>
<?php elseif($this->session->flashdata('error')): ?>
	<div class="alert alert-warning">
		<button class="close" data-dismiss='alert'>&times;</button>
		<?php echo $this->session->flashdata('error'); ?>
	</div>
<?php endif ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Create new post</h3>
		<hr>
	</div>
	<div class="panel-body">
		<form action="<?php echo base_url('/post/create') ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<h4 for="title">Title :</h4>
				<input type="hidden" name="publish">
				<input type="text" class="form-control" name="title" placeholder="Input title here..." value="<?php echo set_value('title'); ?>">
			</div>
			<div class="form-group">
				<h4 for="content">Content :</h4>
				<textarea name="content" id="content" cols="30" rows="10" class="form-control"><?= set_value('content')?></textarea>
			</div>
			<div class="form-group">
				<h4 for="category">Category :</h4>
				<select name="category[]" multiple id="category" class="form-control" size="max-width: 200px;">
					<?php
						foreach ($categories->result() as $category) {
							echo "<option value='". $category->category_name ."'>". $category->category_name ."</option>";
						}
					 ?>
				</select>
			</div>
			<div class="form-group">
				<h4>Choose header image	:</h4>
				<input type="file" name="header_image" class="form-control">
			</div>
			<br>

			<div class="form-group">
				<button class="btn btn-info" name="back"></i> Back & save to draft</button>
				<button class="btn btn-primary" type="submit"><i class="fa fa-arrow-up"></i> Publish</button>
				<!-- <button class="btn btn-default">previev</button> -->
			</div>
		</form>
	</div>
</div>