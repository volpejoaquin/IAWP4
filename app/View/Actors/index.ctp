<div id="content">
<div class="box">
   <div class="border-right">
		<div class="border-left">
       <div class="inner textHeader">
	     <span>Actores de <b>Cinema</b> <span class="world">World</span></span>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
   <ul class="actors">
	<?php
		foreach ($actors as $actor) {
			if (h($actor['Actor']['id']) % 3 == 0) {
	?>	
				<li class="last">
	<?php
			} else {
	?>
				<li>
	<?php
			}
	?>			
				<div class="name">
					<h2><?php echo h($actor['Actor']['name']); ?></h2>
				</div>
				<div class="year">
					<h>(<?php echo h($actor['Actor']['birthday']); ?>) </h>
				</div>
					<?php echo $this->Html->image(
											'actors/actor'.(h($actor['Actor']["id"])+1).'.jpg', 
												array(
													'alt' => h($actor['Actor']['name']),
													'title' => h($actor['Actor']['name']),
													'url' => 'view/'.h($actor['Actor']['id'])
												)
											) 
					?>		
				<p><?php echo substr(h($actor['Actor']['bio']), 0, 140) . "..."; ?></p>
				<div class="wrapper">
					<?php echo $this->Html->link('Leer mas', 'view/'.h($actor['Actor']['id'])); ?>
				</div>
			 </li>	
	<?php } ?>
     <li class="clear">&nbsp;</li>
   </ul>
   <div id="divvermas" class="wp-pagenavi verMas" style="">
		<?php 
		  echo $this->Paginator->prev();  
		 ?>
		 <?php 
		  echo $this->Paginator->numbers(array('separator'=>' - '));
		?>
		 <?php 	  
		  echo $this->Paginator->next(); 
		?> 
	</div>
 </div>
</div>

<div class="clear">
</div>

