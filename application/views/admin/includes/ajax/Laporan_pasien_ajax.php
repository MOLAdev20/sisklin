<script type="text/javascript">

	$(document).ready(function(){
		let request;
		let day = $("[name='tanggal']");
		let month = $("[name='bulan']");
		let year = $("[name='tahun']");
		$("#report-sections").hide();
		// Ajax function
		const proses = (tipe) => {

			
			// Kirim data form dengan ajax

			// if (typeof(day.val()) == "string" || typeof(month.val()) == "string" || typeof(year.val()) == "string") {
			// 	alert("Isi dengan format angka");
			// }

			$.ajax({
				url :"<?= base_url("Pengunjung/getData") ?>",
				method : "GET",
				data : { day:day.val(), month:month.val(), year:year.val(), req:tipe },
				dataType : "JSON",
				success : function(res) {
					$("#tabel").html("");

					if (res.length == 0) {
						$("#tabel").append("<h3 class='text-center mt-3'>Tidak ditemukan data</h3>");
					}else{

						// console.log(res);

						let no = 1;
						for (var i = 0; i < res.length; i++) {
							$("#tabel").append(`
								<tr>
								<td>`+no+++`</td>
								<td>`+res[i].Nama+` (`+res[i].Usia+`)</td>
								<td>`+res[i].Gender+`</td>
								<td>`+res[i].Hari+`, `+res[i].Tanggal+`/`+res[i].Bulan+`/`+res[i].Tahun+`</td>
								<td>`+res[i].Tagihan+`</td>
								<td>`+res[i].Total+`</td>
								</tr>
								`);
						}
						$("#report-sections").slideUp();
						setTimeout(function(){
							$("#report-sections").slideDown();
						}, 500);
					}
				}
			});
		}

		// Even tombol harian ditekan
		$("#daily").on("click", () => {

			if (day.val() == "" || month.val() == "" || year.val() == "") {
				swal("Oopss...", "Semua field wajib diisi", "error");
			}else{
				request = "daily";
				proses(request);
			}

			
			
		});

		// Even tombol bulanan ditekan
		$("#monthly").on("click", () => {

			if (month.val() == "" || year.val() == "") {
				swal("Oopss...", "Field bulan dan tahun wajib diisi", "error");
			}else{
				request = "monthly";
				proses(request);
				$(this).attr("class") = "btn btn-danger";
			}

		});

		// Even tombol tahunan ditekan
		$("#yearly").on("click", () => {

			if (year.val() == "") {
				swal("Oopss...", "Field tahun wajib diisi", "error");
			}else{
				request = "yearly";
				proses(request);
			}

		});

		// Even tombol report ditekan
		$(".report-btn").on("click", function(){

			let reqFile = $(this).attr("focus");
			// Report pdf dan report excel 

			const report_pdf = "<?= base_url('Pengunjung/report/pdf?req=') ?>"+request+"&day="+day.val()+"&month="+month.val()+"&year="+year.val();

			const report_excel = "<?= base_url('Pengunjung/report/excel?req=') ?>"+request+"&day="+day.val()+"&month="+month.val()+"&year="+year.val();

			if (reqFile == "pdf") {
				location.replace(report_pdf);
			}else if(reqFile == "excel"){
				location.replace(report_excel);
			}

		})
	})

	

</script>