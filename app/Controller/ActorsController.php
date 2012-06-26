<?php
App::uses('AppController', 'Controller');
/**
 * Actors Controller
 *
 * @property Actor $Actor
 */
class ActorsController extends AppController {

var $paginate = array('Actor' => array('limit' => 3,'page' => 1));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Actor->recursive = 0;
		$this->set('actors', $this->paginate('Actor'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Actor->id = $id;
		if (!$this->Actor->exists()) {
			throw new NotFoundException(__('Invalid actor'));
		}
		$this->set('actor', $this->Actor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Actor->create();
			if ($this->Actor->save($this->request->data)) {
				$this->Session->setFlash(__('The actor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The actor could not be saved. Please, try again.'));
			}
		}
		$movies = $this->Actor->Movie->find('list');
		$this->set(compact('movies'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Actor->id = $id;
		if (!$this->Actor->exists()) {
			throw new NotFoundException(__('Invalid actor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Actor->save($this->request->data)) {
				$this->Session->setFlash(__('The actor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The actor could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Actor->read(null, $id);
		}
		$movies = $this->Actor->Movie->find('list');
		$this->set(compact('movies'));
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
		$this->Actor->id = $id;
		if (!$this->Actor->exists()) {
			throw new NotFoundException(__('Invalid actor'));
		}
		if ($this->Actor->delete()) {
			$this->Session->setFlash(__('Actor deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Actor was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
