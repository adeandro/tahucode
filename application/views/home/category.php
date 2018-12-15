<?php 

echo "<div>
	<h3>Category : ". $this->uri->segment(3) ."</h3>
	<br>
</div>";

foreach ($categories->result() as $category) {
	$img = $category->header_image;
	$format = "%d-%M-%Y, %h:%i";

	if (file_exists('./assets/img/posts/'.$img)) {
		echo "<div class='col-xs-4'>
			<img class='img-responsive' src='". base_url('assets/img/posts/'. $img) ."' alt='thumbnail'>
			<div class='panel panel-default'>
				<div class='panel-body' style='min-height: 70px;'>
					". $category->title ."
				</div>
				<div class='panel-footer'>
					". mdate($format, $category->timestamp) ."
				</div>
			</div>
		</div>";
	}else{
		echo "jom";
	}
}

 ?>