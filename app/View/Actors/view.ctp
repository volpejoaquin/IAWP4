<div id="content">
<div class="box">
   <div class="border-right">
		<div class="border-left">
       <div class="inner textHeader">
	     <span>Actor de <b>Cinema</b> <span class="world">World</span></span>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
   <ul class="movie">
		<li class='crosshair'>	
			<div class="name">
				<h3 id="name"><?php echo h($actor['Actor']['name']); ?><h3>
			</div>
			<div class="year">
				Nacimiento: <?php echo h($actor['Actor']['birthday']); ?>
			</div>
			<div class="year">
				Lugar: <?php echo h($actor['Actor']['birthplace']); ?>
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
			<p>Biografia: <?php echo h($actor['Actor']['bio']); ?></p>
		 </li>	
     <li class="clear">&nbsp;</li>
   </ul>
   
   
	<div class="related">
		<h3><?php echo __('Peliculas relacionadas');?></h3>
		<?php if (!empty($actor['Movie'])):?>
			 <ul class="movies">
				<?php
					foreach ($actor['Movie'] as $movie) {
						if (h($movie['id']) % 3 == 0) {
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
								<h><?php echo h($movie['name']); ?></h>
							</div>
							<div class="year">
								<h>(<?php echo h($movie['year']); ?>) </h>
							</div>
								<?php echo $this->Html->image(
														'movies/movie'.(h($movie["id"])+1).'.jpg', 
															array(
																'alt' => h($movie['name']),
																'title' => h($movie['name']),
																'url' => '/movies/view/'.h($movie['id'])
															)
														) 
								?>		
							<p><?php echo substr(h($movie['info']), 0, 140) . "..."; ?></p>
							<div class="wrapper">
								<?php echo $this->Html->link('Leer mas', '/movies/view/'.h($movie['id'])); ?>
							</div>
						 </li>	
				<?php } ?>
				<li class="clear">&nbsp;</li>							
		   </ul>
	<?php endif; ?>
	</div>
 </div>
</div>


