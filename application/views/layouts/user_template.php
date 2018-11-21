<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TAHUCode | <?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-3.3.7/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-3.3.7/css/paper.bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome-4.6.3/css/font-awesome.css'); ?>">

</head>
<body>
	<nav class="navbar navbar-default navbar-satic-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" >
					<img style="max-width: 150px; padding-top: 5px;" src="<?php echo base_url('assets/img/brand.png') ?>" alt="TAHUCode">
				</a>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
	
		<div class="col-xs-3">
			<ul class="list-group">
				<a href="<?php echo base_url('user'); ?>" class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
				<a href="<?php echo base_url('user/post'); ?>" class="list-group-item"><i class="fa fa-file-powerpoint-o"></i> Post</a>
				<a href="<?php echo base_url('user/logout') ?>" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
			</ul>
		</div>


		<div class="col-xs-9">
			<?php echo $content; ?>
		</div>
	</div>


	<!-- script -->
	<script src="<?php echo base_url('assets/jquery-3.1.1.js'); ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap-3.3.7/js/bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
	<script>
		jQuery(document).ready(function($) {

			CKEDITOR.replace('content');
		});
	</script>
</body>
</html>