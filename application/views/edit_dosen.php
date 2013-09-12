edit dosen

<a href="<?php echo base_url()?>p/add_dosen">Add dosen</a>

<br/>
<?php
	foreach ($dosen as $d) {
		echo $d->kode_dosen." - ".$d->nip_dosen." - "." : ".$d->nama_dosen;
		echo " - <a href='".base_url()."p/edit_dosen_p/".$d->kode_dosen."'>edit</a>";
		echo " - <a href='".base_url()."proc/del_dosen?kode_dosen=".$d->kode_dosen."'>hapus</a>";
		echo "<br/>";
	}
?>