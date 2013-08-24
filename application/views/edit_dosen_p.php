<form method="POST" action="<?php echo base_url()?>proc/edit_dosen">
	Kode dosen: <input type="text" name="kode_dosen" value="<?php echo $dosen->kode_dosen?>"/> <br/>
	NIP dosen: <input type="text" name="nip_dosen" value="<?php echo $dosen->nip_dosen?>"/> <br/>
	Nama dosen: <input type="text" name="nama_dosen" value="<?php echo $dosen->nama_dosen?>"/> <br/>
	<input type="hidden" name="id_dosen" value="<?php echo $dosen->id_dosen?>"/>
	<input type="submit"/>
</form>