<form method="POST" action="<?php echo base_url()?>proc/edit_prodi">
	Kode prodi: <input type="text" name="kode_prodi" value="<?php echo $prodi->kode_prodi?>"/> <br/>
	Nama prodi: <input type="text" name="nama_prodi" value="<?php echo $prodi->nama_prodi?>"/> <br/>
	<input type="hidden" name="id_prodi" value="<?php echo $prodi->id_prodi?>"/>
	<input type="submit"/>
</form>