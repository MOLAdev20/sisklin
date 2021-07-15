 <script type="text/javascript">
	$(document).ready(function(){

		// Membuat array kosong untuk data obat ( database sementara )
		var dataObat = [];
 	
		<?php foreach($pasien as $key){ ?>
			$(`[target="tagih<?= $key['ID'] ?>"]`).on('click', function(){
				$("#namaPasien").html("<?= $key['Nama'] ?>");
				$("#usiaPasien").html("<?= $key['Usia'] ?>");
				$("#sexPasien").html("<?= $key['Gender'] ?>");
				$("#keluhan").html("<?= $key['Keluhan'] ?>");

				clearBill();
			})
		<?php } ?>
		$("[name='namaObat']").on("keydown", function(){
			var obat = [
				<?php foreach($obat as $key){ ?>
					"<?= $key['Nama_obat'] ?>",
				<?php } ?>
			];
			$("[name='namaObat']").autocomplete({
				source:obat
			});
		})

		// Method untuk membersihkan catatan daftar tagihan obat/pelayanan yang belum diproses
		const clearBill = () => {
			$("[name='billList']").html("");
			$("#jumlahTagihan").html("0");
			dataObat = [];
		}
		


		$("#tambahTagihan").on("click", function(){

			$("#dataInfo").text("");

			if ($("#namaPasien").text() == "") {
				swal('Mohon pilih dulu pasiennya', 'Pilih pasien di bagian tabel', 'error');
			}else{


				var obat = $("[name='namaObat']").val();

				if (obat == "") {

					swal('Mohon isi field obat!', 'Field obat untuk menentukan harga', 'error');
					$("[name='namaObat']").placeholder("Isi field ini");

				}else{

					$.ajax({
						url:"<?= base_url('Payment/hargaObat') ?>",
						dataType:"JSON",
						method:"POST",
						data:{obat:obat},
						success:function(price){
							
							if (price === "failed" ) {
								$("#cekObat").html("Oops, obat tidak tersedia");
							}else{

								// Menambah data kedalam array dataObat
								dataObat.push(obat);
								
								$("[name='billList']").prepend("<div class='col-md-12 list'><h6>"+obat+" Rp : <a href='#' class='del' getTarget='"+obat+"'>"+price[0]['Harga']+"</a></h6></div>");
								var sebelumnya = $("#jumlahTagihan").text();
								var total = Number(sebelumnya) + Number(price[0]["Harga"]);
								$("#jumlahTagihan").html(total);
								$("[name='namaObat']").val("");
								$("#cekObat").html("");

							}

						}
					})
				}

			}
		});

		$("[name='billList']").on("click", ".del",  function(e){
			e.preventDefault();
			$(this).parent().parent().remove();
			const obat = $(this).attr("getTarget");
			const harga = $(this).text();
			const jumlahTagihan = $("#jumlahTagihan").text();
			const keseluruhan = Number(jumlahTagihan) - Number(harga);
			$("#jumlahTagihan").text(keseluruhan);

			// Menghapus data obat
			dataObat.splice(dataObat.indexOf(obat), 1);

		})



		$(".confirm").on("click", function(){

			let nama = $("#namaPasien").text();
			let tagihan = $("[name = 'billList']").text();
			let totalBiaya = $("#jumlahTagihan").text();

			if (nama == "") {
				swal("Mohon pilih dulu pasiennya", "Pilih pasien di bagian tabel", "error");
			}else{

				if (dataObat.length !== 0){

					// Kirim semua data dengan ajax
					$.ajax({
						url : "<?= base_url('Payment/checkout') ?>",
						dataType : "json",
						data : {
							nama : nama,
							tagihan : tagihan,
							totalBiaya : totalBiaya
						},
						method : "POST",
						success : function(res){
							swal('Berhasil', 'Data telah di kirim ke database', 'success');
							location.reload();
						}
					});

					for(var i = 0; i < dataObat.length; i++){
						$.ajax({
							url : "<?= base_url('Payment/dissmiss') ?>",
							dataType : "json",
							data : {
								obat : dataObat[i],
							},
							method : "POST",
							success : function(res){
								swal('Berhasil', 'Data telah di kirim ke database', 'success');
								location.reload();
							}
						});
					}
				}else{
					swal("Tidak ada tagihan", "Tagihan haru di isi", "error");
				}

			}

		});

		$(".clear").on("click", function(){
			clearBill();
		});



	})
</script>