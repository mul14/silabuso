<a href="<?php echo base_url()?>p/add_user">Add user</a>

<?php
	
	foreach ($user as $u) {

		echo "<a href='".base_url()."p/edit_user_p/".$u->id_user."'>";
		echo $u->username;
		echo "<br/>";
	}

?>