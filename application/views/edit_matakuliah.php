edit matakuliah

<br/>
<?php
	foreach ($matakuliah as $m) {
		echo $m->id_mk."<br/>";
		echo $m->kode_mk."<br/>";
		echo $m->nama_mk."<br/>";
		echo $m->sks."<br/>";
		echo $m->penjelasan."<br/>";
		echo $m->sap."<br/>";
		echo $m->silabus."<br/>";
		echo " - <a href='".base_url()."p/edit_matakuliah_p/".$m->kode_mk."'>edit</a>";
		echo " - <a href='".base_url()."proc/delete_matakuliah?id_mk=".$m->id_mk."'>hapus</a>";
		echo "<hr/>";
	}
?>