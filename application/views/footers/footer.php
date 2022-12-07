        </div>
        <!-- jQuery -->
        <script src="<?= base_url() ?>template/admin-lte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?= base_url() ?>template/admin-lte/plugins/jquery-ui/jquery-ui.min.js"></script>
        
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
        <!-- boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
        <!-- AdminLTE -->
		<script  src="<?= base_url(); ?>template/admin-lte/dist/js/adminlte.js"></script>
		<!-- sweetalert2 LTE -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<!-- <script defer src="<?= base_url(); ?>template/admin-lte/plugins/sweetalert2/sweetalert2.all.min.js"></script>
		<script defer src="<?= base_url(); ?>template/admin-lte/plugins/sweetalert2/sweetalert2.min.js"></script> -->
        <script>
            // FUNCION PARA CARGAR AJAX DESDE CUALQUIER ARCHIVO JS o <script defer> DEL SISTEMA
			var cargar_ajax = {
				run_server_ajax: function(_url, _data = null) {
					var json_result = $.ajax({
						url: '<?= base_url(); ?>' + _url,
						dataType: "json",
						method: "post",
						async: false,
						type: 'post',
						data: _data,
						done: function(response) {
							return response;
						}
					}).responseJSON;
					return json_result;
				}
			}
            $(document).ready(function() {
				var winWidth = $(window).width();
				$(window).on('resize', function() {
					var winWidth = $(window).width();
					if (winWidth < 576) {
						console.log('Window Width: ' + winWidth + 'class used: col');
					} else if (winWidth < 768) {
						console.log('Window Width: ' + winWidth + 'class used: col-sm');
					} else if (winWidth < 992) {
						console.log('Window Width: ' + winWidth + 'class used: col-md');
					} else if (winWidth < 1200) {
						console.log('Window Width: ' + winWidth + 'class used: col-lg');
					} else {
						console.log('Window Width: ' + winWidth + 'class used: col-xl');
					}
				});
			});
        </script>
    </body>
</html>