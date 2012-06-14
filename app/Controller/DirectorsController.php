<?php
App::uses('AppController', 'Controller');
/**
 * Directors Controller
 *
 * @property Director $Director
 */
class DirectorsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Director->recursive = 0;
		$this->set('directors', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Director->id = $id;
		if (!$this->Director->exists()) {
			throw new NotFoundException(__('Invalid director'));
		}
		$this->set('director', $this->Director->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Director->create();
			if ($this->Director->save($this->request->data)) {
				$this->Session->setFlash(__('The director has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The director could not be saved. Please, try again.'));
			}
		}
		$movies = $this->Director->Movie->find('list');
		$this->set(compact('movies'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Director->id = $id;
		if (!$this->Director->exists()) {
			throw new NotFoundException(__('Invalid director'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Director->save($this->request->data)) {
				$this->Session->setFlash(__('The director has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The director could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Director->read(null, $id);
		}
		$movies = $this->Director->Movie->find('list');
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
		$this->Director->id = $id;
		if (!$this->Director->exists()) {
			throw new NotFoundException(__('Invalid director'));
		}
		if ($this->Director->delete()) {
			$this->Session->setFlash(__('Director deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Director was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
