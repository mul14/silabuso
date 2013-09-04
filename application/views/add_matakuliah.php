<form method="POST" action="<?php echo base_url()?>proc/add_matakuliah">
	Kode mk: <input type="text" name="kode_mk"/> <br/>
	Nama mk: <input type="text" name="nama_mk"/> <br/>
	sks: <input type="text" name="sks"/> <br/>
	penjelasan: <textarea name="penjelasan" class="editortext"></textarea><br/>
	SAP: <textarea name="sap" class="editortext"></textarea><br/>
	silabus: <textarea name="silabus" class="editortext"></textarea><br/>
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