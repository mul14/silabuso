<h1><?php echo $prodi->nama_prodi ?></h1>
Tambah jadwal <br/>

Matakuliah: <?php echo $matakuliah->nama_mk?>
<hr/>

<form method="POST" action="<?php echo base_url()?>proc/add_jadwal">
	<input type="hidden" name="id_mk_prodi" value="<?php echo $mk_prodi->id_mk_prodi?>"/>
	Hari 
	<select name="hari">
		<option value="1">Senin</option>
		<option value="2">Selasa</option>
		<option value="3">Rabu</option>
		<option value="4">Kamis</option>
		<option value="5">Jumat</option>
		<option value="6">Sabtu</option>
		<option value="7">Minggu</option>
	</select>
	<br/>
	Ruangan <input type="text" name="ruangan"/><br/>
	Jam mulai <input type="text" name="jam_mulai"/><br/>
	Jam berakhir <input type="text" name="jam_akhir"/><br/>
	<input type="submit">
</form>