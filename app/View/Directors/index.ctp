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
	     <span>Directores de <b>Cinema</b> <span class="world">World</span></span>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
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
					<h>(<?php echo h($director['Director']['birthday']); ?>) </h>
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
				<p><?php echo substr(h($director['Director']['bio']), 0, 140) . "..."; ?></p>
				<div class="wrapper">
					<?php echo $this->Html->link('Leer mas', 'view/'.h($director['Director']['id']));                          
									if(isset($_SESSION['loggedin']))
                                                {
                                                    echo " - ";
                                                    echo $this->Html->link('Editar', 'edit/'.h($director['Director']['id']),array('style'=>'color:red;')); 
                                                    echo " - ";
                                                    echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $director['Director']['id']), array('style'=>'color:red;'), __('Confirme que desea borrar "%s"', $director['Director']['name'])); 
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