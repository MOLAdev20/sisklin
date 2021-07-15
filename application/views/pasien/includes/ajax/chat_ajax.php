<script type="text/javascript">
	$(document).ready(function(){

		$(".chat").hide();
		$(".filter").hide();
		$(".detail_doctor").hide();

		$("#result-filter").on("click", ".chat-dokter", function(){

			var kode_dokter = $(this).attr("for");

			show(kode_dokter);

			var elemen = $(this).attr("focus");
			$("."+elemen).slideToggle();
			// Turunkan kolom detail dokter
			$(".detail_doctor").slideUp();
		})

		// Reply
		$("#result-filter").on("click", ".send", function(){
			var dokter = $(this).attr("label");
			var element = $("[name='"+dokter+"']");

			$.ajax({
				url : "<?= base_url('User/Konsultasi/giveQuest/') ?>"+dokter,
				data : { text : element.val()},
				dataType : "text",
				method : "POST",
				success : function()
				{
					element.val("");
					show(dokter);
				}
			});

		});

		function show(kode_dokter)
		{
			$.ajax({
				url : "<?= base_url('User/Konsultasi/showChat') ?>",
				dataType : "json",
				method : "POST",
				data : {kode_dokter : kode_dokter},
				success : function(res)
				{
					$(".kumpulan_pertanyaan").html("");
					for(var i = 0; i < res.length; i++){
						$("[dokter='"+kode_dokter+"']").prepend(
							`<p>Q : `+res[i].Isi+
							`</br>A : `+res[i].Balasan+`</p>`
						);
					}				
				}
			})
		}

		// Fungsi untuk menjalankan tombol filter spesialis
		$("#spesialis").on("click", function(){
			// Panggil ajax berdasarkan dokter spesialis
			$("#result-filter").html("");
			$.ajax({
				url : "<?= base_url('User/Konsultasi/getFilter') ?>",
				dataType : "json",
				method : "POST",
				data : {request : "Dokter spesialis"},
				success : function(data)
				{
					showData(data);
				}
			})
		})


		// Fungsi untuk menjalankan tombol filter dokter umum
		$("#umum").on("click", function(){

			$("#result-filter").html("");

			$.ajax({

				url : "<?= base_url('User/Konsultasi/getFilter') ?>",
				data : {request : "Dokter umum"},
				method : "POST",
				dataType : "json",
				success : function(data){

					showData(data);

				}
			})
		})

		// Fungsi untuk menampilkan data
		function showData(data)
		{

			for(var i = 0; i < data.length; i++) {
				$("#result-filter").append(
					`
					<div class="col-md-6">
					<div class="card m-3">
					<div class="card-body">

					<div class="row">

					<div style="width: 60px; height: 60px; overflow: hidden;" class="mr-3 ml-3 rounded-circle">
					<a class="showDetailDoctor" href="#" focus="detail_doctor`+data[i].NIK+`">
					<img src="<?= base_url('upload/Profile/Officer/') ?>`+data[i].Gambar+`" width="60px">
					</a>
					</div>
					<div>
					<a href="#" class="chat-dokter" focus="chat-column`+data[i].ID+`" for="`+data[i].NIK+`">
					<h1 class="card-title" style="margin: 0">
					`+data[i].Nama+`
					</h1>
					</a>
					<p>`+data[i].Jabatan+`</p>

					<div class="chat-column`+data[i].ID+` chat">

					<div class="kumpulan_pertanyaan" dokter="`+data[i].NIK+`">

					</div>
					

					<textarea class="form-control" name="`+data[i].NIK+`"></textarea>

					<button class="btn btn-primary mt-1 send" label="`+data[i].NIK+`">Kirim</button>
					</div>

					<div class="detail_doctor" id="detail_doctor`+data[i].NIK+`">
					<table cellpadding="5px">
					<tr>
					<td>Bidang </td><td>:</td><td>`+data[i].Bidang+`</td>
					</tr>
					<tr>
					<td>NIK </td><td>:</td><td>`+data[i].NIK+`</td>
					</tr>
					<tr>
					<td>Nomor telepon </td><td>:</td><td>`+data[i].Bidang+`</td>
					</tr>
					<tr>
					<td>Alamat </td><td>:</td><td>`+data[i].Alamat+`</td>
					</tr>
					<tr>
					<td>Catatan </td><td>:</td><td>`+data[i].Catatan+`</td>
					</tr>
					</table>
					</div>

					</div>

					</div>

					</div>
					</div>
					</div>`
					);
			}
			$(".chat").hide();
			$(".detail_doctor").hide();

		}

		// Fungsi untuk menjalankan tombol filter bidan
		$("#bidan").on("click", function(){
			$("#result-filter").html("");
			$.ajax({
				url : "<?= base_url('User/Konsultasi/getFilter') ?>",
				data : {request : "Dokter kandungan"},
				method : "POST",
				dataType : "json",
				success : function(data)
				{
					showData(data);
				}
			})
		})

		// Fungsi untuk menjalankan perintah melihat detail dokter
		$("#result-filter").on("click", ".showDetailDoctor", function(){
			var nik = $(this).attr("focus");
			$("#"+nik).slideToggle();
			// Turunkan kolom kumpulan pertanyaan
			$(".chat").slideUp();
		})


	})
</script>