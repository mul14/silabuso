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

		<!-- fancybox -->
		<script type="text/javascript" src="<?php echo base_url()?>fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/source/jquery.fancybox.css"/>
		<script type="text/javascript" src="<?php echo base_url()?>fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
		<!-- Optionally add helpers - button, thumbnail and/or media -->
		<link rel="stylesheet" href="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
		<script type="text/javascript" src="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

		<link rel="stylesheet" href="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/silabuso_load.js"></script>


		<script type="text/javascript">
		$(document).ready(function(){
			$(".dropdown-list").hide();


			//efek dropdown
			$(".dropdown-bottom").click(function(){
				$(".dropdown-list").slideToggle(100);
				$("#silabuso-triangle-icon").toggleClass("silabuso-icon-rotate");

			});


			//load list nama-nama prodi
			load_prodi();

			$(".fancybox").fancybox();
			$("#syllabus-bar-content").ioslist();

			//efek parallax
			$(document).scroll(function(){
				var top = $(document).scrollTop();
				$(".parallax-header-background").css("top", top*0.45);
			});

			//sembunyikan tampilan loading
			$(".syllabus-bar-loading").hide();
			$(".title-loading").hide();
			//sembunyikan konten silabus (karena belum terpilih)
			$("#syllabus-bar").hide();

		});
	</script>

	</head>

	<body>

		<div class="parallax-header">
			<div class="parallax-header-content">
				<div class="parallax-header-container">
					<h1>SOLA</h1>
					silabus online
				</div>
			</div>
			<div class="parallax-header-background">

			</div>
		</div>



		<div class="container" id="silabuso-main">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-8" id="silabuso-content-left">					

						<div class="row" id="silabuso-main-content">

							<div class="silabuso-title col-md-12">
								<div class="content" id="infomk-title">
									<!-- Algoritma dan Pemrograman -->
								</div>
							</div>
							<!-- .silabuso-title -->

							<div class="title-loading col-md-12">
								<div class="content" id="infomk-title">
									<img src="<?php echo base_url()?>img/5_grey.gif"/>
								</div>
							</div>
							<!-- .title-loading -->

							<br/>

							<div class="row">
								<div  class="col-md-12">
									<div id="silabuso-content">
										<div id="silabuso-content-container">
											<div class="row">
												<div class="silabuso-paper-small col-md-4 col-md-offset-2">
													<div class="content">
														<span class="paper-title">sifat</span>
														<span id="infomk-sifat"><!-- WAJIB <span class="mk-wajib">&bull;</span> --></span>
													</div>
													<!-- .content -->
												</div>
												<!-- .silabuso-paper-small .span6 -->

												<div class="silabuso-paper-small col-md-4">
													<div class="content">
														<span class="paper-title">SKS</span>
														<span id="infomk-sks"><!-- 3 --></span>
													</div>
												</div>
											</div>
											<!-- .row -->

										
											<div class="row">
												<div class="silabuso-paper-small col-md-4 col-md-offset-2">
													<div class="content">
														<span class="paper-title">semester</span>
														<span id="infomk-semester"><!-- 3 --></span>
													</div>
												</div>
												<div class="silabuso-paper-small col-md-4">
													<div class="content">
														<span class="paper-title">kode</span>
														<span id="infomk-kodemk"><!-- IK555 --></span>
													</div>
												</div>
											</div>				
											<!-- .row -->

											<br/>

											<div class="row">
												<div class="col-md-12">
													<center><span class="subcontent-title"> <span class="glyphicon glyphicon-info-sign"></span> penjelasan singkat</span></center>
												</div>
											</div>
											<!-- .row -->
											<div class="row">
												<div class="col-md-8 col-md-offset-2 penjelasan-singkat" id="infomk-penjelasan">
													<!-- Mata kuliah ini merupakan kuliah dasar sebagai bekal para mahasiswa untuk berada pada gerbang IT secara makro sedangkan secara detil pemahaman IT akan ditemukan pada berbagai mata kuliah lanjutan. Melalui mata kuliah mahasiswa diharapkan dapat mengoperasikan sistem komputer dengan menggunakan sistem operasi DOS/Windows/Linux serta dapat mengenal  dan memahami berbagai peralatan teknologi informasi beserta fungsinya dan mampu mengoperasikannya dengan baik dan benar. -->
												</div>
											</div>
											<!-- .row -->

											<br/>


											<div class="row">

												<div class="col-md-6">
													<div class="row">
														<div class="col-md-12 subcontent-title">
															<span class="glyphicon glyphicon-ok-sign"></span> mata kuliah prasyarat
														</div>
														<div class="col-md-12">
															<table class="table" id="infomk-prasyarat">
	<!-- 															<tr>
																	<td>
																		IK203
																	</td>
																	<td>
																		Mata kuliah dasar prasyarat
																	</td>
																</tr> -->
															</table>
														</div>
													</div>
													<!-- .row -->
													<div class="row">
														<div class="col-md-12 subcontent-title">
															<span class="glyphicon glyphicon-tasks"></span> jadwal
														</div>
														<div class="col-md-12">
															<table class="table" id="infomk-jadwal">
																<!-- <tr>
																	<td>
																		Senin
																	</td>
																	<td>
																		09:30-12:00
																	</td>
																	<td>
																		IK203
																	</td>
																</tr> -->
															</table>
														</div>
													</div>
													<!-- .row -->
												</div>

												<div class="col-md-6">
													<div class="row">
														<div class="col-md-12 subcontent-title">
															<span class="glyphicon glyphicon-user"></span> Dosen
														</div>
														<div class="col-md-12">
															<table class="table" id="infomk-dosen">
																<!-- <tr>
																	<td>
																		123
																	</td>
																	<td>
																		Nama dosen dengan nama yang sangat panjang																	
																	</td>
																</tr> -->
															</table>
														</div>
													</div>

												</div>
												<!-- .row -->
												
											</div>
											<!-- .row -->

											<div class="row" id="sap-silabus">

												<!-- SAP -->
												<div class="col-md-6">
													
													<a href="index.html" id="infomk-sap" class="silabuso-btn-a fancybox fancybox.iframe">
														<div class="silabuso-btn" id="sap-btn">
															<div class="content">
																<span>SAP &gt</span>
															</div>
															<!-- .content -->
														</div>
													</a>
													
												</div>
												<!-- .col-md-12 -->

												
												<!-- SILABUS -->
												<div class="col-md-6">
													<a href="index.html" id="infomk-silabus" class="silabuso-btn-a fancybox fancybox.iframe">
														<div class="silabuso-btn" id="silabus-btn">
															<div class="content">
																silabus &gt
															</div>
															<!-- .content -->
														</div>
														<!-- .silabuso-btn -->
													</a>
												</div>
												<!-- .col-md-12 -->

											</div>
											<!-- .row -->

											<br/>
										</div>
										<!-- #silabuso-content-container -->
									</div>
									<!-- #silabuso-content -->
									
								</div>
								


							</div>
							<!-- .row -->

						</div>
						

					</div>
					<!-- .col-md-8 -->

					<div class="col-md-4" id="silabuso-content-right">
						<div class="silabuso-dropdown">
							<div class="dropdown-content">
								<div class="dropdown-selected" id="dropdown-selected">
									JURUSAN
								</div>
								<!-- .dropdown-selected -->
							</div>
							<!-- .dropdown-content -->
							<div class="dropdown-choice">
								
								<div class="dropdown-list">
									<ul id="prodi-list">
										<!-- <li>
											ILMU KOMPUTER
										</li>
										<li>
											PEND. ILMU KOMPUTER
										</li> -->
									</ul>
								</div>
								<!-- .dropdown-list -->

								<div class="dropdown-bottom">
									<span class="glyphicon glyphicon-inverse glyphicon-chevron-down" id="silabuso-triangle-icon"></span>
									<!-- <span class="silabuso-icon-triangle-down" >
									</span> -->
								</div>
								<!-- .dropdown-bottom -->

							</div>
							<!-- .dropdown-choice -->

						</div>
						<!-- .silabuso-dropdown -->
						
						<div  id="kotak-2">
							<div id="syllabus-bar">		

								<div id="syllabus-bar-content">
									<dl class="">
										<dt></dt>
									    <dd></dd>
								    </dl>							    
								</div>

							</div>
						</div>
						<!-- #kotak-2 -->

						<div class="syllabus-bar-loading">
							<img src="<?php echo base_url()?>img/5.gif"/>
						</div>

						<div class="silabuso-dropdown">
							<div class="dropdown-content">
								<div class="dropdown-selected">
									pilihan
								</div>
								<!-- .dropdown-selected -->
							</div>
							<!-- .dropdown-content -->
						</div>
						<!-- .silabuso-dropdown -->


					</div>
					<!-- .span4 -->
				</div>
				<!-- .col-md-12 -->
			</div>
			<!-- .row -->


			</div>
		<!-- .container -->

		<div class
		<div class="row footer">
			<div class="col-md-12">
				<center>Cengek Dev 2013 for CSUPI</center>
			</div>
		</div>
		<!-- .row -->

	</body>


</html>