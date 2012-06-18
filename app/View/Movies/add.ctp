<div class="movies form">
<?php echo $this->Html->script('webservice'); ?>
    
<?php echo $this->Form->create('Movie');?>
	<fieldset>
		<legend><?php echo __('Add Movie'); ?></legend>
	<?php
                echo "<input type='text' id='movieNameSearch'></input>";
            //    echo $this->Form->button('Another Button', array('type' => 'image', 'src'=>'rottenT_logo.png', 'id'=>'rotten', 'onClick'=>'rottenClick'));
                echo $this->Html->image('rottenT_logo.png', array('alt'=>'RottenTomatoes Info', 'id'=>'rotten'));
                
                echo $this->Form->input('name');
                echo $this->Form->input('year');
		echo $this->Form->input('info');
		echo $this->Form->input('duration');
		echo $this->Form->input('avg_rating');
		echo $this->Form->input('reviews');
		echo $this->Form->input('Actor');
		echo $this->Form->input('Director');
		echo $this->Form->input('Genre');
		echo $this->Form->input('Writer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Movies'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Actors'), array('controller' => 'actors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actor'), array('controller' => 'actors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Directors'), array('controller' => 'directors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Director'), array('controller' => 'directors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genres'), array('controller' => 'genres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Genre'), array('controller' => 'genres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Writers'), array('controller' => 'writers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Writer'), array('controller' => 'writers', 'action' => 'add')); ?> </li>
	</ul>
</div>
