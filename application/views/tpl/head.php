<!DOCTYPE html>
<html lang="en">
	
	<head>
		<!-- <link href='http://fonts.googleapis.com/css?family=Lato:100,300' rel='stylesheet' type='text/css'> -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/silabuso.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/syllabus-bar.css"/>
		<script src="<?php echo base_url()?>js/jquery-latest.js"></script>
		<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>js/jquery.ioslist-1.0.1.src.js"></script>
		<script src="<?php echo base_url()?>js/jquery.effects.core.js"></script>
		<script src="<?php echo base_url()?>js/jquery.effects.slide.js"></script>
	</head>
	<body>

	<div class="container">

		<div class="row">
			<div class="col-md-3">
				<h2>SilabusO</h2>

				<?php
				if ($this->session->userdata('logged_in')) {
					echo "Halo ".$this->session->userdata('username').", ";

					echo "<a href='".base_url()."proc/logout'>logout</a>";
				?>
				<br/>

				<a href="<?php echo base_url()?>p/admin">
					<div class="admin-btn home">
						<span class="glyphicon glyphicon-home"></span> HOME
					</div>
				</a>

				<a href="<?php echo base_url()?>p/edit_prodi">
					<div class="admin-btn">
						<span class="glyphicon glyphicon-tower"></span>
						PRODI
					</div>
				</a>
				<a href="<?php echo base_url()?>p/edit_dosen">
					<div class="admin-btn">
						<span class="glyphicon glyphicon-user"></span>				
						DOSEN
					</div>
				</a>	
				<a href="<?php echo base_url()?>p/edit_matakuliah">
					<div class="admin-btn">
						<span class="glyphicon glyphicon-book"></span>
						MATAKULIAH
					</div>
				</a>
				<a href="<?php echo base_url()?>p/edit_user">	
					<div class="admin-btn">
						<span class="glyphicon glyphicon-tree-deciduous"></span>
						USER
					</div>
				</a>

				<?php
				}
				?>
				
				
			</div>
			<!-- .col-md-4 -->

			<div class="col-md-9">
				<div class="admin-content">


		