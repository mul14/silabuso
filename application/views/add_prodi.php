<form method="POST" action="<?php echo base_url()?>proc/add_prodi" class="form-horizontal" role="form">

	 <div class="form-group">
	    <label for="kode_prodi" class="col-lg-2 control-label">Kode Prodi</label>
	    <div class="col-lg-10">
	      <input type="text" name="kode_prodi" class="form-control"/>
	    </div>
	 </div>

	 <div class="form-group">
	    <label for="nama_prodi" class="col-lg-2 control-label">Nama Prodi</label>
	    <div class="col-lg-10">
	      <input type="text" name="nama_prodi" class="form-control"/> <br/>
	    </div>
	 </div>

	<div class="form-group">
		 <div class="col-lg-offset-2 col-lg-10" >
		 	<input type="submit" class="btn btn-default"/>
		 </div>
	</div>
	
</form>