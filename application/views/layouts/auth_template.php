<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TAHUCode | <?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-3.3.7/css/bootstrap.css'); ?>">
	
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome-4.6.3/css/font-awesome.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/highlight/styles/monokai-sublime.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/custom/css.css'); ?>">
</head>
<body>
	<nav class="navbar navbar-default navbar-satic-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="<?php echo base_url() ?>">
					<img style="max-width: 150px; padding-top: 5px;" src="<?php echo base_url('assets/img/brand.png') ?>" alt="TAHUCode">
				</a>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<?php echo $content ?>
	</div>


	<!-- script -->
	<script src="<?php echo base_url('assets/jquery-3.1.1.js'); ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap-3.3.7/js/bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('assets/highlight/highlight.pack.js'); ?>"></script>
	<script>
		hljs.initHighlightingOnLoad();
	</script>
</body>
</html>