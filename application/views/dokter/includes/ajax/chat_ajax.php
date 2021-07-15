<script type="text/javascript">
	$(document).ready(function(){

		showDetail();

		$(".reply").hide();

		$("#resultFilter").on("click", ".dropdown", function(){
			var dropdown = $(this).attr("focus");
			$("."+dropdown).slideToggle();
		})

		$("#resultFilter").on("click", ".send" , function(){


			var id = $(this).attr("key");
			var reply = $("[name='"+id+"']");

			$.ajax({
				url : "<?= base_url('Dokter/Chat/reply/') ?>"+id,
				method : "POST",
				data : {reply_text : reply.val()},
				dataType : "text",
				success : function()
				{
					$(".reply-column"+id).hide();
					$("#"+id).html('<b>Balasan : </b> '+reply.val());
					reply.val("");
					showDetail();
				}
			});
		})

		// Filter data
		$(".filter-link").on("click", function(){

			// Data
			var request = $(this).attr("focus");
			// Ajax proses
			$.ajax({

				url : "<?= base_url('Dokter/Chat/filter') ?>",
				data : {request : request},
				method : "post",
				dataType : "json",
				success : function(data)
				{
					if (data.length == 0) {
						$("#resultFilter").html(`
							<div class="col-md-12">
								<div class="card">

									<div class="card-body">
										<h1>Data kosong</h1>
									</div>

								</div>
							</div>
						`);
					}else{

						$("#resultFilter").html("");
						// Tampilkan data pada resultFilter
						for(var i = 0; i < data.length; i++)
						{
							
							$("#resultFilter").append(`

								<div class="col-md-6">
								<div class="mb-3 card">
								<div class="card-body">
								<a href="#" class="dropdown" focus="reply-column`+data[i].ID+`" ><h2 class="card-title">`+data[i].Nama+`</h2> <i class="fa fa-arrow-bottom"></i></a>

								<div style="margin-top: -18px">
								<p><b>Pertanyaan</b> :`+data[i].Isi+`</p>
								<p id="`+data[i].ID+`"><b>Balasan</b> :`+data[i].Balasan+`</p>
								</div>

								<div class="reply-column`+data[i].ID+` reply">
								<textarea class="form-control" name="`+data[i].ID+`"></textarea>
								<button class="btn btn-primary send mt-1" key = "`+data[i].ID+`">Kirim</button>
								</div>

								</div>
								</div>
								</div>

								`);
							$(".reply").hide();

						}

					}
				}
			})
		})

		function getDetail(request)
		{
			$.ajax({

				url : "<?= base_url('Dokter/Chat/showCategory') ?>",
				data : {request : request},
				method : "POST",
				dataType : "json",
				success : function(res)
				{
					$("#"+request).html(res.showAll);
					$("#"+request).html(res.answered);
					$("#"+request).html(res.unanswered);

				}
			})
		}

		function showDetail()
		{
			getDetail("showAll");
			getDetail("answered");
			getDetail("unanswered");
		}

	})
</script>