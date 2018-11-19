<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TAHUCode | <?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-3.3.7/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome-4.6.3/css/font-awesome.css'); ?>">
</head>
<body>
	<nav class="navbar navbar-default navbar-satic-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#">
					<img style="max-width: 150px;" src="<?php echo base_url('assets/img/brand.png') ?>" alt="TAHUCode">
				</a>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
	
		<?php echo $content; ?>
	</div>


	<!-- script -->
	<script src="<?php echo base_url('assets/jquery-3.1.1.js'); ?>"></script>
</body>
</html>