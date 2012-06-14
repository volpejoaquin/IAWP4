<div id="content"><div class="ic">More Website Templates at TemplateMonster.com!</div>
 <div id="slogan">
   <div class="image png"></div>
   <div class="inside">
	<h>We are breaking<span>All Limitations</span></h>
    <p>Lorem ipsum dolor consectetur adipisicing elit, sed do eiusmod tempor incididunt labore etolore magna aliqua enim minim veniam quis nostrud exercitation ullamco laboris.</p>
    <div class="wrapper"><a href="#" class="link"><span><span>Learn More</span></span></a></div>
   </div>
</div>
<div class="box">
   <div class="border-right">
		<div class="border-left">
       <div class="inner">
	     <h>Welcome to <b>Cinema</b> <span>World</span></h>
         <p>Cinema World Site is a free web template created by <a rel="nofollow" href="http://www.templatemonster.com/" class="new_window">TemplateMonster.com</a> team. This website template is optimized for X screen resolution. It is also XHTML &amp; CSS valid.</p>
         <div class="img-box"><img src="img/1page-img1.jpg" alt="" />This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</div>
         <p>This website template has several pages: <a href="index.html">Home</a>, <a href="about-us.html">About us</a>, <a href="articles.html">Articles</a> (with Article page), <a href="contact-us.html">Contact us</a> (note that contact us form ? doesn?t work), <a href="sitemap.html">Site Map</a>.</p>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
   <h>Fresh <span>Movies</span></h>
   <ul class="movies">
	<?php
		foreach ($movies as $movie) {
			if (h($movie['Movie']['id']) % 3 == 0) {
	?>	
				<li class="last">
	<?php
			} else {
	?>
				<li>
	<?php
			}
	?>			
				<div>
					<h><?php echo h($movie['Movie']['name']); ?></h>
				</div>
				<div class="year">
					<h>(<?php echo h($movie['Movie']['year']); ?>) </h>
				</div>
				<a href="movies/view/<?php echo h($movie['Movie']['id']); ?>" class="link">
					<img src="img/1page-img<?php echo h($movie['Movie']['id']) + 1; ?>.jpg" alt="" />
				</a>
				<p><?php echo substr(h($movie['Movie']['info']), 0, 140) . "..."; ?></p>
				<div class="wrapper"><a href="movies/view/<?php echo h($movie['Movie']['id']); ?>" class="link"><span><span>Read More</span></span></a></div>
			 </li>	
	<?php } ?>
     <li class="clear">&nbsp;</li>
   </ul>
 </div>
</div>

<div class="clear">
</div>

<div class="movies index">
	<h2><?php echo __('Movies');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('year');?></th>
			<th><?php echo $this->Paginator->sort('info');?></th>
			<th><?php echo $this->Paginator->sort('duration');?></th>
			<th><?php echo $this->Paginator->sort('avg_rating');?></th>
			<th><?php echo $this->Paginator->sort('reviews');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($movies as $movie): ?>
	<tr>
		<td><?php echo h($movie['Movie']['id']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['name']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['year']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['info']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['duration']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['avg_rating']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['reviews']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $movie['Movie']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $movie['Movie']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $movie['Movie']['id']), null, __('Are you sure you want to delete # %s?', $movie['Movie']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Movie'), array('action' => 'add')); ?></li>
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




