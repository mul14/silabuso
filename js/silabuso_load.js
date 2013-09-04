var silabuso = {
	url_mk 				: "http://localhost/lab/silabuso2/api/matakuliah",
	url_silabus 		: "http://localhost/lab/silabuso2/api/silabus",
	url_prodi			: "http://localhost/lab/silabuso2/api/prodi",
	url_page_sap 		: "http://localhost/lab/silabuso2/f/sap",
	url_page_silabus	: "http://localhost/lab/silabuso2/f/silabus",
}

//mendapatkan data mata kuliah
function load_mk_prodi(id_mk_prodi){

	//efek sembunyikan
	$(".title-loading").slideDown(100);
	$("#silabuso-content-container").slideUp(100);

	$("#infomk-title").slideUp(200, function(){
		console.log("id_mk_prodi :" + id_mk_prodi);
		$.ajax({
		    type:'GET',
		    url: silabuso.url_mk,
		    data:'id_mk_prodi='+id_mk_prodi,
		    success:function(feed) {

		    	//dapatkan konten dari API
		        console.log(feed);
		        var mata_kuliah	= feed.mata_kuliah;
		        var id_mk 		= mata_kuliah.id_mk;
		        var sifat 		= feed.sifat;
		        var semester 	= feed.semester;
		        var nama_mk		= mata_kuliah.nama_mk;
		        var sks 		= mata_kuliah.sks;
		        var kode_mk		= mata_kuliah.kode_mk;
		        var penjelasan  = mata_kuliah.penjelasan;
		        var prasyarat 	= feed.prasyarat;
		        var dosen 		= feed.dosen;
		        var jadwal 		= feed.jadwal;

		        console.log(mata_kuliah.nama_mk);

		        //tampilkan di view

		  		// isi infomk-title
		  		$("#infomk-title").text(nama_mk);

				// isi infomk-sifat
				sifat = sifat.toUpperCase();
		        sifat += (sifat=='WAJIB'?'<span class="mk-wajib">&bull;</span>':"");											
		        $("#infomk-sifat").html(sifat);

				// isi infomk-semester
				$("#infomk-semester").text(semester);

				// isi infomk-sks
				$("#infomk-sks").text(sks);

				// isi infomk-kodemk
				$("#infomk-kodemk").text(kode_mk);

				// isi infomk-penjelasan
				$("#infomk-penjelasan").html(penjelasan);

				// isi infomk-prasyarat (tr td)
				var str_prasyarat = "";
				var prasyarat_length = Object.keys(prasyarat).length;
				for (var j = 0; j < prasyarat_length; j++) {
					
					var obj_prasyarat = prasyarat[j];

					str_prasyarat += "<tr>";

						//kode mk
						str_prasyarat += "<td>"+obj_prasyarat.kode_mk+"</td>";
						//!!!!!TODO
						//nama mk (tapi belum dipotong kalau kepanjangan)
						str_prasyarat += "<td>"+obj_prasyarat.nama_mk+"</td>";

					str_prasyarat += "</tr>"
				}
				$("#infomk-prasyarat").html(str_prasyarat);

				// isi infomk-dosen (tr td)
				var str_dosen = "";
				var dosen_length = Object.keys(dosen).length;
				for (var j = 0; j < dosen_length; j++) {
					
					var obj_dosen = dosen[j];

					str_dosen += "<tr>";

						//kode dosen
						str_dosen += "<td>"+obj_dosen.kode_dosen+"</td>";
						//nama dosen
						str_dosen += "<td>"+obj_dosen.nama_dosen+"</td>";


					str_dosen += "</tr>"
				}
				$("#infomk-dosen").html(str_dosen);


				// isi infomk-jadwal (tr td)
				var str_jadwal = "";
				var jadwal_length = Object.keys(jadwal).length;
				for (var j = 0; j < jadwal_length; j++) {
					
					var obj_jadwal = jadwal[j];
					
					var hari		= obj_jadwal.hari;
					var str_hari = strHari(parseInt(hari));


					var jam_mulai 	= obj_jadwal.jam_mulai;
					var jam_akhir 	= obj_jadwal.jam_akhir;

					//hilangkan bagian detik di jam
					jam_mulai 		= jam_mulai.substring(0,5);
					jam_akhir 		= jam_akhir.substring(0,5);

					var ruangan  	= obj_jadwal.ruangan;

					str_jadwal += "<tr>";

						//hari
						str_jadwal += "<td>"+str_hari+"</td>";

						//jam mulai & jam akhir
						str_jadwal += "<td>"+jam_mulai+"-"+jam_akhir+"</td>";

						//ruangan
						str_jadwal += "<td>"+ruangan+"</td>";



					str_jadwal += "</tr>"
				}
				$("#infomk-jadwal").html(str_jadwal);

				// isi infomk-sap (a href)
				$("#infomk-sap").attr("href", silabuso.url_page_sap+"/"+id_mk);

				// isi infomk-silabus (a href)
				$("#infomk-silabus").attr("href", silabuso.url_page_silabus+"/"+id_mk); 

				//tampilkan lagi setelah semua diload
				$("#infomk-title").slideDown();
				$(".title-loading").slideUp();
				$("#silabuso-content-container").slideDown();

				
		    }
		});


	});
	
}


