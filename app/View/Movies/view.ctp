<div class="movies view">
<h2><?php  echo __('Movie');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Info'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['info']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avg Rating'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['avg_rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reviews'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['reviews']); ?>
			&nbsp;
		</dd>
	</dl>
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
<div class="related">
	<h3><?php echo __('Related Actors');?></h3>
	<?php if (!empty($movie['Actor'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Birthplace'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($movie['Actor'] as $actor): ?>
		<tr>
			<td><?php echo $actor['id'];?></td>
			<td><?php echo $actor['name'];?></td>
			<td><?php echo $actor['birthday'];?></td>
			<td><?php echo $actor['birthplace'];?></td>
			<td><?php echo $actor['bio'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'actors', 'action' => 'view', $actor['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'actors', 'action' => 'edit', $actor['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'actors', 'action' => 'delete', $actor['id']), null, __('Are you sure you want to delete # %s?', $actor['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Actor'), array('controller' => 'actors', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Directors');?></h3>
	<?php if (!empty($movie['Director'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Birthplace'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($movie['Director'] as $director): ?>
		<tr>
			<td><?php echo $director['id'];?></td>
			<td><?php echo $director['name'];?></td>
			<td><?php echo $director['birthday'];?></td>
			<td><?php echo $director['birthplace'];?></td>
			<td><?php echo $director['bio'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'directors', 'action' => 'view', $director['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'directors', 'action' => 'edit', $director['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'directors', 'action' => 'delete', $director['id']), null, __('Are you sure you want to delete # %s?', $director['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Director'), array('controller' => 'directors', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Genres');?></h3>
	<?php if (!empty($movie['Genre'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($movie['Genre'] as $genre): ?>
		<tr>
			<td><?php echo $genre['id'];?></td>
			<td><?php echo $genre['name'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'genres', 'action' => 'view', $genre['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'genres', 'action' => 'edit', $genre['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'genres', 'action' => 'delete', $genre['id']), null, __('Are you sure you want to delete # %s?', $genre['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Genre'), array('controller' => 'genres', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Writers');?></h3>
	<?php if (!empty($movie['Writer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Birthplace'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($movie['Writer'] as $writer): ?>
		<tr>
			<td><?php echo $writer['id'];?></td>
			<td><?php echo $writer['name'];?></td>
			<td><?php echo $writer['birthday'];?></td>
			<td><?php echo $writer['birthplace'];?></td>
			<td><?php echo $writer['bio'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'writers', 'action' => 'view', $writer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'writers', 'action' => 'edit', $writer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'writers', 'action' => 'delete', $writer['id']), null, __('Are you sure you want to delete # %s?', $writer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Writer'), array('controller' => 'writers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
