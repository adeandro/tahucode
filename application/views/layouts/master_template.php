<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TAHUCode | <?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-3.3.7/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-3.3.7/css/cyborg.bootstrap.min.css'); ?>">
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
	
		<?php echo $content; ?>
	</div>

	<div class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<div>Tags</div>
					<?php 
						$this->load->model('post_model');
						$categories = $this->post_model->get_categories()->result();

						foreach ($categories as $tag) {
							echo "<div class='label label-default'><i class='fa fa-tags'></i> ". $tag->category_name ."</div> ";
						}
					 ?>
				</div>
				<div class="col-sm-5">
					
				</div>
				<div class="col-sm-4">
					<h4>Contact Us</h4>
					<div class="form-group">
					<table class="table">
						<tr>
							<td><i class="fa fa-envelope"></i></td>
							<td>ariawan.ade@gmail.com</td>
						</tr>
						<tr>
							<td><i class="fa fa-phone"></i></td>
							<td>082329653390</td>
						</tr>
						<tr>
							<td><i class="fa fa-facebook-official"></i></td>
							<td><a href="http://facebook.com/ade.soemam">Ade Ariawan</a></td>
						</tr>
					</table>						
						Jl.Dieng-Batur Km 07, Bakal, Batur, Banjarnegara
					</div>
				</div>
			</div>
		<hr>
		<div class="pull-right">
			Copyright <i class="fa fa-copyright"></i> <a href="http://facebook.com/ade.soemam">Ade Ariawan</a>
		</div>
		</div>
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