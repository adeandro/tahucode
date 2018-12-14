<div class="row">
	<div class='col-md-9'>
		<?php 
		$format = "%d-%M-%Y, %h:%i";
		$this->load->model('post_model');

		foreach ($categories as $category) {
			$cat_name = $category->category_name;
			$last_post = $this->post_model->get_post_by_category_name($cat_name)->row_array();
			$last_posts = $this->post_model->get_posts_by_category_name($cat_name)->result();
			
			echo "<div class='well'>
					<h3 style='font-weight: bold;'>". $cat_name ."</h3>
				<div class='row'>
					<div class='col-xs-6'>
						<img class='img-responsive' src='./assets/img/posts/". $last_post['header_image'] ."' alt=''>
						<div class='panel panel-default'>
							<div class='panel-body'>
								<h4>
								". $last_post['title'] ."
								</h4>
							</div>
							<div class='panel-footer'>
								". mdate($format, $last_post['timestamp']) ."
							</div>
						</div>
					</div>
				<div class='col-xs-6'>
					<div class='row'>";
						foreach ($last_posts as $lasts) {
							echo "<div class='col-xs-6'>
								<img class='img-responsive' src='./assets/img/posts/". $lasts->header_image ."' alt=''>
								<div class='panel panel-default'>
									<div class='panel-body' style='min-height: 90px;'>
										<h5>
											". substr($lasts->title, 0,30) ."...
										</h5>
									</div>
									<div class='panel-footer'>
										". mdate($format, $lasts->timestamp) ."
									</div>
								</div>
							</div>";
						}
			echo	"</div>
				</div>
				</div>
			</div>";
		}
		
		?>
	</div>	
	<div class="col-md-3">
		<div class="list-group">
		<h4>All Category</h4>
			<?php 

			foreach ($categories as $category) {
				echo "<div class='list-group-item'>". $category->category_name ."</div>";
			}

			 ?>
		</div>
		<div>
			<h4>Lates Posts</h4>
			<div class="well">
				
			</div>
		</div>
	</div>
</div>




<!-- alternate menu
/*		$format = "%d-%M-%Y, %h:%i";

		foreach ($posts as $post) {
			if (file_exists('./assets/img/posts/'.$post->header_image)) {
				echo "<div class='col-sm-4'>
								<a href='". base_url('home/show/'.$post->slug) ."'>
									<img src='./assets/img/posts/". $post->header_image ."' alt='Header Image' class='img-responsive'>
								</a>
						<div class='panel panel-default'>
							<div class='panel-body' style='min-height: 90px;'>
								<a href='". base_url('home/show/'.$post->slug) ."' class='panel-title'>
									". $post->title ."
								</a>
							</div>
							<div class='panel-footer'>
								<div>
									<small>
										". 
										mdate($format, $post->timestamp)
										 ."
								 	</small>
								</div>
							</div>
						</div>
					</div>";
			}else{
				echo "<div class='col-sm-4'>
								<a href='". base_url('home/show/'.$post->slug) ."'>
									<img src='./assets/img/posts/default.png' alt='' class='img-responsive'>	
								</a>
						<div class='panel panel-default'>
							<div class='panel-body' style='min-height: 90px;'>
								<a href='". base_url('home/show/'.$post->slug) ."' class='panel-title'>
									". $post->title ."
								</a>
							</div>
							<div class='panel-footer'>
								<div>
									<small>
										". 
										mdate($format, $post->timestamp)
										 ."
								 	</small>
								</div>
							</div>
						</div>
					</div>";
			}
			
		}
	 ?>

<div style="">
	
</div> */
-->