	
<?php
	session_start(); // NEVER forget this!

	if(!isset($_SESSION['loggedin']))
	{
		echo "<span class='loginInfo'>Para acceder la p&aacute;gina de administraci&oacute;n debe <a href='/IAWP4/login'>loguearse</a>.</span>";
		//die("To access this page, you need to <a href='/IAWP4/login'>LOGIN</a>"); // Make sure they are logged in!
	} // What the !isset() code does, is check to see if the variable $_SESSION['loggedin'] is there, and if it isn't it kills the script telling the user to log in!
	else
	{ 
            	$nombre= $_SESSION['name'];?>
	
        <div class='admin' id='welcomeAdmin'>
            <h4> P&aacute;gina del Administrador</h4>
                   <span class='loginInfo'>Bienvenido, '<?php echo $nombre;?>'!! </span><br/>
        </div>
		
        <br/>
                
        <div class='actions'>
            <h3> <?php echo __('Actions'); ?> </h3>
            <ul>  
                <li> <?php echo $this->Html->link(__('Nueva Película'), array('controller' => 'movies', 'action' => 'add'));?> </li>
                <li> <?php echo $this->Html->link(__('Nuevo Actor'), array('controller' => 'actors', 'action' => 'add'));?> </li>
                <li> <?php echo $this->Html->link(__('Editar Actor'), array('controller' => 'actors', 'action' => 'edit')); ?> </li>
                <li> <?php echo $this->Html->link(__('Nuevo Director'), array('controller' => 'directors', 'action' => 'add')); ?> </li>
                <li> <?php echo $this->Html->link(__('Nuevo Género'), array('controller' => 'genres', 'action' => 'add')); ?> </li>
                <li> <?php echo $this->Html->link(__('Nuevo Escritor'), array('controller' => 'writers', 'action' => 'add')); ?> </li>
            </ul>
        </div>
               
        <div id='logoutAdmin' class='admin'>
		<?php echo $this->Html->link(__("Logout"), array('controller'=>'login','action'=>'logout'));?>
       </div>
<?php	} ?>
	
	
	
		
		
		