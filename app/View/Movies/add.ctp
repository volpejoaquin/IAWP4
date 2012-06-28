<?php
     if(!isset($_SESSION)) {
     session_start();
}
    
    if(!isset($_SESSION['loggedin']))
    {
        echo "<script language='Javascript'>location.href='/IAWP4/admin'</script>";
    }
    else
    {

?>

<div class="movies form">
<?php 


            echo "<form id='searchForm' action='' method='post'>
                <legend class='movieSearchLegend'>Ingrese un nombre de pel&iacute;cula para buscar y autocompletar informaci&oacute;n (Se abrir&aacute; una nueva ventana)</legend>
                <input id='movieSearch' class='ui-autocomplete-input' autocomplete='off' role='textbox' aria-autocomplete='list' aria-haspopup='true'>
                 </input>";
                
                echo $this->Html->image('rottenT_logo.png', array('alt'=>'RottenTomatoes Info', 'id'=>'rotten'));//, 'onClick'=>'javascript: rottenClick();'));
                                   
 
 
echo "</form>";
?>
    
<?php echo $this->Form->create('Movie');?>
	<fieldset>
		<legend><?php echo __('Add Movie'); ?></legend>
	<?php
                        
        echo $this->Form->input('name');
        echo $this->Form->input('year');
		echo $this->Form->input('info');
		echo $this->Form->input('duration');
                echo $this->Form->input('img');
		echo $this->Form->input('avg_rating');
		echo $this->Form->input('avg_cant');
		echo $this->Form->input('tags');
		echo $this->Form->input('Actor');
		echo $this->Form->input('Director');
		echo $this->Form->input('Genre');
		echo $this->Form->input('Writer');
		echo $this->Form->input('RMovie');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                <li> <?php echo $this->Html->link(__('Nuevo Actor'), array('controller' => 'actors', 'action' => 'add'));?> </li>
                <li> <?php echo $this->Html->link(__('Nuevo Director'), array('controller' => 'directors', 'action' => 'add')); ?> </li>
                <li> <?php echo $this->Html->link(__('Nuevo Género'), array('controller' => 'genres', 'action' => 'add')); ?> </li>
                <li> <?php echo $this->Html->link(__('Nuevo Escritor'), array('controller' => 'writers', 'action' => 'add')); ?> </li>
          </ul>
</div>


<?php

    }//end "Esta loguado"
    ?>
