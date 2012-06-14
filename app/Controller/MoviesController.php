<?php
App::uses('AppController', 'Controller');
/**
 * Movies Controller
 *
 * @property Movie $Movie
 */
class MoviesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Movie->recursive = 0;
		$this->set('movies', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Movie->id = $id;
		if (!$this->Movie->exists()) {
			throw new NotFoundException(__('Invalid movie'));
		}
		$this->set('movie', $this->Movie->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Movie->create();
			if ($this->Movie->save($this->request->data)) {
				$this->Session->setFlash(__('The movie has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movie could not be saved. Please, try again.'));
			}
		}
		$actors = $this->Movie->Actor->find('list');
		$directors = $this->Movie->Director->find('list');
		$genres = $this->Movie->Genre->find('list');
		$writers = $this->Movie->Writer->find('list');
		$this->set(compact('actors', 'directors', 'genres', 'writers'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Movie->id = $id;
		if (!$this->Movie->exists()) {
			throw new NotFoundException(__('Invalid movie'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Movie->save($this->request->data)) {
				$this->Session->setFlash(__('The movie has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movie could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Movie->read(null, $id);
		}
		$actors = $this->Movie->Actor->find('list');
		$directors = $this->Movie->Director->find('list');
		$genres = $this->Movie->Genre->find('list');
		$writers = $this->Movie->Writer->find('list');
		$this->set(compact('actors', 'directors', 'genres', 'writers'));
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
		$this->Movie->id = $id;
		if (!$this->Movie->exists()) {
			throw new NotFoundException(__('Invalid movie'));
		}
		if ($this->Movie->delete()) {
			$this->Session->setFlash(__('Movie deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Movie was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}