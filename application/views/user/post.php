<div class="well">
<div class="form-group">
	<a href="<?php echo base_url('post/create') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Create new post</a>
	<a href="<?php echo base_url('post/category') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add new category</a>
</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<p class="panel-title">All Posts</p>
		</div>
		<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Post title</th>
				<th>Date</th>
				<th>Pusblish</th>
				<th>Action</th>
			</tr>
			<?php 
				$no = 1;

				if ($posts->num_rows() > 0) {
					foreach ($posts->result() as $post) {
						echo "<tr>
							<td>". $no++ ."</td>
							<td>". $post->title ."</td>
							<td>". $post->date ."</td>
							
							<td></td>
						</tr>";
					}
				}else{
					echo "<tr>
						<td colspan='5' align='center'>
							<h1>You don't have a post yet :(</h1>
						</td>
					</tr>";
				}
			 ?>
		</table>
	</div>
</div>