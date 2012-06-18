<div class="movies view">
    <h2 style="color:Red;"><?php  echo __('Pelicula');?></h2>
	<table>
            <tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($movie['Movie']['id']); ?>
			&nbsp;
		</td>
            </tr>
            <tr>
		<td><?php echo __('Nombre'); ?></td>
		<td>
			<?php echo h($movie['Movie']['name']); ?>
			&nbsp;
		</td>
            </tr>
            <tr>
		<td><?php echo __('A&nacute;o'); ?></td>
		<td>
			<?php echo h($movie['Movie']['year']); ?>
			&nbsp;
		</td>
            </tr>
            <tr>
		<td><?php echo __('Info'); ?></td>
		<td>
			<?php echo h($movie['Movie']['info']); ?>
			&nbsp;
		</td>
            </tr>
            <tr>
		<td><?php echo __('Duracion'); ?></td>
		<td>
			<?php echo h($movie['Movie']['duration']); ?>
			&nbsp;
		</td>
            </tr>
            <tr>
		<td><?php echo __('Rating Promedio'); ?></td>
		<td>
			<?php echo h($movie['Movie']['avg_rating']); ?>
			&nbsp;
		</td>
            </tr>
            <tr>
		<td><?php echo __('Reviews'); ?></td>
		<td>
			<?php echo h($movie['Movie']['reviews']); ?>
			&nbsp;
		</td>
            </tr>
            
	</table>
    
    
      <div class="related">
	<p>
        <label class="sutil"><?php // echo __('Género:');?></label>
	<?php if (!empty($movie['Genre'])):?>
        
	<?php   $numItems = count($movie['Genre']);
		$i = 0;
		foreach ($movie['Genre'] as $genre): ?>
		<?php echo $this->Html->link(__($genre['name']), array('controller' => 'genres', 'action' => 'view', $genre['id'])); 
                if(++$i !== $numItems) {
                        echo ", ";
                    }
                 ?>
			
	<?php endforeach; ?>
        <?php endif; ?>
        </p>
        
        <p>
	<label class="sutil"><?php echo __('Actores:');?></label>
	<?php if (!empty($movie['Actor'])):?>
	<?php
		$numItems = count($movie['Actor']);
                $i = 0;
            	foreach ($movie['Actor'] as $actor): 
                    echo $this->Html->link(__($actor['name']), array('controller' => 'actors', 'action' => 'view', $actor['id'])); 
                   if(++$i !== $numItems) {
                        echo ", ";
                    }
                ?>
	<?php endforeach; ?>
        <?php endif; ?>
        </p>
	<p>
        <label class="sutil"><?php echo __('Dirigida por:');?></label>
	<?php if (!empty($movie['Director'])):?>
	<?php
                $numItems = count($movie['Director']);
		$i = 0;
		foreach ($movie['Director'] as $director): ?>
                <?php echo $this->Html->link(__($director['name']), array('controller' => 'directors', 'action' => 'view', $director['id']));
		if(++$i !== $numItems) {
                        echo ", ";
                    }
                 ?>
	<?php endforeach; ?>
        <?php endif; ?>
        </p>
        <p>
	<label class="sutil"><?php echo __('Escrita por:');?></label>
	<?php if (!empty($movie['Writer'])):?>
	<?php
                $numItems = count($movie['Writer']);
		$i = 0;
		foreach ($movie['Writer'] as $writer): ?>
		<?php echo $this->Html->link(__($writer['name']), array('controller' => 'writers', 'action' => 'view', $writer['id']));
                if(++$i !== $numItems) {
                        echo ", ";
                    }
                 ?>
			
	<?php endforeach; ?>
	<?php endif; ?>
        </p>
    </div>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Movie'), array('action' => 'edit', $movie['Movie']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Movie'), array('action' => 'delete', $movie['Movie']['id']), null, __('Are you sure you want to delete # %s?', $movie['Movie']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Movies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movie'), array('action' => 'add')); ?> </li>
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
