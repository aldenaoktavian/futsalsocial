<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>upload</title>
</head>
<body>
	<?php echo form_open_multipart(base_url().'input_lapangan/testing_upload'); ?>
		<input type="file" name="image">
		<button>sub</button>
	</form>
</body>
</html>
