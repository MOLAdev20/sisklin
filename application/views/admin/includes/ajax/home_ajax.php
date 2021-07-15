<script type="text/javascript">
	$(document).ready(function() {

		getAntrian();
		showKeterangan();

		$("#simpanData").on("click", function() {
			let nama = $("[name='nama']").val();
			let seks = $("[name='seks']:checked").val();
			let usia = $("[name='usia']").val();
			let telepon = $("[name='telp']").val();
			let alamat = $("[name='alamat']").val();

			// Ajax sendRequest
			$.ajax({
				url : "<?= base_url('Home/add/') ?>",
				dataType : "text",
				method : "post",
				data : {
					nama : nama,
					seks : seks,
					usia : usia,
					telepon : telepon,
					alamat : alamat
				},
				success : function(res){
					if (res === "failed") {

					}else{
						$("[data-dismiss=modal]").trigger({type:"click"});
						swal('Berhasil', 'Pasien di tambahkan', 'success');
					}
				}
			});
		});

		$("[name='pasien']").on("keydown", function(){
			let nama = $("[name='pasien']").val();
			$.ajax({
				url:"<?= base_url('Home/register/') ?>",
				data:{ nama:nama },
				dataType:"text",
				method : "post",
				success:function(res)
				{
					if (res === "false") {
						$("#checkmessage").html(`<p class="text-danger">Pasien belum terdaftar <a href="#" data-toggle="modal" id="regist" data-target="#exampleModal">Daftar dulu</a></p>`);
					}else{
						$("#checkmessage").html("");
						var namaPasien = [
						<?php foreach($pasien as $key) {?>
							"<?= $key['Nama'] ?>",
						<?php } ?>
						];
						$("[name='pasien']").autocomplete({
							source:namaPasien
						});
					}
				}
			});
		});

		$("#checkmessage").on("click", "#regist", function(){
			let beforeName = $("[name='pasien']").val();
			$("[name='nama']").val(beforeName);
		})

		$("#get_antri").on("click", function(){
			$('#getAntrian').html("");
			let pasien = $("[name='pasien']").val();
			let keluhan = $("[name='keluhan']").val();
			$.ajax({
				url: "<?= base_url('Home/antrian') ?>",
				data : {pasien : pasien, keluhan: keluhan},
				method : "post",
				success : function(res)
				{
					if (res === "failed") {
						swal('Error', 'Pasien tidak terdaftar', 'error');
					}else{
						swal('Berhasil', '', 'success');
					}
					getAntrian();
					showKeterangan();
					$("#checkmessage").html("");
					$("input").val("");
					$("textarea").val("");
				}	
			});
			
		});

		const panggilPasien = (antrian, nama) => {
			$.ajax({
				url:"<?= base_url('Home/panggil/') ?>",
				dataType : "text",
				method : "POST",
				data : {antrian:antrian},
				success : function(res){
					if (res === "success") {

						let speech = new SpeechSynthesisUtterance();
						speech.text = "Panggilan kepada nomor urut antrian "+antrian+", Atas nama "+nama+". Sekali lagi Panggilan kepada nomor urut antrian "+antrian+", Atas nama "+nama;
						speech.rate = 0.8;
						speech.pitch = 1.5;
						speech.lang = "id-ID";
						window.speechSynthesis.speak(speech);

						$("#antrian").text(antrian);
						$("#pasien").text(nama);

						getAntrian();

					}
				}
			})
		}

		// Even ketika pasien dipanggil
		
		$("#getAntrian").on("click", ".panggil" , function(e){
			e.preventDefault();

			swal({
				title: "Panggi Pasien?",
				text: "Konfirmasi untuk melanjutkan",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {

					let antrian = $(this).attr('antrian');
					let nama = $(this).attr("focus");

					// Panggil method panggilPasien
					panggilPasien(antrian, nama);
				}
			});

			
		})




		function getAntrian()
		{
			$.ajax({
				url:"<?= base_url('Home/getAntrian/') ?>",
				dataType:"json",
				method:"get",
				success:function(res)
				{
					showKeterangan();
					$("#getAntrian").html("");
					let a = 1;
					for (var i = 0 ; i < res.length; i++) {
						$("#getAntrian").append(`
							<tr>
							<td>`+a+++`</td>
							<td>`+res[i].Nama+`</td>
							<td>`+res[i].Antrian+`</td>
							<td>`+res[i].Keluhan+`</td>
							<td>`+res[i].Usia+`</td>
							<td>`+res[i].Status+`</td>
							<td><a href='#' class='panggil' antrian='`+res[i].Antrian+`' focus="`+res[i].Nama+`">panggil</a></td>
							</tr>
						`);
					}
					
				}
			});
		}

		function getKeterangan(target, variable)
		{
			$.ajax({
				url:"<?= base_url('Home/getKeterangan/') ?>",
				dataType:"JSON",
				method:"get",
				success:function(res)
				{
					$(target).html("");
					$(target).append(res[variable].length);
				}
			})
		}

		function showKeterangan()
		{
			getKeterangan("#hariIni", "hariIni");
			getKeterangan("#bulanIni", "bulanIni");
			getKeterangan("#dalamAntrian", "dalamAntrian");
		}
	});
</script>