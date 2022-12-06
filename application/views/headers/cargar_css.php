<?php
		$_curController = $this->router->fetch_class();
		$_curAction = $this->router->fetch_method();
		echo $_curController;
		switch ($_curController) {

		    case 'inicio':
			    echo '<link rel="stylesheet" href="'.base_url().'recursos/css/home.css">';
		    break;
			case 'Inicio':
			    echo '<link rel="stylesheet" href="'.base_url().'recursos/css/home.css">';
		    break;
            
            case 'Monitoreo':
			    echo '<link rel="stylesheet" href="'.base_url().'recursos/css/monitoreo.css">';
		    break;
			case 'Usuarios':
			    echo '<link rel="stylesheet" href="'.base_url().'recursos/css/usuarios.css">';
		    break;
			case 'Colmenas':
			    echo '<link rel="stylesheet" href="'.base_url().'recursos/css/colmenas.css">';
		    break;
	    }
?>
		<script>var base_url = '<?php echo base_url()?>';</script>