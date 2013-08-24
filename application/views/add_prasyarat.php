<h1><?php echo $prodi->nama_prodi ?></h1>
Tambah prasyarat <br/>

Matakuliah: <?php echo $matakuliah->nama_mk?>
<hr/>

<form method="POST" action="<?php echo base_url()?>proc/add_prasyarat">
	
	<input type="hidden" name="id_mk_prodi" value="<?php echo $mk_prodi->id_mk_prodi?>"/>
	<?php
		foreach ($list_matakuliah_prodi as $lmp) {

			//cegah prasyaratnya mata kuliah diri sendiri
			if ($lmp->id_mk_prodi != $mk_prodi->id_mk_prodi) {
				echo "<input name='id_mk_prodi_prasyarat[]' type='checkbox' value='".$lmp->id_mk_prodi."'>".$lmp->nama_mk." (".$lmp->kode_mk.")<br/>";
			}
			
		}
	?>

	<input type="submit"/>
</form>

<a href="#">Skip</a>