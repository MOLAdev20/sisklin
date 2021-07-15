<script type="text/javascript">
	$(document).ready(function () {

		// Panggil menu getData untuk menampilkan data
		getData();

		// Event ketika tombol simpan di klik
		$("#simpanPetugas").on("click", function () {

			// Kumpulkan semua datanya
			let nama = $("[name='nama']");
			let nama_pengguna = $("[name='username']");
			let jabatan = $("[name='jabatan']");
			let alamat = $("[name='alamat']");
			let seks = $("[name='seks']:checked");
			let bidang = $("[name='bidang']");
			let gaji = $("[name='gaji']");

			// Proses ajax
			$.ajax({

				url: "<?= base_url('Pegawai/add/') ?>",
				data: {
					nama: nama.val(),
					username: nama_pengguna.val(),
					jabatan: jabatan.val(),
					alamat: alamat.val(),
					seks: seks.val(),
					bidang: bidang.val(),
					gaji: gaji.val()
				},
				dataType: "text",
				method: "POST",
				success: function (res) {
					if (res == "success") {
						swal("Berhasil", "Petugas baru telah di tambahkan", res);
						nama.val("");
						bidang.val("");
						alamat.val("");
						getData();
						location.reload();
					} else if (res == "all_fill_required") {
						swal("Gagal", "Semua form wajib di isi", "warning");
					}
				}


			})
		})


		// Even ketika kolom pencarian query di isi
		$("[name='query']").on("keypress", function (e) {
			let query = $("[name='query']").val();

			if (e.which === 13) {

				// Ajax process
				$.ajax({
					url: "<?= base_url('Pegawai/get') ?>",
					dataType: "json",
					method: "get",
					data: {
						query: query
					},
					success: function (data) {
						$("#getData").html("");

						if(data.length !== 0) {
							var a = 1;
							for (var i = 0; i < data.length; i++) {
								$("#getData").append(
									`<tr>
									<td>` + a++ + `</td>
									<td>` + data[i].Nama + `</td>
									<td>` + data[i].Jabatan + `</td>
									<td>` + data[i].Bidang + `</td>
									<td>Rp.` + data[i].Gaji + `</td>
									<td>` + data[i].Status + `</td>
									<td>
										<a href="<?= site_url('Pegawai/detail/') ?>` + data[i].ID + `" id='detail'>Detail</a>
									</td>
								</tr>`
								)
							}
						}else{
							$("#getData").append("<center><h3 class='mt-2'>Tidak ada data</h3></center>");
						}
					}
				});
			}
		});


		// Fungsi untuk menampilkan data
		function getData() {

			// Ajak process
			$.ajax({

				url: "<?= base_url('Pegawai/get/') ?>",
				dataType: "json",
				method: "get",
				success: function (data) {
					var a = 1;
					for (var i = 0; i < data.length; i++) {
						$("#getData").append(
							`<tr>
								<td>` + a++ + `</td>
								<td>` + data[i].Nama + `</td>
								<td>` + data[i].Jabatan + `</td>
								<td>` + data[i].Bidang + `</td>
								<td>Rp.` + data[i].Gaji + `</td>
								<td>` + data[i].Status + `</td>
								<td>
									<a href="<?= site_url('Pegawai/detail/') ?>` + data[i].ID + `" id='detail'>Detail</a>
								</td>
							</tr>`
						)
					}
				}
			})
		}

	})
</script>