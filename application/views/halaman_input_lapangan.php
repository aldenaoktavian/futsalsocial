<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Input Lapangan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url()?>assets/img/favicon/favicon.png">
	<!-- Include jQuery Mobile stylesheets -->
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

	<!-- Include the jQuery library -->
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

	<!-- Include the jQuery Mobile library -->
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
	<div data-role="page">
	  <div data-role="header">
	    <h1>Input Lapangan</h1>
	  </div>
		
	  <div data-role="main" class="ui-content">
	    
		<form action="<?php echo base_url(); ?>input_lapangan/save_lapangan" method="post" enctype="multipart/form-data" data-ajax="false">
		<!-- <?php echo form_open_multipart(base_url().'input_lapangan/testing_upload'); ?> -->
	      <input type="text" name="id_lapangan" id="id_lapangan" value="<?php echo $id; ?>" readonly> 
	      <input type="text" name="nama" id="nama" placeholder="nama lapangan" required>
	      <input type="text" name="deskripsi" id="deskripsi" placeholder="deskripsi" required>
	      <input type="text" name="daerah" id="daerah" placeholder="daerah" required>
	      <input type="text" name="kota" id="kota" placeholder="kota" required>
		  <input type="file" name="image" accept="image/*">

		  <!-- 
			<div class="hiddenfile">
			  <input type="file" name="filefoto" accept="image/*">
			</div> -->
			
        
	      
	      <input type="submit" value="Submit">
	    </form>

	  </div>

	  
	</div> 
</body>
</html>