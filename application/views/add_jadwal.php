<h1><?php echo $prodi->nama_prodi ?></h1>
Tambah jadwal <br/>

Matakuliah: <?php echo $matakuliah->nama_mk?>
<hr/>

<form method="POST" action="<?php echo base_url()?>proc/add_jadwal">
	<input type="hidden" name="id_mk_prodi" value="<?php echo $mk_prodi->id_mk_prodi?>"/>
	Ruangan <input type="text" name="ruangan"/><br/>
	Jam mulai <input type="text" name="jam_mulai"/><br/>
	Jam berakhir <input type="text" name="jam_akhir"/><br/>
	<input type="submit">
</form>