        </div>
        <!-- jQuery -->
        <script src="<?= base_url() ?>template/admin-lte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?= base_url() ?>template/admin-lte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
        <script>
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