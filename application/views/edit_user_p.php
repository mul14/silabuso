Edit user
<br/>

<form method="POST" action="<?php echo base_url()?>proc/edit_user">
	<input type="hidden" name="id_user" value="<?php echo $user->id_user?>"/>
	Username: <?php echo $user->username?><br/>
	Password lama: <input type="password" name="old_pass"/><br/>
	Password: <input type="password" name="pass1"/><br/>
	Password lagi: <input type="password" name="pass2"/><br/>
	Jabatan:
	<?php
	foreach ($jabatan as $j) {
		echo "<input type='radio'";

		echo ($j->id_jabatan==$user->id_jabatan?" checked ":"");

		echo " name='id_jabatan' value='".$j->id_jabatan."'>".$j->jabatan." ";
	}
	?>
	<br/>
	<input type="submit" value="Edit"/>
</form>

<a href="<?php echo base_url()?>proc/del_user?id_user=<?php echo $user->id_userl?>">! Hapus user ini</a>