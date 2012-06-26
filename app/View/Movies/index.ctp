<div id="content">
 <div id="slogan">
   <div class="image png"></div>
   <div class="inside">
	<span>
		Bienvenidos a <b>Cinema <span class="world">World</span></b>
	</span>
    <p>
		Una pagina web donde encontraras las ultimas novedades de las mejores peliculas...
		Busca informacion sobre todo lo que te gusta !
	</p>
   </div>
</div>
<div class="box">
   <div class="border-right">
		<div class="border-left">
       <div class="inner textHeader">
	     <span>Pel&iacute;culas mas vistas </span>
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
					<h2>
						<?php echo $this->Html->link(h($movie['Movie']['name']).' ('.h($movie['Movie']['year']).')', 'view/'.h($movie['Movie']['id'])); ?>
					</h2>
				</div>
				<div class="ratingIcons">
					<?php
						$i = 1;
						$rat = h($movie['Movie']['avg_rating']);
						for ($i;$i<=$rat;$i++) {
							echo $this->Html->image('rating-chico.png',array('class' => 'ratIcon', 'title' => 'Rating '.$rat.'/10'));
						}			
						if ($rat - $i != -1) {
							echo $this->Html->image('rating-chico-medio.png',array('class' => 'ratIcon', 'title' => 'Rating '.$rat.'/10'));
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
