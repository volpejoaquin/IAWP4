<div class="genres view">
<h2><?php  echo __('Genre');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($genre['Genre']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($genre['Genre']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Genre'), array('action' => 'edit', $genre['Genre']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Genre'), array('action' => 'delete', $genre['Genre']['id']), null, __('Are you sure you want to delete # %s?', $genre['Genre']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Genres'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Genre'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Movies'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movie'), array('controller' => 'movies', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Movies');?></h3>
	<?php if (!empty($genre['Movie'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Info'); ?></th>
		<th><?php echo __('Duration'); ?></th>
		<th><?php echo __('Avg Rating'); ?></th>
		<th><?php echo __('Reviews'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($genre['Movie'] as $movie): ?>
		<tr>
			<td><?php echo $movie['id'];?></td>
			<td><?php echo $movie['name'];?></td>
			<td><?php echo $movie['year'];?></td>
			<td><?php echo $movie['info'];?></td>
			<td><?php echo $movie['duration'];?></td>
			<td><?php echo $movie['avg_rating'];?></td>
			<td><?php echo $movie['reviews'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'movies', 'action' => 'view', $movie['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'movies', 'action' => 'edit', $movie['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'movies', 'action' => 'delete', $movie['id']), null, __('Are you sure you want to delete # %s?', $movie['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Movie'), array('controller' => 'movies', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
