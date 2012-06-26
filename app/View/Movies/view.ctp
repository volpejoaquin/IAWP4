<div id="content">
<div class="box">
   <div class="border-right">
		<div class="border-left">
       <div class="inner textHeader">
	     <span>Pelica de <b>Cinema</b> <span class="world">World</span></span>
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
					
			<div class="rating">
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
					<span title='Rating'><?php echo h($movie['Movie']['avg_rating']); ?></span>
				</div>				
				<?php echo $this->Html->image(
											'reviews.png', 
												array(
													'class' => 'imagen',
													'title' => 'Cantidad de reproducciones'
												)
											) 
				?>
				
				<span title='Cantidad de reproducciones' ><?php echo h($movie['Movie']['reviews']); ?></span>
			</div>
			<p><?php echo h($movie['Movie']['info']); ?></p>
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
 </div>
</div>



