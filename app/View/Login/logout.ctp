<?php
session_start();
session_destroy();

//Redireccion via Javascript
echo "<script language='Javascript'> location.href='/IAWP4/login' </script>"
?>
