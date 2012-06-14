<div class="directors index">
	<h2><?php echo __('Directors');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('birthday');?></th>
			<th><?php echo $this->Paginator->sort('birthplace');?></th>
			<th><?php echo $this->Paginator->sort('bio');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($directors as $director): ?>
	<tr>
		<td><?php echo h($director['Director']['id']); ?>&nbsp;</td>
		<td><?php echo h($director['Director']['name']); ?>&nbsp;</td>
		<td><?php echo h($director['Director']['birthday']); ?>&nbsp;</td>
		<td><?php echo h($director['Director']['birthplace']); ?>&nbsp;</td>
		<td><?php echo h($director['Director']['bio']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $director['Director']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $director['Director']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $director['Director']['id']), null, __('Are you sure you want to delete # %s?', $director['Director']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Director'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Movies'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movie'), array('controller' => 'movies', 'action' => 'add')); ?> </li>
	</ul>
</div>