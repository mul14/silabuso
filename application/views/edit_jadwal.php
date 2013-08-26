<h1><?php echo $prodi->nama_prodi ?></h1>
Edit jadwal <br/>

Matakuliah: <?php echo $matakuliah->nama_mk?>
<hr/>

<form method="POST" action="<?php echo base_url()?>proc/edit_jadwal">
	<input type="hidden" name="id_mk_prodi" value="<?php echo $mk_prodi->id_mk_prodi?>"/>
	<input type="hidden" name="id_jadwal" value="<?php echo $jadwal->id_jadwal?>"/>

	Hari 
	<select name="hari">
		<option value="1" <?php echo ($jadwal->hari == 1?"selected":""); ?> >Senin</option>
		<option value="2" <?php echo ($jadwal->hari == 2?"selected":""); ?> >Selasa</option>
		<option value="3" <?php echo ($jadwal->hari == 3?"selected":""); ?> >Rabu</option>
		<option value="4" <?php echo ($jadwal->hari == 4?"selected":""); ?> >Kamis</option>
		<option value="5" <?php echo ($jadwal->hari == 5?"selected":""); ?> >Jumat</option>
		<option value="6" <?php echo ($jadwal->hari == 6?"selected":""); ?> >Sabtu</option>
		<option value="7" <?php echo ($jadwal->hari == 7?"selected":""); ?> >Minggu</option>
	</select>
	<br/>
	Ruangan <input type="text" name="ruangan" value="<?php echo $jadwal->ruangan?>"/><br/>
	Jam mulai <input type="text" name="jam_mulai" value="<?php echo $jadwal->jam_mulai?>"/><br/>
	Jam berakhir <input type="text" name="jam_akhir" value="<?php echo $jadwal->jam_akhir?>"/><br/>
	<input type="submit">
</form>