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
				<h3 id="name"><?php echo h($movie['Movie']['name']); ?>(<?php echo h($movie['Movie']['year']); ?>)<h3>
			</div>
			<div class="year">
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
			<div class="rating">
				<?php echo $this->Html->image(
											'rating.png', 
												array(
													'class' => 'imagen',
													'title' => 'Rating'
												)
											) 
				?>
				<span title='Rating'><?php echo h($movie['Movie']['avg_rating']); ?></span>
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
 </div>
</div>



