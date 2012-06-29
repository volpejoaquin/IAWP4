<?php

    $nombre= $_SESSION['name'];?>
<div class='center'>
	<div class='admin' id='welcomeAdmin'>
		<h4> P&aacute;gina del Administrador</h4>
		<span class='loginInfo'>Bienvenido, <?php echo $nombre;?>. </span><br/>
	</div>

			
	<div class='actions'>
		<h3> <?php echo __('Actions'); ?> </h3>
		<ul>  
			<li> <?php echo $this->Html->link(__('Nueva Película'), array('controller' => 'movies', 'action' => 'add'));?> </li>
			<li> <?php echo $this->Html->link(__('Nuevo Actor'), array('controller' => 'actors', 'action' => 'add'));?> </li>
			<li> <?php echo $this->Html->link(__('Nuevo Director'), array('controller' => 'directors', 'action' => 'add')); ?> </li>
			<li> <?php echo $this->Html->link(__('Nuevo Género'), array('controller' => 'genres', 'action' => 'add')); ?> </li>
			<li> <?php echo $this->Html->link(__('Nuevo Escritor'), array('controller' => 'writers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
		   
	<div id='logoutAdmin'>
		<?php echo $this->Html->link("Cerrar sesion", '/login/logout',array('class'=>'adminLogout'));?>
	</div>
</div>
	
	
	
		
		
		
