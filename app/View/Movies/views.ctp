<?php
    
if(!isset($_SESSION)) {
     session_start();
}
?>﻿

<div id="content">
<div class="box">
   <div class="border-right">
		<div class="border-left">
       <div class="inner textHeader">
	     <span>Pel&iacute;culas de <b>Cinema</b> <span class="world">World</span></span>
       </div>
     </div>
   </div>	
 </div>
 <div class="order">
		Ordenar por:
		<?php echo $this->Paginator->sort('id', 'Id'); ?>
		<?php echo $this->Paginator->sort('name', 'Nombre'); ?>
		<?php echo $this->Paginator->sort('avg_cant', 'Votos'); ?>
</div>
 <div class="content orderC">
	
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
					<div class='marcoImg'>
						<?php echo $this->Html->image(
												'movies/movie'.(h($movie["Movie"]["id"])+1).'.jpg', 
													array(
														'class' => 'imgS',
														'alt' => h($movie['Movie']['name']),
														'title' => h($movie['Movie']['name']),
														'url' => 'view/'.h($movie['Movie']['id'])
													)
												) 
						?>
						<?php echo $this->Html->image(
												'marcoPeli.png',
												array(
														'class' => 'imgF',
														'alt' => h($movie['Movie']['name']),
														'title' => h($movie['Movie']['name']),
														'url' => 'view/'.h($movie['Movie']['id'])
													)
												) 
						?>
						
					</div>
				<p><?php echo substr(h($movie['Movie']['info']), 0, 140) . "..."; ?></p>
				<div class="wrapper">
					<?php echo $this->Html->link('Leer mas ', 'view/'.h($movie['Movie']['id'])); ?>
                                        <?php 
                                                if(isset($_SESSION['loggedin']))
                                                {
                                                    echo " - ";
                                                    echo $this->Html->link('Editar', 'edit/'.h($movie['Movie']['id']),array('style'=>'color:red;')); 
                                                    echo " - ";
                                                    echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $movie['Movie']['id']), array('style'=>'color:red;'), __('Confirme que desea borrar "%s"', $movie['Movie']['name'])); 
                                                }
                                         ?>

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
