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
	     <span>Pel&iacute;cula de <b>Cinema</b> <span class="world">World</span></span>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
   <ul class="movie">
		<li class='crosshair'>	
			<div class="name">
				<h3><?php echo $this->Html->link(h($movie['Movie']['name']).' ('.h($movie['Movie']['year']).')', 'view/'.h($movie['Movie']['id']), array('id' => 'name')); ?><h3>
			</div>
			<div class="year">
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
			<div class="edbrAdmin">
					<?php if(isset($_SESSION['loggedin']))
								{
									echo $this->Html->link('Editar', 'edit/'.h($movie['Movie']['id']),array('class'=>'editar')); 
									echo " - ";
									echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $movie['Movie']['id']), array('class'=>'borrar'), __('Confirme que desea borrar "%s"', $movie['Movie']['name'])); 
					  }
					?>
			</div>
			<div class="rating">
							<div id="Icons" class="ratingIcons divRatRep">
								<table class="tableRating">
									<tr>
										<td colspan="3">
											<span class="titulo">
												Seleccione el rating de esta pelicula aqui abajo
												<?php echo $this->Html->image('flechaAbajo.png',array('class' => 'iconAb')); ?>
											</span>
										</td>
									</tr>
										<tr id="botonRating">
											<td class="td">
												<span class="ratingNum" title='Rating' width="100px">
													<?php
														$avg_cant = h($movie['Movie']['avg_cant']);
														$avg_rating = h($movie['Movie']['avg_rating']);
														if ($avg_cant != 0) {
															$rat = number_format($avg_rating/$avg_cant, 1, '.', '');
														} else {
															$rat = 0.0;
														}
														echo $rat;
													?>
												</span>
											</td>
											<td>
													<?php
														$i = 1;
														$avg_cant = h($movie['Movie']['avg_cant']);
														$avg_rating = h($movie['Movie']['avg_rating']);
														if ($avg_cant != 0) {
															$rat = number_format($avg_rating/$avg_cant, 1, '.', '');
														} else {
															$rat = 0.0;
														}
														
														$url = 'rating-chico.png';
														
														if ($rat == 0) {
															$rat = 10;
															$url = 'rating-chico-osc.png';
														}
														
														for ($i;$i<=$rat;$i++) {
															echo $this->Html->image($url,array('id' => 'rat'.$i,'class' => 'ratIcon pointer', 'title' => 'Rating '.$rat.'/10', 'url' => '/movies/rating/'.h($movie['Movie']['id'])));
														}		
														
														if ($rat - $i != -1) {
															echo $this->Html->image('rating-chico-medio.png',array('id' => 'rat'.$i,'class' => 'ratIcon', 'title' => 'Rating '.$rat.'/10', 'url' => '/movies/rating/'.h($movie['Movie']['id'])));
															$cant = $i;
															$i++;							
														} else {
															$cant = $i-1;
														}
														
														if ($rat != 10) {
															//$i = ceil($rat)+1;
															for ($i;$i<=(10 - $rat)+$cant;$i++) {
															echo $this->Html->image('rating-chico-osc.png',array('id' => 'rat'.$i, 'class' => 'ratIcon pointer', 'title' => 'Rating '.$rat.'/10', 'url' => '/movies/rating/'.h($movie['Movie']['id'])));
															}
														}
													?>
												
											</td>
										</tr>
								</table>
							</div>	
						
							<table class="tableView">
									<tr>
										<td class="td">
											<span title='Cantidad de votos' ><?php echo h($movie['Movie']['avg_cant']); ?></span>
										</td>
										<td>
											<?php echo $this->Html->image(
																		'reviews.png', 
																			array(
																				'class' => 'imagen viewIcon',
																				'title' => 'Cantidad de votos'
																			)
																		) 
											?>
									</td>
								</tr>
							</table>
			</div>
			<p><?php echo h($movie['Movie']['info']); ?></p>
			<p>Tags: <?php 
						$tags = "".h($movie['Movie']['tags']);
						$tagsA = explode("|-|",$tags);
						echo  implode(", ",$tagsA);;
					?>
			</p>

		 </li>	
     <li class="clear">&nbsp;</li>
   </ul>
   <div id="likesL" class="fb-like" data-href="http://localhost:8080/IAWP4/movies/view/<?php echo h($movie['Movie']['id']); ?>" data-send="true" data-show-faces="true" data-width="900"  data-colorscheme="dark"></div>
   <div class="related">
	<p>
        <label class="sutil"><?php // echo __('Género:');?></label>
	<?php if (!empty($movie['Genre'])):?>
        
	<h3>
		<?php   $numItems = count($movie['Genre']);
		$i = 0;
		foreach ($movie['Genre'] as $genre): ?>
		<?php echo $this->Html->link(__($genre['name']), array('controller' => 'genres', 'action' => 'view', $genre['id'])); 
                if(++$i !== $numItems) {
                        echo ", ";
                    }
                 ?>
			
	<?php endforeach; ?>
	</h3>
        <?php endif; ?>
        </p>
        
        <p>
	<label class="sutil"><?php echo __('Actores:');?></label>
	<?php if (!empty($movie['Actor'])):?>
	<?php
		$numItems = count($movie['Actor']);
                $i = 0;
            	foreach ($movie['Actor'] as $actor): 
                    echo $this->Html->link(__($actor['name']), array('controller' => 'actors', 'action' => 'view', $actor['id'])); 
                   if(++$i !== $numItems) {
                        echo ", ";
                    }
                ?>
	<?php endforeach; ?>
        <?php endif; ?>
        </p>
	<p>
        <label class="sutil"><?php echo __('Dirigida por:');?></label>
	<?php if (!empty($movie['Director'])):?>
	<?php
                $numItems = count($movie['Director']);
		$i = 0;
		foreach ($movie['Director'] as $director): ?>
                <?php echo $this->Html->link(__($director['name']), array('controller' => 'directors', 'action' => 'view', $director['id']));
		if(++$i !== $numItems) {
                        echo ", ";
                    }
                 ?>
	<?php endforeach; ?>
        <?php endif; ?>
        </p>
        <p>
	<label class="sutil"><?php echo __('Escrita por:');?></label>
	<?php if (!empty($movie['Writer'])):?>
	<?php
        $numItems = count($movie['Writer']);
		$i = 0;
		foreach ($movie['Writer'] as $writer): ?>
		<?php echo $this->Html->link(__($writer['name']), array('controller' => 'writers', 'action' => 'view', $writer['id']));
                if(++$i !== $numItems) {
                        echo ", ";
                    }
                 ?>
			
	<?php endforeach; ?>
	<?php endif; ?>
        </p>
    </div>
	<div id="comentariosC" class="fb-comments" data-href="http://localhost:8080/IAWP4/movies/view/<?php echo h($movie['Movie']['id']); ?>" data-num-posts="5" data-width="900" data-colorscheme="dark"></div>
	<div id='relatedMovies' class='relatedMovies'>
		<div class='relatedTitle1'> Pel&iacute;culas relacionadas - Cinema <span class="world">WORLD</span></span>
		<div class='relatedImgs1'>
			<?php if (!empty($movie['RMovie'])) {
				$i = 0;
				foreach ($movie['RMovie'] as $rmovie) { 
					echo $this->Html->image(
										'movies/movie'.(h($rmovie["id"])+1).'.jpg', 
											array(
												'alt' => h($rmovie['name']),
												'title' => h($rmovie['name']),
												'url' => 'view/'.h($rmovie['id']),
											)
										);
										
				}
			} else { ?>
				<span class='relatedText'>
					No hay peliculas relacionadas.
				</span>
			<?php }?>
		</div>
	</div>
 </div>
</div>



