<div>
	<?php if(isset($_SESSION['error']))
            { 
	?>
		<div class="error">
			<?php echo $_SESSION['error']; ?>
		</div>
	<?php } ?>
	<?php echo $this->Form->create('Movie', array('url' => '/login/login'));?>
		<?php
			echo $this->Form->input('username');
			echo $this->Form->input('password');
		?>
	<?php echo $this->Form->end("Login");?>
</div>


