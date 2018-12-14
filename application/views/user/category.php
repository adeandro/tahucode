<div class="row">
	<?php if (validation_errors()): ?>
		<div class="alert alert-warning">
			<button class="close" data-dismiss='alert'>&times;</button>
			<?php echo validation_errors(); ?>
		</div>
	<?php elseif($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<button class="close" data-dismiss='alert'>&times;</button>
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php elseif($this->session->flashdata('error')): ?>
		<div class="alert alert-warning">
			<button class="close" data-dismiss='alert'>&times;</button>
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php endif ?>

	<div class="col-md-6">
		<div class="form-group">
			<a href="<?php echo base_url('user/post'); ?>" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="panel-title">Add new category</p>
			</div>		
			<table class="table table-bordered">
				<tr>
					<th>No</th>
					<th>Category Name</th>
					<th>Action</th>
				</tr>
				<?php 
				$no = 1;
					if ($categories->num_rows() > 0) {
					foreach ($categories->result() as $category) {
						echo "<tr>
							<td>". $no++ ."</td>
							<td>". $category->category_name ."</td>
							<td align='center'>
							<a href='#delete". $category->id_category ."' data-toggle='modal' class='btn btn-xs btn-warning'><i class='fa fa-trash'></i></a>
							</td>
						</tr>";
					}
				}else{
					echo "<tr>
						<td colspan='3' align='center'>You don't have any category yet :(</td>
					</tr>";
				}
					 ?>
			</table>				
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				
					<a href="#panelOne" class="btn btn-primary btn-block" data-toggle='collapse' data-parent="#accordion"><i class="fa fa-plus"></i> Add new category</a>
				
				<div class="panel-collapse collapse in" id="panelOne">
					<div class="panel-body">
						<form action="<?php echo base_url('category/save'); ?>" method="post">
							<div class="form-group">
								<label for="category_name">Category name :</label>
								<input type="text" class="form-control" name="category_name" placeholder="Enter category name...">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Save</button>
							</div>
						</form>
					</div>
				</div>		
			</div>
			<div class="panel panel-default">
				
					<a href="#panelTwo" class="btn btn-primary btn-block" data-toggle='collapse' data-parent="#accordion"><i class="fa fa-pencil"></i> Edit category</a>
				
				<div class="panel-collapse collapse" id="panelTwo">
					<div class="panel-body">
						<form action="<?php echo base_url('category/edit'); ?>" method="post">
							<div class="form-group">
								<label for="select_category">Select category :</label>
								<select name="select_category" id="select_category" class="form-control">
									<option value="">---</option>
									<?php 
										foreach ($categories->result() as $category) {
											echo "<option value='". $category->id_category ."'>". $category->category_name ."</option>";
										}
									 ?>
								</select>
							</div>
							<div class="form-group">
								<label for="edit_category">Change category name to :</label>
								<input type="text" class="form-control" name="edit_category" placeholder="Enter new category name...">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info btn-block"><i class="fa fa-arrow-up"></i> Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal delete -->
<?php
	foreach ($categories->result() as $category) {
		echo "<form action='". base_url('category/delete/'.$category->id_category)."' method='post'>
			<div class='modal fade' id='delete". $category->id_category ."'>
				<div class='modal-dialog'>
					<div class='modal-content'>
						<div class='modal-header'>
							<button class='close' data-dismiss='modal'>&times;</button>
							<h3>Delete this category <i class='fa fa-hand-o-right'></i> <u style='color: red;'>".$category->category_name."</u></h3> 
						</div>
						<div class='modal-footer'>
							
							<div class='pull-right'>
								<button class='btn btn-info' data-dismiss='modal'><i class='fa fa-chevron-left'></i> Cancle</button>
								<button type='submit' class='btn btn-warning'><i class='fa fa-trash'></i> Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>";
		
	}
 ?>