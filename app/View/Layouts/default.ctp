
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>- Cinema WORLD -</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Movies for the world." />
	<meta name="keywords" content="movies, dvd, cinema, movie" />
	<meta name="author" content="Quintana - Volpe" />
	
	<?php
		//Style pages
		echo $this->Html->css('style.css');
		echo $this->Html->css('style.controlers.css');
		echo $this->Html->css('jquery-ui.css');
		
	?>
	<?php 
		//Scripts
		echo $this->Html->script('jquery-1.7.2.min'); 
		echo $this->Html->script('cufon-yui'); 
		echo $this->Html->script('cufon-replace'); 
		echo $this->Html->script('Gill_Sans_400.font'); 
		echo $this->Html->script('script'); 
		echo $this->Html->script('webservice'); 
		echo $this->Html->script('jquery-ui.min'); 
		echo $this->Html->script('relatedMovies');
	?>
	<!--[if lt IE 7]>
	<?php
		echo $this->Html->script('ie_png');
		echo "<script type='text/javascript'> ie_png.fix('.png, .link1 span, .link1');</script>";
		
		echo $this->Html->css('ie6.css');
	?>
	<![endif]-->
</head>
<body id="page1">
<div class="tail-top">
	<div class="tail-bottom">
		<div id="main">
			<div class="clear">
				<?php include 'header/header.html'; ?>
			</div>

			<div class="content">
				<?php echo $this->fetch('content'); ?>
			</div>
			
			<div class="clear">
				<?php include 'footer/footer.html'; ?>
			</div>
		</div>
	</div>
</div>

</body>
</html>