<?php
		$_curController = $this->router->fetch_class();
		$_curAction = $this->router->fetch_method();
		
		switch ($_curController) {
		    case 'inicio':
			    echo '<script src="'.base_url().'recursos/js/home.js"></script>';
		    break;
			case 'Inicio':
			    echo '<script src="'.base_url().'recursos/js/home.js"></script>';
		    break;

			case 'Usuarios':
			    echo '<script src="'.base_url().'recursos/js/usuarios.js"></script>';
		    break;
			case 'Colmenas':
			    echo '<script src="'.base_url().'recursos/js/colmenas.js"></script>';
		    break;
			case 'Empresas':
			    echo '<script src="'.base_url().'recursos/js/empresas.js"></script>';
		    break;
	    }
?>
		<script>var base_url = '<?php echo base_url()?>';</script>