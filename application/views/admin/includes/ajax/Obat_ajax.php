<script type="text/javascript">
	$(document).ready(function(){

		let queryResult = $("[name='cari']");

		$(".hapus").on("click", function(e){
			e.preventDefault();
			let tujuan = $(this).attr("tujuan");

			swal({
				title: "Hapus obat?",
				text: "Data obat akan di hapus permanen",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					location.replace(tujuan);
				}
			});
		});

		$("[name='cari']").on("keypress", function(e){
			
			if (e.which === 13) {
				if (queryResult.val() == null ) {
					alert("OKE BOS");
				}else{
					
					let q = "<?= base_url("Obat/index?search=") ?>"+queryResult.val();
					location.replace(q);

				}
			}
			
		});


	});
</script>