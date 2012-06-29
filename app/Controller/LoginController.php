<?php

if(!isset($_SESSION)){
	session_start();
} 

App::uses('AppController', 'Controller');
/**
 * Login Controller
 *
 * 
 */
class LoginController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
            if(isset($_SESSION['loggedin']))
            {
                //Redireccion al /admin
                $this->redirect(array('controller' => 'admin','action' => 'index'));
            } 
    }

/**
 * 
 */
    public function login()
        {
           if($this->request->is('post'))
                    {
                        $name = $this->request->data["Movie"]["username"]; 
                        $pass = $this->request->data["Movie"]["password"]; 
                        if($name !== "admin" || $pass!== "admin")
                        {
                            $_SESSION['error'] = "Usuario o contraseña invalido.";
							$this->redirect(array('action' => 'index'));
                        }
                        else {
                                //Setea las variables de sesion
                                $_SESSION['loggedin'] = "YES"; // Set it so the user is logged in!
                                $_SESSION['name'] = $name; // Make it so the username can be called by $_SESSION['name']
                               
                                //Redireccion al /admin/index 
                                $this->redirect(array('controller' => 'admin','action' => 'index'));
                             }	

                    } 
        }
        
/**
* 
*/
        public function logout()
        {
            session_destroy();
            $this->redirect(array('action' => 'index'));
        }
        
}
?>