edit dosen

<br/>
<?php
	foreach ($dosen as $d) {
		echo $d->kode_dosen." - ".$d->nip_dosen." - "." : ".$d->nama_dosen;
		echo " - <a href='".base_url()."p/edit_dosen_p/".$d->kode_dosen."'>edit</a>";
		echo "<br/>";
	}
?>