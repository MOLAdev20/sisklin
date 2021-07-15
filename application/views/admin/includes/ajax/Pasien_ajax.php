<script type="text/javascript">
	$(document).ready(function(){
		$(".hapusPasien").on('click', function(e){
			e.preventDefault();
			let tujuan = $(this).attr('goTo');
			
			swal({
				title: "Hapus Pasien?",
				text: "Pasien akan di hapus permanen",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					location.replace(tujuan);
				}
			});
		})

		$(".edit").on("click", function(){
			let nama = $(this).attr("data-target");
			$.ajax({
				url : "<?= base_url('Pasien/getPasien/') ?>",
				dataType : "json",
				data : {nama : nama},
				method : "POST",
				success : function(res)
				{
					if (res === "false") {

					}else{
						$("#kembali").append("<i class='fa fa-arrow-left m-2'></i>");
						$("#tombol").html("<button class='btn btn-success' id='edit' key='"+res[0]['ID_pasien']+"'>Edit</button>");
						$("[name='nama']").val(res[0]['Nama']);
						$("[name='usia']").val(res[0]['Usia']);
						$("[name='alamat']").val(res[0]['Alamat']);
						$("[name='telepon']").val(res[0]['No_telpon']);

					}
				}
			});	
		});

		// Statement memberikan event ke parent Tombol dan di teruskan ke anaknya (child)

		$("#tombol").on("click", "#edit" , function(){

			let id = $(this).attr("key");
			ajaxExecution("edit", id);
		})

		$("#kembali").on("click", ".fa-arrow-left", function(){
			$("[name='nama']").val("");
			$("[name='usia']").val("");
			$("[name='seks']:checked").val("");
			$("[name='alamat']").val("");
			$("[name='telepon']").val("");

			$("#tombol").html(`<button class="btn btn-primary" id="simpanPasien">Simpan</button>`);
			$(this).remove();
		})


		$("#tombol").on("click", "#simpanPasien", function(){
			ajaxExecution("tambah", null);
		});

		function ajaxExecution(link, id)
		{
			var nama = $("[name='nama']");
			var usia = $("[name='usia']");
			var gender = $("[name='seks']:checked");
			var alamat = $("[name='alamat']");
			var telepon = $("[name='telepon']");
			$.ajax({
				url : "<?= base_url('Pasien/') ?>"+link,
				dataType : "JSON",
				method : "post",
				data : 
				{
					id : id,
					nama : nama.val(),
					usia : usia.val(),
					seks : gender.val(),
					alamat : alamat.val(),
					telepon : telepon.val()
				},
				
				success : function(res)
				{

					swal("Berhasil", "Data berhasil di"+link, "success");
					location.reload();
				}
			})
		}


	})
</script>