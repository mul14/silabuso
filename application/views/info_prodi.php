<h1><?php echo $prodi->nama_prodi ?></h1>
<hr/>

<a href="<?php echo base_url()?>p/add_mkprodi/<?php echo $prodi->kode_prodi ?>">+ Tambah mk</a>
<?php
	$semester = "";
	foreach ($mk_prodi as $mp) {
		
		//tulisan semester
		if ($semester == "") {
			$semester = $mp->semester;
			echo "<h3>Semester ".$semester."</h3>";
		}else if ($semester != $mp->semester) {
			$semester = $mp->semester;
			echo "<h3>Semester ".$semester."</h3>";
		}

		echo "<a href='".base_url()."p/info_mk_prodi/".$mp->id_mk_prodi."'>";
		echo $mp->nama_mk;
		echo "</a>";

		echo " - ";
		echo "<a href='".base_url()."p/add_mkdosen/".$mp->id_mk_prodi."'>"." tambah dosen</a>";

		echo "<br/>";
	}
?>

