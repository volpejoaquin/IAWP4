<?php
App::uses('AppController', 'Controller');
/**
 * Writers Controller
 *
 * @property Writer $Writer
 */
class WritersController extends AppController {

var $paginate = array('Writer' => array('limit' => 3,'page' => 1));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Writer->recursive = 0;
		$this->set('writers', $this->paginate('Writer'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Writer->id = $id;
		if (!$this->Writer->exists()) {
			throw new NotFoundException(__('Invalid writer'));
		}
		$this->set('writer', $this->Writer->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if(!isset($_SESSION)) {
			session_start();
		}
	
		if(!isset($_SESSION['loggedin']))
		{
			$this->redirect(array('controller' => 'login','action' => 'index'));
		}
		else
		{
			if ($this->request->is('post')) {
				$this->Writer->create();
				if ($this->Writer->save($this->request->data)) {
					
					$id = $this->Writer->id;
					 
					$path = dirname(__DIR__);
					copy($path.'\webroot\img\writers\writer0.jpg', $path.'\webroot\img\writers\writer'.++$id.'.jpg');
				
					$this->Session->setFlash(__('The writer has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The writer could not be saved. Please, try again.'));
				}
			}
			$movies = $this->Writer->Movie->find('list');
			$this->set(compact('movies'));
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if(!isset($_SESSION)) {
			session_start();
		}
	
		if(!isset($_SESSION['loggedin']))
		{
			$this->redirect(array('controller' => 'login','action' => 'index'));
		}
		else
		{
			$this->Writer->id = $id;
			if (!$this->Writer->exists()) {
				throw new NotFoundException(__('Invalid writer'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->Writer->save($this->request->data)) {
					$this->Session->setFlash(__('The writer has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The writer could not be saved. Please, try again.'));
				}
			} else {
				$this->request->data = $this->Writer->read(null, $id);
			}
			$movies = $this->Writer->Movie->find('list');
			$this->set(compact('movies'));
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Writer->id = $id;
		if (!$this->Writer->exists()) {
			throw new NotFoundException(__('Invalid writer'));
		}
		if ($this->Writer->delete()) {
			$this->Session->setFlash(__('Writer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Writer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
