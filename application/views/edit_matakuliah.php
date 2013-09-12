edit matakuliah

<br/>

<a href="<?php echo base_url()?>p/add_matakuliah">Add matakuliah</a>
<table class="table">
	<tr>
		<th>kode mk
		</th>
		<th>nama mk
		</th>
		<th>SKS
		</th>
	</tr>
<?php
	foreach ($matakuliah as $m) {
		echo "<tr>";
			echo "<td>";
				echo $m->kode_mk;
			echo "</td>";
			echo "<td>";
				echo $m->nama_mk;
			echo "</td>";
			echo "<td>";
				echo $m->sks;	
			echo "</td>";
			echo "<td>";
				echo "<a href='".base_url()."p/edit_matakuliah_p/".$m->kode_mk."'>".
						"<span class='glyphicon glyphicon-edit'></span>".
					 "</a>";
			echo "</td>";
			echo "<td>";
				echo "<a href='".base_url()."proc/delete_matakuliah?id_mk=".$m->id_mk."'>".
						"<span class='glyphicon glyphicon-trash'></span>".
					 "</a>";
			echo "</td>";
				
		echo "</tr>";
	}
?>
</table>