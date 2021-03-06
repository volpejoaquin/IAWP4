<?php
App::uses('AppController', 'Controller');
/**
 * Genres Controller
 *
 * @property Genre $Genre
 */
class GenresController extends AppController {

var $paginate = array('Genre' => array('limit' => 3,'page' => 1));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Genre->recursive = 0;
		$this->set('genres', $this->paginate('Genre'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Genre->id = $id;
		if (!$this->Genre->exists()) {
			throw new NotFoundException(__('Invalid genre'));
		}
		$this->set('genre', $this->Genre->read(null, $id));
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
				$this->Genre->create();
				if ($this->Genre->save($this->request->data)) {
					
					$id = $this->Genre->id;
					
					$path = dirname(__DIR__);
					copy($path.'\webroot\img\genres\genre0.png', $path.'\webroot\img\genres\genre'.++$id.'.png');
				
					$this->Session->setFlash(__('The genre has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The genre could not be saved. Please, try again.'));
				}
			}
			$movies = $this->Genre->Movie->find('list');
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
			$this->Genre->id = $id;
			if (!$this->Genre->exists()) {
				throw new NotFoundException(__('Invalid genre'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->Genre->save($this->request->data)) {
					$this->Session->setFlash(__('The genre has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The genre could not be saved. Please, try again.'));
				}
			} else {
				$this->request->data = $this->Genre->read(null, $id);
			}
			$movies = $this->Genre->Movie->find('list');
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
		$this->Genre->id = $id;
		if (!$this->Genre->exists()) {
			throw new NotFoundException(__('Invalid genre'));
		}
		if ($this->Genre->delete()) {
			$this->Session->setFlash(__('Genre deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Genre was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
