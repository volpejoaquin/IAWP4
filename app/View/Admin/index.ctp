
<?php
	if($auth->sessionValid()) 
		echo "<h3> P&aacute;gina del administrador </h3>";
	else
		echo "<h1> No esta loggeado</h1>";
?>