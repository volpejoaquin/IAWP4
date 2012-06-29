<?php
     if(!isset($_SESSION)) {
     session_start();
}
?>

<div id="header">
	<div class="row-1">
		<div class="fleft"><?php echo $this->Html->link('Cinema World', '/'); ?></div>
		<ul>
			<li><?php echo $this->Html->image('icon1-act.gif', array('title' => 'Inicio', 'url' => '/'));?></li>
			<li><?php 
					if(isset($_SESSION['loggedin']))
					{
					echo $this->Html->image('admin-logo2.png', array('title' => 'Admin', 'url' => '/admin'));
					}
					else
					{
					echo $this->Html->image('admin-logo.png', array('title' => 'Admin', 'url' => '/admin'));
					}
                                                        
                ?></li>
			<li >
				<?php echo $this->Form->create('Search', array('url' => '/movies/search', 'class' => 'buscar'));?>
					<?php
						echo $this->Form->input('search', array('class' => 'search'));
					?>
				<?php echo $this->Form->end(__(' '), array('class' => 'submit'));?>
			</li>

		</ul>
	</div>
	<div class="row-2">
		<ul>
			<li ><?php echo $this->Html->link('Peliculas', '/movies/views/sort:id/direction:asc', array( 'class' => 'desactive', 'id' => 'views')); ?></li>
			<li ><?php echo $this->Html->link('Generos', '/genres', array( 'class' => 'desactive', 'id' => 'genres')); ?></li>
			<li ><?php echo $this->Html->link('Actores', '/actors', array( 'class' => 'desactive', 'id' => 'actors')); ?></li>
			<li ><?php echo $this->Html->link('Directores', '/directors', array( 'class' => 'desactive', 'id' => 'directors')); ?></li>
			<li class="last"><?php echo $this->Html->link('Escritores', '/writers', array( 'class' => 'desactive', 'id' => 'writers')); ?></li>
		</ul>
	</div>
</div>
