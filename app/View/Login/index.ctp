<?php

session_start(); // This starts the session which is like a cookie, but it isn't saved on your hdd and is much more secure.

if(isset($_SESSION['loggedin']))
{
    //Redireccion al /admin
    echo "<script language='Javascript'>location.href='/IAWP4/admin'; </script>";
	
} 
else
{
	if(isset($_POST['submit']))
	{
	   $name = ($_POST['username']); 
	   $pass = ($_POST['password']); 
	   if($name !== "admin" || $pass!== "admin")
	   {
		 //die("User or password incorrect");
               echo "<span class='loginInfo'>Usuario o contraseña incorrecta</span><br/>";
               echo "<a href='/IAWP4/login'>Reintentar</a>";
	   }
           else {
                $_SESSION['loggedin'] = "YES"; // Set it so the user is logged in!
                $_SESSION['name'] = $name; // Make it so the username can be called by $_SESSION['name']
                 //Redireccion al /admin 
                 echo "<script language='Javascript'> location.href = '/IAWP4/admin';</script>";
                
                // Para agregar si sale con delay.. 
               // echo("<span class='loginInfo'>Login correcto!</span> <br/> <span class='loginInfo'> Redireccionando...</span"); // Kill the script here so it doesn't show the login form after you are logged in!
                
           }	
           
        } 
	else
	{	
            echo "<span class='loginInfo'>Logu&eacute;ese para continuar.</span><br/><br/>";
            echo "<form type='login.php' method='POST'>
		Username: <br/>
		<input type='text' name='username'><br/>
		Password: <br/>
		<input type='password' name='password'><br/>
		<input type='submit' name='submit' value='Login'>
		</form>"; 
         }
}
?>
