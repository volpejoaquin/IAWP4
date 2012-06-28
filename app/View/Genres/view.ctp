<?php
if(!isset($_SESSION)) {
     session_start();
}

?>
<div id="content">
<div class="box">
   <div class="border-right">
		<div class="border-left">
       <div class="inner textHeader">
	     <span>Genero de <b>Cinema</b> <span class="world">World</span></span>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
   <ul class="movie">
		<li class='crosshair'>	
			<div class="name">
				<h3 id="name"><?php echo h($genre['Genre']['name']); ?><h3>
			</div>
			<div class='marcoImg'>
					<?php echo $this->Html->image(
											'genres/genre'.(h($genre['Genre']["id"])+1).'.png', 
												array(
													'class' => 'imgS',
													'alt' => h($genre['Genre']['name']),
													'title' => h($genre['Genre']['name']),
													'url' => 'view/'.h($genre['Genre']['id'])
												)
											);
                                         ?>
					<?php echo $this->Html->image(
											'marcoPeli.png',
											array(
													'class' => 'imgF',
													'alt' => h($genre['Genre']['name']),
													'title' => h($genre['Genre']['name']),
													'url' => 'view/'.h($genre['Genre']['id'])
												)
											) 
					?>
			</div>
			<div class="edbrAdmin">
					<?php if(isset($_SESSION['loggedin']))
								{
									echo $this->Html->link('Editar', 'edit/'.h($genre['Genre']['id']),array('class'=>'editar')); 
									echo " - ";
									echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $genre['Genre']['id']), array('class'=>'borrar'), __('Confirme que desea borrar "%s"', $genre['Genre']['name'])); 
					  }
					?>
			</div>
		 </li>	
     <li class="clear">&nbsp;</li>
   </ul>
   
   
	<div class="related">
		<h3><?php echo __('Peliculas relacionadas');?></h3>
		<?php if (!empty($genre['Movie'])):?>
			 <ul class="movies">
				<?php
					foreach ($genre['Movie'] as $movie) {
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
								<div class='marcoImg'>
										<?php echo $this->Html->image(
														'movies/movie'.(h($movie["id"])+1).'.jpg', 
															array(
																'class' => 'imgS',
																'alt' => h($movie['name']),
																'title' => h($movie['name']),
																'url' => '/movies/view/'.h($movie['id'])
															)
														) 
										?>		
										<?php echo $this->Html->image(
																'marcoPeli.png',
																array(
																		'class' => 'imgF',
																		'alt' => h($movie['name']),
																		'title' => h($movie['name']),
																		'url' => '/movies/view/'.h($movie['id'])
																	)
																) 
										?>
								</div>
							<p><?php echo substr(h($movie['info']), 0, 140) . "..."; ?></p>
							<div class="wrapper">
								<?php echo $this->Html->link('Leer mas', array('controller'=>'movies','action'=>'view',h($movie['id']))); ?>
                                                                               
							</div>
						 </li>	
				<?php } ?>
				<li class="clear">&nbsp;</li>							
		   </ul>
	<?php endif; ?>
	</div>
 </div>
</div>


