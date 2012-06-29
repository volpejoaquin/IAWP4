<div class="movies form">
<?php echo $this->Form->create('Movie');?>
	<fieldset>
		<legend><?php echo __('Editar Película'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('year');
		echo $this->Form->input('info');
		echo $this->Form->input('duration');
		echo $this->Form->input('avg_rating');
		echo $this->Form->input('avg_cant');
		echo $this->Form->input('tags');
		echo $this->Form->input('Actor');
		echo $this->Form->input('Director');
		echo $this->Form->input('Genre');
		echo $this->Form->input('Writer');
		echo $this->Form->input('RMovie');
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
			<li> <?php echo $this->Html->link(__('Nuevo Escritor'), array('controller' => 'writers', 'action' => 'add')); ?> </li>
		</ul>
</div>