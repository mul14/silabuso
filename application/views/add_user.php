
<form method="POST" action="<?php echo base_url()?>proc/add_user">
	Username: <input type="text" name="username"/><br/>
	Password: <input type="password" name="pass1"/><br/>
	Password lagi: <input type="password" name="pass2"/><br/>
	Jabatan:
	<?php
	foreach ($jabatan as $j) {
		echo "<input type='radio' name='id_jabatan' value='".$j->id_jabatan."'>".$j->jabatan." ";
	}
	?>
	<br/>
	<input type="submit" value="Daftarkan"/>
</form>
