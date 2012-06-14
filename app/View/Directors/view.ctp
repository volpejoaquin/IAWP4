<div class="directors view">
<h2><?php  echo __('Director');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($director['Director']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($director['Director']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($director['Director']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthplace'); ?></dt>
		<dd>
			<?php echo h($director['Director']['birthplace']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bio'); ?></dt>
		<dd>
			<?php echo h($director['Director']['bio']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Director'), array('action' => 'edit', $director['Director']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Director'), array('action' => 'delete', $director['Director']['id']), null, __('Are you sure you want to delete # %s?', $director['Director']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Directors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Director'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Movies'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movie'), array('controller' => 'movies', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Movies');?></h3>
	<?php if (!empty($director['Movie'])):?>
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
		foreach ($director['Movie'] as $movie): ?>
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
