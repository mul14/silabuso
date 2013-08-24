<h1><?php echo $prodi->nama_prodi ?></h1>
Tambah mata kuliah
<hr/>
<form method="POST" action="<?php echo base_url()?>proc/add_mk_prodi">
	<input type="hidden" name="id_prodi" value="<?php echo $prodi->id_prodi?>"/>
	Matakuliah
	<select name="id_mk">
		<option>Pilih matakuliah</option>
		<?php 
			foreach ($matakuliah as $mk) {
				echo "<option value='".$mk->id_mk."'>".$mk->nama_mk."</option>";
			}
		?>
	</select>
	<br/>
	Sifat: 
	<?php 
			foreach ($sifat as $s) {
				echo "<input type='radio' name='id_sifat' value='".$s->id_sifat."'>".$s->sifat;
			}
	?>
	<br/>
	Semester: <input type="text" name="semester"/>
	<br/>


	<input type="submit" value="Tambah"/>
</form>