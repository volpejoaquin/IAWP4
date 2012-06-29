<div class="genres form">
<?php echo $this->Form->create('Genre');?>
	<fieldset>
		<legend><?php echo __('Agregar Género'); ?></legend>
	<?php
		echo $this->Form->input('name');
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
			<li> <?php echo $this->Html->link(__('Nuevo Escritor'), array('controller' => 'writers', 'action' => 'add')); ?> </li>
		</ul>
</div>