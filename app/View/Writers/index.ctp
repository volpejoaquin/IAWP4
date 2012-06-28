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
	     <span>Escritores de <b>Cinema</b> <span class="world">World</span></span>
       </div>
     </div>
   </div>	
 </div>
 <div class="content">
   <ul class="directors">
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
					<h>(<?php echo h($writer['Writer']['birthday']); ?>) </h>
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
					<?php echo $this->Html->link('Leer mas', 'view/'.h($writer['Writer']['id']));                          
									if(isset($_SESSION['loggedin']))
                                                {
                                                    echo " - ";
                                                    echo $this->Html->link('Editar', 'edit/'.h($writer['Writer']['id']),array('style'=>'color:red;')); 
                                                    echo " - ";
                                                    echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $writer['Writer']['id']), array('style'=>'color:red;'), __('Confirme que desea borrar "%s"', $writer['Writer']['name'])); 
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