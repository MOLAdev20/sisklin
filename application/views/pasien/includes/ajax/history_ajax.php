<script type="text/javascript">
	
	$(document).ready(function(){
		$("#search").hide();
		$(".queryYears").hide();
		$(".queryDate").hide();
		getData("","", "");

		function getData(request, tanggal, bulan, tahun)
		{
			$("#dataShow").html("");
			$.ajax({
				url : "<?= base_url('User/Kunjungan/getData/cVyT101') ?>",
				data : { req : request, day: tanggal, month: bulan, year: tahun},
				dataType : "json",
				method : "GET",
				success : function(data)
				{
					if (data == 0) {
						$("#dataShow").html("<h3 class='text-center m-4'>Data tidak ada</h3>");
					}else{
						let count = 1;
						for(let i = 0; i < data.length; i++)
						{
							$("#dataShow").append(`
								<tr>
								<td>`+count+++`</td>
								<td>`+data[i].Hari+" "+data[i].Tanggal+"/"+data[i].Bulan+"/"+data[i].Tahun+`</td>
								<td>`+data[i].Tagihan+`</td>
								<td>`+data[i].Total+`</td>
								<td><a href="<?= base_url('User/Kunjungan/reportSatuan/') ?>`+data[i].ID+`?day=`+data[i].Tanggal+`&month=`+data[i].Bulan+`&year=`+data[i].Tahun+`" >Cetak</a></td>
								</tr>
							`)
						}
					}
				}
			})
		}

		// Flter data berdasarkan tombol
		$(".filter").on("click", function(){
			var get = $(this).attr("label");
			$("#search").slideToggle();

			if (get == "monthly") {
				$(".queryDate").hide();
				$(".queryMonth").show();
				$(".queryYears").show();
			}else if(get == "yearly") {
				$(".queryDate").hide();
				$(".queryMonth").hide();
				$(".queryYears").show();
			}else if(get == "daily") {
				$(".queryDate").show();
				$(".queryMonth").show();
				$(".queryYears").show();
			}
			// Menambahkan attribut focus dengan isi variabel get pada tombol pencarian
			$("#searchAction").attr("focus", get);
			// Menambahkan attribut focus pada tombol reportPdf dan tombol reportExcel
			$("#reportPdf").attr("focus", get);
			$("#reportExcel").attr("focus", get);
		})

		// Tampilkan semua data

		$(".filter-all").on("click", function(){
			getData("","","","");

			// Menambahkan attribut focus dengan isi kosong pada tombol report
			$("#reportPdf").attr("focus", "");
			$("#reportExcel").attr("focus", "");
		})

		$("#searchAction").on("click", function(){
			var request = $(this).attr("focus");
			var tanggal = $("[name='valueTanggal']").val();
			var bulan = $("[name='valueBulan']").val();
			var tahun = $("[name='valueTahun']").val();
			// Ajax process
			getData(request, tanggal, bulan, tahun);
		})

		// Tombol report
		$("#reportExcel").on("click", function(e){

			e.preventDefault();

			const tahun = $("[name='valueTahun']").val();
			const tanggal = $("[name='valueTanggal']").val();
			const bulan = $("[name='valueBulan']").val();
			const request = $(this).attr("focus");

			// Menambahkan attribut href dengan isi variabel variabel diatas
			const link = "<?= base_url('User/Kunjungan/report/aXBi908?request=') ?>"+request+"&day="+tanggal+"&month="+bulan+"&year="+tahun+"&file=xls";

			location.replace(link);



		});

		$("#reportPdf").on("click", function(e){

			e.preventDefault();

			const tahun = $("[name='valueTahun']").val();
			const tanggal = $("[name='valueTanggal']").val();
			const bulan = $("[name='valueBulan']").val();
			const request = $(this).attr("focus");

			// Menambahkan attribut href dengan isi variabel variabel diatas
			const link = "<?= base_url('User/Kunjungan/report/aXBi908?request=') ?>"+request+"&day="+tanggal+"&month="+bulan+"&year="+tahun+"&file=pdf";

			location.replace(link);



		});



	})

</script>