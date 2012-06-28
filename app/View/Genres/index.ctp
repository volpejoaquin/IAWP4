<?php

session_start();

?>

<div id="content">
<div class="box">
   <div class="border-right">
		<div class="border-left">
       <div class="inner textHeader">
	     <span>Generos de <b>Cinema</b> <span class="world">World</span></span>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
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
				<div class="wrapperr">
					<?php echo $this->Html->link('Ver mas', 'view/'.h($genre['Genre']['id'])); ?>
                                        <?php 
                                                if(isset($_SESSION['loggedin']))
                                                {
                                                    echo " - ";
                                                    echo $this->Html->link('Editar', 'edit/'.h($genre['Genre']['id']),array('style'=>'color:red;')); 
                                                    echo " - ";
                                                    echo $this->Html->link('Borrar', array('controller'=>'genres','method'=>'post','action'=>'delete','id'=>$genre['Genre']['id']),array('style'=>'color:red;')); 
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
