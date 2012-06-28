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
	     <span>Director de <b>Cinema</b> <span class="world">World</span></span>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
   <ul class="movie">
		<li class='crosshair'>	
			<div class="name">
				<h3 id="name"><?php echo h($director['Director']['name']); ?><h3>
			</div>
			<div class="year">
				Nacimiento: <?php echo h($director['Director']['birthday']); ?>
			</div>
			<div class="year">
				Lugar: <?php echo h($director['Director']['birthplace']); ?>
			</div>			
			<div class='marcoImg'>
				<?php echo $this->Html->image(
											'directors/director'.(h($director['Director']["id"])+1).'.jpg', 
												array(
													'class' => 'imgS',
													'alt' => h($director['Director']['name']),
													'title' => h($director['Director']['name']),
													'url' => 'view/'.h($director['Director']['id'])
												)
											) 
					?>
				<?php echo $this->Html->image(
										'marcoPeli.png',
										array(
												'class' => 'imgF',
												'alt' => h($director['Director']['name']),
												'title' => h($director['Director']['name']),
												'url' => 'view/'.h($director['Director']['id'])
											)
										) 
				?>
			</div>
			<div class="edbrAdminActor">
					<?php if(isset($_SESSION['loggedin']))
								{
									echo $this->Html->link('Editar', 'edit/'.h($director['Director']['id']),array('class'=>'editar')); 
									echo " - ";
									echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $director['Director']['id']), array('class'=>'borrar'), __('Confirme que desea borrar "%s"', $director['Director']['name'])); 
					  }
					?>
			</div>
			<p>Biografia: <?php echo h($director['Director']['bio']); ?></p>
		 </li>	
     <li class="clear">&nbsp;</li>
   </ul>
   
   
	<div class="related">
		<h3><?php echo __('Peliculas relacionadas');?></h3>
		<?php if (!empty($director['Movie'])):?>
			 <ul class="movies">
				<?php
					foreach ($director['Movie'] as $movie) {
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
																		'url' => 'view/'.h($movie['id'])
																	)
																) 
										?>
								</div>		
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