<?php
App::uses('AppController', 'Controller');
/**
 * Admin Controller
 *
 * 
 */
class AdminController extends AppController {

 
var $components  = array('Auth');
var $helpers = array('Auth');

function beforeFilter(){ 
    //Set Authentication System
    $this->initAuth();
} 
    
/**
 * Setup Authentication Component
*/
protected function initAuth(){
   $this->Auth->sessionKey = 'SomeRandomStringValue';
   $this->set('authSessionKey', $this->Auth->sessionKey);
} 



/**
 * index method
 *
 * @return void
 */
	public function index() {
		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
	
	}
}