function load_silabus(kode_prodi){

	$(".syllabus-bar-loading").slideDown();

	$("#syllabus-bar").slideUp('fast',
		function() {
			$.ajax({
				type:'GET',
				url: silabuso.url_silabus,
				data: 'kode_prodi='+kode_prodi,
				success:function(result){
					var data_silabus = result.silabus;	

					
					var semesters_length = Object.keys(result.silabus).length;

					var str_silabus = "";

					//nama objek paling terakhir
					//untuk mendapatkan semester paling maksimum
					var obj_last_semester = Object.keys(result.silabus)[Object.keys(result.silabus).length-1];
					var num_last_semester = obj_last_semester.replace("semester_","");

					//semester
					for (var i = 1; i <= num_last_semester; i++) {

						var semester = result.silabus['semester_'+i];
						// console.log(Object.keys(semester).length);

						var str_semester = "SEMESTER " + i;

						str_silabus += '<dl class="">'+
							        	'<dt>'+str_semester+'</dt>';
						
						var semester_length = Object.keys(semester).length;

						// console.log(semester[0]);
						//mata kuliah
						for (var j = 0; j < semester_length; j++) {

							var kode_mk 	= semester[j].kode_mk;
							var nama_mk 	= semester[j].nama_mk;
							var sks			= semester[j].sks;
							var sifat		= semester[j].id_sifat;
							var id_mk_prodi = semester[j].id_mk_prodi;
							


							str_silabus +=	'<dd onclick="load_mk_prodi(\''+id_mk_prodi+'\')">'+
													'<span class="mk-nama">'+nama_mk+"</span>";

							//jika wajib beri titik berwarna hijau
							str_silabus += (sifat==1?'<span class="mk-wajib">&bull;</span>':"");											

							str_silabus +=	'</dd>';
							
						}

						str_silabus +=  '</dl>';
						
						$("#syllabus-bar-content").html(str_silabus);
					}			
					
					$("#syllabus-bar").slideDown();
					$(".syllabus-bar-loading").slideUp();

					//update bar semester. PASTIKAN TAMPILAN MUNCUL DULU BARU BAR DIRENEW
					$("#syllabus-bar-content").ioslist("renew");
				}
			});
		});
	
	
	
	
}


function load_prodi(){
	$.ajax({
		type: 'GET',
		url: silabuso.url_prodi,
		success: function(result){
			var data_result = result;
			var str_jurusan = "";
			for (var i = 0; i <  data_result.length; i++) {
				var kode_prodi 	= data_result[i].kode_prodi;
				var nama_prodi	= data_result[i].nama_prodi;

				str_jurusan += "<a onclick=\"select_prodi('"+kode_prodi+"','"+nama_prodi+"')\" >"+"<li>"+nama_prodi+"</li>"+"</a>";

			}

			$("#prodi-list").html(str_jurusan);
		}
	});
}


function select_prodi(kode_prodi, nama_prodi){
	
	//ubah dropdown yang terpilih
	$("#dropdown-selected").html(nama_prodi);

	//tampilkan silabus
	load_silabus(kode_prodi);

	//tutup dropdown
	$(".dropdown-list").slideToggle(100);
	$("#silabuso-triangle-icon").toggleClass("silabuso-icon-rotate");

}


function strHari(hari){
	switch (hari) {
		case 1:
			return "Senin";
			break;
		case 2:
			return "Selasa";
			break;
		case 3:
			return "Rabu";
			break;
		case 4:
			return "Kamis";
			break;
		case 5:
			return "Jumat";
			break;
		case 6:
			return "Sabtu";
			break;
		case 7:
			return "Minggu";
			break;
	}

}