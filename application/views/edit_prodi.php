<h1>PRODI</h1>



<div class="admin-btn">
<a href="<?php echo base_url()?>p/add_prodi"><span class="glyphicon glyphicon-plus-sign"></span> Add prodi</a>
</div>

<table class="table">
	<tr>
		<th>kode prodi
		</th>
		<th>nama prodi
		</th>
	</tr>
<?php
	foreach ($prodi as $p) {
		echo "<tr>";
			echo "<td>";
				echo $p->kode_prodi;
			echo "</td>";

			echo "<td>";
				echo $p->nama_prodi;
			echo "</td>";
			echo "<td>";
				echo " <a href='".base_url()."p/info_prodi/".$p->kode_prodi."'>";
					echo "<span class='glyphicon glyphicon-info-sign'></span>";
				echo "</a>";
			echo "</td>";

			echo "<td>";
				echo "<a href='".base_url()."proc/del_prodi?kode_prodi=".$p->kode_prodi."'>".
					 "<span class='glyphicon glyphicon-trash'></span>".
					 "</a>";
			echo "</td>";	

			echo "<td>";
			echo "<a href='".base_url()."p/edit_prodi_p/".$p->kode_prodi."'>
						<span class='glyphicon glyphicon-edit'></span></a>";
			echo "</td>";	

			
		echo "</tr>";
	}
?>
</table>