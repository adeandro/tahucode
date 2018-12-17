<?php 
				$format = "%d-%M-%Y, %h:%i";
				$this->load->model('post_model');

				foreach ($categories->result() as $category) {
					$cat_name = $category->category_name;
					$last_post = $this->post_model->get_post_by_category_name($cat_name)->row_array();
					$last_posts = $this->post_model->get_posts_by_category_name($cat_name)->result();
					
					echo "<div class='well'>
							<h3 style='font-weight: bold;'>". $cat_name ."</h3>
						<div class='row'>
							<div class='col-xs-6'>
							<a href='". base_url('s/'.$last_post['slug']) ."'><img class='img-responsive' src='./assets/img/posts/". $last_post['header_image'] ."' alt=''></a>
								<div class='panel panel-default'>
									<div class='panel-body'>
										<h4>
										<a href='". base_url('s/'.$last_post['slug']) ."' class='panel-title'>". $last_post['title'] ."</a>
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
										<a href='". base_url('s/'.$lasts->slug) ."' class='panel-title'><img class='img-responsive' src='./assets/img/posts/". $lasts->header_image ."' alt=''></a>
										
										<div class='panel panel-default'>
											<div class='panel-body' style='min-height: 90px;'>
												<h5>
												<a href='". base_url('s/'.$lasts->slug) ."' class='panel-title'>". substr($lasts->title, 0,30) ."...</a>
													
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
							<div >
								<a href='". base_url('p/category/'.$cat_name) ."' class='btn btn-primary'>Show all ". $cat_name ." post <i class='fa fa-chevron-right'></i></a>
							</div>
					</div>";
				}
				

				
				?>