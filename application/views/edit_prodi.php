edit prodi

<br/>
<?php
	foreach ($prodi as $p) {

		echo "<a href='".base_url()."p/info_prodi/".$p->kode_prodi."'>";
		echo $p->nama_prodi;
		echo "</a>";
		echo " - <a href='".base_url()."p/edit_prodi_p/".$p->kode_prodi."'>edit</a>";
		echo "<br/>";
	}
?>