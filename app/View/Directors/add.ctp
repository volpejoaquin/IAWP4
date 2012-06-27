<?php
    session_start();
    
    if(!$_SESSION['loggedin'])
    {
        echo "<script language='Javascript'>location.href='/IAWP4/admin'</script>";
    }
    else
    {

?>

<div class="directors form">
<?php echo $this->Form->create('Director');?>
	<fieldset>
		<legend><?php echo __('Add Director'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('birthday');
		echo $this->Form->input('birthplace');
		echo $this->Form->input('bio');
		echo $this->Form->input('Movie');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Directors'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Movies'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movie'), array('controller' => 'movies', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php

    }
    
    ?>
