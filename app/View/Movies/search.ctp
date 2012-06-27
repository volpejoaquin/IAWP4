<div id="content">
<div class="box">
   <div class="border-right">
		<div class="border-left">
       <div class="inner textHeader">
	     <span>Busqueda en <b>Cinema</b> <span class="world">World</span></span>
		 <br>
		 <br>
		<span class="world">
			 <?php $count = 0;
				   if (!isset($actors) && !isset($movies) && !isset($directors) && !isset($writers) && !isset($geners)) {	 
			 ?>
				0 resultados
			<?php 
				} else { 
					$count = count($movies) + count($actors) + count($directors) + count($writers) + count($genres);
			?>
				<?php echo $count; ?> resultado(s)
			<?php } ?>
		 </span>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
	<?php if (isset($movies) && count($movies) > 0) { ?>
		<h3> Peliculas <span class="resultado">(<?php echo count($movies); ?> resultados)</span> </h3>
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
						<h2><?php echo $this->Html->link(h($movie['Movie']['name']).' ('.h($movie['Movie']['year']).')', 'view/'.h($movie['Movie']['id'])); ?></h2>
					</div>
					<div class="ratingIcons">
						<?php
							$i = 1;
							$avg_cant = h($movie['Movie']['avg_cant']);
							$avg_rating = h($movie['Movie']['avg_rating']);
							if ($avg_cant != 0) {
								$rat = number_format($avg_rating/$avg_cant, 1, '.', '');
							} else {
								$rat = 0.0;
							}
							
							for ($i;$i<=$rat;$i++) {
								echo $this->Html->image('rating-chico.png',array('class' => 'ratIcon', 'title' => 'Rating '.$rat.'/10. ('.$avg_cant.' votos)'));
							}			
							if ($rat - $i != -1) {
								echo $this->Html->image('rating-chico-medio.png',array('class' => 'ratIcon', 'title' => 'Rating '.$rat.'/10. ('.$avg_cant.' votos)'));
							}
							
							if ($rat == 0) {
								echo $this->Html->image('rating-chico-osc.png',array('class' => 'ratIcon', 'title' => 'Rating '.$rat.'/10 ('.$avg_cant.' votos)'));
							}
						?>
					</div>
						<?php echo $this->Html->image(
												'movies/movie'.(h($movie["Movie"]["id"])+1).'.jpg', 
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
		<?php 	} ?>
		 <li class="clear">&nbsp;</li>
		</ul>
	<?php } ?>
	
	<?php if (isset($actors) && count($actors) > 0) { ?>
		<h3> Actores <span class="resultado">(<?php echo count($actors); ?> resultados)</span></h3>
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
							<h>(<?php echo h($actor['Actor']['birthday']); ?>) - Actor </h>
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
	<?php } ?>
	
	<?php if (isset($directors) && count($directors) > 0) { ?>
		<h3> Directores <span class="resultado">(<?php echo count($directors); ?> resultados)</span></h3>
		 <ul class="directors">
			<?php
				foreach ($directors as $director) {
					if (h($director['Director']['id']) % 3 == 0) {
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
							<h2><?php echo h($director['Director']['name']); ?></h2>
						</div>
						<div class="year">
							<h>(<?php echo h($director['Director']['birthday']); ?>) - Director </h>
						</div>
							<?php echo $this->Html->image(
													'directors/director'.(h($director['Director']["id"])+1).'.jpg', 
														array(
															'alt' => h($director['Director']['name']),
															'title' => h($director['Director']['name']),
															'url' => 'view/'.h($director['Director']['id'])
														)
													) 
							?>		
						<p><?php echo substr(h($director['Director']['bio']), 0, 140) . "..."; ?></p>
						<div class="wrapper">
							<?php echo $this->Html->link('Leer mas', 'view/'.h($director['Director']['id'])); ?>
						</div>
					 </li>	
			<?php } ?>
		<li class="clear">&nbsp;</li>
		</ul>
	<?php } ?>
	
	<?php if (isset($writers) && count($writers) > 0) { ?>
		<h3> Escritores <span class="resultado">(<?php echo count($writers); ?> resultados)</span></h3>
		<ul class="writers">
		<?php
			foreach ($writers as $writer) {
				if (h($writer['Writer']['id']) % 3 == 0) {
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
						<h2><?php echo h($writer['Writer']['name']); ?></h2>
					</div>
					<div class="year">
						<h>(<?php echo h($writer['Writer']['birthday']); ?>) - Escritor</h>
					</div>
						<?php echo $this->Html->image(
												'writers/writer'.(h($writer['Writer']["id"])+1).'.jpg', 
													array(
														'alt' => h($writer['Writer']['name']),
														'title' => h($writer['Writer']['name']),
														'url' => 'view/'.h($writer['Writer']['id'])
													)
												) 
						?>		
					<p><?php echo substr(h($writer['Writer']['bio']), 0, 140) . "..."; ?></p>
					<div class="wrapper">
						<?php echo $this->Html->link('Leer mas', 'view/'.h($writer['Writer']['id'])); ?>
					</div>
				 </li>	
		<?php } ?>
		 <li class="clear">&nbsp;</li>
	   </ul>
	<?php } ?>
	
	<?php if (isset($genres) && count($genres) > 0) { ?>
		<h3> Generos <span class="resultado">(<?php echo count($genres); ?> resultados)</span></h3>
		<ul class="geners">
		<?php
			foreach ($genres as $genre) {
				if (h($genre['Genre']['id']) % 3 == 0) {
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
						<h2><?php echo h($genre['Genre']['name']); ?></h2>
					</div>
						<?php echo $this->Html->image(
												'genres/genre'.(h($genre["Genre"]["id"])+1).'.png', 
													array(
														'alt' => h($genre['Genre']['name']),
														'title' => h($genre['Genre']['name']),
														'url' => 'view/'.h($genre['Genre']['id'])
													)
												) 
						?>		
					<div class="wrapper">
						<?php echo $this->Html->link('Ver mas', 'view/'.h($genre['Genre']['id'])); ?>
					</div>
				 </li>	
		<?php } ?>
		 <li class="clear">&nbsp;</li>
	   </ul>
	<?php } ?>
	
	<?php if ($count == 0) { ?>
		<div class="center"><h3> No hay resultados </h3></div>
	<?php } ?>
    
  
	
 </div>
</div>

<div class="clear">
</div>