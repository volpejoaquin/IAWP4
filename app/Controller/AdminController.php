<?php

if(!isset($_SESSION)){
	session_start();
} 


App::uses('AppController', 'Controller');
/**
 * Admin Controller
 *
 * 
 */
class AdminController extends AppController {

 /*
var $components  = array('Auth');
var $helpers = array('Auth');

function beforeFilter(){ 
    //Set Authentication System
    $this->initAuth();
} 
    
/**
 * Setup Authentication Component
*/
/*
protected function initAuth(){
   $this->Auth->sessionKey = 'SomeRandomStringValue';
   $this->set('authSessionKey', $this->Auth->sessionKey);
} 
*/


/**
 * index method
 *
 * @return void
 */
	public function index() {
		if(!isset($_SESSION['loggedin']))
		{
			//Redireccion al /admin
			$this->redirect(array('controller' => 'login','action' => 'index'));
		} 
	}
}
?>
