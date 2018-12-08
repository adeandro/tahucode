<?php if ($this->session->flashdata('success')): ?>
	<div class="alert alert-success">
		<button class="close" data-dismiss='alert'>&times;</button>
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php endif ?>
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
				<th>Categories</th>
				<th>Action</th>
			</tr>
			<?php 
				$no = 1;

				if ($posts->num_rows() > 0) {
					foreach ($posts->result() as $post) {
						if ($post->published == 1) {
							
								echo "<tr>
							<td>". $no++ ."</td>
							<td><a href='". base_url('post/show/'.$post->slug) ."'>". substr($post->title, 0,40) ."</a></td>
							<td>". mdate('%d-%M-%Y, %h:%i', $post->timestamp) ."</td>
							<td><p class='label label-success'>Published</p></td>
							<td>";
								foreach (explode("|", $post->category) as $categories) {
							 		echo "<p class='label label-info'>". $categories ."</p> ";
							 	}
							 echo "</td>
							<td align='center'>
								<a href='". base_url('post/edit/'.$post->slug) ."' class='btn btn-info btn-sm'><i class='fa fa-pencil'></i></a>
								<a href='#modal". $post->id_post ."' data-toggle='modal' class='btn btn-sm btn-warning'><i class='fa fa-trash'></i></a>
							</td>
						</tr>";
							
						}
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

<?php 

foreach ($posts->result() as $post) {
	echo "<div class='modal fade' id='modal". $post->id_post ."'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<button class='close' data-dismiss='modal'>&times;</button>
						Apakah anda yakin mau menghapus <strong style='color: red'>". $post->title ."</strong> ?
					</div>
					<div class='modal-footer'>
						<a href='". base_url('post/delete/'.$post->id_post) ."' class='btn btn-warning'>Delete</a>
					</div>
				</div>
			</div>
		</div>";
}

 ?>