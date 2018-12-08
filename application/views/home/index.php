	<?php 
		$format = "%d-%M-%Y, %h:%i";

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
	
</div>