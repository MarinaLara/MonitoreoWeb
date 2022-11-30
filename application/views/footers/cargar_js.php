<?php
		$_curController = $this->router->fetch_class();
		$_curAction = $this->router->fetch_method();
		
		switch ($_curController) {

		    case 'inicio':
			    echo '<script src="'.base_url().'recursos/js/home.js"></script>';
		    break;
		    
	    }
?>
		<script>var base_url = '<?php echo base_url()?>';</script>