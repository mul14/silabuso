<html>
	<head>
	</head>
	<body>

	<h2>SilabusO</h2>

	<a href="<?php echo base_url()?>p/admin">home</a>

	<?php
	if ($this->session->userdata('logged_in')) {
		echo "-- Halo ".$this->session->userdata('username')."--";

		echo "<a href='".base_url()."proc/logout'>logout</a>";
	}
	?>
	
	<hr/>