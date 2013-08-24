Nama mk: <?php echo $mk_prodi->nama_mk;?> <br/>
Program studi: <?php echo $mk_prodi->nama_prodi;?> <br/>
Sifat: <?php echo $mk_prodi->sifat;?> <br/>
SKS: <?php echo $mk_prodi->sks;?> <br/>
Kode mk: <?php echo $mk_prodi->kode_mk;?> <br/>
Dosen <br/>
	<ul>
	<?php
		foreach ($dosen as $d) {
			echo "<li>";
			echo $d->nama_dosen."(".$d->kode_dosen.")";
			echo " - <a href='".base_url()."proc/del_mkprodi_dosen?id_mkprodi_dosen=".$d->id_mkprodi_dosen."&id_mk_prodi=".$mk_prodi->id_mk_prodi."'>"."Hapus"."</a>";
			echo "</li>";
		}
	?>
	</ul>

<a href="<?php echo base_url()?>p/add_mkdosen/<?php echo $mk_prodi->id_mk_prodi ?>">+tambah dosen</a>

<br/>
Prasyarat <br/>
	<ul>
	<?php
		foreach ($prasyarat as $pr) {
			echo "<li>";
			echo $pr->nama_mk;
			echo " - ";
			echo "<a href='".base_url()."proc/del_prasyarat?id_prasyarat=".$pr->id_prasyarat."&id_mk_prodi=".$mk_prodi->id_mk_prodi."'>"."Hapus"."</a>";
			echo "</li>";
		}
	?>
	</ul>

<a href="<?php echo base_url()?>p/add_prasyarat/<?php echo $mk_prodi->id_mk_prodi ?>">+tambah prasyarat</a>

<br/>
Jadwal:
<br/>
<a href="<?php echo base_url()?>p/add_jadwal/<?php echo $mk_prodi->id_mk_prodi ?>">+tambah jadwal</a>
	<ul>
	<?php
		foreach ($jadwal as $j) {
			echo "<li>";
			echo $j->ruangan."(".$j->jam_mulai."-".$j->jam_akhir.")";
			echo " - ";
			echo "<a href='".base_url()."proc/del_jadwal?id_jadwal=".$j->id_jadwal."&id_mk_prodi=".$mk_prodi->id_mk_prodi."'>"."Hapus"."</a>";
			echo " ";
			echo "<a href='".base_url()."p/edit_jadwal?id_jadwal=".$j->id_jadwal."&id_mk_prodi=".$mk_prodi->id_mk_prodi."'>"."Edit"."</a>";
			echo "</li>";
		}
	?>
	</ul>

<hr/>
<a href="<?php echo base_url()?>proc/del_mk_prodi?id_mk_prodi=<?php echo $mk_prodi->id_mk_prodi?>">Hapus matakuliah ini di prodi ini</a>