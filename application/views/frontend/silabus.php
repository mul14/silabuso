<!DOCTYPE html>
<html lang="en">
	
	<head>
		<!-- <link href='http://fonts.googleapis.com/css?family=Lato:100,300' rel='stylesheet' type='text/css'> -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/silabuso.css"/>
		<script src="<?php echo base_url()?>js/jquery-latest.js"></script>
		<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>

	</head>

	<body>


		<div class="container" id="silabuso-main">
			<div class="row">
				<div class="col-md-12">
					<?php
					echo $matakuliah->silabus;
					?>
				</div>
				<!-- .col-md-12 -->
			</div>
			<!-- .row -->


			</div>
		<!-- .container -->

	</body>


</html>