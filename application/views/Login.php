
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | Selamat datang</title>
	<link rel="icon" href="<?= base_url('assets/images/logo-inverse.png') ?>">
	<link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
	

	<style type="text/css">
		
		.room_a{
			transform: translate(10px, 0); 
			z-index: -9999
		}

		.room_b{
			transform: translate(-200px, 150px);
		}
		.text-center{
			margin-bottom: 30px;
		}
		.main_room{
			transform: translate(0, 5%);
		}

		@media screen and (max-width: 760px){
			
			.room_a{
				transform: translate(0, 200px);
			}

			.main_room{
				transform: translate(0, -150px);
			}

			.room_b{
				transform: translate(0, 0);
			}
			.container{
				height: 0px;
			}

		}

	</style>
	<script type="text/javascript" src="<?= base_url('assets/js/sweetalert/sweetalert.min.js') ?>"></script>
</head>
<body>
<?= $this->session->flashdata("alert"); ?>
	<div class="container">
		<div class="row justify-content-center main_room" >

			<div class="col-md-4 col-lg-4 col-xs-11 room_a">
				<img src="<?= base_url('assets/images/login.jpg') ?>" width="100%">
			</div>
			

			<div class="col-md-4 col-lg-4 col-xs-11 room_b">
				
				<div class="card">
					
					<div class="card-body p-5">
						<h3 class="text-center">Login</h3>
						<span id="alert"></span>
						<hr>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label>Nomor ID/NIK</label>
								<input type="password" name="password" class="form-control">
							</div>

							<div class="row justify-content-center">
								<input type="button" class="btn m-1 btn-primary" value="Masuk" name="login">
								<a href="#" class="btn m-1 btn-light">Batal</a>
							</div>

					</div>

				</div>

			</div>



		</div>
	</div>

	<!-- jQuery script -->
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.js') ?>"></script>

	<!-- Ajax process -->
	<script type="text/javascript">
		$(document).ready(function(){
			$("[name='login']").on("click", function(){
				var username = $("[name='username']");
				var password = $("[name='password']");
				var masuk = $("[name='login']");

				$.ajax({
					data : { username : username.val(), password : password.val(), masuk : "login" },
					dataType : "text",
					method : "post",
					success : function(res)
					{
						if (res == "form_error") {
							$("#alert").html(`<div class="alert alert-danger fade show" role="alert">Semua form wajib di isi!</div>`);
						}else if (res == "gagal"){
							$("#alert").html(`<div class="alert alert-danger fade show" role="alert">Login gagal</div>`);
						}else if(res == "masuk_dokter"){
							location.replace("<?= base_url('Dokter/Home') ?>");
						}else if(res == "masuk_pasien"){
							location.replace("<?= base_url('User/Home') ?>");
						}else if(res == "masuk_admin"){
							location.replace("<?= base_url('Home/index') ?>")
						}
					}
				})
			})

			$(".form-control").on("focus", function(){
				$("#alert").html("");
			})
		})
	</script>
	
</body>
</html>


