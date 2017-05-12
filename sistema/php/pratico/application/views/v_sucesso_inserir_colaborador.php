<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registro Inserido com sucesso</title>
		<!-- Bootstrap -->
	  <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
	  <!-- Font Awesome -->
	  <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
	  <!-- NProgress -->
	  <link href="<?php echo base_url('vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
	  <!-- bootstrap-daterangepicker -->
	  <link href="<?php echo base_url('vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">

	  <!-- Custom Theme Style -->
	  <link href="<?php echo base_url('build/css/custom.min.css');  ?>" rel="stylesheet">

	  <!-- tema do css externo com possíveis alterações !-->
	  <link href="<?php echo base_url('css/style.css');  ?>" rel="stylesheet">

	  <!-- jQuery -->
	  <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
	  <!-- modal deletar !-->
	</head>
	<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Registro cadastrado com sucesso</h4>
					</div>
					<div class="modal-body">
					<?php echo $mensagem;  ?>
					</div>
					<div class="modal-footer">
						<a href="<?php echo base_url('colaboradores'); ?>"><button type="button" class="btn btn-success">OK</button></a>
					</div>
				</div>
			</div>
		</div>
		<script language="javascript" type="text/javascript">
			$(document).ready(function () {
				$('#myModal').modal('show');
			});
		</script>
	</body>
	</html>
	<!-- Bootstrap -->
	<script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url('vendors/fastclick/lib/fastclick.js'); ?>"></script>
	<!-- NProgress -->
	<script src="<?php echo base_url('vendors/nprogress/nprogress.js'); ?>"></script>
	<!-- bootstrap-progressbar -->
	<script src="<?php echo base_url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>"></script>
	<!-- Chart.js -->
	<script src="<?php echo base_url('vendors/Chart.js/dist/Chart.min.js'); ?>"></script>
	<!-- jQuery Sparklines -->
	<script src="<?php echo base_url('vendors/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
	<!-- Flot -->
	<script src="<?php echo base_url('vendors/Flot/jquery.flot.js'); ?>"></script>
	<script src="<?php echo base_url('vendors/Flot/jquery.flot.pie.js'); ?>"></script>
	<script src="<?php echo base_url('vendors/Flot/jquery.flot.time.js'); ?>"></script>
	<script src="<?php echo base_url('vendors/Flot/jquery.flot.stack.js'); ?>"></script>
	<script src="<?php echo base_url('vendors/Flot/jquery.flot.resize.js'); ?>"></script>
	<!-- Flot plugins -->
	<script src="<?php echo base_url('vendors/flot.orderbars/js/jquery.flot.orderBars.js'); ?>"></script>
	<script src="<?php echo base_url('vendors/flot-spline/js/jquery.flot.spline.min.js'); ?>"></script>
	<script src="<?php echo base_url('vendors/flot.curvedlines/curvedLines.js'); ?>"></script>
	<!-- DateJS -->
	<script src="<?php echo base_url('vendors/DateJS/build/date.js'); ?>"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="<?php echo base_url('vendors/moment/min/moment.min.js'); ?>"></script>
	<script src="<?php echo base_url('vendors/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

	<!-- Custom Theme Scripts -->
	<script src="<?php echo base_url('build/js/custom.min.js'); ?>"></script>
