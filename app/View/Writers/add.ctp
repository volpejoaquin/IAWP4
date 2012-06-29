<div class="writers form">
<?php echo $this->Form->create('Writer');?>
	<fieldset>
		<legend><?php echo __('Agregar Escritor'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('birthday');
		echo $this->Form->input('birthplace');
		echo $this->Form->input('bio');
		echo $this->Form->input('Movie');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>
<div class="actions">
	<h3><?php echo __('Otras Acciones'); ?></h3>
	<ul>
             	<li> <?php echo $this->Html->link(__('Nueva Película'), array('controller' => 'movies', 'action' => 'add'));?> </li>
			<li> <?php echo $this->Html->link(__('Nuevo Actor'), array('controller' => 'actors', 'action' => 'add'));?> </li>
			<li> <?php echo $this->Html->link(__('Nuevo Director'), array('controller' => 'directors', 'action' => 'add')); ?> </li>
			<li> <?php echo $this->Html->link(__('Nuevo Género'), array('controller' => 'genres', 'action' => 'add')); ?> </li>
	</ul>
</div>