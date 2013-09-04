<form method="POST" action="<?php echo base_url()?>proc/edit_matakuliah">
	Kode mk: <input type="text" name="kode_mk" value="<?php echo $matakuliah->kode_mk?>"/> <br/>
	Nama mk: <input type="text" name="nama_mk" value="<?php echo $matakuliah->nama_mk?>"/> <br/>
	sks: <input type="text" name="sks" value="<?php echo $matakuliah->sks?>"/> <br/>
	penjelasan: <textarea name="penjelasan" class="editortext"><?php echo $matakuliah->penjelasan?></textarea><br/>
	SAP: <textarea name="sap" class="editortext"><?php echo $matakuliah->sap?></textarea><br/>
	silabus: <textarea name="silabus" class="editortext"><?php echo $matakuliah->silabus?></textarea><br/>
	<input type="hidden" name="id_mk" value="<?php echo $matakuliah->id_mk?>"/>
	<input type="submit"/>
</form>


<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui-1.10.3.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		menubar: "tools table format view insert edit",
	    selector: ".editortext"
	 });
</script>