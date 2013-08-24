<h1><?php echo $prodi->nama_prodi ?></h1>
Tambah dosen <br/>

Matakuliah: <?php echo $matakuliah->nama_mk?>
<hr/>

<form method="POST" action="<?php echo base_url()?>proc/add_mkprodi_dosen">
	
	<input type="hidden" name="id_mk_prodi" value="<?php echo $mk_prodi->id_mk_prodi?>"/>
	<?php
		foreach ($dosen as $d) {
			echo "<input name='id_dosen[]' type='checkbox' value='".$d->id_dosen."'>".$d->nama_dosen." (".$d->kode_dosen.")<br/>";
		}
	?>

	<input type="submit"/>
</form>

<a href="#">Skip</a>