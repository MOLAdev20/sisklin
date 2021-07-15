	<script type="text/javascript" src="<?= base_url('assets/js/main.js') ?>"></script>	
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-ui.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/dataTables/dataTables.bootstrap.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/dataTables/jquery.dataTables.js') ?>"></script>
	<script type="text/javascript">
		$("#dataTable-1").DataTable({
			info : false,
			"language" : {
				"paginate" : {
					"previous" : `< `,
					"next" : ` >`,
				}
			}
		});
		$("#dataTable-obat").DataTable({searching : false, info : false});
	</script>
</body>
</html>