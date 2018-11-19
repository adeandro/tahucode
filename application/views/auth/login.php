<div class="row">
	<div class="col-xs-4 col-xs-offset-4">
		<h2 align="center" style="font-weight: bold;">TAHU<small>Code</small></h2>
		<?php if (validation_errors() || $this->session->flashdata('error')): ?>
			<div class="alert alert-warning">
				<?php echo validation_errors(); ?>
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php endif ?>
		<div class="well">
			<form action="<?php echo base_url('auth/login'); ?>" method="post">
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Username.." name="username" value="<?php echo set_value('username') ?>">
						<div class="input-group-addon"><i class="fa fa-user"></i></div>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Password.." name="password">
						<div class="input-group-addon"><i class="fa fa-lock"></i></div>
					</div>
				</div>
				<div class="form-group">
					<button type='submit' class="btn btn-default btn-block">login <i class="fa fa-sign-in"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>