<div id="content">
<div class="box">
   <div class="border-right">
		<div class="border-left">
       <div class="inner textHeader">
	     <span>Peliculas de <b>Cinema</b> <span class="world">World</span></span>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
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
				<div class='name'>
					<h2><?php echo h($movie['Movie']['name']); ?> (<?php echo h($movie['Movie']['year']); ?>)</h2>
					<div class="year">
						
					</div>
				</div>
				
					<?php echo $this->Html->image(
											'movies/1page-img'.(h($movie["Movie"]["id"])+1).'.jpg', 
												array(
													'alt' => h($movie['Movie']['name']),
													'title' => h($movie['Movie']['name']),
													'url' => 'view/'.h($movie['Movie']['id'])
												)
											) 
					?>		
				<p><?php echo substr(h($movie['Movie']['info']), 0, 140) . "..."; ?></p>
				<div class="wrapper">
					<?php echo $this->Html->link('Leer mas', 'view/'.h($movie['Movie']['id'])); ?>
				</div>
			 </li>	
	<?php } ?>
     <li class="clear">&nbsp;</li>
   </ul>
 </div>
</div>

<div class="clear">
</div>