<?php echo $error; ?>
<form action="<?php echo base_url('sandbox/upload'); ?>" method="post" enctype="multipart/form-data">
	<input type="file" name="img">
	<button type="submit">Upload</button>
</form>