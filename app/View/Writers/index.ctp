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
					<?php echo $this->Html->link('Leer mas', 'view/'.h($writer['Writer']['id'])); ?>
				</div>
			 </li>	
	<?php } ?>
     <li class="clear">&nbsp;</li>
   </ul>
 </div>
</div>

<div class="clear">
</div>