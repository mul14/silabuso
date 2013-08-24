<h1><?php echo $prodi->nama_prodi ?></h1>
Edit jadwal <br/>

Matakuliah: <?php echo $matakuliah->nama_mk?>
<hr/>

<form method="POST" action="<?php echo base_url()?>proc/edit_jadwal">
	<input type="hidden" name="id_mk_prodi" value="<?php echo $mk_prodi->id_mk_prodi?>"/>
	<input type="hidden" name="id_jadwal" value="<?php echo $jadwal->id_jadwal?>"/>
	Ruangan <input type="text" name="ruangan" value="<?php echo $jadwal->ruangan?>"/><br/>
	Jam mulai <input type="text" name="jam_mulai" value="<?php echo $jadwal->jam_mulai?>"/><br/>
	Jam berakhir <input type="text" name="jam_akhir" value="<?php echo $jadwal->jam_akhir?>"/><br/>
	<input type="submit">
</form>